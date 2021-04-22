<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Registration;
use Illuminate\Models;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use database\migrations\CreateRegisterTable;
class RegisterController extends Controller
{
    public function getData(Request $req)
    {

        //First checking validation or the wrong inputs
        $req->validate([
                        'Email' => 'required|email',
                        'Name' =>'required|string|min:3|max:20|',
                        'Password' => 'required|max:8'
            
        ],
        [
                        'Email.required' => 'Required','Email.email' => 'Invalid Email',
                        'Name.required' => 'Required','Name.string' => 'Must Be String',              
                        'Password.required' => 'Required','Password.max'=>'Too High'
        ]);
        // Inserting Data into the Register
       $data = $req->input();
        if(Registration::where('Email', '=', $data['Email'])->exists())
        {
            $req->validate([
                'Email' => 'unique:Registrations'
            ],[
                'Email.unique'=>'Email in use'    
            ]);
        }
        else
         {
            DB::table('Registrations')
            ->insert(
                [
                    'Name' => $data['Name'],
                    'Email' => $data['Email'],
                    'Password' => Hash::make($data['Password'])
                ]
                );
                
                // $req->session()->flash('Regiatrationstatus','You are now Registered Please Login');
                return redirect('login');

         }
    }
}
