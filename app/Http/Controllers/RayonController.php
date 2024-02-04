<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validate;
use App\Models\Rayons;

class RayonController extends Controller
{
    public function getRayons()
    {
        $rayons = Rayons::get();

        return response()->json([
            'rayons'=>$rayons,
        ]);
    }

    public function getRayonById($id)
    {
        $rayons = Rayons::where('id', $id)->first();

        return response()->json([
            'message'=>$rayons
        ]);
    }

    public function store(Request $request)
    {
        $rayons = Rayons::create([
            "rayon" => $request->rayon,
            "user_id" => $request->user_id
        ]);

        return response()->json([
            'message'=> "create Rayon Success"
        ]);
    }

    public function update(Request $request, $id)
    {
        $checkRayons = Rayons::findOrFail($id);

        if (!$checkRayons) {
            return response()->json([
                'message' => "Rayons Not Found with id: ".$id
            ], 404);
        }
     
        $rayons = Rayons::where('id', $id)->update([
            "rayon" => $request->rayon,
            "user_id" => $request->user_id
        ]);

        return response()->json([
            'message' => "Update Rayon success",
        ]);
    }

    public function delete($id)
    {
        $rayons = Rayons::where('id', $id)->delete();

        return response()->json([
            'message' => "Delete Rayon Success"
        ]);
    }
}
