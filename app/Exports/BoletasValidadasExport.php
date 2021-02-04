<?php

namespace App\Exports;

use App\Boleta;
//use Maatwebsite\Excel\Concerns\FromCollection;
//use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithEvents;


class BoletasValidadasExport implements FromView, ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    
    public function collection()
    {
        return Boleta::all();
    }*/
    public function view(): View
    {
        $boletas = Boleta::select('*')
        ->join('usuarios','boletas.idUsuario','=','usuarios.idUsuario')
        ->join('estados','boletas.idEstado','=','estados.idEstado')
        ->where('boletas.idEstado',3)
        ->get();
        return view('excel.boletasValidadas', [
            'boletas' => $boletas
        ]);
    }
}
