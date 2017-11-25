<?php
	if(isset($_POST['login'])){
		$data_missing = array();
		if(empty($_POST['username'])){$data_missing[] = "username"}
		if(empty($_POST['password'])){$data_missing[] = "password"}
		if(!empty($data_missing)){
			echo 'Error ';
			foreach($data_missing as $missing){echo "$missing ";}
			echo 'are not set!';
		}else{
			$pass = null;
			require_once('connect_to_sql.php');
			$stmt = $dbc->prepare("SELECT PASSWORD FROM T_USER WHERE USERNAME = ?");
			$stmt->bind_params("s", $_POST['username']);
			$stmt->execute();
			$stmt->bind_result($pass);
			if($stmt->fetch()){
				echo "comparing ". $_POST['password'];
				echo " with ".$pass."</br>";
			}
			else{
				echo "bad login :/ </br>";
			}
			$stmt->close();
			$dbc->close();
		}
	}
	
	if(!isset($currentuser)){
		$currentuser = NULL;
		echo '<form action="index.php" method="post">
				<b>Login</b>
					<p>Username: 	<input type="text" 			name="username" size="30" value="" /></p>
					<p>Password: 	<input type="password" 	name="password" size="30" value="" /></p>
					<p><input type="submit" name="login" value="Login" /></p>
				</form>';
	}
	else{
		echo 'Loged in as '.$currentuser.'<form action="index.php" method="post">
				<p><input type="submit" name="logout" value="Logout" /></p>
				</form>';
	}
	
	
	
?>