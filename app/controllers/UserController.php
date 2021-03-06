<?php

class UserController extends \BaseController {

	public function __construct() {
		// Validator::extend('username', function($attribute, $value, $parameters){
		// 	$users = User::whereUsername($value);
		// 	return 
		// 		$users->count() == 0 ||
		// 		$users->first()->id == Auth::id();
				
		// }, "The username you have chosen already exists.");

		$this->beforeFilter('auth', [
			'except' => [
				'store',
				'show',
				'create',
				'login'
			]
		]);

		$this->afterFilter('plusone', [
			'only' => [
				'index',
				'show'
			]
		]);
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		//
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		// $countries = User::getCountryList();
		$teams = Team::getList();
		return View::make('register',compact('countries','teams'));
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$user = User::create(array(
			'first_name' 		=> Input::get('first_name'),
			'surname' 			=> Input::get('surname'),
			'username' 			=> Input::get('username'),
			'password' 			=> Hash::make(Input::get('password')),
			'email' 			=> Input::get('email_address'),
			'country_code' 		=> Input::get('country'),
			'city' 				=> Input::get('city'),
		));

		Auth::attempt([
			'username' => $user->username,
			'password' => $user->password
		]);
		return $user;
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
		$user = User::find($id);
		return View::make('user-profile', compact('user'));
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
		$user = User::find($id);

		$userData = Input::only(
			'first_name',
			'surname',
			'username',
			'email_address',
			'password',
			'favourite_team'
		);

		$validator = Validator::make($userData, [
			'first_name' => 'required',
			'surname' => 'required',
			'username' => 'required|unique:users,username,'.Auth::id(),
			'email_address' => 'required|email',
			'password' => 'required',
			'favourite_team' => 'exists:teams,id'
		]);

		if ($validator->fails()) {
		    return Response::json( $validator->messages(), 400);
		} elseif (Hash::check($userData['password'], Auth::user()->password)) {
		    $user->first_name = $userData['first_name'];
		    $user->surname = $userData['surname'];
		    $user->username = $userData['username'];
		    $user->email = $userData['email_address'];
		    $user->favourite_team = $userData['favourite_team'];
		    $user->save();
		    return $user;
		} else {
			return Response::json(["The password you entered does not match our records.  Sorry about that."], 400);
		}
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

	public function login()
	{
		$values = Input::only('username','password');
		
		return( Auth::attempt([
			'username'=>$values['username'],
			'password'=>$values['password']
		]) 
			? Redirect::back()
			: Redirect::back()->with('message', 'Authentication failed, bad username or password.')
		);
	}

	public function logout()
	{
		Auth::logout();
		Session::clear();
		return Redirect::back();
	}
		
}
