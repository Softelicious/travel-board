<?php

namespace App\Http\Controllers;


use App\Image;
use App\Ticket;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Spatie\Tags\Tag;

class SaveController extends Controller
{

    public function show($id){
        $ticket = Ticket::with('tagged')->find($id);
        $tags = $ticket->tagNames();
        $data = [
          'ticket' => $ticket,
          'tags' => $tags
        ];
      return view('atostoga')->with('data', $data);

    }

    public function index(Request $request){
        $request->validate([
            'image'              =>  'required',
            'name' => 'required',
            'description' => 'required'
        ]);


        if($request->hasFile('image')){
            $filename = str_random(25).$request->image->getClientOriginalName();
            $request->image->storeAs('images', $filename, 'public');

            $image = new Image();
            $image->image ='storage/images/'.$filename;
            $image->likes = 0;
            $image->save();

            $ticket = new Ticket();
            $ticket->image = 'storage/images/'.$filename;
            $ticket->name = $request->name;
            $ticket->description = $request->description;
            $ticket->likes = 0;
            $ticket->save();
            if($request->tags){
                foreach(explode(',', $request->tags) as $tag) {
                    $ticket->tag($tag);
                }
            }
            $ticket->save();
        }

//        $images = Image::orderBy('id', 'DESC')->get();
        $tickets = Ticket::orderBy('id', 'DESC')->get();
        return view('welcome')->with('tickets', $tickets);
//        return view('welcome')->with('images', $images);
    }

    public function load(){
//        $images = Image::orderBy('id', 'DESC')->get();
        $tickets = Ticket::orderBy('id', 'DESC')->get();
        return view('welcome')->with('tickets', $tickets);
//        return view('layouts.app')->with('images', $images);
    }
    public function like(Request $request){
        $ticket = Ticket::find($request['index']);
        if($request->session()->exists('id_'.$request['index'])){
            $ticket->likes = $ticket->likes-1;
            $request->session()->forget('id_'.$request['index']);
        }else{
            $ticket->likes = $ticket->likes+1;
            $request->session()->put('id_'.$request['index']);
        }
        $ticket->save();
        $tickets = Ticket::orderBy('id', 'DESC')->get();
        return view('welcome')->with('tickets', $tickets);
    }
}
