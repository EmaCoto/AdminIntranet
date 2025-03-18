<?php

namespace App\Exports;

use Illuminate\Support\Facades\DB;
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xls;
use Symfony\Component\HttpFoundation\StreamedResponse;

class ColaboradoresExport
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
                't.name as cargo',
                'ci.value as cedula',
                'ta.value as talla',
                'outl.value as outlook',
                'gm.value as correo_gmail',
                'pc.value as personal_correo',
                'wc.value as whatsapp_corporativo',
                'num.value as numero',
                'ct.value as cloud',
                'pa.value as pais',
                'ub.value as ubicacion',
                'ar.value as area',
                'et.value as etiqueta',
                'na.value as nacimiento',
                'in.value as ingreso',
                'mo.value as modalidad'
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
            ->leftJoin('dxv_bp_xprofile_data as ci', function ($join) {
                $join->on('dxv_users.ID', '=', 'ci.user_id')->where('ci.field_id', '=', 999);
            })
            ->leftJoin('dxv_bp_xprofile_data as ta', function ($join) {
                $join->on('dxv_users.ID', '=', 'ta.user_id')->where('ta.field_id', '=', 1000);
            })
            ->leftJoin('dxv_bp_xprofile_data as outl', function ($join) {
                $join->on('dxv_users.ID', '=', 'outl.user_id')->where('outl.field_id', '=', 558);
            })
            ->leftJoin('dxv_bp_xprofile_data as gm', function ($join) {
                $join->on('dxv_users.ID', '=', 'gm.user_id')->where('gm.field_id', '=', 78);
            })
            ->leftJoin('dxv_bp_xprofile_data as pc', function ($join) {
                $join->on('dxv_users.ID', '=', 'pc.user_id')->where('pc.field_id', '=', 302);
            })
            ->leftJoin('dxv_bp_xprofile_data as wc', function ($join) {
                $join->on('dxv_users.ID', '=', 'wc.user_id')->where('wc.field_id', '=', 559);
            })
            ->leftJoin('dxv_bp_xprofile_data as num', function ($join) {
                $join->on('dxv_users.ID', '=', 'num.user_id')->where('num.field_id', '=', 76);
            })
            ->leftJoin('dxv_bp_xprofile_data as ct', function ($join) {
                $join->on('dxv_users.ID', '=', 'ct.user_id')->where('ct.field_id', '=', 77);
            })
            ->leftJoin('dxv_bp_xprofile_data as pa', function ($join) {
                $join->on('dxv_users.ID', '=', 'pa.user_id')->where('pa.field_id', '=', 288);
            })
            ->leftJoin('dxv_bp_xprofile_data as ub', function ($join) {
                $join->on('dxv_users.ID', '=', 'ub.user_id')->where('ub.field_id', '=', 53);
            })
            ->leftJoin('dxv_bp_xprofile_data as ar', function ($join) {
                $join->on('dxv_users.ID', '=', 'ar.user_id')->where('ar.field_id', '=', 760);
            })
            ->leftJoin('dxv_bp_xprofile_data as et', function ($join) {
                $join->on('dxv_users.ID', '=', 'et.user_id')->where('et.field_id', '=', 50);
            })
            ->leftJoin('dxv_bp_xprofile_data as na', function ($join) {
                $join->on('dxv_users.ID', '=', 'na.user_id')->where('na.field_id', '=', 212);
            })
            ->leftJoin('dxv_bp_xprofile_data as in', function ($join) {
                $join->on('dxv_users.ID', '=', 'in.user_id')->where('in.field_id', '=', 324);
            })
            ->leftJoin('dxv_bp_xprofile_data as mo', function ($join) {
                $join->on('dxv_users.ID', '=', 'mo.user_id')->where('mo.field_id', '=', 325);
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
            ->orderBy('first_name', 'asc') // Ordenar por nombre en orden alfabético
            ->distinct()
            ->get();
    }
    

    private function generateSpreadsheet($users)
    {
        $spreadsheet = new Spreadsheet();
        $sheet = $spreadsheet->getActiveSheet();
    
        // Definir los encabezados
        $headers = [
            'A' => 'ID', 'B' => 'Usuario', 'C' => 'Nombre', 'D' => 'Apellido', 
            'E' => 'Cedula', 'F' => 'Talla', 'G' => 'Outlook', 'H' => 'Correo Gmail',
            'I' => 'Correo Personal', 'J' => 'WhatsApp Corporativo', 'K' => 'Número', 
            'L' => 'Cloudtalk', 'M' => 'País', 'N' => 'Ubicación', 'O' => 'Área', 
            'P' => 'Departamento', 'Q' => 'Fecha de Nacimiento', 'R' => 'Fecha de Ingreso', 
            'S' => 'Modalidad', 'T' => 'Cargo'
        ];
        
        foreach ($headers as $col => $title) {
            $sheet->setCellValue("{$col}1", $title);
        }
    
        // Aplicar formato de texto a las columnas específicas (Cédula y Número)
        $sheet->getStyle('E')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
        $sheet->getStyle('K')->getNumberFormat()->setFormatCode(\PhpOffice\PhpSpreadsheet\Style\NumberFormat::FORMAT_TEXT);
    
        // Insertar los datos
        $row = 2;
        foreach ($users as $user) {
            $data = [
                'A' => $user->ID, 'B' => $user->user_login, 'C' => $user->first_name, 'D' => $user->last_name,
                'E' => $user->cedula, // Sin comilla simple
                'F' => $user->talla, 'G' => $user->outlook, 'H' => $user->correo_gmail,
                'I' => $user->personal_correo, 'J' => $user->whatsapp_corporativo,
                'K' => $user->numero, // Sin comilla simple
                'L' => $user->cloud, 'M' => $user->pais, 'N' => $user->ubicacion, 'O' => $user->area,
                'P' => $user->etiqueta, 'Q' => $user->nacimiento, 'R' => $user->ingreso,
                'S' => $user->modalidad, 'T' => $user->cargo
            ];
    
            foreach ($data as $col => $value) {
                $sheet->setCellValueExplicit("{$col}{$row}", $value, \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING);
            }
    
            $row++;
        }
    
        return $spreadsheet;
    }
    
}
