<html>
	<head>
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link href="css/login.css" rel="stylesheet">
		<script>
			function validate(form) {
				fail = validateEmail(form.reg_email.value)
				if (fail == "") return true
				else { alert(fail); return false }
			}
			function validateEmail(field) {
				if (field == "") return "No Email was entered.\n"
				else if (!((field.indexOf(".") > 0) &&
					(field.indexOf("@") > 0)) ||
					/[^a-zA-Z0-9.@_-]/.test(field))
					return "The Email address is invalid.\n"
				return ""
			}
		</script>
	</head>
	
	<?php
        session_start();
	/*clears POST variables and redirects to current URL*/
        function redirectWithoutPostVariables() {
          $uri = $_SERVER["REQUEST_URI"];
          header("refresh: 5; location: ".$uri);
        }
	
	if(isset($_POST["reg_email"])) {/*check if user is in Registering*/
        $email = $_POST["reg_email"];
        $pass = $_POST["reg_psw"];
        $hashed_password = hash('sha256', $pass);
	  	$sql = "SELECT * FROM users 
		     	WHERE user_email='{$email}'";
	  	$results = $table_users->select($sql);
		if(!empty($results)) {// register failed
			echo "<script type='text/javascript'>
					window.onload = function() {
						console.log('logged');
						alert('User name already taken!');
						window.location='" . $_SERVER["REQUEST_URI"] . "';}
				 </script>";
		}
		else {//register successful
			$sql = "INSERT INTO users(user_email, hashed_password) 
					VALUES ('{$email}', '{$hashed_password}')";
			$table_users->insert($sql);
			$_SESSION["email"] = $email;
			$log->info($email . " registered ");
			redirectWithoutPostVariables();
		}
	}
	else if(isset($_POST["email"])) { /*trying to LOGIN*/
	  	$email = $_POST["email"];
        $pass = $_POST["psw"];
        $hashed_password = hash('sha256', $pass);
	  	$sql = "SELECT * FROM users WHERE user_email='{$email}' AND hashed_password='{$hashed_password}'";
	  	$result = $table_users->select($sql)[0];
	  	if(!empty($result)) {//login successful
        	$_SESSION['email'] = $email;
			$log->info($_SESSION['email'] . " logged in");
			$_SESSION['is_admin'] = $result['is_admin'];
		// echo "<script type='text/javascript'>
		// 		window.onload = function() {
		// 			alert('Login successful!');
		// 			window.location='" . $_SERVER["REQUEST_URI"] . "';
		// 		}
		// 	 </script>";
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
		  $log->info($_SESSION['email'] . " logged out");
          session_unset();
          redirectWithoutPostVariables();
	}

	if(isset($_SESSION['email'])) {
		echo <<< _END
			<ul class = 'menu'>
			<li><a href="index.php">{$UI['menu']['home_page'][$lang]}</a></li>
			<li><a href="user_mock_test.php">{$UI['menu']['new_mock_test'][$lang]}</a></li>
			<li><a href="user_view_all_tests.php">{$UI['menu']['previous_mock_test'][$lang]}</a></li>
			<li><a href="user_view_all_wrong_questions.php">{$UI['menu']['all_wrong_questions'][$lang]}</a></li>
		_END;
		if ($_SESSION['is_admin']) {
			echo <<< _END
				<li><a href="admin_crud.php">{$UI['menu']['admin_crud'][$lang]}</a></li>
			_END;
		}
		echo <<< _END
		<li >{$UI['menu']['has logged in'][$lang]}  {$_SESSION['email']}</li>
		_END;
		echo <<< _END
		<li>
		<form method="post">
		<input type="hidden" name="logout" value="true"/>
		<input type="submit" value="{$UI['menu']['logout'][$lang]}"/>
		</form>
		</li>
		_END;
		echo <<< _END
			</ul>
		_END;
	}

	else {
		echo <<< _END
		<button onclick="document.getElementById('id01').style.display='block'">{$UI['menu']['login'][$lang]}</button>
		<button onclick="document.getElementById('id02').style.display='block'">{$UI['menu']['register'][$lang]}</button>
		_END;
	}
?>
<!-- The Modal -->
	<div id="id02" class="modal">
	  <span onclick="document.getElementById('id01').style.display='none'"
	class="close" title="Close Modal">&times;</span>

	  <!-- Modal Content -->
	  <form class="modal-content animate" method="POST" onsubmit="return validate(this)">
		

		<div class="container">
		  <label for="uname"><b><?php echo $UI['menu']['email'][$lang]?></b></label>
		  <input type="text" placeholder="<?php echo $UI['menu']['enter email'][$lang]?>" name="reg_email" required>

		  <label for="psw"><b><?php echo $UI['menu']['password'][$lang]?></b></label>
		  <input type="password" placeholder="<?php echo $UI['menu']['enter password'][$lang]?>" name="reg_psw" required>

		  <button type="submit"><?php echo $UI['menu']['register'][$lang]?></button>
		  <button type="button" onclick="document.getElementById('id02').style.display='none'" class="cancelbtn"><?php echo $UI['menu']['cancel'][$lang]?></button>
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
		  <label for="uname"><b><?php echo $UI['menu']['email'][$lang]?></b></label>
		  <input type="text" placeholder="<?php echo $UI['menu']['enter email'][$lang]?>" name="email" required>

		  <label for="psw"><b><?php echo $UI['menu']['passoword'][$lang]?></b></label>
		  <input type="password" placeholder="<?php echo $UI['menu']['enter password'][$lang]?>" name="psw" required>

		  <button type="submit"><?php echo $UI['menu']['login'][$lang]?></button>
		  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn"><?php echo $UI['menu']['cancel'][$lang]?></button>

		</div>		  
	  </form>
	</div>
</html> 
