<?php

namespace App\Http\Controllers;

use App\Http\Middleware\user;
use App\Models\pegawai;
use Illuminate\Http\Request;
use PHPOpenSourceSaver\JWTAuth\Contracts\Providers\Auth as ProvidersAuth;
use Illuminate\Support\Facades\Auth;



class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
   
     public function login(Request $request)
    {
        $request ->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $Auth = $request->only('username', 'password');
        $token = Auth::attempt($Auth);
        
        if (!$token) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = Auth::user();
        return response()->json([
            'user' => $user,
            'authorization' => [
                'token' => $token,
                'type' => 'bearer',
            ]
        ]);
    }

    public function index()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $user = $request->user();
        $pegawai = Pegawai::where('id', $user->pegawai_id)->first();
        
        return response()->json([
            'username' => $user->username,           
            'nama' => $pegawai ? $pegawai->nama : null,
            'nip' => $pegawai ? $pegawai->nip : null
        ]);

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
