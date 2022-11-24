<?php

namespace Rivan\Kasir\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Session;

class KasirController extends Controller
{
    public function index($id){
        $data = HTTP::withHeaders([
            'Accept' => 'application/json'
        ])->get('http://127.0.0.1:8000/api/barang-by-idcabang/'.$id);

        return view('kasir::kasir',[
            'data_barang' => $data['data_barang']
        ]);
    }
    public function tambah_pesanan(Request $request){
        $id = $request['id'];

        $data = HTTP::withHeaders([
            'Accept' => 'application/json'
        ])->get('http://127.0.0.1:8000/api/barang/'.$id);

        return view('kasir::list',[
            'data_barang' => $data['data_barang'],
            'qty' => $request['qty']
        ]);
    }
    public function pesan(Request $request){

        $data = HTTP::withHeaders([
            'Accept' => 'application/json'
        ])->post('http://127.0.0.1:8000/api/transaksi',$request->all());

        return back();

    }
}
