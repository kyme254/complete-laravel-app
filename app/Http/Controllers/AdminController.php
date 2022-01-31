<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

use App\Models\User;
use Illuminate\Support\Facades\DB;


class AdminController extends Controller
{
    function index(){
        return view('dashboards.admins.index');
    }
    
    function profile(){
       return view('dashboards.admins.profile');
    }
  
    function order(){
       return view('dashboards.admins.order');
    }
  
    function support(){
       return view('dashboards.admins.support');
    }

    function payment(){
       return view('dashboards.admins.payment');
    }


    function settings(){
       return view('dashboards.admins.settings');
    }
//  function get member data from (admin panel)
    function members(){
        $data = array(
        'list'=>DB::table('users')->get()
        );
       return view('dashboards.admins.members',$data);
    }

    function edit($id){
        $row =DB::table('users')
          ->where('id',$id)
          ->first();
        $data=[
        'Info'=>$row,
        'Title'=>'Edit'
        ];
        return view('dashboards.admins.edit', $data);
    }

    function delete($id){
        User::find($id)->delete();
        session()->flash('success', 'User has been deleted');
        return redirect()->route('admin.members');
    }

    function update(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required',
            'favoriteColor'=>'required',

        ]);
        $updating=DB::table('users')
            ->where('id',$request->input('cid'))
            ->update([
                'name'=>$request->input('name'),
                'email'=>$request->input('email'),
                'role'=>$request->input('role'),
                'favoriteColor'=>$request->input('favoriteColor'),
            ]);
        return redirect()->route('edit', ['id' => $request->input('cid')]);
    }
    
    function updateInfo(Request $request){
       
        $validator = \Validator::make($request->all(),[
            'name'=>'required',
            'email'=> 'required|email|unique:users,email,'.Auth::user()->id,
            'favoritecolor'=>'required',
        ]);

        if(!$validator->passes()){
            return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        }
        else {
            $query = User::find(Auth::user()->id)->update([
                'name'=>$request->name,
                'email'=>$request->email,
                'favoriteColor'=>$request->favoritecolor,
            ]);

            if(!$query){
                return response()->json(['status'=>0,'msg'=>'Something went wrong.']);
            } else {
                return response()->json(['status'=>1,'msg'=>'Your profile info has been update successfuly.']);
            }
       }
    }

    function updatePicture(Request $request){
        $path = 'users/images/';
        $file = $request->file('admin_image');
        $new_name = 'UIMG_'.date('Ymd').uniqid().'.jpg';

        //Upload new image
        $upload = $file->move(public_path($path), $new_name);
       
        if( !$upload ){
            return response()->json(['status'=>0,'msg'=>'Something went wrong, upload new picture failed.']);
        } else {
           //Get Old picture
            $oldPicture = User::find(Auth::user()->id)->getAttributes()['picture'];

            if( $oldPicture != '' ){
                if( \File::exists(public_path($path.$oldPicture))){
                    \File::delete(public_path($path.$oldPicture));
                }
            }

            //Update DB
            $update = User::find(Auth::user()->id)->update(['picture'=>$new_name]);

            if( !$upload ){
               return response()->json(['status'=>0,'msg'=>'Something went wrong, updating picture in db failed.']);
            } else {
               return response()->json(['status'=>1,'msg'=>'Your profile picture has been updated successfully']);
            }
       }
   }


   function changePassword(Request $request){
        //Validate form
        $validator = \Validator::make($request->all(),[
           'oldpassword'=>[
               'required', function($attribute, $value, $fail){
                    if( !\Hash::check($value, Auth::user()->password) ){
                       return $fail(__('The current password is incorrect'));
                    }
                },
               'min:8',
               'max:30'
            ],
            'newpassword'=>'required|min:8|max:30',
            'cnewpassword'=>'required|same:newpassword'
            ],[
                'oldpassword.required'=>'Enter your current password',
                'oldpassword.min'=>'Old password must have atleast 8 characters',
                'oldpassword.max'=>'Old password must not be greater than 30 characters',
                'newpassword.required'=>'Enter new password',
                'newpassword.min'=>'New password must have atleast 8 characters',
                'newpassword.max'=>'New password must not be greater than 30 characters',
                'cnewpassword.required'=>'ReEnter your new password',
                'cnewpassword.same'=>'New password and Confirm new password must match'
            ]);

        if( !$validator->passes() ){
           return response()->json(['status'=>0,'error'=>$validator->errors()->toArray()]);
        } else {
            
            $update = User::find(Auth::user()->id)->update(['password'=>\Hash::make($request->newpassword)]);

            if( !$update ){
                return response()->json(['status'=>0,'msg'=>'Something went wrong, Failed to update password in db']);
            }else{
                return response()->json(['status'=>1,'msg'=>'Your password has been changed successfully']);
            }
        }
    }
}

