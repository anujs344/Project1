<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\registration;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    public function GetData(Request $req){
        
        $req->validate([
            'Email' => 'required|email',
            'Password' => 'required'
        ],[       
            'Email.required' => 'Cannot Be Empty','Email.email' => 'Invalid Email',
            'Password.required' => 'Cannot Be Empty'
            ]);
    
        $data = $req->input();
        $val  = registration::where('Email','=',$data['Email'])->exists();
        $alldata = registration::where('Email', '=',$data['Email'])->get()->first();
        if($val == 0)
        {
            $req->validate([
                'Email' => 'unique'
            ],[
                'Email.unique' => 'Invalid Email'
            ]);
            // $req->session()->flash('FalseEmail','Invalid Email');
            // return redirect('login');     
         }
        else
        {
            if(Hash::check($data['Password'], $alldata['Password']))
            {
                // $User_Details = Registration::where('Id', '=', $alldata['Id']);
                $req->session()->put('Login_Details',$alldata);
                return redirect('profile');
            }
            else{
                $req->validate([
                    'Password' => 'unique:Registrations:Email'
                ],[
                    'Password.unique' => 'Incorrect Password'
                ]);
            }
            
        }
        
    }

}
