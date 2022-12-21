<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;

class LogbookPage extends Controller
{
    public function list(Request $request){
        return view('pages.logbook.list');
    }

    public function create(Request $request){
        return view('pages.logbook.create');
    }

    public function getPlanetData(Request $request){
        $model = new \App\Models\Logbook();
        $data = $model->get();
        return Datatables::of($data)
            ->addIndexColumn()
            ->addColumn('people_name', function($row){
                $people = $row->peoples;
                return $people ? $people->name : "";
            })
            ->addColumn('action', function($row){
                $actionBtn = '<a href="javascript:void(0)" class="edit btn btn-success btn-sm">Edit</a> <a href="javascript:void(0)" class="delete btn btn-danger btn-sm">Delete</a>';
                return $actionBtn;
            })
            ->rawColumns(['action'])
            ->make(true);
    }
}
