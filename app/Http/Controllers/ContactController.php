<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use \App\Contact;
use App\User;
use \Auth;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $contacts = Auth::user()->contacts;
        return view('contact.index', ['contacts' => $contacts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contact.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'email' => 'required',
        ]);

        $user = User::where(["email" => $request->email])->first();
        if (empty($user)) {
            return redirect()->route('contact.create')->with('error', 'this user does not exist!');
        } elseif ($user == Auth::user()) {
            return redirect()->route('contact.create')->with('error', "You can't add youself as a contact");
        } else {
            $contact = Contact::create(["user_id" => Auth::id(), 'contact_id' => $user->id]);
            return redirect()->route('contact.index');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Contact::where(['user_id' => Auth::id(), 'contact_id' => $id])->delete();
        return redirect()->route('contact.index');
    }
}
