<!DOCTYPE html>
<html>
<head>
  <title>Welcome to e-Mart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style>
  body {
      position: relative; 
  }
  #section1 {padding-top:50px;height:500px;color: #fff; }
  #section2 {padding-top:50px;height:500px;color: #fff; background-color: #673ab7;}
  #section3 {padding-top:50px;height:500px;color: #fff; background-color: #ff9800;}
  </style>
</head>
<body data-spy="scroll" data-target=".navbar" data-offset="50">

<nav class="navbar navbar-inverse navbar-fixed-top">
  <div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>                        
      </button>
      <a class="navbar-brand" href="#">e-Mart</a>
    </div>
    <div>
      <div class="collapse navbar-collapse" id="myNavbar">
        <ul class="nav navbar-nav">
          <li><a href="#section1">Overview</a></li>
          <li><a href="#section2">Who we are</a></li>
          <li><a href="#section3">Products</a></li>
        </ul>
      </div>
    </div>
  </div>
</nav>    

<div id="section1" class="container">
  <?php include 'Welcome_Slide.php' ?>
</div>
<div id="section2" class="container-fluid">
  <h1>Who we are</h1>
  <p>About US</p>
  <p>Description </p>
</div>
<div id="section3" class="container-fluid">
  <h1>Products we have</h1>
  <p>Login page</p>
  <p>Then send to product home!</p>
</div>

</body>
</html>
