<?php

namespace App\Http\Services;


use App\Http\Repository\EventRepository;
use Illuminate\Http\Request;


class EventService {

    public function __construct(EventRepository $eventRepository)
    {
        $this->eventRepository = $eventRepository;
    }


    public function list(Request $request){
        $event = $this->eventRepository->list($request);
        return $event;
    }

    public function show($id){
        $event = $this->eventRepository->show($id);
        return $event;
    }

    public function create(Request $request){
        $event = $this->eventRepository->create($request);
        return $event;
        
    }

    public function update(Request $request, $id)
    {
        $event = $this->eventRepository->update($request, $id);
        return $event;
    }


    public function destroy($id)
    {
        $event = $this->eventRepository->destroy($id);
        return $event;
    }



}