<?php

// PHP Laravel file for name search, v1, 3rd Oct 18

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Name;

class MainController extends Controller
{
	// Display the search page:
	public function showsearch(Request $request)
		{
		return view('showsearch');
		}
		
	// Take search terms, and search database for them, returning results in JSON format over AJAX:
	public function dosearch(Request $request)
		{
		$names = explode(' ', $request->input('terms'));
		$c = count($names); // In case a user has supplied multiple middle names
		if($c > 2) $names[1] = $names[$c - 1]; // If more than 2 names, take last name and make it 2nd name (just for this function)
		else if(!isset($names[1])) $names[1] = ''; // Only one name supplied		
		$firstname = $names[0];
		$lastname = $names[1];

		// Use Laravel's Eloquent ORM to do pull the names out of the database:
		// SQL query equivalent: "SELECT * FROM names ORDER BY lastname ASC, firstname ASC"

		$names = Name::where([
					['firstname', 'like', '%'.$names[0].'%'], // Match against first name user specified
					['lastname', 'like', '%'.$names[1].'%'] // AND against last name specified
					])
					->limit(50) // Max 50 names, for speed
					->orderBy('lastname', 'ASC') // Order by lastname ascending
					->orderBy('firstname', 'ASC') // Then order by firstname ascending
					->get(); // Get results		
		
		if($request->input('avoiddupes') == 'true') $names = $names->unique()->values(); // De-dupe if requested
		return response()->json($names); // Return results in JSON format over AJAX to browser
		}
		
	// Load a CSV data file in:
	public function loadcsv(Request $request)
		{
		if (($handle = fopen("names.csv", "r")) !== FALSE) { // If file is opened OK
			while (($data = fgetcsv($handle, 50, ",")) !== FALSE) { // While we can get another line of the file and parse from CSV into an array
				// Create a new entry in the names DB table with the data from the line just read in:
				$name = Name::create(['firstname' => $data[0], 'lastname' => $data[1]]);
				}
			fclose($handle); // Close file
			}
		return view('csvloaded'); // Display completion message
		}

}
