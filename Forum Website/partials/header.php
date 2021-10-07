<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="style.css">
</head>
<body>
  
</body>
</html>

<?php

session_start();

echo '<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="logo-img">
    <a href="/Forum Website"><img src="img/que.jpg" alt=""></a>
</div>
<a class="navbar-brand" href="/Forum Website">Forum</a>
<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
  <span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="navbarSupportedContent">
  <ul class="navbar-nav mr-auto">
    <li class="nav-item active">
      <a class="nav-link" href="/Forum Website">Home<span class="sr-only">(current)</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/Forum Website/threadlist.php?catid=1">Python</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="/Forum Website/threadlist.php?catid=4">Node Js</a>
    </li>
    
  </ul>
  <div class="row loginSign">';

  if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
    echo '
    <p class="text-light my-2">Welcome '.$_SESSION['user_email'].'</p>
    <a href="partials/logout.php" class="btn btn-danger ml-2 mx-2">Logout</a></form>';
    
  }
  else{
    echo '
    <button class="btn btn-danger loginBtn" data-toggle="modal" data-target="#loginModal">Login</button>
    <button class="btn btn-success mx-2" data-toggle="modal" data-target="#signupModal">Sign Up</button>';
    }

  echo '
    </div>
  </div>
  </nav>
  ';

include 'partials/login.php';
include 'partials/signup.php';

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']== "true"){
  echo '<div class="alert alert-success alert-dismissible fade show my-0" role="alert">
          <strong>Success!</strong> You can now Login.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
}

if(isset($_GET['signupsuccess']) && $_GET['signupsuccess']== "false"){
  echo '<div class="alert alert-danger alert-dismissible fade show my-0" role="alert">
          You can Sign Up Again.
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>';
}
?>