<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validate;
use Illuminate\Support\Facades\Validator;
use App\Models\Lates;

class LatesController extends Controller
{
    public function getLates()
    {
        $lates = Lates::get();

        return response()->json([
            'lates'=>$lates
        ]);
    }

    public function getLatesById($id)
    {
        $lates = Lates::where('id', $id)->first();

        return response()->json([
            'lates' => $lates
        ]);
    }

    public function store(Request $request)
    {
        Lates::create([
            'date_time_lates'=>$request->date_time_lates,
            'information'=>$request->information,
            'proof'=>$request->proof,
            'student_id'=>$request->student_id
        ]);

        return response()->json([
            'message'=> 'Create Lates Success'
        ]);
    }

    public function update(Request $request, $id)
    {
        $checkLates = Lates::where('id', $id)->first();

        if(!$checkLates){
            return response()->json([
                'message'=>"Lates Not Found with id: ".$id
            ], 404);
        }

        Lates::where('id', $id)->update([
            'date_time_lates'=>$request->date_time_lates,
            'information'=>$request->information,
            'proof'=>$request->proof,
            'student_id'=>$request->student_id
        ]);

        return response()->json([
            'message'=>"update Lates success"
        ]);
    }

    public function delete($id)
    {
        $lates = Lates::where('id', $id)->delete();

        return response()->json([
            'message'=>"delete Lates success"
        ]);
    }
}
