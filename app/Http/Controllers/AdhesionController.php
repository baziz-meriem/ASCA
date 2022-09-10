<?php

namespace App\Http\Controllers;
use App\Models\Adhesion;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AdhesionController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

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

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Adhesion  $adhesion
     * @return \Illuminate\Http\Response
     */
    public function show(Adhesion $adhesion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Adhesion  $adhesion
     * @return \Illuminate\Http\Response
     */
    public function edit(Adhesion $adhesion)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Adhesion  $adhesion
     * @return \Illuminate\Http\Response
     */
    public function update($id){
        $Adhesion = Adhesion::find($id);
        $Adhesion-> nom="false";
        $result = $Adhesion->save();
        if($result){
            return ["result" => "data is updated"];
        }
        else {
            return ["result" => "data is not updated"];
        }
    }
    function deleteTable($id){
        $Adhesion = Adhesion::find($id);
         $Adhesion-> deleted="true";
         $result = $Adhesion->save();
         if($result){
             return ["result" => "deleted flag is updated"];
         }
         else {
             return ["result" => "deleted flag is not updated"];
         }
     }

         function duplicate($id)
    {
        $Adhesion = Adhesion::find($id);
        $Adhesion = $Adhesion->replicate();
        $result = $Adhesion->save();
        if($result){
            return ["result" => "data is duplicated"];
        }
        else {
            return ["result" => "data is not duplicated"];
        }
         
    }


    function getContribution($id){
        return  DB::table('adhesions')->Where(function ($query) use($id) {
            $query->where('adhesions.id', '=', $id);
        })->get();;
    } 

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Adhesion  $adhesion
     * @return \Illuminate\Http\Response
     */
    public function destroy(Adhesion $adhesion)
    {
        //
    }
    function delete($id){
        $Adhesion = Adhesion::find($id);
        $result = $Adhesion->delete();
        if($result)
        {
            return ["result" =>"adhesion deleted from database successfully"];
        }
        else
        {
            return ["result" => "delete operation has failed"];
        }
     
    }


}
