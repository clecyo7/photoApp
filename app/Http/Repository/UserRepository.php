<?php

namespace App\Http\Repository;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserRepository
{


    public function list(Request $request, $paginate = true)
    {
        $user = Auth::user();
        // $user = User::orderBy('id');
        // $user = User::all();
        //$user = User::orderBy('id');
        // if ($paginate) {
        //     return $user->paginate(15);
        // } else {
        //     return $user->get();
        // }

        return $user;
    }

    public function show($id)
    {
        $user = User::find($id);
        return $user;
    }



    public function create(Request $request)
    {
        if (empty($request->input('name')) || empty($request->input('email')) || empty($request->input('password'))) {
            return response()->json(['status' => 'error', 'message' => 'Dados incompletos.']);
          }
          try {
            $user = User::Create([
                'name' => $request->input('name'),
                'email' => $request->input('email'),
                'password' => Hash::make($request->input('password'))
            ]);
            $user->save();
            // $user = User::create($request->all());
             return $user;
            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
    }




    public function update(Request $request, $id)
    {
        $user = User::where('id', $id)->update($request->all());
        return $user;
    }


    public function destroy($id)
    {
    }
}
