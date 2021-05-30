<?php

namespace App\Http\Controllers;

use App\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function contact(){
        return view('contact');
    }
    public function addContact(Request $request){
        $validatedData = $request->validate([
            'name' => ['regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/','max:15'],
            'subject' => ['regex:/^([a-zA-Z]+)(\s[a-zA-Z]+)*$/','max:100'],
        ]);
        $x = new Contact();
        $x->user_id =Auth::user()->id;;
        $x->name =$request->name;
        $x->subject =$request->subject;
        $x->save();
        session()->flash('contact','Success...Message Register');
        return redirect('/home/contact_page');
    }
}
