<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ColaboradoresVaciosExport
{
    public function export()
    {
        try {
            $users = $this->getUsersWithMissingFields(); // Obtener solo usuarios con campos vacíos
            $spreadsheet = $this->generateSpreadsheet($users);

            $writer = new Xls($spreadsheet);

            return new StreamedResponse(function () use ($writer) {
                ob_start();
                $writer->save('php://output');
                echo ob_get_clean();
            }, 200, [
                'Content-Type' => 'application/vnd.ms-excel',
                'Content-Disposition' => 'attachment; filename="Colaboradores_Vacios.xls"',
                'Pragma' => 'public',
                'Cache-Control' => 'max-age=0',
            ]);
        } catch (\Exception $e) {
            return response()->json(['error' => $e->getMessage()], 500);
        }
    }

    private function getUsersWithMissingFields()
    {
        // Lista de campos a verificar (EXCLUYENDO: 559, 77, 558 y perfil)
        $fieldsToCheck = [1, 2, 3, 999, 1000, 78, 302, 76, 288, 53, 760, 50, 212, 324, 325];

        return DB::connection('wordpress')
            ->table('dxv_users as u')
            ->select([
                'u.ID', 'u.user_login',
                'fn.value as first_name', 'ln.value as last_name',
                'ci.value as cedula', 'ta.value as talla',
                'outl.value as outlook', 'gm.value as correo_gmail',
                'pc.value as personal_correo', 'wc.value as whatsapp_corporativo',
                'num.value as numero', 'ct.value as cloud',
                'pa.value as pais', 'ub.value as ubicacion',
                'ar.value as area', 'et.value as etiqueta',
                'na.value as nacimiento', 'in.value as ingreso',
                'mo.value as modalidad', 'jt.value as job_title',
                't.name as cargo'
            ])
            ->leftJoin('dxv_bp_xprofile_data as fn', function ($join) {
                $join->on('u.ID', '=', 'fn.user_id')->where('fn.field_id', '=', 1);
            })
            ->leftJoin('dxv_bp_xprofile_data as ln', function ($join) {
                $join->on('u.ID', '=', 'ln.user_id')->where('ln.field_id', '=', 2);
            })
            ->leftJoin('dxv_bp_xprofile_data as ci', function ($join) {
                $join->on('u.ID', '=', 'ci.user_id')->where('ci.field_id', '=', 999);
            })
            ->leftJoin('dxv_bp_xprofile_data as ta', function ($join) {
                $join->on('u.ID', '=', 'ta.user_id')->where('ta.field_id', '=', 1000);
            })
            ->leftJoin('dxv_bp_xprofile_data as outl', function ($join) {
                $join->on('u.ID', '=', 'outl.user_id')->where('outl.field_id', '=', 558);
            })
            ->leftJoin('dxv_bp_xprofile_data as gm', function ($join) {
                $join->on('u.ID', '=', 'gm.user_id')->where('gm.field_id', '=', 78);
            })
            ->leftJoin('dxv_bp_xprofile_data as pc', function ($join) {
                $join->on('u.ID', '=', 'pc.user_id')->where('pc.field_id', '=', 302);
            })
            ->leftJoin('dxv_bp_xprofile_data as wc', function ($join) {
                $join->on('u.ID', '=', 'wc.user_id')->where('wc.field_id', '=', 559);
            })
            ->leftJoin('dxv_bp_xprofile_data as num', function ($join) {
                $join->on('u.ID', '=', 'num.user_id')->where('num.field_id', '=', 76);
            })
            ->leftJoin('dxv_bp_xprofile_data as ct', function ($join) {
                $join->on('u.ID', '=', 'ct.user_id')->where('ct.field_id', '=', 77);
            })
            ->leftJoin('dxv_bp_xprofile_data as pa', function ($join) {
                $join->on('u.ID', '=', 'pa.user_id')->where('pa.field_id', '=', 288);
            })
            ->leftJoin('dxv_bp_xprofile_data as ub', function ($join) {
                $join->on('u.ID', '=', 'ub.user_id')->where('ub.field_id', '=', 53);
            })
            ->leftJoin('dxv_bp_xprofile_data as ar', function ($join) {
                $join->on('u.ID', '=', 'ar.user_id')->where('ar.field_id', '=', 760);
            })
            ->leftJoin('dxv_bp_xprofile_data as et', function ($join) {
                $join->on('u.ID', '=', 'et.user_id')->where('et.field_id', '=', 50);
            })
            ->leftJoin('dxv_bp_xprofile_data as na', function ($join) {
                $join->on('u.ID', '=', 'na.user_id')->where('na.field_id', '=', 212);
            })
            ->leftJoin('dxv_bp_xprofile_data as in', function ($join) {
                $join->on('u.ID', '=', 'in.user_id')->where('in.field_id', '=', 324);
            })
            ->leftJoin('dxv_bp_xprofile_data as mo', function ($join) {
                $join->on('u.ID', '=', 'mo.user_id')->where('mo.field_id', '=', 325);
            })
            ->leftJoin('dxv_bp_xprofile_data as jt', function ($join) {
                $join->on('u.ID', '=', 'jt.user_id')->where('jt.field_id', '=', 50);
            })
            ->leftJoin('dxv_term_relationships as tr', function ($join) {
                $join->on('u.ID', '=', 'tr.object_id');
            })
            ->leftJoin('dxv_term_taxonomy as tt', function ($join) {
                $join->on('tr.term_taxonomy_id', '=', 'tt.term_taxonomy_id')
                     ->where('tt.taxonomy', 'bp_member_type');
            })
            ->leftJoin('dxv_terms as t', function ($join) {
                $join->on('tt.term_id', '=', 't.term_id');
            })
            ->where(function ($query) use ($fieldsToCheck) {
                foreach ($fieldsToCheck as $fieldId) {
                    $query->orWhereRaw("
                        NOT EXISTS (
                            SELECT 1 FROM dxv_bp_xprofile_data
                            WHERE user_id = u.ID
                            AND field_id = $fieldId
                            AND value IS NOT NULL
                            AND value != ''
                        )
                    ");
                }
            })
            ->distinct()
            ->get();
    }

    private function generateSpreadsheet($users)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();

        // Definir encabezados
        $headers = ['ID', 'Usuario', 'Nombre', 'Apellido', 'Cédula', 'Talla', 'Outlook', 'Correo Gmail', 'Correo Personal', 'WhatsApp Corporativo', 'Número', 'Cloud', 'País', 'Ubicación', 'Área', 'Departamento', 'Fecha de Nacimiento', 'Fecha de Ingreso', 'Modalidad', 'Cargo'];
        $col = 'A';

        foreach ($headers as $header) {
            $sheet->setCellValue("{$col}1", $header);
            $col++;
        }

        // Insertar datos
        $row = 2;
        foreach ($users as $user) {
            $col = 'A';
            foreach ($user as $value) {
                $sheet->setCellValue("{$col}{$row}", $value);
                $col++;
            }
            $row++;
        }

        return $spreadsheet;
    }
}
