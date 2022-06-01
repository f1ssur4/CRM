<?php

namespace App\Http\Controllers;

use App\Models\Statistics;
use Barryvdh\Snappy\Facades\SnappyPdf;

class StatisticController extends Controller
{
    public function index()
    {
        return view('statistic.index', ['statistic' => Statistics::all()]);
    }

    public function convert()
    {
        $pdf = SnappyPdf::loadView('statistic.data', ['statistic' => Statistics::all()]);
        return $pdf->download('statistic.pdf');
    }

    public function cleanOff()
    {
        Statistics::find(1)->update([
            'subscriptions' => 0,
            'lessons' => 0,
            'income' => 0,
            ]);
        return $this->returnWithMessage(config('messages.statistic_cleanOff_success'));
    }

}
