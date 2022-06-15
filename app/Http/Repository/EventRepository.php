<?php

namespace App\Http\Repository;


use App\Models\Event;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EventRepository
{

    public function list(Request $request, $paginate = true)
    {
        $event = Event::orderBy('date');
        return $event->get();
    }

    public function show($id)
    {
        $event = Event::find($id);
        return $event;
    }

    public function create(Request $request)
    {
        $id = Auth::user();
        $idUser = $id->id;

        if (empty($request->input('name')) || empty($request->input('date')) || empty($request->input('time'))) {
            return response()->json(['status' => 'error', 'message' => 'Dados incompletos.']);
        }
        try {
            $event = Event::Create([
                'name' => $request->input('name'),
                'description' => $request->input('description'),
                'date' => $request->input('date'),
                'place' => $request->input('place'),
                'time' => $request->input('time'),
                'status'  => $request->input('status'),
                'id_user' => $idUser
            ]);
            $event->save();
            return $event;
        } catch (\Exception $e) {
            return response()->json(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }

    public function update(Request $request, $id)
    {
        $event = Event::where('id', $id)->update($request->all());
        return $event;
    }


    public function destroy($id)
    {
        $event = Event::destroy($id);
        return $event;
    }
}
