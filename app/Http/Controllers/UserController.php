<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Http\Services\UserService;



class UserController extends Controller {

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }


    public function index(Request $request)
    {
        $user = $this->userService->list($request);
        return $user;
    }


    public function store(Request $request)
    {
        $user = $this->userService->create($request);
        return $user;
    }


    public function show($id)
    {
        $user = $this->userService->show($id);
        return $user;
    }


    public function update(Request $request, $id)
    {
        $user = $this->userService->update($request, $id);
        return $user;
    }


    public function destroy($id)
    {
        $user = $this->userService->destroy($id);
        return $user;
    }


}