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

    public function cleanOff()
    {
        Statistic::find(1)->update([
            'subscriptions' => 0,
            'lessons' => 0,
            'income' => 0,
            ]);
        return $this->returnWithMessage(config('messages.statistic_cleanOff_success'));
    }

}
