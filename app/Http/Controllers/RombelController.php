<?php

namespace App\Http\Controllers;

use App\Models\Rombels;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validate;
use Illuminate\Support\Facades\Validator;

class RombelController extends Controller
{
    public function getRombels()
    {
        $rombels = Rombels::get();

        return response()->json([
            'rombels'=>$rombels,
        ]);
    }

    public function getRombelById($id)
    {
        $rombels = Rombels::where('id', $id)->first();

        return response()->json([
            'rombels'=>$rombels,
        ]);
    }

    public function store(Request $request)
    {
        $rombels = Rombels::create([
            "rombel" => $request->rombel
        ]);

        return response()->json([
            'message' => "create Rombel Success"
        ]);
    }

    public function update(Request $request, $id)
    {
        $checkRombels = Rombels::findOrFail($id);

        if (!$checkRombels) {
            return response()->json([
                'message' => "Rombels Not Found with id: ".$id
            ], 404);
        }
     
        $users = Rombels::where('id', $id)->update([
            "rombel" => $request->rombel,
        ]);

        return response()->json([
            'message' => "Update Rombel success",
        ]);
    }

    public function delete($id)
    {
        $rombels = Rombels::where('id', $id)->delete();

        return response()->json([
            'message' => "Delete Rombel Success",
        ]);
    }
}
