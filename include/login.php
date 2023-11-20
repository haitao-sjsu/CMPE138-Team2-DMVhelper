<html>
	<?php
        session_start();
	/*clears POST variables and redirects to current URL*/
        function redirectWithoutPostVariables() {
          $uri = $_SERVER["REQUEST_URI"];
          header("refresh: 5; location: ".$uri);
        }
	/*check if user is in Registering*/
	if(isset($_POST["reg_email"])) {
        $email = $_POST["reg_email"];
        $pass = $_POST["reg_psw"];
        $hashed_password = hash('sha256', $pass);
	  	$sql = "SELECT * FROM users 
		     	WHERE user_email='" . $email."';";
	  	$results = mysqli_query($conn,$sql);
		if(mysqli_num_rows($results) > 0) {
			echo "<script type='text/javascript'>
					window.onload = function() {
						console.log('logged');
						alert('User name already taken!');
						window.location='" . $_SERVER["REQUEST_URI"] . "';}
				 </script>";
		}
		else{
			$sql = "INSERT INTO users(user_email, hashed_password) 
					values ('" . $email . "', '" . $hashed_password . "')";
			mysqli_query($conn,$sql);
			$_SESSION["email"] = $email;
			redirectWithoutPostVariables();
		}
	}
	else if(isset($_POST["email"])) { /*trying to LOGIN*/
	  	$email = $_POST["email"];
        $pass = $_POST["psw"];
        $hashed_password = hash('sha256', $pass);
	  	$sql = "SELECT * FROM users WHERE user_email='" . $email."' AND hashed_password='" . $hashed_password . "';";
	  	$results = mysqli_query($conn,$sql);
	  	if(mysqli_num_rows($results) > 0) {//login successful
        	$_SESSION['email'] = $email;
		echo "<script type='text/javascript'>
				window.onload = function() {
					alert('Login successful!');
					window.location='" . $_SERVER["REQUEST_URI"] . "';
				}
			 </script>";
        }
	  	else {//login unsuccesful
            echo "<script type='text/javascript'>
					window.onload = function() {
						alert('Login failed!');
						window.location='" . $_SERVER["REQUEST_URI"] . "';
					}
				 </script>";
	  }
	}
	else if(isset($_POST['logout'])) {
          session_unset();
          redirectWithoutPostVariables();
	}
	?>

	<link href="css/main.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="css/login.css">

<?php
if(isset($_SESSION['email'])) {
?>
logged in as
<?php
echo $_SESSION['email'];
?>
<form method="post">
<input type="hidden" name="logout" value="true"/>
<input type="submit" value="logout"/>
</form>
<?php
}
else {
?>
	<button onclick="document.getElementById('id01').style.display='block'">Login</button>
	<button onclick="document.getElementById('id02').style.display='block'">Register</button>
<?php
}
?>
<!-- The Modal -->
	<div id="id02" class="modal">
	  <span onclick="document.getElementById('id01').style.display='none'"
	class="close" title="Close Modal">&times;</span>

	  <!-- Modal Content -->
	  <form class="modal-content animate" method="POST">
		

		<div class="container">
		  <label for="uname"><b>Email</b></label>
		  <input type="text" placeholder="Enter Email" name="reg_email" required>

		  <label for="psw"><b>Password</b></label>
		  <input type="password" placeholder="Enter Password" name="reg_psw" required>

		  <button type="submit">Register</button>
		</div>

		<div class="container" style="background-color:#f1f1f1">
		  <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn">Cancel</button>
		 
		</div>
	  </form>
	</div>


<!-- The Modal -->
	<div id="id01" class="modal">
	  <span onclick="document.getElementById('id01').style.display='none'"
	class="close" title="Close Modal">&times;</span>

	  <!-- Modal Content -->
	  <form class="modal-content animate" method="POST">
		

		<div class="container">
		  <label for="uname"><b>Email</b></label>
		  <input type="text" placeholder="Enter Email" name="email" required>

		  <label for="psw"><b>Password</b></label>
		  <input type="password" placeholder="Enter Password" name="psw" required>

		  <button type="submit">Login</button>

		</div>

		<div class="container" style="background-color:#f1f1f1">
		  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
		  
		</div>
	  </form>
	</div>
</html> 
