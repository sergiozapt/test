<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
    <title>Pipeline Article Blog</title>
    <link rel="stylesheet", href="/css/all.css">
    
</head>
<body>
	<nav class="navbar navbar-default navbar-static-top">
		<div class="container">
			<div class="navbar-collapse" id="bs-example-navbar-collapse-1">
      			<ul class="nav navbar-nav">
              <li class="active"><a href="/articles">Home <span class="sr-only">(current)</span></a></li>
              @if (auth()->check())
                <li class="dropdown">
                  <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Extra <span class="caret"></span></a>
                  <ul class="dropdown-menu">
                    <li><a href="/articles/unpublished">Future Articles</a></li>
                    <li><a href="/articles/deleted">Deleted Article</a></li>
                  </ul>
                </li>
                <li><a href="/articles/create">Submit Article</a></li>
          		@endif
        		</ul>
            <ul class="nav navbar-nav pull-right">
            @if (auth()->check())
              <li><a href="/auth/logout">Logout</a></li>
            @else
              <li><a href="/auth/login">Login</a></li>
              <li><a href="/auth/register">Register</a></li>
            @endif
            </ul>
     		</div>
  		</div>
	</nav>

	<div class="header">
	</div>
    <div class="container">
        @include('flash::message')

        @yield('content')
    </div>

    @yield('footer')
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <script>
    $('#flash-overlay-modal').modal();
    //$('div.alert').not('.alert-important').delay(3000).slideUp(300);
  </script>

</body>
</html>