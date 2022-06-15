<?php

namespace App\Http\Services;


use App\Models\Photo;
use App\Http\Repository\PhotoRepository;
use Illuminate\Http\Request;


class PhotoService {

    public function __construct(PhotoRepository $photoRepository)
    {
        $this->photoRepository = $photoRepository;
    }


    public function list(Request $request){
        $photo = $this->photoRepository->list($request);
        return $photo;
    }

    public function show($id){
        $photo = $this->photoRepository->show($id);
        return $photo;
    }

    public function create(Request $request){
        $photo = $this->photoRepository->create($request);
        return $photo;
        
    }

    public function update(Request $request, $id)
    {
        $photo = $this->photoRepository->update($request, $id);
        return $photo;
    }


    public function destroy($id)
    {
        $photo = $this->photoRepository->destroy($id);
        return $photo;
    }



}