<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Upazila;
use App\Models\Union;

class AjaxController extends Controller
{
    public function upazilaList($district){
        $upazilas = Upazila::where('district_id', $district)->orderBy('name', 'asc')->get();
        return response()->json($upazilas);
    }



    public function unionList($upazila){
        $unions = Union::where('upazila_id', $upazila)->orderBy('name', 'asc')->get();
        return response()->json($unions);
    }
}
