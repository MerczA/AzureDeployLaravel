<?php

namespace App\Http\Controllers;

class OperationController extends Controller
{
    public function calculatePercentage(float $amount, float $percentage): float
    {
        return ($amount * $percentage) / 100;
    }
}
