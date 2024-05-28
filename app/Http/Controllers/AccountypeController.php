<?php

namespace App\Http\Controllers;

use App\Models\accountype;
use Illuminate\Http\Request;

class AccountypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $accounttypes=accountype::all();
        return view('pages.index',compact('accounttypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        try {

            $naccountype = new accountype();
            $naccountype->AccTypeName = ['en' => $request->AccTypeName_en, 'ar' => $request->AccTypeName];
            $naccountype->AccTypeDesc = $request->AccTypeDesc;
            $naccountype->save();
            toastr()->success(trans('messages.success'));
            return redirect()->route('Accountype.index');
        }
        catch (\Exception $e){
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\accountype  $accountype
     * @return \Illuminate\Http\Response
     */
    public function show(accountype $accountype)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\accountype  $accountype
     * @return \Illuminate\Http\Response
     */
    public function edit(accountype $accountype)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\accountype  $accountype
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, accountype $accountype)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\accountype  $accountype
     * @return \Illuminate\Http\Response
     */
    public function destroy(accountype $accountype)
    {
        //
    }
}
