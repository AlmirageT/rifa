<?php

namespace App\Observers;

use App\Numero;

class NumeroObserver
{
    /**
     * Handle the numero "created" event.
     *
     * @param  \App\Numero  $numero
     * @return void
     */
    public function created(Numero $numero)
    {
        $sinEspacio = trim($numero->numero);
        $resta = strlen($sinEspacio);
        $valorNumero = $numero->numero;
        switch ($resta) {
            case 1:
                Numero::find($numero->idNumero)->update([
                    'numero' => '0000'.$valorNumero
                ]);
                break;
            case 2:
                Numero::find($numero->idNumero)->update([
                    'numero' => '000'.$valorNumero
                ]);
                break;
            case 3:
                Numero::find($numero->idNumero)->update([
                    'numero' => '00'.$valorNumero
                ]);
                break;
            case 4:
                Numero::find($numero->idNumero)->update([
                    'numero' => '0'.$valorNumero
                ]);
                break;
            default:
                # code...
                break;
        }
    }

    /**
     * Handle the numero "updated" event.
     *
     * @param  \App\Numero  $numero
     * @return void
     */
    public function updated(Numero $numero)
    {
        //
    }

    /**
     * Handle the numero "deleted" event.
     *
     * @param  \App\Numero  $numero
     * @return void
     */
    public function deleted(Numero $numero)
    {
        //
    }

    /**
     * Handle the numero "restored" event.
     *
     * @param  \App\Numero  $numero
     * @return void
     */
    public function restored(Numero $numero)
    {
        //
    }

    /**
     * Handle the numero "force deleted" event.
     *
     * @param  \App\Numero  $numero
     * @return void
     */
    public function forceDeleted(Numero $numero)
    {
        //
    }
}
