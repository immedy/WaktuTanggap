<?php

namespace App\Http\Controllers;

use App\Models\referensi;
use App\Models\subreferensi;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ReferensiController extends Controller
{
    public function index()
    {
        return view('Dashboard.referensi.referensi',[
            'referensi' => referensi::all(),
            'subreferensi' => subreferensi::all()
            
        ]);
    }
    public function SimpanReferensi(Request $request)
    {
        $validasiReferensi = $request->validate([
            'referensi' => 'required'
        ]);
        $validasiReferensi['status'] = 1;
        referensi::updateOrInsert($validasiReferensi);
        if($validasiReferensi){
            Alert::success('Berhasil Ditambahkan');
        }
        return back();
    }
    public function SimpanJenisReferensi(Request $request)
    {
        $validasiSubReferensi = $request->validate([
            'deskripsi' => 'required',
            'referensi_id' => 'required',
        ]);
        $validasiSubReferensi ['status'] = 1;
        subreferensi::updateOrInsert( $validasiSubReferensi);
        if( $validasiSubReferensi){
            Alert::success('Berhasil Ditambahkan');
        }
        return back();
        
    }
    public function password()
    {
        return view('Dashboard.Detail.passowrd');
    }
}
