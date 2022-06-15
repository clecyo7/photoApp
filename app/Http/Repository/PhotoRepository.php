<?php

namespace App\Http\Repository;


use App\Models\Photo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PhotoRepository
{

    public function list(Request $request, $paginate = true)
    {
        $photo = Photo::orderBy('id');
        if ($paginate) {
            return $photo->paginate(15);
        } else {
            return $photo->get();
        }
        return $photo;
    }

    public function show($id)
    {
        $photo = Photo::find($id);
        return $photo;
    }

    public function create(Request $request)
    {

        $photo = Auth::user();
        $photoID = $photo->id;


        if (empty($request->input('nome')) || empty($request->input('peso')) || empty($request->input('idade'))) {
            return response()->json(['status' => 'error', 'message' => 'Dados incompletos.']);
          }
          try {
            $photo = Photo::Create([
                'nome' => $request->input('nome'),
                'peso' => $request->input('peso'),
                'idade' => $request->input('idade'),
                'image' => $request->input('image'),
                'id_user' => $photoID
            ]);
            $photo->save();
            return $photo;

            } catch (\Exception $e) {
                return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
            }
                // $photo = Photo::create($request->all());
                // return $photo;
    }

    public function update(Request $request, $id)
    {
        $photo = photo::where('id', $id)->update($request->all());
        return $photo;
    }


    public function destroy($id)
    {
        $photo = Photo::destroy($id);
        return $photo;
    }
}
