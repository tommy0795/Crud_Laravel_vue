<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Form;

class FormController extends Controller {


    public function store(Request $request) {
        //inputs validation
        $validation = Validator::make($request->all() ,[
            'pseudo'=>'required|string|max:255',
            'isCustomer'=>'required|boolean',
            'phone'=>'required|numeric|min:10',
            'email'=>'required|email:rfc,dns|max:255',
            'subject'=>'required|string|max:255',
            'message'=>'required|string|max:1000',
        ]);

        // validation message on fail
        if($validation->fails()){
            $response = [
                'status' => 400,
                'success'=>false,
                'message'=>$validation->errors()
            ];
            return response()->json($response, 400);
        }


        // if there is no error we create an new form.
        $form = Form::create([
            'pseudo'=>$request->pseudo,
            'isCustomer'=>$request->isCustomer,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'subject'=>$request->subject,
            'message'=>$request->message
          
        ]);

        // response on success
        $form->save();
        $response = [
            'status' => 201,
            'success' => true,
            'message' => "Success"
            ];
        return response()->json($response, 200);  
    }
}
