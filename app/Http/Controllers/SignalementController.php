<?php

namespace App\Http\Controllers;

use App\Models\Signalement;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SignalementController extends Controller
{
    function duplicate($id)
    {

        $Signalement = Signalement::find($id);
        $Signalement = $Signalement->replicate();
        $result = $Signalement->save();
        if ($result) {
            return ["result" => "data is duplicated"];
        } else {
            return ["result" => "data is not duplicated"];
        }
    }
    function deleteTable($id)
    {
        $Signalement = Signalement::find($id);
        $Signalement->deleted = "true";
        $result = $Signalement->save();
        if ($result) {
            return ["result" => "deleted flag is updated"];
        } else {
            return ["result" => "deleted flag is not updated"];
        }
    }
    function delete($id)
    {
        $Signalement = Signalement::find($id);
        $result = $Signalement->delete();
        if ($result) {
            return ["result" => " signalement deleted from database successfully"];
        } else {
            return ["result" => "delete operation has failed"];
        }
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return  Signalement::with("user")->get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if (Signalement::create($request->all())) {
            return response()->json(["success" => 'Signalement créé avec succès'], 200);
        } else {
            return "error";
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Signalement  $signalement
     * @return \Illuminate\Http\Response
     */
    public function show(Signalement $signalement)
    {
        return $signalement;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Signalement  $signalement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Signalement $signalement)
    {

        $signalement->update($request->all());
        return "ouael";
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Signalement  $signalement
     * @return \Illuminate\Http\Response
     */

    public function destroy(Signalement $signalement)
    {
        $signalement->delete();
    }

    /**
     * Get all signalements of a specific User
     * @return \Illuminate\Http\Response
     */
    public function findByUser($id)
    {
        return Signalement::with("user")->where('user_id', $id)->get();
    }
    public function test(Request $request, Signalement $signalement)
    {
        return $signalement;
    }
}
