<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use App\Contact;
use App\History;

class ContactsController extends Controller
{
    public function index() {
        $user = Auth::user();
        return view('contacts.index', ['user' => $user]);
    }

    public function all() {
        $user = Auth::user();
        $contacts = Contact::where('user_id', $user->id)->get();
        return response()->json([
            'contacts' => $contacts
        ]);
    }

    public function add() {
        return response()->json([
            'data' => 'Add'
        ]);
    }

    public function store(Request $r) {
        Contact::insert([
            'name' => $r->input('name'), 
            'phone' => $r->input('phone'),
            'user_id' => $r->input('user_id')
        ]);

        $date = Carbon::now();
        $action = "Добавлен ".$r->input('name')." ".$r->input('phone');

        History::insert([
            'created_at' => $date->toDateTimeString(), 
            'action' => $action,
            'result' => 1,
            'user_id' => $r->input('user_id')
        ]);
        return response()->json([
            'data' => 'Stored'
        ]);
    }

    public function edit($contact_id) {
        $contact = Contact::where('id', $contact_id)->first();
        return response()->json([
            'contact' => $contact
        ]);
    }

    public function save(Request $r) {
        Contact::where('id', $r->input('contact_id'))->update([
            'name' => $r->input('name'), 
            'phone' => $r->input('phone')
        ]);
        $user = Auth::user();
        $date = Carbon::now();
        $action = "Изменен ".$r->input('name')." ".$r->input('phone');

        History::insert([
            'created_at' => $date->toDateTimeString(), 
            'action' => $action,
            'result' => 1,
            'user_id' => $user->id
        ]);
        return response()->json([
            'data' => 'Saved'
        ]);
    }

    public function delete($contact_id) {
        $contact = Contact::where('id', $contact_id)->first();
        return response()->json([
            'contact' => $contact
        ]);
    }

    public function remove($contact_id) {
        $contact = Contact::where('id', $contact_id)->first();
        $user = Auth::user();
        $date = Carbon::now();
        $action = "Удален ".$contact->name." ".$contact->phone;
        $contact->delete();
        History::insert([
            'created_at' => $date->toDateTimeString(), 
            'action' => $action,
            'result' => 1,
            'user_id' => $user->id
        ]);
        return response()->json([
            'data' => 'Removed'
        ]);
    }
    
}
