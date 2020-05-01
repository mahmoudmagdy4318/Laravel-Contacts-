<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Phone;
use Illuminate\Validation\Rule;

use App\Http\Requests\PhoneRequest;
use Illuminate\Support\Facades\Auth as FacadesAuth;

class PhoneController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Phone::class, 'phone');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('phone.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PhoneRequest $request)
    {
        $this->validate($request, [
            'number' => 'unique:phones,deleted_at,NULL'
        ]);

        $phone = Phone::create(['number' => $request->number, 'user_id' => Auth::id()]);

        return redirect()->route('home')->with("success", "phone number has been added successfully");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Phone $phone)
    {
        return view('phone.edit', ['phone' => $phone]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PhoneRequest $request, Phone $phone)
    {
        $this->validate($request, [
            'number' => [
                Rule::unique('phones')->ignore($phone->id)->whereNull('deleted_at')
            ]
        ]);
        $phone->update(['number' => $request->number]);
        return redirect()->route('home');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Phone $phone)
    {
        // Phone::destroy($id);\
        $phone->delete();
        return redirect()->route("home");
    }
}
