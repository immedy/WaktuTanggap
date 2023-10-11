<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;

class UserNameController extends Controller
{
    public function HalamanLogin()
    {
        return view('Layout.login');
    }
    
    public function index(Request $request)
    {
        $id = $request->id;
    
        $ValidasiData = $request->validate([
            'pegawai_id' => 'required',
            'username'  => 'required',
            'password' => 'required'
        ]);
        $ValidasiData['password']= bcrypt($ValidasiData['password']);
        // dd($ValidasiData);
        User::updateOrInsert(['pegawai_id'=> $id, 'status' => 1, 'akses'=> 0], $ValidasiData);
        if ($ValidasiData){
            Alert::success('username Berhasil Dibuat');
            return redirect()->back();
        }
        return redirect()->back();
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $credentials = auth()->user();
            if ($credentials->status == '1' && $credentials->akses == '1') {
                $request->session()->regenerate();              
                Alert::Toast('Selamat Datang','success');
                return redirect('/ResponLaporanKerusakan');
            } elseif ($credentials->status == '1' && $credentials->akses == '0') {
                $request->session()->regenerate();
                Alert::Toast('Selamat Datang', 'success');
                return redirect('/');
            } else {
                auth()->logout();
            }
        }
        Alert::error('Username Dan Password Telah Dimusnahkan');
        return back();
    }
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login');
    }

    public function ManajemenPengguna()
    {
        return view('Dashboard.Pegawai.ManajemenPengguna', [
            'users' => User::all(),
        ]);
    }

    public function CariUsername($id)
    {
       $Username = user::find($id);
       return response()->json($Username);
    }

    public function EditUsername(Request $request)
    {
        $id = $request->id;
        $ValidasiData = $request->validate([
            'pegawai_id' => 'required',
            'username'  => 'required',
            'password' => 'required'
        ]);
        $ValidasiData['password']= bcrypt($ValidasiData['password']);
        // dd($ValidasiData);
        User::updateOrInsert(['id'=> $id, 'status' => 1], $ValidasiData);
        return back();
    }
}
