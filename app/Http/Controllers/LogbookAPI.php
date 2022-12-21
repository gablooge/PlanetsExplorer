<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Response;
use App\Models\Logbook;

class LogbookAPI extends Controller
{
    public function getLogbook(Request $request){
        $logbook = Logbook::all();
        return response()->json($logbook);
    }

    public function createLogbook(Request $request){
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'lat' => 'required',
            'long' => 'required',
            'people_id' => 'required'
        ]);

        if ($validator->fails()) {    
            return response()->json($validator->messages(), 400);
        }
        $logbook = new Logbook();
        $logbook->name = $request->name;
        $logbook->note = $request->note;
        $logbook->mood = $request->mood;
        $logbook->weather = $request->weather;
        $logbook->lat = $request->lat;
        $logbook->long = $request->long;
        $logbook->people_id = $request->people_id;
        $logbook->save();

        return response()->json($logbook);
    }
}
