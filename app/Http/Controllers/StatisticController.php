<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Barryvdh\Snappy\Facades\SnappyPdf;

class StatisticController extends Controller
{
    public function index()
    {
        return view('statistic.index', ['statistic' => Statistic::all()]);
    }

    public function convert()
    {
        $pdf = SnappyPdf::loadView('statistic.data', ['statistic' => Statistic::all()]);
        return $pdf->download('statistic.pdf');
    }

}
