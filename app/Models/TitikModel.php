<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class TitikModel extends Model
{
    public function allData(){
        $results = DB::table('wisata_religi')
        ->select('nama', 'alamat', 'gambar', 'latitude', 'longtitude')
        ->get();
        return $results;
    }
}
