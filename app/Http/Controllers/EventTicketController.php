<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventTicketController extends Controller
{
    public function create($id)
    {
      
      return view('users.events.tickets', compact('id'));
    }
}
