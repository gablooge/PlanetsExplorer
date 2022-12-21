<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;

class PlanetPage extends Controller
{
    public function page(Request $request){
        return view('pages.planet.list');
    }

    public function getPlanetData(Request $request){
        $model = new \App\Models\Planet();
        $data = $model->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('action', function($row){
                $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
