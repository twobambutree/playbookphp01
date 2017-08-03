<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- <link rel="icon" href="../../favicon.ico"> -->

    <title>PlayBook Data PHP version</title>

    <!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

	<!-- Optional theme -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

    <!-- Bootstrap core CSS -->
    <!-- <link href="../../dist/css/bootstrap.min.css" rel="stylesheet"> -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <!-- <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet"> -->

    <!-- Custom styles for this template -->
    <link href="jumbotron.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <!-- <script src="../../assets/js/ie-emulation-modes-warning.js"></script> -->

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>

	<nav class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">PlayBook Data PHP Version</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
          <form class="navbar-form navbar-right">
            <div class="form-group">
              <input type="text" placeholder="Email" class="form-control">
            </div>
            <div class="form-group">
              <input type="password" placeholder="Password" class="form-control">
            </div>
            <button type="submit" class="btn btn-success">Sign in</button>
          </form>
        </div><!--/.navbar-collapse -->
      </div>
	</nav>
<?php
//definding data for MSQL
$sname = "127.0.0.1";
$username = "root";
$password = "root";
$db = "playbook";

// Create connection
$conn = new mysqli($sname, $username, $password, $db);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// define variables and set to empty values
$pbnameErr = $scrnameErr = $emailErr = $genderErr = $heightErr = $weightErr = "";
$pbname = $scrname = $email = $gender = $about = $height = $weight = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

	if (empty($_POST["pbname"])) {
		$pbnameErr = "PlayBookName is required";
	} else {
		$pbname = test_input($_POST["pbname"]);
	// check if name only contains letters and whitespace
		if (!preg_match("/^[a-zA-Z ]*$/",$pbname)) {
  			$pbnameErr = "Only letters and white space allowed"; 
		}
	}

	if (empty($_POST["email"])) {
		$emailErr = "Email is required";
	} else {
		$email = test_input($_POST["email"]);
	// check if e-mail address is well-formed
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
  				$emailErr = "Invalid email format"; 
			}
	}

	if (empty($_POST[ "height"])) {
		$height = "";
	} else {
		$height = test_input($_POST["height"]);
	// check if URL address syntax is valid (this regular expression also allows dashes in the URL)
		// if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
  // 			$websiteErr = "Invalid URL"; 
		// }
	}

	if (empty($_POST[ "weight"])) {
		$weight = "";
	} else {
		$weight = test_input($_POST["weight"]);
	// check if URL address syntax is valid (this regular expression also allows dashes in the URL)
		// if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {
  // 			$websiteErr = "Invalid URL"; 
		// }
	}

	if (empty($_POST["about"])) {
		$about = "";
	} else {
		$about = test_input($_POST["about"]);
	}

	if (empty($_POST["gender"])) {
		$genderErr = "Gender is required";
	} else {
			$gender = test_input($_POST["gender"]);
	}
}

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = htmlspecialchars($data);
	return $data;
}
?>

<!-- Main jumbotron for a primary marketing message or call to action -->
	<div class="jumbotron">
		<div class="container">
			<h1>Sport Igniter!</h1>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@mdo">Create PlayBook for @mdo</button>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@fat">Open modal for @fat</button>
			<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal" data-whatever="@getbootstrap">Open modal for @getbootstrap</button>
			...more to comes...

			<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel">
			<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
        	<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        	<h4 class="modal-title" id="exampleModalLabel">New message</h4>
      	</div>
      	<div class="modal-body">
			<p><span class="error">* required field.</span></p>
			<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  
				PlayBook Name: <input type="text" name="pbname" value="<?php echo $pbname;?>">
				<span class="error">* <?php echo $pbnameErr;?></span>
				<br><br>
				E-mail: <input type="text" name="email" value="<?php echo $email;?>">
				<span class="error">* <?php echo $emailErr;?></span>
  				<br><br>
  				Date of Birth: <input type="text" name="dob" value="<?php echo $dob;?>">
  				Height: <input type="text" name="height" value="<?php echo $height;?>">
  				<span class="error"><?php echo $heightErr;?></span>
  				<br><br>
  				Weight: <input type="text" name="weight" value="<?php echo $weight;?>">
  				<span class="error"><?php echo $weightErr;?></span>
  				<br><br>
  				About: <textarea name="about" rows="5" cols="40"><?php echo $about;?></textarea>
  				<br><br>
  				Gender: <input type="radio" name="gender" <?php if (isset($gender) && $gender=="female") echo "checked";?> value="female">Female
				<input type="radio" name="gender" <?php if (isset($gender) && $gender=="male") echo "checked";?> value="male">Male
				<span class="error">* <?php echo $genderErr;?></span>
  				<br><br>
			</form>
      	</div>
      	<div class="modal-footer">
        	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        	<button type="button" class="btn btn-primary">Create</button>
      	</div>
    	</div>
  		</div>
		</div>

      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec id elit non mi porta gravida at eget metus. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus. Etiam porta sem malesuada magna mollis euismod. Donec sed odio dui. </p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
       </div>
        <div class="col-md-4">
          <h2>Heading</h2>
          <p>Donec sed odio dui. Cras justo odio, dapibus ac facilisis in, egestas eget quam. Vestibulum id ligula porta felis euismod semper. Fusce dapibus, tellus ac cursus commodo, tortor mauris condimentum nibh, ut fermentum massa justo sit amet risus.</p>
          <p><a class="btn btn-default" href="#" role="button">View details &raquo;</a></p>
        </div>
      </div>

      <hr>

      <footer>
        <p>&copy; 2016 Company, Inc.</p>
      </footer>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script> -->
    <!-- Latest compiled and minified JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    <!-- <script src="../../dist/js/bootstrap.min.js"></script> -->

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <script type="text/javascript">
    	$('#exampleModal').on('show.bs.modal', function (event) {
 		var button = $(event.relatedTarget) // Button that triggered the modal
 		var recipient = button.data('whatever') // Extract info from data-* attributes
 		// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
  		// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
  		var modal = $(this)
  		modal.find('.modal-title').text('New message to ' + recipient)
  		modal.find('.modal-body input').val(recipient)
		})
    </script>
  </body>
</html>