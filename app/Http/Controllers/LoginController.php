<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Session;
class LoginController extends Controller
{
        function userLoginFunc(Request $req){
        $data = $req->input();
        $result = DB::table('users')->select('id','first_name','last_name','email','phone_no','created_at','shipping_address')->where(['phone_no'=> $data['phone_no'] , 'password'=> $data['password']])->first();

        if($result !=NULL){
            $req->session()->put('user',$result->first_name);
            $req->session()->put('last_name',$result->last_name);
            $req->session()->put('userId',$result->id);
            $req->session()->put('email',$result->email);
            $req->session()->put('phone_no',$result->phone_no);
            $req->session()->put('created_at',$result->created_at);
            $req->session()->put('shipping_address',$result->shipping_address);

            return  redirect('/'); //link
        }
        Session::flash('message', 'Invalid Phone Number or Password!!!!');
        return redirect('login');
        //echo DB::table('users')->get();
    }


    //for view the userprofile page
    function userprofileFunc(){
        $userId = session('userId') ;
        $data = DB::table('users')->select('id','first_name','last_name','phone_no','created_at','email','father_name',
        'mother_name','gender','nominee_name','nominee_relation','occupation','post_code','date_of_birth','country','avatar','nominee_address','street_address','shipping_address')->where(['id'=> $userId])->first();
        return view('authuser.userprofile.pages.userprofile')->with(compact('data'));
    }

    function edituserprofileFunc(Request $request){
        $userId =  session('userId') ;

        $imgname ='';
        if ($request->isMethod('post')) {
            $this->validate($request, [
                'input_img' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);

            if ($request->hasFile('input_img')) {
                $image = $request->file('input_img');
                $imgname = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/img/user');
                $image->move($destinationPath, $imgname);
                //$this->save();

                //return back()->with('success','Image Upload successfully');
            }
            $date_of_birth =  $request->input("date_of_birth");
            $gender =  $request->input("gender");
            $shipping_address = $request->input("shipping_address");
            $father_name = $request->input("father_name");
            $mother_name = $request->input("mother_name");
            $country = $request->input("country");
            $division = $request->input("division");
            $district = $request->input("district");
            $upazila = $request->input("upazila");
            $street_address = $request->input("street_address");
            $post_code = $request->input("post_code");
            $occupation = $request->input("occupation");
            $nominee_name = $request->input("nominee_name");
            $nominee_relation = $request->input("nominee_relation");
            $nominee_address =  $request->input("nominee_address");

            DB::update('update users set
            date_of_birth = ? ,
            gender = ?,
            shipping_address = ?,
            father_name = ?,
            mother_name = ?,
            country = ?,
            division_id = ?,
            district_id = ?,
            upazilas_id = ?,
            street_address = ?,
            post_code = ?,
            occupation = ?,
            nominee_name = ?,
            nominee_relation = ?,
            nominee_address = ?,
            avatar = ?
            where id = ?',[$date_of_birth,
            $gender,
            $shipping_address,
            $father_name,
            $mother_name,
            $country,
            $division,
            $district,
            $upazila,
            $street_address,
            $post_code,
            $occupation,
            $nominee_name,
            $nominee_relation,
            $nominee_address,
            $imgname,
            $userId]);
            Session::flash('message', 'Profile Updated Successfully!!!!');
        }
        //echo $request->input("phone_no");
        $data = DB::table('users')->select('id','first_name','last_name','phone_no','phone_code','created_at','email','father_name',
        'mother_name','gender','nominee_name','nominee_relation','occupation','post_code','date_of_birth','country','shipping_address','street_address','nominee_address','avatar')->where(['id'=> $userId])->first();
        return view('authuser.userprofile.pages.edituserprofile')->with(compact('data'));
    }

    function afterloginFunc(){
        $categories_item = DB::table('categories')->select('id','name','image','parent_id','created_at','updated_at')->where('parent_id', '0')->get();
        return view('authuser.userprofile.afterloginhome')->with(compact('categories_item'));
    }
}
