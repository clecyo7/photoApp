<?php

namespace App\Http\Controllers;

use App\Models\Photo;
use App\Http\Requests\StorePhotoRequest;
use App\Http\Services\PhotoService;
use App\Http\Requests\UpdatePhotoRequest;
use Illuminate\Http\Request;

class PhotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct(PhotoService $photoService)
    {
        $this->photoService = $photoService;
    }

    public function index(Request $request)
    {
        $photo = $this->photoService->list($request);
        return $photo;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePhotoRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $photo = $this->photoService->create($request);
        return $photo;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $photo = $this->photoService->show($id);
        return $photo;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function edit(Photo $photo)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePhotoRequest  $request
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $photo = $this->photoService->update($request, $id);
        return $photo;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Photo  $photo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $photo = $this->photoService->destroy($id);
        return $photo;
    }
}
