<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller
{

    private function _validation(Request $request)
    {
        $validation = $request->validate([
            'kode_barang' => 'required|max:10|min:3',
            'nama_barang' => 'required|max:100|min:3'
        ], [
            'kode_barang.required' => 'Wajib diisi!',
            'kode_barang.max' => 'Digit maximal 10 karakter!',
            'kode_barang.min' => 'Digit minimal 3 karakter!',

            'nama_barang.required' => 'Wajib diisi!',
            'nama_barang.max' => 'Digit maximal 10 karakter!',
            'nama_barang.min' => 'Digit minimal 3 karakter!',
        ]);
    }

    // Tampilkan Data
    public function index()
    {
        $data_barang = DB::table('data_barang')->paginate(5);
        return view('crud', ['data_barang' => $data_barang]);
    }

    //method untuk tampilkan form tambah data
    public function tambah()
    {
        return view('crud-tambah-data');
    }

    //method untuk simpan data
    public function simpan(Request $request)
    {
        // dd($request->all());
        // DB::insert('insert into data_barang (kode_barang, nama_barang) values (?, ?)', [$request->kode_barang, $request->nama_barang]);

        $this->_validation($request);
        DB::table('data_barang')->insert([
            [
                'kode_barang' => $request->kode_barang,
                'nama_barang' => $request->nama_barang
            ],
        ]);

        return redirect()->route('crud')->with('message', 'Data anda berhasil ditambahkan!');
    }

    //method untuk edit data
    public function edit($id)
    {
        $data_barang = DB::table('data_barang')->where('id', $id)->first();
        return view('crud-edit-data', ['data_barang' => $data_barang]);
    }

    //method untuk update data
    public function update(Request $request, $id)
    {
        $this->_validation($request);
        // dd($request->all());
        DB::table('data_barang')->where('id', $id)->update([
            'kode_barang' => $request->kode_barang,
            'nama_barang' => $request->nama_barang
        ]);
        return redirect()->route('crud')->with('message', 'Data anda berhasil diupdate!');
    }

    //method untuk delete data
    public function delete($id)
    {
        DB::table('data_barang')->where('id', $id)->delete();
        return redirect()->back()->with('message', 'Data anda berhasil dihapus!');
    }
}
