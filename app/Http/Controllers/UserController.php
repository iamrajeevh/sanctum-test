<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use PDF;
use App\Exports\ExportUsersData;
use App\Imports\ImportUsers;
use Maatwebsite\Excel\Facades\Excel;
use Exception;

class UserController extends Controller
{
    public function create(Request $req){
        $validate = Validator::make($req->all(),[
            'name'=>'required',
            'email'=>'required|unique:users,email',
            'password'=>'required|confirmed'
        ]);
        if($validate->fails()){
            return response()->json(['errors'=>$validate->errors()],400);
        }else{
            $data = $req->all();
            $data['password'] =Hash::make($req->password);
            $createUser = User::create($data);
            if($createUser){
                return response()->json(['status'=>'OK'],200);
            }else{
                return response()->json(['status'=>'failed'],500);
            }

        }
    }
/*
|------------------------------------------------------------------------------------------------|
|       This is used for only login                                                              |
|------------------------------------------------------------------------------------------------|
*/
    public function loginUser(Request $req)
    {
        $validation = Validator::make($req->all(),[
            "email"=>"required|email|exists:users,email",
            "password"=>"required",
        ]);
        if($validation->fails()){
            return response()->json(['errors'=>$validation->errors(),'status'=>'failed','status_code'=>400],400);
        }else{
            $userDetails = User::whereEmail($req->email)->first();
            if(Hash::check($req->password,$userDetails->password)){
                $token = $userDetails->createToken('my-app-token')->plainTextToken;
                return response()->json(['token'=>$token,'status'=>'success','status_code'=>200],200);
            }else{
                return response()->json(['status'=>'failed','errors'=>['password'=>'Invalid username or password']]);
            }
        }
    }
    public function getUserProfile(){
        return 'good';
    }
    public function logout()
    {
        $user = request()->user(); //or Auth::user()
        $user->tokens()->where('id', $user->currentAccessToken()->id)->delete();
        return 'yes logout';
    }

    public function getPdf()
    {
        return view('pdf-file');
    }
    public function downloadPdf(){
        $userInfo  = User::findOrFail(1);
        $pdf = PDF::loadView('pdf.pdf-file',compact('userInfo'));
        return $pdf->download('profile.pdf');
    }

    public function downloadExcel()
    {
        return Excel::download(new ExportUsersData, 'UsersData.xlsx');
    }
    public function importUserData(Request $req)
    {
        try{
            Excel::import(new ImportUsers,request()->file('file'));
            return back();
        }catch(Exception $e)
        {
            return 'Something went wrong';
        }

    }

}
