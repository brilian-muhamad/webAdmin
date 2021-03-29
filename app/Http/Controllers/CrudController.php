<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CrudController extends Controller {
    // tampilkan data
    public function index(){
        $data_barang = DB::table('data_barang')->simplePaginate(2);
        return view('crud', ['data_barang' => $data_barang]);
    }

    //method untuk menampilkan form tambah data
    public function tambah(){
        return view("crud-tambah-data");
    }

    //method untuk menyimpan data
    public function simpan(Request $req){
        //dd($req->all());

        //validasi
        $validation = $req->validate([
            'kode_barang' => 'required|max:10|min:3',
            'nama_barang' => 'required|max:20|min:3'
        ],
        [
            'kode_barang.required' => 'Harus diisi',
            'kode_barang.min' => 'Minimal 3 digit',
            'kode_barang.max' => 'Maximal 10 digit',
            'nama_barang.required' => 'Harus diisi',
            'nama_barang.min' => 'Minimal 3 digit',
            'nama_barang.max' => 'Maximal 10 digit'
        ]   
    );
        
        //tipe insert 1
        //DB::insert('insert into data_barang (kode_barang, nama_barang) values (?, ?)', [$req->kode_barang, $req->nama_barang]);

        //tipe insert 2
        DB::table('data_barang') -> insert([
            ['kode_barang' => $req->kode_barang, 'nama_barang' => $req->nama_barang],
            ['kode_barang' => $req->kode_barang.'xx', 'nama_barang' => $req->nama_barang.'xx']
        ]);

        return redirect()->route('crud')->with('message', 'Data baru berhasil disimpan');
    }
    
    public function hapus($id){
        DB::table('data_barang') -> where('id', $id) -> delete();

        return redirect()->back()->with('message', 'Data berhasil dihapus');
    }
}
