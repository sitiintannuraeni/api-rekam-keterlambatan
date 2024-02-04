<?php

namespace App\Http\Controllers;

use App\Models\Students;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validate;
use Illuminate\Support\Facades\Validator;



class StudentController extends Controller
{
    public function getStudents()
    {
        $student = Students::get();

        return response()->json([
            'student'=>$student
        ]);
    }

    public function getStudentsById($id)
    {
        $student = Students::where('id', $id)->first();

        return response()->json([
            'student'=>$student
        ]);
    }

    public function store(Request $request)
    {
        Students::create([
            "nis"=>$request->nis,
            "name"=>$request->name,
            "rombel_id"=>$request->rombel_id,
            "rayon_id"=>$request->rayon_id
        ]);

        return response()->json([
            'message' => 'Create Student success'
        ]);
    }

    public function update(Request $request, $id)
    {
        $checkStudent = Students::where('id', $id)->first();

        if(!$checkStudent){
            return response()->json([
                'message' => "Users Not Found with id: ".$id
            ], 404);
        }

        Students::where('id', $id)->update([
            "nis"=>$request->nis,
            "name"=>$request->name,
            "rombel_id"=>$request->rombel_id,
            "rayon_id"=>$request->rayon_id
        ]);

        return response()->json([
            'message' => "update students success"
        ]);
    }

    public function delete($id)
    {
        Students::where('id', $id)->delete();

        return response()->json([
            'message'=>"delete students success"
        ]);
    }
}
