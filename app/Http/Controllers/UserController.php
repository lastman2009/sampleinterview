<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\User;
class UserController extends Controller
{
    public function view()
    {	
    	$user=Auth::user();
    	return view('auth.setting',compact('user'));
    }

    public function upadateSetting(Request $request)
    {
    	$user=User::find($request->user_id);	
    	$result =$user->updateUser($request);
    	if($result)
    	{
    		return redirect()->back()->with('message', 'Settings Updated');
    	}
    	return redirect()->back()->with('danger', 'email Already Exist');
    }

    public function createUser()
    {

    	return view('auth.user.create');
    }

    public function addUser(Request $request)
    {

      
    	$user = new User();
    	$result = $user->createNewUser($request);
    	if($result)
    	{
    		return redirect()->back()->with('message', 'New User Created');
    	}
    	return redirect()->back()->with('danger', 'email Already Exist');
    }
    public function allUsers()
    {
    	$users =User::getUserList();
    	// dd($users);
    	return view('auth.user.list',compact('users'));
    }
    public function deleteUser($id)
    {
    	$user = User::find($id);
    	$result = $user->softdelete();
    	if($result)
    	{
    		return redirect()->back()->with('message','User Removed');
    	}
    	return redirect()->back()->with('danger', 'Error');
    }

    public function editUser($id)
    {
    	$user = User::find($id);
    	return view('auth.user.setting',compact('user'));
    }

    public function makeAdmin($id)
    {
    	$user = User::find($id);
    	$result = $user->makeAdmin();
		if($result)
    	{
    		return redirect()->back()->with('message',$user->first_name." is Now Admin");
    	}
    }
}
