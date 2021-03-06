<!DOCTYPE html>
<html lang="en">
<head>
	<title>Add User</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="icon" type="image/png" href="images/captain_logo.png"/>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/hamburgers.min.css">
	<link rel="stylesheet" type="text/css" href="css/fonts.css">
	<link rel="stylesheet" type="text/css" href="css/icon-font.min.css">
	<link rel="stylesheet" type="text/css" href="css/form.css">
	<link rel="stylesheet" type="text/css" href="css/short.css">
	<style> .error {color: #FF0000;} </style>

</head>
<body>

<?php
include_once('validation.php');
session_start();
?>
	


	<div class="limiter">
		<div class="container-login100" style="background-image: url('images/homepage.jpg');">
			
			<div class="wrap-login100 p-t-30 p-b-50">
				<span class="login100-form-title p-b-41">
				<img src="images/captain_logo.png" alt="Logo" width=100px><br>
					Add User
				</span>
				
				<?php
					if ($_SERVER["REQUEST_METHOD"] == "POST") {

                        $db = mysqli_connect(dbhost,dbuser,dbpass,database);

                        


						$sql = "INSERT INTO users 
						(user_name, email, password, user_type)
                        values (?,?,?,?)";
                        
                        $sql2 = "INSERT INTO user_info (user_id, sr_id)
                        values (?,?)";
					
						$stmt = $db->prepare($sql);
						
					
						if($uname!="" && $email!="" && $password!="" && $role!="" && $_SESSION['user_type']=='Admin'){
							$stmt->bind_param("ssss", $uname, $email, $password, $role);
							$stmt->execute();
                            $foo = true;
                            $sql_t = "SELECT user_id FROM users WHERE user_name = '$uname'";
							
                            if($result_t = mysqli_query($db, $sql_t)){
                                if(mysqli_num_rows($result_t) > 0){
                                    $row_t = mysqli_fetch_array($result_t);
                                    $uid = $row_t['user_id'];
                                    mysqli_free_result($result_t);
                                } else{
                                    echo '<div class="container">';
                                    echo '<div class="alert alert-warning" style="text-align:center;">';
                                    echo "No records found";
                                    echo '</div></div>';
                                }
                            } else{
                                echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
                            }
						} else {
                            $foo = false;
                        }
                        
                        $stmt = $db->prepare($sql2);
                        $stmt->bind_param("ii", $uid, $srid);
                        
                        if($srid!=""){
                            $stmt->execute();
                            $foo = true;
						} else {
                            $foo = false;
                        }

                        if($foo == false){
                            echo '<div style="text-align:center;">';
							failMessage();
							echo '</div>';
                        } else {
                            echo '<div style="text-align:center;">';
							header('location:users.php?raMessage');
							echo '</div>';
                        }

						mysqli_close($db);
					}
				?>
				
				<form class="login100-form p-b-33 p-t-5" method="post" action="add_user.php">
					<div style="text-align:right; padding-right:15px">
						<span class="error">* Required Field</span>
					</div>
                    
                    
                    <div class="wrap-input100">
						<input class="input100" type="text" name="username" placeholder="Username">
						<span class="focus-input100" data-placeholder="&#xe60b;"></span>
						<div style="text-align:right; padding-right:15px">
							<span class="error">* <?php echo $unameErr;?></span>
						</div>
                    </div>
                    
                    <div class="wrap-input100">
						<input class="input100" type="email" name="email" placeholder="Email">
						<span class="focus-input100" data-placeholder="&#xe60b;"></span>
						<div style="text-align:right; padding-right:15px">
							<span class="error">* <?php echo $emailErr;?></span>
						</div>
					</div>

					<div class="wrap-input100">
                        <select class="input100" name="utype">
                            <option hidden>Role</option>
                            <option value="Admin">Admin</option>
                            <option value="Staff">Inventory Manager</option>
                            <option value="Staff">Sales Manager</option>					
                        </select>

						<span class="focus-input100" data-placeholder="&#xe60b;"></span>
						<div style="text-align:right; padding-right:15px">
							<span class="error">* <?php echo $roleErr;?></span>
						</div>	
                    </div>
                    
					<div class="wrap-input100">
						<select class="input100" name="sr_id">
							<option hidden>Select Showroom</option>

							<?php
								$db = mysqli_connect(dbhost,dbuser,dbpass,database);
								
								$sql = "SELECT sr_id, sr_name FROM showroom";

								if($result = mysqli_query($db, $sql)){
									if(mysqli_num_rows($result) > 0){
										while($row = mysqli_fetch_array($result)){
												$srid = $row['sr_id'] ;
												$srname = $row['sr_name'];
												echo '<option value='.$srid.'>'.$srname.'</option>';
										}
										mysqli_free_result($result);
									} else{
										echo '<div class="container">';
										echo '<div class="alert alert-warning" style="text-align:center;">';
										echo "No records found";
										echo '</div></div>';
									}
								} else{
									echo "ERROR: Could not able to execute $sql. " . mysqli_error($db);
								}
								mysqli_close($db);
							?>
					
						</select>	
						<span class="focus-input100" data-placeholder="&#xe60b;"></span>
						<div style="text-align:right; padding-right:15px">
							<span class="error">* <?php echo $srErr;?></span>
						</div>
                    </div>

                    <div class="wrap-input100">
						<input class="input100" type="password" name="password" placeholder="Password">
						<span class="focus-input100" data-placeholder="&#xe60b;"></span>
						<div style="text-align:right; padding-right:15px">
							<span class="error">* <?php echo $passErr;?></span>
						</div>
                    </div>

                    <div class="wrap-input100">
						<input class="input100" type="password" name="cpassword" placeholder="Confirm Password">
						<span class="focus-input100" data-placeholder="&#xe60b;"></span>
						<div style="text-align:right; padding-right:15px">
							<span class="error">* <?php echo $passErr2;?></span>
						</div>
                    </div>

                    <div class="container-login100-form-btn m-t-32">
						<input class="login100-form-btn active" type="submit" value="ADD">
						<a class="login100-form-btn" href="users.php?filter">
							Back
						</a>
                    </div>

				</form>
			</div>
		</div>
	</div>	

	<div id="dropDownSelect1"></div>

	<?php

	function raMessage(){
		echo '<div class="alert alert-success">';
		echo '<strong>User Added</strong>';
		echo '</div>';
	}
	function failMessage(){
		echo '<div class="alert alert-danger">';
		echo '<strong>Operation Failed!!</strong>';
		echo '</div>';
	}

	?>
	
	<script src="js/jquery.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/form.js"></script>

</body>
</html>