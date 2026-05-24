<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class OperationController extends Controller
{
    // Función para calcular el porcentaje (GEO)
    public function calculatePercentage(float $amount, float $percentage): float
    {
        return ($amount * $percentage) / 100;
    }

    public function indexPorcentaje(): View
    {
        return view('porcentaje.index');
    }

    public function calcularPorcentaje(Request $request): View
    {
        $request->validate([
            'monto' => 'required|numeric|min:0',
            'porcentaje' => 'required|numeric|min:0|max:100',
        ]);

        $monto = $request->input('monto');
        $porcentaje = $request->input('porcentaje');
        $resultado = $this->calculatePercentage($monto, $porcentaje);

        return view('porcentaje.index', [
            'monto' => $monto,
            'porcentaje' => $porcentaje,
            'resultado' => $resultado,
            'calculado' => true,
        ]);
    }

    // Función para validar el número de tarjeta de crédito usando el algoritmo de Luhn (MARIANA)
    public function validarLuhn(string $numero): bool
    {
        $numero = preg_replace('/[\s\-]/', '', $numero);

        if (! preg_match('/^\d{13,19}$/', $numero)) {
            return false;
        }

        $suma = 0;
        $longitud = strlen($numero);
        $esSegundo = false;

        for ($i = $longitud - 1; $i >= 0; $i--) {
            $digito = (int) $numero[$i];

            if ($esSegundo) {
                $digito *= 2;
                if ($digito > 9) {
                    $digito -= 9;
                }
            }

            $suma += $digito;
            $esSegundo = ! $esSegundo;
        }

        return $suma % 10 === 0;
    }

    public function validar(Request $request): View
    {
        $request->validate([
            'numero' => 'required|string|max:25',
        ]);

        $numero = $request->input('numero');
        $valido = $this->validarLuhn($numero);

        return view('validador.index', [
            'numero' => $numero,
            'valido' => $valido,
            'revisado' => true,
        ]);
    }

    public function index(): View
    {
        return view('validador.index');
    }

    // rafa
    public function indexParImpar(): View
    {
        return view('parimpar.index');
    }

    public function verificarParImpar(Request $request): View
    {
        $request->validate([
            'numero' => 'required|integer',
        ]);

        $numero = $request->input('numero');

        $resultado = $numero % 2 == 0
            ? 'El número es par'
            : 'El número es impar';

        return view('parimpar.index', [
            'numero' => $numero,
            'resultado' => $resultado,
            'verificado' => true,
        ]);
    }

    // Aquí pueden agregar más funciones para otras operaciones (X)
}
