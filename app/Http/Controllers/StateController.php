<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\State;
use App\Models\city;
use App\Models\Country;

class StateController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $stats = State::all();
        $country = Country::all();
        return view ('state.index',compact('stats','country'));

        // return view('state.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $countryData = Country::all();
        return view ('state.create',compact('countryData'));
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
        $state = State::create($data);
        $stateId = $state->id;
        $countryId = $state->country_id;
        $ctName = $request->city_name;
        $ctStatus = $request->city_status;
        foreach($ctName as $key=> $_ctName){
            $_ctStatus = $ctStatus[$key];
            City::create([
                "country_id"=> $countryId,
                "state_id" => $stateId,
                "city_name" => $_ctName,
                "city_status" => $_ctStatus
            ]);
        } 
        return redirect()->route('state.index');
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
        $state = State::find($id);
        // dd($state);

        // $countryData = Country::where('status',1)->get();======for enable

        $countryData = Country::all();
        // $city = City::where('state_id',$id)->get();
        return view('state.edit',compact('state','countryData'));
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
      $countryId = $request->country_id;
      $stateName = $request->state_name;
      $stateStatus = $request->state_status;

      State::where('id',$id)->update([
        'country_id' => $countryId,
        'state_name' => $stateName,
        'state_status' => $stateStatus
      ]);
      $cityName = $request->city_name;
      $cityStatus = $request->city_status;
      $ctId = $request->Cid;

      if(empty($ctId)){
        City::where('state_id',$id)->delete();
      }else{
        City::whereNotIn('id',$ctId)->where('state_id',$id)->delete();
      }

      foreach($cityName as $key=> $_cityName){
        $_ctId = $ctId[$key]??0;
        if($_ctId){
        City::where('id',$_ctId)->update([
            'country_id'=>$countryId,
            'city_name'=>$_cityName,
            'city_status'=>$cityStatus[$key]
            
        ]);
    } else {
        City::create([
            'country_id'=>$countryId,
            'city_name'=>$_cityName,
            'city_status'=>$cityStatus[$key],
            'state_id'=>$id
        ]);
    }
      }

      return redirect()->route('state.index')->withSuccess('data inserted...');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        State::where('id',$id)->delete();
        return redirect()->route('state.index');
    }
}
