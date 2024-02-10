<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Paket;

class PaketController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $pakets = Paket::all();
        return response()->json($pakets);
    }

     /**
     * Store a newly created paket in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'paket' => 'required|string',
            'price' => 'required|integer',
        ]);

        $paket = new Paket();
        $paket->paket = $request->paket;
        $paket->price = $request->price;
        $paket->save();

        return response()->json(['message' => 'Paket created successfully'], 201);
    }

    /**
     * Update the specified paket in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'paket' => 'required|string',
            'price' => 'required|integer',
        ]);

        $paket = Paket::findOrFail($id);

        $paket->paket = $request->paket;
        $paket->price = $request->price;
        $paket->save();

        return response()->json(['message' => 'Paket updated successfully'], 200);
    }

   /**
     * Remove the specified paket from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paket = Paket::findOrFail($id);

        $paket->delete();

        return response()->json(['message' => 'Paket deleted successfully'], 200);
    }

}
