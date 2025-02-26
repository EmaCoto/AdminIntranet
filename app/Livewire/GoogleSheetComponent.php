<?php

namespace App\Livewire;

use Livewire\Component;
use Google\Client;
use Google\Service\Sheets;

class GoogleSheetComponent extends Component
{
    public $sheetData = [];

    public function mount()
    {
        $this->getSheetData();
    }

    public function getSheetData()
    {
        $client = new Client();
        $client->setApplicationName('Mi Proyecto Laravel');
        $client->setScopes([Sheets::SPREADSHEETS_READONLY]);
        $client->setAuthConfig(storage_path('credentials.json')); // Asegúrate de tener este archivo

        $service = new Sheets($client);
        $spreadsheetId = 'TU_ID_DE_SHEET';
        $range = 'Hoja1!A1:D10'; // Cambia el rango según lo necesites

        $response = $service->spreadsheets_values->get($spreadsheetId, $range);
        $this->sheetData = $response->getValues();
    }

    public function render()
    {
        return view('livewire.google-sheet-component');
    }
}

