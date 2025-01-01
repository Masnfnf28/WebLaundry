<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;

class OutletController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $outlet = Outlet::paginate(5);
        return view('page.outlet.index')->with([
            'data' => $outlet,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = [
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat')
        ];

        Outlet::create($data);

        return back()->with('message_delete', 'Data Outlet Sudah ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data = [
            'nama' => $request->input('nama'),
            'alamat' => $request->input('alamat')
        ];

        $datas = Outlet::findOrFail($id);
        $datas->update($data);
        return back()->with('message_delete', 'Data Outlet Sudah dihapus');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Outlet::findOrFail($id);
        $data->delete();
        return back()->with('message_delete','Data Konsumen Sudah dihapus');
    }

    // public function destroy(string $id)
    // {
    //     try {
    //         $data = Outlet::findOrFail($id);
    //         $data->delete();

    //         return back()->with('message_delete', 'Data Outlet Sudah dihapus');
    //     } catch (\Exception $e) {
    //         // Handle exception
    //         return back()->with('error', 'Terjadi kesalahan saat menghapus data: ' . $e->getMessage());
    //     }
    // }
}
