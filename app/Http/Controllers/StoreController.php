<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Store;
use Illuminate\Http\Request;
use League\CommonMark\Extension\CommonMark\Node\Inline\Strong;

class StoreController extends Controller
{
    public function index(Request $request)
    {

        return view('alamat.index');
    }

    public function read()
    {

        $stores = Store::with(['province', 'regency', 'district', 'village'])->get();
        return view('alamat.read')->with([
            'stores' => $stores
        ]);
    }

    public function create()
    {
        return view('alamat.create');
    }

    public function store(Request $request)
    {
        try {
            Store::create([
                "name" => $request->name,
                "province_id" => $request->province,
                "regency_id" => $request->regency,
                "district_id" => $request->district,
                "village_id" => $request->village,
                "address" => $request->address,
            ]);
            return redirect()->route('stores.index');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }

    public function edit(Store $store)
    {
        return view('stores.edit', [
            'store' => $store,
            'provinceSelected' => $store->province,
            'regencySelected' => $store->regency,
            'districtSelected' => $store->district,
            'villageSelected' => $store->village,
        ]);
    }

    public function update(Request $request, Store $store)
    {
        try {
            $store->update([
                "name" => $request->name,
                "province_id" => $request->province,
                "regency_id" => $request->regency,
                "district_id" => $request->district,
                "village_id" => $request->village,
                "address" => $request->address,
            ]);
            return redirect()->route('stores.index');
        } catch (\Throwable $th) {
            dd($th->getMessage());
        }
    }
}
