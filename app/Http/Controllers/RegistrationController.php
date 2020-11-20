<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\introducer;
use Illuminate\Support\Facades\DB;

class RegistrationController extends Controller
{
    public function RegistrationUser(Request $request)
      {
        //$user = Auth::user();
        //return $request;
        /*$this->validate($request, [
          'first_name' => 'required|string|max:30',
          'last_name' => 'nullable|string|max:15',
          'username' => 'required|alpha_dash|max:100|unique:users,username,'.$user->id,
          'email' => 'required|string|email|max:100|unique:users,email,'.$user->id,
          'division_id' => 'required|numeric',
          'district_id' => 'required|numeric',
          'phone_no' => 'required|max:15|unique:users,phone_no,'.$user->id,
          'street_address' => 'required|max:100',
        ]);*/
        $data = $request->input();

        if($data['intro'] !=null)  //introducer id check function
            {
                 $strintro = substr($data['intro'], 3);
                 $introId =(int)$strintro;
                 $result = DB::table('introducers')->select('id')->where(['user_id'=> $introId ])->first();
                 if($result ==NULL){
                    session()->flash('message', 'Invalid Introducer id !!!');
                    return redirect('signup');
                 }
            }

        $result = DB::table('users')->select('first_name')
                ->where(['phone_no'=> $request->phone_no])->first();
//                ->orWhere(['email'=> $request->email]);
        if($result == NULL){
            $user =new User;
            $user->first_name = $request->first_name;
            $user->last_name = $request->last_name;
            $user->username = $request->phone_no;
            $user->email = $request->email;
            $user->phone_no = $request->phone_no;
//            $user->phone_code = $request->countryCode;
            $user->country = $request->country;
            $user->date_of_birth = $request->date_of_birth;
            $user->gender = $request->gender;

            $user->shipping_address = '';
//            $user->street_address = 'asd';
//            $user->countrie_id = '';
//            $user->division_id = '';
//            $user->district_id = '';
//            $user->upazilas_id = '';
//            $user->street_address = '';


            if ($request->password != NULL || $request->password != "") {
              $user->password = $request->password;
            }

            $user->ip_address = request()->ip();
            $user->save();
            //introducer
            if($data['intro'] !=NULL){
              //$strintro = substr($data['intro'], 3);
              $intro = new introducer;
              $intro->user_id = $user->id ;
              $intro->introducer_type = 'CID' ;
              $intro->parent_introducer_id = (int)$strintro;

              $intro->save();
            }else{
                  $intro = new introducer;
                  $intro->user_id = $user->id ;
                  $intro->introducer_type = 'CID' ;
                  $intro->parent_introducer_id = 1;
                  $intro->save();
            }
            session()->flash('message', 'User Registration Successful !!');
            return redirect('login');
        }
        else{
            session()->flash('message', 'Already registered Phone Number!!');
            return redirect('signup');
        }
    }
     public function introducerValidate(Request $request){
        $this->autoRender = false;
        //$user = $this->Auth->user();
        //$session = $this->request->getSession();
            $data =  $request->only('introId');
            $strintro = substr( $data['introId'], 3);
            $strintro = trim($strintro);
            $introId= (int)$strintro;

            if( $introId !=null )
            {
                 $result = DB::table('users')->select('id')->where(['id'=> $introId ])->first();
                 if($result ==NULL){
                    $data = "0";
                 }else{
                    $data = "1";
                 }

                 //$sql="SELECT supplier_comp_name FROM suppliers WHERE supplier_comp_code ='$q' Limit 1";
                 //$query = $conn->execute($sql);
                 //$result = $query->fetchAll('assoc');
                 return response()->json($data);
            }else{
                $data = "0";
                return  response()->json($data);
            }



   //use below code to see data

    }
}
