<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>Bootstrap 101 Template</title>

    <!-- Bootstrap -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    
    <div class="container">
    <nav class="navbar navbar-inverse">
      <ul class="nav nav-pills">
      @if ($user == '')
        <li role="presentation" class="active"><a href="/home">Home</a></li>
        <li role="presentation"><a href="/login">Login</a></li>
      @else 
        <li role="presentation" class="active"><a href="/home">Home</a></li>
        <li role="presentation"><a href="/logout">Logout</a></li>
      @endif
      </ul>
    </nav>
        @if ($user != '')
          <p>Welcome to the blog, {{ $user }}</p> 
        @endif

        <hr>
        <h1>{{ $post->title }}</h1>
        <p> {{ $post->body }} </p>
        
    </div>

    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="//cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.1/js/bootstrap.min.js"></script>
  </body>
</html>
