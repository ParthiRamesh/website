<?php
   ob_start();
   session_start();
?>

<?
   // error_reporting(E_ALL);
   // ini_set("display_errors", 1);
?>

<html lang = "en">
   
   <head>
      <title>GPP-ADMIN | LOGIN</title>
      <link href = "css/bootstrap.min.css" rel = "stylesheet">
      
      <style>
         body {
            padding-top: 40px;
            padding-bottom: 40px;
            background:url("./images/single1.jpg");
			 background-repeat:no-repeat;
			 background-size:100%;
			 
			
         }
         button{
			 background-color:#4CAF50;
			 color:white;
			 padding:14px 20px;
			 margin:8px 0;
			 border:none;
			 cursor:pointer;
			 width:100%;
		 }
         .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            color: #017572;
         }
         
         .form-signin .form-signin-heading,
         .form-signin .checkbox {
			 color:white;
            margin-bottom: 10px;
         }
         
         .form-signin .checkbox {
            font-weight: normal;
         }
         
         .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
         }
         
         .form-signin .form-control:focus {
            z-index: 2;
         }
         
         .form-signin input[type="email"] {
            margin-bottom: -1px;
			width:100%;
			padding:12px 20px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-color:#017572;
         }
         
         .form-signin input[type="password"] , input[type="text"]{
            margin-bottom: 10px;
			width:100%;
			padding:12px 20px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-color:#017572;
         }
         
         h1{
            text-align: center;
            color: white;
         }
		 
      </style>
      
   </head>
	
   <body background="../single.jpg">
      
      <h1><strong>Admin Login</strong></h1> 
      <div class = "container form-signin">
         
         <?php
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				
               if ($_POST['username'] == 'geopolypack' && 
                  $_POST['password'] == 'murugan') {
                  $_SESSION['valid'] = true;
                  $_SESSION['timeout'] = time();
                  $_SESSION['username'] = 'tutorialspoint';
                  		header("location:hl.html"); 
				  
               }else {
                  $msg = 'Wrong username or password';
               }
            }
         ?>
      </div> <!-- /container -->
      
      <div class = "container">
      
         <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "username" 
               required autofocus></br>
            <input type = "password" class = "form-control"
               name = "password" placeholder ="password" required>
			<br>
            <button class = "btn btn-lg btn-primary btn-block" type ="submit" 
               name ="login">Login</button>
         </form>
			
<!--Click here to clean <a href = "logout.php" title = "Logout">Session.-->
         
      </div> 
      
   </body>
</html>