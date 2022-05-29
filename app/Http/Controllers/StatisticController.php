<?php

namespace App\Http\Controllers;

use App\Models\Statistic;
use Illuminate\Http\Request;

class StatisticController extends Controller
{
    public function index()
    {
        return view('statistic.index', ['statistic' => Statistic::all()]);
    }
}
