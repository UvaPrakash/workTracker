<?php 
namespace App\Http\Controllers;

use App\Http\Requests;


use App\Http\Controllers\Controller;

use App\Http\Model\User;


use Illuminate\Http\Request;
use Illuminate\Http\Response;


class UserController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
            return json_encode(User::all());
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
           return json_encode(User::all());
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store(Request $request)
	{
              $user       =  new User();
             $email      =  $request->login_id;
            
            return json_encode(array("user"=>$email));
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		//
	}
        
        public function login(Request $request)
        {
              $user       =  new User();
              $email      =  $request->login_id;
              $password   =  $request->password;
              
              $result     =  $user->where('user_email',$email)->where('user_password',$password)->where('user_status',1000)->first();
              
              if($result == null)
              {
                  $response = array("status"=>"Failure","message"=>"Login Failure, Please check your credentials");
              }
              else
              {
                  $response = array("status"=>"Success","data"=>$result);
              }
            
              return json_encode($response);
        }
        
        public function changePassword(Request $request)
        {
              $user          =  new User();
              $oldPassword   =  $request->old_password;
              $newPassword   =  $request->new_password;
              $rePassword    =  $request->re_password;
              
              if($newPassword === $rePassword)
              {
                  $result   =  $user->where('user_password',$oldPassword)->update(['user_password' => $newPassword]);
                  
                  if($result == null)
                    {
                        $response = array("status"=>"Failure","message"=>"Old password mismatch");
                    }
                  else
                   {
                       $response = array("status"=>"Success","data"=>$result);
                   }
              }
              else
              {
                  $response = array("status"=>"Failure","message"=>"Check the new password");
              }
              
              
            
              return json_encode($response);
        }

}
