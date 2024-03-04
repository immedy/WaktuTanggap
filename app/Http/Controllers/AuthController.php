<?php

namespace App\Http\Controllers;

use App\Models\pegawai;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Contracts\Providers\Auth;
use Tymon\JWTAuth\Facades\JWTAuth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function Auth(Request $request)
    {
        $request ->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        $Auth = $request->only('username', 'password');
        $token = JWTAuth::attempt($Auth);
        
        if (!$token) {
            return response()->json([
                'message' => 'Unauthorized',
            ], 401);
        }

        $user = JWTAuth::user();
        return response()->json([
            'user' => $user,
            'authorization' => [
                'token' => $token,
                'type' => 'Bearer',
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
    public function show(string $id)
    {
        $pegawai = pegawai::with('user')->find($id);
        $tokenString = JWTAuth::fromUser($pegawai);
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
