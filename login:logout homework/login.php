<?php  
 session_start(); 

$message = "";
$returnMessage;

$userN = "";

if($_SESSION["validUser"] == "yes" )
//if (isset($_SESSION['validUser']))				//is this already a valid user?
	{
		//User is already signed on.  Skip the rest.
		echo $returnMessage = "Welcome Back, " . $_POST["username"]; //.$_SESSION["username"];	//Create greeting for VIEW area		
	}
	else
	{

		 require 'HeartL_PDO_connectionFile.php';
  
		  if(isset($_POST["login"]))
		  {  
			   $userN = $_POST["username"];
			  
			   if(empty($_POST["username"]) || empty($_POST["password"]))  
			   {  
					$message = '<h3 style="color: red">All fields are required</h3>';  
			   }  
			   else  
			   {  
					$query = "SELECT event_user_name, event_user_password FROM event_user WHERE event_user_name = :event_user_name AND event_user_password = :event_user_password";  
					$statement = $conn->prepare($query);  
					$statement->execute(  
						 array(  
							  'event_user_name'     	=>     $_POST["username"],  
							  'event_user_password'     =>     $_POST["password"]  
						 )  
					);  

					if($statement->rowCount() == 1)  
					{  
						 $message = "<h3 style='color: green'>Login Successful</h3";
						 //$_SESSION["validUser"] = "yes";
						 $_SESSION["validUser"] = "yes";  
						 //header("location:login_success.php");  
					}  
					else  
					{  
						 $_SESSION["validUser"] = "no";
						 $message = '<h3 style="color: red">Incorrect username or password.</h3>';  
					}  
			   }  
		  }
	}


	
	
	
   
 ?>  
 <!DOCTYPE html>  

<script>
	
	//function logout(){
	//	document.location.href = "logout.php";
	//}
	
</script>


 <html>  
      <head>  
           <title>Webslesson Tutorial | PHP Login Script using PDO</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <!--<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  -->
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
		  
		  
           <br />  
             
                <h1>WDV341 Intro PHP</h1>

				<h2>Presenters Admin System Example</h2>
		  
		  		<?php echo $message ?><br>
		  
		  
		  
			<?php
				if ($_SESSION['validUser'] == "yes")	//This is a valid user.  Show them the Administrator Page
				{
				//turn off PHP and turn on HTML
			?>
					<h3>Presenters Administrator Options</h3>
					<p><a href="presentersInsertForm.php">Input New Presenter</a></p>
					<p><a href="presentersSelectView.php">List of Presenters</a></p>
					<p><a href="presentersLogout.php">Logout of Presenters Admin System</a></p>	

			<?php
				}
		  		else									//The user needs to log in.  Display the Login Form
				{
		  	?>
		  
			    
			    
                <form method="post" name="loginForm" action="login.php">  
                     <label>Username</label>  
                     <input type="text" name="username" class="form-control" value="<?php echo $userN; ?>"/>  
                     <br />  <br>
                     <label>Password</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  <br>
                     <input type="submit" name="login" class="btn btn-info" value="Login" />  
					 <br><br>
					
			<?php //turn off HTML and turn on PHP
				}//end of checking for a valid user
			
			?>
					
			<?php
					
				if($_SESSION["validUser"] == "yes")  
				{  
								    
					echo '<a href="logout.php"><input type="button" name="logout" value="Logout"/></a>';  
				}  	
			?>
					 
                </form>  
            
           <br />  
      </body>  
 </html>  