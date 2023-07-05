<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\kerusakan;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class ResponController extends Controller
{
  public function index()
  {
    return view('Dashboard.HalamanUtama.HalamanPenerima', [
      'ResponLaporan' => kerusakan::latest()->get()
    ]);
  }
  public function TerimaLaporan(Request $request)
  {
    $ValidasiTerimaLaporan = $request->validate([
      'notiket' => 'required'
    ]);
    $ValidasiTerimaLaporan['diterima_oleh'] = auth()->user()->pegawai->id;
    $ValidasiTerimaLaporan['status'] = 1;
    $ValidasiTerimaLaporan['waktu_respon'] = Carbon::now();
    kerusakan::updateOrInsert( ['notiket' => $ValidasiTerimaLaporan['notiket']],$ValidasiTerimaLaporan);
    if ($ValidasiTerimaLaporan) {
      Alert::success('Laporan Berhasil Di terima');
  }
  return back();
  }
  public function CariKerusakan($id)
  {
    $Kerusakan = kerusakan::find($id);
    return response()->json($Kerusakan);
  }
  public function HasilSurvey()
  {

  }
  public function HasilPerbaikan()
  {
    
  }
}
