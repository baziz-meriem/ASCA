<?php

namespace App\Http\Controllers;

use App\Models\Contribution;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContributionController extends Controller
{

    function fetch($id)
    {
        $data1 = DB::table('contributions')
            ->select('contributions.id', 'contributions.type', 'contributions.nature', 'contributions.statut', 'contributions.deleted', 'contributions.date_creation')
            ->Where(function ($query) use ($id) {
                $query->where('contributions.user_id', '=', $id);
            })
            ->where('contributions.deleted', false);

        $data2 = DB::table('adhesions')
            ->select('adhesions.id', 'adhesions.type', 'adhesions.nature', 'adhesions.statut', 'adhesions.deleted', 'adhesions.date_creation')
            ->Where(function ($query) use ($id) {
                $query->where('adhesions.user_id', '=', $id);
            })
            ->where('adhesions.deleted', false)
            ->unionAll($data1);

        $data3 = DB::table('signalements')
            ->select('signalements.id', 'signalements.type', 'signalements.nature', 'signalements.statut', 'signalements.deleted', 'signalements.date_creation')
            ->Where(function ($query) use ($id) {
                $query->where('signalements.user_id', '=', $id);
            })
            ->where('signalements.deleted', false)
            ->unionAll($data2)
            ->orderBy('date_creation', 'DESC')
            ->get();
        return $data3;
    }
    function getContribution($id)
    {
        $data = DB::table('contributions')
            ->select('contributions.nature', 'contributions.pays', 'contributions.wilaya', 'contributions.commune', 'contributions.daira', 'contributions.codePostale', 'contributions.maire', 'contributions.deputé', 'contributions.wali', 'contributions.description', 'contributions.proposition', 'contributions.user_id')
            ->Where(function ($query) use ($id) {
                $query->where('contributions.id', '=', $id);
            })
            ->get();
        return $data;
    }
    public function getContribution_overview()
    {
        $data = DB::table('contributions')
            ->join('users', 'users.id', '=', 'contributions.user_id')
            ->select('contributions.id', 'users.name', 'users.email', 'contributions.nature', 'contributions.statut', 'contributions.date_creation')
            ->get();
        return $data;
    }
    public function store(Request $request)
    {
        $data = $request->all();
        $response = Contribution::create($data);
        return response()->json([
            'status' => 'success',
            'data' => $response
        ], 200);
    }
    public function update(Request $request, $id)
    {
        $Contribution = Contribution::find($id);
        $Contribution->update($request->all());
        $Contribution->save();
        return response()->json($Contribution);
    }

    function duplicate($id)
    {
        $Contribution = Contribution::find($id);
        $Contribution = $Contribution->replicate();
        $result = $Contribution->save();
        if ($result) {
            return ["result" => "data is duplicated"];
        } else {
            return ["result" => "data is not duplicated"];
        }
    }
    function deleteTable($id)
    {
        $contribution = Contribution::find($id);
        $contribution->deleted = "true";
        $result = $contribution->save();
        if ($result) {
            return ["result" => "deleted flag is updated"];
        } else {
            return ["result" => "deleted flag is not updated"];
        }
    }

    function delete($id)
    {
        $Contribution = Contribution::find($id);
        $result = $Contribution->delete();
        if ($result) {
            return ["result" => " contribution deleted from database successfully"];
        } else {
            return ["result" => "delete operation has failed"];
        }
    }

    public function getByUser($id)
    {
        return Contribution::with("user")->where('user_id', $id)->get();
    }
}
