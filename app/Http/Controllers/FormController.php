<?php

namespace App\Http\Controllers;

use App\Guests;
use Illuminate\Http\Request;

class FormController extends Controller
{
    //
    public function submit(Request $request){


        $data = request()->validate([
            'name' => 'required|min:3',
            'email' => 'required|email',
            'phone' => 'required',
        ]);

        Guests::create($request->all());

        return response()->json([$request->all()]);
    }
}
