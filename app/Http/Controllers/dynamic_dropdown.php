<?php

namespace App\Http\Controllers;

use App\save_data ;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class dynamic_dropdown extends Controller
{
    function index()
    {
        $country_list = DB::table('countries')
        ->select('name','id')
        ->orderBy('name')
        // ->groupBy('name')
        ->get();

        return view('index')->with('country_list',$country_list);

    }

    function getState($countryID){

        // return "here";
        $state = DB::table('states')
            ->select('name','id')
            ->where('country_id','=',$countryID)
            ->orderBy('name')
            ->get();
            // $state = DB::table('states')
            // ->select('states.name')
            // ->rightJoin('countries', $countryID, '=', 'country_id')
            // ->where('id','=','countries.id')
            // ->get();
            return $state;
    }
    

    function getCity($stateID)
    {

        // return "here";
        $city = DB::table('cities')
            ->select('name','id')
            ->where('state_id','=',$stateID)
            ->orderBy('name')
            // ->groupBy('name')
            ->get();
            
            return $city;
    }


    function store(Request $request)
    {
        $hobby=$request->input('hobby');
        $hobby1 =implode(",",$hobby);
        
        
        // echo $hobby1 ;
        $data = new save_data;
        $data->country_code=$request->input('country');
        $data->state_code=$request->input('state');
        $data->city_code=$request->input('city');
        $data->gender=$request->input('gender');
        $data->hobby=$hobby1;



        $data->save();

        // return "success";
        return redirect('/show');
        

    }
    public function show()
    {
        
        // $data = DB::table('save_datas')->get();


        $data = DB::table('save_datas AS A')
        ->select('a.id AS id','B.name AS country_name','C.name AS state_name','d.name AS city_name','A.gender AS gender','A.hobby AS hobby')
        ->leftjoin('countries AS B', 'A.country_code', '=', 'B.id')
        ->join('states AS C', 'A.state_code', '=', 'C.id')
        ->join('cities AS d', 'A.city_code', '=', 'd.id')
        
        // ->where('countries.id', '=', '101' )
        ->get();




        return view('show', compact('data'));
    }

    public function destroy($id)
    {
        // return "destroy"
        $student = save_data::find($id);
        $student->delete();
        // return "success";
        return redirect('/show');
    }

}
