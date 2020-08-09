<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ZakatmalResource;
use App\zakatMal;
use Illuminate\Http\Request;

class ZakatmalController extends Controller
{
    public function store(Request $request)
    {
     

        $varHarta = $request ->total_harta;
        $varHutang = $request ->total_hutang;
        $hasil = ($varHarta-$varHutang)*0.025;
       
        $zakatmal= zakatmal::create([
           'user_id' => auth()->id(),
           'total_harta'=> $varHarta,
           'total_hutang'=> $varHutang,
           'hasil' => $hasil
        ]);
        return new ZakatmalResource($zakatmal);
    }
}
