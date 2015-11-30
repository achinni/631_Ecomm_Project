<!DOCTYPE html>
<html lang="en">
<head>
  <title>Welcome to e-Mart</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
  <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  </style>
</head>
<body>

<div class="container">
  <br>
  <div id="myCarousel" class="carousel slide" data-ride="carousel" data-interval="3000" >
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
      <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner" role="listbox">

      <div class="item active">
        <img class="img-responsive" src="images/AppleFamily.gif" alt="AppleFamily" width="460" height="345">
        <div class="carousel-caption">
          <h3>Apple</h3>
          <p>The name is enough!.</p>
        </div>
      </div>

      <div class="item">
        <img class="img-responsive" src="images/CameraFamily.jpg" alt="CameraFamily" width="460" height="345">
        <div class="carousel-caption">
          <h3>Cameras</h3>
          <p>Capture the whole world!.</p>
        </div>
      </div>
    
      <div class="item">
        <img class="img-responsive" src="images/WindowsFamily.jpg" alt="WindowsFamily" width="460" height="345">
        <div class="carousel-caption">
          <h3>Microsoft</h3>
          <p>We have a complete suite to make your business comfortable!.</p>
        </div>
      </div>

      <div class="item">
        <img class="img-responsive" src="images/HardDrivesFamily.jpg" alt="HardDrivesFamily" width="460" height="345">
        <div class="carousel-caption">
          <h3>Storage</h3>
          <p>Back up your data. Don't loose your memories</p>
        </div>
      </div>
  
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" role="button" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" role="button" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>
</div>

</body>
</html>
