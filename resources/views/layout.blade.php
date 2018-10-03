<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Name Search</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.min.css" rel="stylesheet">
	<link href="css/font-awesome.min.css" rel="stylesheet"> 
	<link href="css/search.css" rel="stylesheet"> 
  </head>

  <body>

    <nav class="navbar navbar-default">
      <div class="container">
        <div class="navbar-header">
          <div class="navbar-brand" href="#">Name Search</div>
        </div>
      </div>
    </nav>

    <div class="container">

				@yield('content')

    </div><!-- /.container -->


    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/search.js"></script>

  </body>
</html>
