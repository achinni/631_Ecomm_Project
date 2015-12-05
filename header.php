<!-- header -->
<nav class='navbar navbar-inverse' style='margin-bottom:0'>
  <div class='container-fluid'>
    <div class='navbar-header'>
      <a class='navbar-brand' href='welcome.php'>e-Mart</a>
    </div>
    <div>
      <ul class='nav navbar-nav'>
        <li class='active'><a href='home.php'>HOME</a></li>
      </ul>
      </div>
      <div>
      <ul class='nav navbar-nav navbar-right'>
		<li class='active'>
		<form action = '#' method='post'>
		<button type="submit" name="logout" class="btn btn-link">logout</button>
		</form>
		</li>
      </ul>
    </div>
  </div>
</nav>

<?php
	if(isset($_POST['logout']))
	{
		session_destroy();
		session_start();
		$_SESSION['user']='Guest';
		header('Location:welcome.php');
	}
?>