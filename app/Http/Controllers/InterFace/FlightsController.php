<?php

namespace App\Http\Controllers\InterFace;

use App\Http\Controllers\Controller;
use App\Http\Requests\FlightSelectRequest;
use App\Http\Requests\FlightsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class FlightsController extends Controller
{
    public function flights(FlightsRequest $request){

        $request->all();

        $FlightInfo = [
            "origin"=> $request->origin,
            "destination" => $request->destination,
            "departure_date"=> $request->departure_date,
            "return_date"=> $request->return_date ?? null,
            "passengers"=> [
                "ADT"=> $request->passengers['ADT'],
                "CHD"=> $request->passengers['CHD'],
                "STU"=> $request->passengers['STU'],
                "INF"=> $request->passengers['INF'],
                "YCD"=> $request->passengers['YCD'],
            ],
        ];

        $response = Http::post("https://biletbayisi.com/api/flight-ticket/get-flights", $FlightInfo);

        $data = json_decode($response->getBody(), true);

        return view('interface.pages.flights',compact('data'));
    }

    public function flightsSearch(){
        
        return view('interface.pages.flightssearch');
    }

    public function selectFlights(FlightSelectRequest $request){
        return ($request);
        return view('interface.pages.flightsdetail');
    }
}
