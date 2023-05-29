<?php

namespace App\Http\Controllers;
use App\Models\Konyvtar;
use Illuminate\Http\Request;

class KonyvtarController extends Controller
{
    public function KonyvtarExportToJson()
    {
        $konyvtars = Konyvtar::all();
        return response()->json($konyvtars);
    }


    public function index()
{
    $konyvtars = Konyvtar::all();
    return view('konyvtarView', compact('konyvtars'));
}

public function create(Request $request)
{
    $validatedData = $request->validate([
        'szerzo' => 'required',
        'cim' => 'required',
        'kiado' => 'required',
        'reszleg' => 'required',
    ]);

    Konyvtar::create($validatedData);

    return redirect()->route('konyvtar.index');
}

public function deleteRow($id)
{
    $konyvtar = Konyvtar::findOrFail($id);
    $konyvtar->delete();

    return response()->json(['success' => true]);
}
}
