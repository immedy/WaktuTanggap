<?php

namespace App\Http\Controllers;

use App\Models\hakakses;
use App\Models\pegawai;
use App\Models\subreferensi;
use App\Models\User;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PegawaiController extends Controller
{

    public function index()
    {
        return view('Dashboard.Pegawai.pegawai', [
            'pegawai' => pegawai::Filter()->paginate('20'),
            'referensi' => subreferensi::where('referensi_id', '1')->get()
        ]);
    }
    public function TambahPegawai(Request $request)
    {
        $addPegawai = $request->validate([
            'nama' => 'required',
            'ruangan' => 'nullable'
        ]);
        $addPegawai['status'] = 1;
        pegawai::updateOrInsert($addPegawai);
        if ($addPegawai) {
            Alert::success('Pegawai Berhasil Di tambahkan');
        }
        return back();
    }
    public function TampilPegawai($id)
    {
        return view('Dashboard.Pegawai.Username', [
            'pegawai' => pegawai::findOrfail($id),
            'hakakses' => hakakses::all()
        ]);
    }
    public function CariPegawai($id)
    {
        $pegawai = pegawai::find($id);
        return response()->json($pegawai);
    }
}
