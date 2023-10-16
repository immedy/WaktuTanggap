<?php

namespace App\Http\Controllers;

use App\Models\kerusakan;
use App\Models\nosurat;
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
    public function surat()
    {
        return view('Dashboard.Surat.SuratKeluar',[
            'surat' => nosurat::all()
        ]);
    }

    public function AddSurat(Request $request)
    {
        $ValidasiSurat = $request->validate([
            'nosurat' =>        'required',
            'perihal' =>        'required',
            'tanggal' =>        'required',
            // 'suratpermohonan' => 'required|mimes:PDF,pdf|max:1028',
            // 'suratrekomendasi' => 'required|mimes:PDF,pdf|max:1028',
        ]);
        // $ValidasiSurat['suratpermohonan'] = $request->file('suratpermohonan')->store('suratpermohonan');
        // $ValidasiSurat['suratrekomendasi'] =  $request->file('suratrekomendasi')->store('suratrekomendasi');
        nosurat::create($ValidasiSurat);
        if ($ValidasiSurat) {
            Alert::success('Surat Berhasil diupload');
        }
        return back();
    }

    public function Delete($id)
    {
        $hapus = nosurat::findOrFail($id);
        $hapus ->delete();
        if ($hapus){
            Alert::Success('Data terhapus');
        }
        return back();
    }
}
