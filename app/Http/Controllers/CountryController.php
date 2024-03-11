<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Country;
use App\Models\State;


class CountryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $countries = Country::all();
        // $state = State::all()
        return view('country.index',compact('countries'));
        // return redirect()->route('country.index')->withSuccess('datainserted...');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('country.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->all();
        // dd($data);
        $country = Country::create($data);
        // dd($country);
        $countryId = $country->id;
        $stName = $request->state_name;
        $stStatus = $request->state_status;
        foreach($stName as $key=> $_stName){
        $_stStatus = $stStatus[$key]??0;
        State::create([
            "country_id" => $countryId,
            "state_name" => $_stName,
            "state_status" => $_stStatus
        ]);
    }
        return redirect()->route('country.index')->withSuccess('datainserted...');

        

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
        
    public function edit($id)
    {
       $countryData =  Country::find($id);
    //    $state = State::where('country_id',$id)->get();        
    //    dd($state);
        return view('country.edit',compact('countryData'));
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
        // dd($id);
        $countryName = $request->name;
        $countryStatus = $request->status;
        $data = [
            'name' => $countryName,
            'status' => $countryStatus
        ];
        Country::where('id',$id)->update($data);

        $stateName = $request->state_name;
        $stateStatus = $request->state_status;
        $stId = $request->sid;
//==================================================
        if(empty($stId)){
            State::where('country_id',$id)->delete();
        } else {
            State::whereNotIn('id',$stId)->where('country_id',$id)->delete();
            }
//=======================================
        foreach($stateName as $key=> $_stateName){
            $_stId = $stId[$key]??0;
            if($_stId) {
            State::where('id',$_stId)->update([
                'state_name' => $_stateName,
                'state_status' => $stateStatus[$key]
            ]);
        } else {
            State::create([
                'state_name' => $_stateName,
                'state_status' => $stateStatus[$key],
                'country_id' => $id
            ]);
        }
        }

        return redirect()->route('country.index')->withSuccess('data inserted...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Country::where('id',$id)->delete();
        return redirect()->route('country.index');
    }
    public function getState(request $request) {
        // echo "state country";
        // echo $request->couId;
        $countryId = $request->couId;
        $stateData = State::where('country_id',$countryId)->get();
        // echo '<option value="">Select</option>';
        foreach($stateData as $_stateData){
        echo "<option value='$_stateData->id'>$_stateData->state_name</option>";
        }
    }
}
