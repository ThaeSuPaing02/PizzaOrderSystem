<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Storage;
class AuthController extends Controller
{
    //show login page
    public function loginPage(){
        return view('login');
    }

    //show register page
    public function registerPage(){
        return view('register');
    }

    //show dashboard page
    public function dashboard(){
        if(Auth::user()->role == 'admin'){
            return redirect()->route('category#list');
        }else{
            return redirect()->route('user#home');
        }
    }

    //change password page
    public function changePasswordPage(){
        return view('admin.Password.change');
    }

    //change password 
    public function changePassword(Request $request){
        // Validate the incoming request data
        $request->validate([
            'oldPassword' => 'required',
            'password' => 'required|min:8|confirmed', // 'confirmed' validates if 'password_confirmation' field matches 'password'
        ]);
        // Retrieve the current user's record
        $user = Auth::user();
        // Check if the old password matches the password stored in the database
        if (Hash::check($request->oldPassword, $user->password)) {
            // If old password matches, proceed with password change

            // Update the user's password
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('category#list')->with('success', 'Password changed successfully');
        } else {
            // If old password does not match, redirect back with error message
            return redirect()->back()->withInput()->withErrors(['oldPassword' => 'The old password provided is incorrect']);
        }
    }

    //profile page
    public function profilePage(){
        $user = Auth::user();
        return view('admin.profile.profile',compact('user'));
    }

    //show edit profile page 
    public function profileEditPage(){
        $user = Auth::user();
        return view('admin.profile.editProfilePage',compact('user'));
    }

    //edit profile
    public function profileUpdate($id,Request $request){
        //dd($request->all());
        $data = $this->getUserData($request);   
        //for image
        if($request->hasFile('image')){
            $dbImage = User::where('id',$id)->first();
            $dbImage = $dbImage->image;
            
            if($dbImage != null){
                Storage::delete('public/'.$dbImage);
            }
            $fileName = uniqid().$request->file('image')->getClientOriginalName();
            $request->file('image')->storeAs('public',$fileName);
            $data['image'] = $fileName;
        }
        User::where('id',$id)->update($data);
        return redirect()->route('admin#profilePage');   
    }

    //private functions
    private function getUserData($request){
        $validatedData = $request->validate([
            'name'=>'required|string|max:255|unique:users,name,'.$request->id,
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            // 'image'=> 'image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
        return[
            'name'=>$validatedData['name'],
            'email'=>$validatedData['email'],
            'phone'=>$validatedData['phone'],
            'address'=>$validatedData['address'],
            // 'image'=>$validatedData['image'],
        ];
    }
    
}
