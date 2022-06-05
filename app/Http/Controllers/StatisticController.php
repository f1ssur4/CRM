<?php

namespace App\Http\Controllers;

use App\Models\Statistics;
use Barryvdh\Snappy\Facades\SnappyPdf;

class StatisticController extends Controller
{
    public function index()
    {
        return view('statistics.index', ['statistics' => Statistics::all()]);
    }

    public function convert()
    {
        $pdf = SnappyPdf::loadView('statistics.data', ['statistics' => Statistics::all()]);
        return $pdf->download('statistics.pdf');
    }

    public function cleanOff()
    {
        Statistics::find(1)->update([
            'subscriptions' => 0,
            'lessons' => 0,
            'income' => 0,
            ]);
        return $this->returnWithMessage(config('messages.statistics_cleanOff_success'));
    }

}
