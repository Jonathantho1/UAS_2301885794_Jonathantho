<?php

namespace App\Http\Controllers;

use App\Models\Account;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class AccountController extends Controller
{
    public function getProfile(){
        $first_name = Auth::user()->first_name;
        $middle_name = Auth::user()->middle_name;
        $last_name = Auth::user()->last_name;
        $gender_id = Auth::user()->gender_id;
        $email = Auth::user()->email;
        $password = Auth::user()->password;
        $role_id = Auth::user()->role_id;
        $display_picture_link = Auth::user()->display_picture_link;


        $data = [
            'first_name' => $first_name,
            'middle_name' => $middle_name,
            'last_name' => $last_name,
            'gender_id' => $gender_id,
            'email' => $email,
            'password' => $password,
            'role_id' => $role_id,
            'display_picture_link' => $display_picture_link
        ];

        return view('profile', $data);
    }

    public function updateProfile(Request $request){
        $rules = Validator::make($request->all(), [
            'first_name' => ['required', 'string', 'max:25'],
            'middle_name' => ['max:25'],
            'last_name' => ['required', 'string', 'max:25'],
            'email' => ['required', 'string', 'email', 'max:50'],
            'password' => ['required', 'string', 'min:8', 'regex:/[0-9]/'],
            'gender' => ['required'],
            'display_picture_link' => ['image'],
        ]);
        $rules->validate();

        $first_name = $request->first_name;
        $middle_name = $request->middle_name;
        $last_name = $request->last_name;
        $gender_id = $request->gender;
        $email = $request->email;
        $password = $request->password;
        $role_id = $request->role_id;

        if($role_id == "User"){
            $role_id = 1;
        }
        else{
            $role_id = 2;
        }

        $image = $request->file('display_picture_link');
        $image_name = $image->getClientOriginalName();

        Storage::putFileAs('public/profile', $image, $image_name);

        $id = Auth::id();

        Account::where('id', $id)->update([
            'first_name' => $first_name,
            'middle_name' => $middle_name,
            'last_name' => $last_name,
            'email' => $email,
            'password' => $password,
            'role_id' => $role_id,
            'gender_id' => $gender_id,
            'display_picture_link' => $image_name,
        ]);

        return redirect('/updated');
    }

    public function deleteAcc(Request $request){
        $id = $request->id;
        $selectedAcc = Account::where('id', $id)->first();
        $selectedAcc->delete();

        return redirect('/account_maintenance');
    }

    public function updateRole(Request $request){
        $id = $request->id;
        $role_id = $request->role;

        $selectedAcc = Account::where('id', $id)->first();
        $first_name = $selectedAcc->first_name;
        $middle_name = $selectedAcc->middle_name;
        $last_name = $selectedAcc->last_name;
        $email = $selectedAcc->email;
        $password = $selectedAcc->password;
        $gender_id = $selectedAcc->gender_id;
        $display_picture_link = $selectedAcc->display_picture_link;

        Account::where('id', $id)->update([
            'first_name' => $first_name,
            'middle_name' => $middle_name,
            'last_name' => $last_name,
            'email' => $email,
            'password' => $password,
            'role_id' => $role_id,
            'gender_id' => $gender_id,
            'display_picture_link' => $display_picture_link,
        ]);

        return redirect('/account_maintenance');
    }
}
