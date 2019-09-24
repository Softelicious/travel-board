<?php

namespace App\Http\Controllers;

use App\Ticket;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        return view('admin');
    }
    public function delete(Request $request){
        Ticket::destroy($request->id);
        $tickets = Ticket::orderBy('id', 'DESC')->get();
        return view('welcome')->with('tickets', $tickets);
    }
}
