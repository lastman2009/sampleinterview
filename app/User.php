<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Auth;
class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name','last_name','profile_image', 'email', 'password','role_id',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public static function checkRole()
    {
        return Auth::user()->role_id;
    }

    public function updateUser($request)
    { 
        $this->first_name =$request->first_name;
        $this->last_name =$request->last_name;
        $this->profile_image =$request->profile_image;
        if(!empty($request->password))
        {
            $this->password =bcrypt($request->password);
        }
        $this->update();
        return true;
    }

    public function imageUpload($request)
    {
         if ($request->hasFile('profile_image')) 
        {
            $image = $request->file('profile_image');
            $name = time().'.'.$image->getClientOriginalExtension();
            $destinationPath = public_path('/images');
            $image->move($destinationPath, $name);
            return $name;
        }
    }

    public function createNewUser($request)
    {

        $check =User::where('email',$request->email)->first();
        if(!$check)
        { 

            $this->first_name =$request->first_name;
            $this->last_name =$request->last_name;
            $this->profile_image =$this->imageUpload($request);
            $this->password =bcrypt($request->password);
            $this->email =$request->email;
            $this->role_id =2;
            $this->save();
            return true;
        }
        return false;
    }
    public static function getUserList()
    {
        return User::where('role_id',2)->where('status',1)->get();
    }

    public function softdelete()
    {
        $this->status=2;
        $this->update();
        return true;
    }
    public function makeAdmin()
    {
        $this->role_id = 1;
        $this->update();
        return true;
    }
}
