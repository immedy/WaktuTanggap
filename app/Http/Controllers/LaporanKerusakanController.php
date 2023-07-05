<?php

namespace App\Http\Controllers;

use App\Models\kerusakan;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LaporanKerusakanController extends Controller
{
    public function TampilLaporan()
    {
        return view('Dashboard.HalamanUtama.HalamanUtama',[
            'LaporanPengirim' => kerusakan::where('ruangan','=',auth()->user()->pegawai->ruangan)->latest()->get()
        ]);
    }
    public function KirimLaporan(Request $request)
    {
        
        $KirimLaporan = $request->validate([
            'keterangan'    => 'required',
            'alat'          => 'required',
            'spesifikasi'   => 'required',
            'jumlah'        =>'required',
            'waktu_pelaporan'=>'required',
        ]);
        $KirimLaporan ['ruangan'] = Auth::user()->pegawai->ruangan;
        $KirimLaporan ['pegawai_id'] = Auth::user()->pegawai->id;
        $KirimLaporan ['status'] = 0;
        // dd($KirimLaporan);
        kerusakan::create($KirimLaporan);
        if ($KirimLaporan) {
            Alert::success('Pegawai Berhasil Di tambahkan');
        }
        return back();
    }
}