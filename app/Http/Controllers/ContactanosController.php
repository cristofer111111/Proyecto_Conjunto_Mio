<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\contactanosMail;

class ContactanosController extends Controller
{
    public function send(Request $request)
    {
        $details = [
            'name' => $request->input('name'),
            'subject' => $request->input('subject'),
            'message' => $request->input('message'),
            'email' => $request->input('email')
        ];

        Mail::to($request->input('email'))->send(new contactanosMail($details));
        Mail::to('conjuntomio.adm@gmail.com')->send(new contactanosMail($details));
        return back()->with('success', 'Hemos enviado tu mensaje. Muy pronto te responderemos.');
    }
}
