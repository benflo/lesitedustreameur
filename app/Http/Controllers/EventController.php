<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Auth;
use Validator;
use App\Event;

use Calendar;

class EventController extends Controller
{
    public function index(){
        $events = Event::get();
        $event_list = [];
        foreach ($events as $key => $event) {
            $event_list[] = Calendar::event(
                $event->titre,
                true,
                new \DateTime($event->date_debut),
                new \DateTime($event->date_fin.' +1 day')
            );
        }
        $calendar_details = Calendar::addEvents($event_list);

        if (isset(Auth::User()->role) && Auth::User()->role === 'admin') {
            return view('admin.event', compact('calendar_details') );
        }

        return view('event', compact('calendar_details'));
    }


    public function addEvent(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'titre' => 'required',
            'date_debut' => 'required',
            'date_fin' => 'required'
        ]);

        if ($validator->fails()) {
            \Session::flash('warnning','Entrer des informations valide');
            return Redirect::to('admin/event')->withInput()->withErrors($validator);
        }

        $event = new Event;
        $event->titre = $request['titre'];
        $event->date_debut = $request['date_debut'];
        $event->date_fin = $request['date_fin'];
        $event->save();

        \Session::flash('success','L Evenement a été ajouté avec succés');
        return Redirect::to('admin/event');
    }


}


