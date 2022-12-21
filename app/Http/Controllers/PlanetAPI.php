<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Planet;
use \App\Models\Terrain;

class PlanetAPI extends Controller
{
    public function getLargestPlanet(Request $request){
        $planet = new Planet;
        $planet = $planet->where("diameter","!=","unknown")->orderBy('diameter', 'desc')->limit(10);
        $planet = $planet->get();
        return response()->json($planet);
    }

    public function getTerrainDistribution(Request $request){
        $terrain = new Terrain;
        $terrain = $terrain->all();
        $json_response = [];
        foreach ($terrain as $key => $value) {
            $json_response[] = [
                $value->name => count($value->planets)
            ];
        }
        return response()->json($json_response);
    }

    public function getResidentDistribution(Request $request){
        $planet = new Planet;
        $planet = $planet->all();
        $json_response = [];
        foreach ($planet as $key => $value) {
            $json_response[] = [
                $value->name => count($value->residents)
            ];
        }
        return response()->json($json_response);
    }

}
