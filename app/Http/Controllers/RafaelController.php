<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RafaelController extends Controller
{
    // Esta es la función que recibe parámetros y retorna un resultado procesado
    public function calcularAreaTriangulo($base, $altura)
    {
        if ($base <= 0 || $altura <= 0) {
            return "Los valores deben ser mayores a cero";
        }
        
        $area = ($base * $altura) / 2;
        return "El área del triángulo es: " . $area;
    }
}
