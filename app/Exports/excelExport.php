<?php

namespace App\Exports;

use App\Models\ExcelM;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithTitle;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithHeadings;

class excelExport implements FromView, WithTitle, WithHeadings
{
    use Exportable;

    protected $headingColumns = [
        'ID',
        'Categoria',
        'Cod producto',
        'Nombre Producto',
        'PROVEEDORES',
        'DOLARES',
        'soles',
        'venta',
        'utilidad',
        'promocion',
        'stock',
        'marca',
        'URLP',
        'urli',
    ];

    public function view(): View
    {
        return view('principal.tablaFacebook', [
            'excel' => ExcelM::orderBy('ID')->get(),
        ]);        
    }

    public function title(): string
    {
        return 'Tabla Facebook'; // Título de la hoja en Excel
    }

    public function headings(): array
    {
        return $this->headingColumns;
    }
}




