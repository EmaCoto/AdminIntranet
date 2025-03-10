<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Symfony\Component\HttpFoundation\StreamedResponse;

class AbogadosExport
{
    public function export()
    {
        try {
            $users = $this->getUsers();
            $spreadsheet = $this->generateSpreadsheet($users);

            $writer = new Xls($spreadsheet);

            return new StreamedResponse(function () use ($writer) {
                ob_start();
                $writer->save('php://output');
                echo ob_get_clean();
            }, 200, [
                'Content-Type' => 'application/vnd.ms-excel',
                'Content-Disposition' => 'attachment; filename="Colaboradores.xls"',
                'Pragma' => 'public',
                'Cache-Control' => 'max-age=0',
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function getUsers()
    {
        return DB::connection('wordpress')
            ->table('dxv_users')
            ->select([
                'dxv_users.ID',
                'dxv_users.user_login',
                'fn.value as first_name',
                'ln.value as last_name',
                'jt.value as job_title',
                't.name as cargo'
            ])
            ->leftJoin('dxv_bp_xprofile_data as fn', function ($join) {
                $join->on('dxv_users.ID', '=', 'fn.user_id')->where('fn.field_id', '=', 1);
            })
            ->leftJoin('dxv_bp_xprofile_data as ln', function ($join) {
                $join->on('dxv_users.ID', '=', 'ln.user_id')->where('ln.field_id', '=', 2);
            })
            ->leftJoin('dxv_bp_xprofile_data as jt', function ($join) {
                $join->on('dxv_users.ID', '=', 'jt.user_id')->where('jt.field_id', '=', 50);
            })
            ->leftJoin('dxv_term_relationships as tr', function ($join) {
                $join->on('dxv_users.ID', '=', 'tr.object_id');
            })
            ->leftJoin('dxv_term_taxonomy as tt', function ($join) {
                $join->on('tr.term_taxonomy_id', '=', 'tt.term_taxonomy_id')
                     ->where('tt.taxonomy', 'bp_member_type');
            })
            ->leftJoin('dxv_terms as t', function ($join) {
                $join->on('tt.term_id', '=', 't.term_id');
            })
            ->distinct() // <--- Agregar esta línea
            ->get();
    }

    private function generateSpreadsheet($users)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Definir los encabezados
        $headers = ['A' => 'ID', 'B' => 'Usuario', 'C' => 'Nombre', 'D' => 'Apellido', 'E' => 'Departamento', 'F' => 'Cargo'];
        foreach ($headers as $col => $title) {
            $sheet->setCellValue("{$col}1", $title);
        }

        // Insertar los datos
        $row = 2;
        foreach ($users as $user) {
            $data = [
                'A' => $user->ID,
                'B' => $user->user_login,
                'C' => $user->first_name,
                'D' => $user->last_name,
                'E' => $user->job_title,
                'F' => $user->cargo
            ];

            foreach ($data as $col => $value) {
                $sheet->setCellValue("{$col}{$row}", $value);
            }

            $row++;
        }

        return $spreadsheet;
    }
}
