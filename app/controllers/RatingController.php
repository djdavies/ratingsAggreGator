<?php

class RatingController extends \BaseController {

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
		//
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		// get player info inputs from form
		$playerData = Input::only(
			'player_id'
		);

		// get user submitted ratings. hard coded skills not good for other sports.
		$ratingsData = Input::only(
			'shooting',
			'passing',
			'dribbling',
			'speed',
			'tackling'
		);

		// validate inputs
        $validator = Validator::make($ratingsData, [
            'shooting' 	=> 'required|numeric|digits_between:1,5',
            'passing'  	=> 'required|numeric|digits_between:1,5',
            'dribbling' => 'required|numeric|digits_between:1,5',
            'speed'  	=> 'required|numeric|digits_between:1,5',
            'tackling'  => 'required|numeric|digits_between:1,5'
        ]);

        // if validation passes, run query to insert and return newly created rating.
        if ($validator->fails()) {
            return Response::json( $validator->messages(), 400);
        } else {
        	foreach ($ratingsData as $skill => $value) {
        		$thing = Skill::where('name', '=', $skill)->get()->first()->id;
	            $rating = DB::table('ratings')->insert([
		            'originating_ip'    => $_SERVER['REMOTE_ADDR'],
		            'player_id'     	=> $playerData['player_id'],
		            'skill_id'	 		=> $thing,
		            'value' 			=> $value,
		            'game_id' 			=> 1,
		            'created_at' 		=> new DateTime,
		            'updated_at' 		=> new DateTime
		        ]);
        	}
        	return Player::find($playerData['player_id'])->getRatingSummary();
        }
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

	/**
	 * Returns the 10 most popularly voted players on the current date
	 *
	 * @return Response
	 */
	public function mostPopular()
	{	
		// retrieve all players and sort by the number of ratings
		$players = Player::byPopularity();

		// restrict the list to the top 10
		$players = $players->slice(0,10);
 
		return View::make('home', compact('players'));
	}

}
