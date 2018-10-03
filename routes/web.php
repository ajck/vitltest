<?php

// Route definitions to the controller:

Route::get('/', 'MainController@showsearch'); // Show the search page
Route::post('/dosearch', 'MainController@dosearch'); // Receive POSTed search query, show the results page, responds with JSON
Route::get('/loadcsv', 'MainController@loadcsv'); // Load CSV from the data file into the database