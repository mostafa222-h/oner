<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NotificationsController extends Controller
{
    public function email()
    {
        return view('notificatins.send-email');
    }
}
