<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RafaelController extends Controller
{
    // Agregamos float para los números y : string para el texto de retorno
    public function calcularAreaTriangulo(float $base, float $altura): string
    {
        if ($base <= 0 || $altura <= 0) {
            return "Los valores deben ser mayores a cero";
        }
        
        $area = ($base * $altura) / 2;
        return "El área del triángulo es: " . $area;
    }
}
