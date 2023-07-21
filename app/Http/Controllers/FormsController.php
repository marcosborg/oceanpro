<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\Quotation;
use App\Models\Service;
use App\Models\User;
use App\Notifications\ContactNotification;
use App\Notifications\NewQuotation;
use Illuminate\Http\Request;

class FormsController extends Controller
{
    public function quotation(Request $request)
    {

        $request->validate([
            'first_name' => [
                'string',
                'required',
            ],
            'last_name' => [
                'string',
                'nullable',
            ],
            'email' => [
                'required',
            ],
            'phone' => [
                'string',
                'nullable',
            ],
            'subject_id' => [
                'required',
                'integer',
            ],
            'message' => [
                'required',
            ],
        ]);

        $quotation = new Quotation;
        $quotation->first_name = $request->first_name;
        $quotation->last_name = $request->last_name;
        $quotation->email = $request->email;
        $quotation->phone = $request->phone;
        $quotation->subject_id = $request->subject_id;
        $quotation->message = $request->message;
        $quotation->save();

        $quotation = Quotation::find($quotation->id)->load('subject');

        User::find(2)->notify(new NewQuotation($quotation));

        return redirect()->back()->with('status', 'Enviado com sucesso');
    }

    public function contact(Request $request)
    {
        $request->validate([
            'name' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
            ],
            'privacy' => [
                'required',
            ],
        ]);

        $contact = new Contact;
        $contact->name = $request->name;
        $contact->email = $request->email;
        $contact->message = $request->message;
        $contact->privacy = $request->privacy;
        $contact->save();

        User::find(2)->notify(new ContactNotification($contact));

        return redirect()->back()->with('status', 'Enviado com sucesso.');
    }
}