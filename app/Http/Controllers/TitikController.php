<?php

namespace App\Http\Controllers;

use App\Models\TitikModel;
use Illuminate\Http\Request;

class TitikController extends Controller
{
    // public function __construct()
    // {
    //     $TitikModel = new TitikModel();
    // }

    public function titik()
    {
        $titikModel = new TitikModel();
        $results = $titikModel->allData();
        return response()->json($results);
    }
}
