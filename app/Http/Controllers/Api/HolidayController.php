<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Holiday;

class HolidayController extends Controller
{
    public function index(){
        $holidays = Holiday::all();
        return response([
            'message' => 'Roles list',
            'data' => $holidays
        ], 200);
    }

    //store
    public function store(Request $request){
        // validate request
        $request->validate([
            'name' => 'required',
            'year' => 'required',
            'month'=> 'required',
            'date'=> 'required',
            'is_weekend' => 'required',
        ]);

        $holiday = new Holiday();
        $holiday->company_id = 1;
        $holiday->name = $request->name;
        $holiday->month = $request->month;
        $holiday->year = $request->year;
        $holiday->date = $request->date;
        $holiday->is_weekend = $request->is_weekend;
        $holiday->save();

        return response([
            'messsage' => 'Holiday created',
            'data' => $holiday
        ],201);
    }


    //show
    public function show($id){
        $holiday = Holiday::find($id);
        if(!$holiday){
            return response([
                'message' => 'Holiday not found'
            ],404);
        }

        return response([
            'message' => 'Holiday details',
            'data' => $holiday
        ]);
    }

     //update
     public function update(Request $request,$id){

        $request->validate([
            'name' => 'required',
            'year' => 'required',
            'month'=> 'required',
            'date'=> 'required',
            'is_weekend' => 'required',
        ]);


        $holiday = Holiday::find($id);
        if(!$holiday){
            return response([
                'message' => 'Holiday not found'
            ],404);
        }

        $holiday->name = $request->name;
        $holiday->month = $request->month;
        $holiday->year = $request->year;
        $holiday->date = $request->date;
        $holiday->is_weekend = $request->is_weekend;
        $holiday->save();

        return response([
            'message'=> 'Holiday updated',
            'data' => $holiday
        ],200);
    }

    //destroy
    public function destroy($id){
        $holiday = Holiday::find($id);
        if(!$holiday){
            return response([
                'message' => 'Holiday not found'
            ],404);

            $holiday->delete();

            return response([
                'message' => 'Holiday deleted'
            ],200);

        }
    }



}
