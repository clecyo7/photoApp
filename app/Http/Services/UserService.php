<?php

namespace App\Http\Services;


use App\Models\User;
use App\Http\Repository\UserRepository;
use Illuminate\Http\Request;


class UserService {

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }


    public function list(Request $request){
        $user = $this->userRepository->list($request);
        return $user;
    }

    public function show($id){
        $user = $this->userRepository->show($id);
        return $user;
    }

    public function create(Request $request){
        try {
            $user = $this->userRepository->create($request);
        }catch (\Exception $e){
            return ['error' => true, 'message' => $e->getMessage()];
        }
        return $user;
    }

    public function update(Request $request, $id)
    {
        $user = $this->userRepository->update($request, $id);
        return $user;
    }


    public function destroy($id)
    {
        $user = $this->userRepository->destroy($id);
        return $user;
    }



}