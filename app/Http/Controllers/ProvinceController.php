<?php

namespace App\Http\Controllers;

use App\Models\Province;
use Illuminate\Http\Request;

class ProvinceController extends Controller
{
    public function select(Request $request)
    {
        $provinces = [];

        if ($request->has('q')) {
            $search = $request->q;
            $provinces = Province::select("id", "name")
                ->Where('name', 'LIKE', "%$search%")
                ->get();
        } else {
            $provinces = Province::get();
        }
        return response()->json($provinces);
    }
}
