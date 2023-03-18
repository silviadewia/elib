<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = [
            'title' => 'Profile User',
            'details' => User::find(auth()->user()->id),
        ];

        return view('profile.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
            'repassword' => 'required|same:password',
        ]);

        $messages = [];

        if ($request->password == $request->repassword) {
            $request->merge([
                'password' => Hash::make($request->password),
            ]);
        }

        $data = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if ($request->email != auth()->user()->email || $request->password != auth()->user()->password) {
            try {
                // update 
                User::where('id', $request->id)->update($data);
                Log::info('Success update profile', [
                    'email' => $request->email,
                    'password' => $request->password,
                ]);
                return $messages=  [
                    'status'=> 'success',
                    'code'=> 200,
                    'message'=> 'Data berhasil diubah',
                ];
            } catch(\Exception $e) {
                Log::critical('Error update profile', [
                    'message' => $e->getMessage(),
                    'file' => $e->getFile(),
                    'line' => $e->getLine(),
                ]);
                return $messages=  [
                    'status'=> 'error',
                    'code'=> 400,
                    'message'=> $e->getMessage(),
                ];
            }
        } else {
            return $messages=  [
                'status'=> 'error',
                'code'=> 400,
                'message'=> 'Data tidak ada yang diubah',
            ];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
