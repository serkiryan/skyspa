<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Contact;

class UserController extends Controller
{
    public function index() {
        $user = Auth::user();
        $contacts = Contact::where('user_id', $user->id)->paginate(5);
        return view('user.index', ['user' => $user, 'contacts' => $contacts]);
    }
}
