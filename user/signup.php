<?php include('../end/config.php');  ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<meta name='viewport' content="width=device-width,maximum-scale=1">
    <title>Portfolio Site</title>
    
    
    
<!----------------------------	BOOTSTRAP CSS  ------------------------>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    
<!-------------------    STYLE CSS------------------>
  
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../fontawesome/css/all.css">
	<link rel="stylesheet" href="../css/ghost.css">
	<link rel="stylesheet" href="../css/sec.css">
	<link rel="stylesheet" href="../css/admin.css">
	
<!--------	Fonts--------->
	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans" rel="stylesheet">
	
	


</head>

<style>
   
    body,html{
        color:black;
        position: relative;
        background-color: #f1f1f1;
    }
    
</style>
<body>
	
<!------------------REGISTER HEADER PHP--------------->
<?php include("back/register_header.php"); ?>


<main class="main-body">
    <div class="login-form-container">

        <div class="col-lg-5 col-md-6 col-sm-8 col-xs-10 signup-form-box">
            <?php  signupFunction(); ?>

                <form action="signup.php" method="post" class="signup-form">
                   
                    <h2 class="signin-txt text-center">Create Account</h2>
                    <?php  displayMessage(); ?>

                   
                    <label for="firstname">First Name</label>
                    <input class="signup-input username-btn" id='firstname' type="text" placeholder="first name" name="firstname" required >
                     
                    <label for="lastname">Last Name</label>
                    <input class="signup-input username-btn" id="lastname" type="text" placeholder="last name" name="lastname"  required  >
                    
                    <label for="username">Username</label>
                    <input class="signup-input username-btn" id='username' type="text" placeholder="username" name="username"  required  >
                    
                    <label for='email'>Email id</label>
                    <input class="signup-input username-btn" id='email' type="email" placeholder="@mail id" name="email"  required  >
                 
                    <label for="password1">Password</label>
                    <input class="signup-input password-btn" id="password1" type="password" placeholder="password" name="password1"  required  >
                    
                    <label for="password2">Re-enter password</label>
                    <input class="signup-input password-btn" id="password2" type="password" placeholder="conferm password" name="password2"  required  >
                
                    <input class="signup-input submit-btn" type="submit" name="signup" value='Sign Up'>

                      <div class="custom-control custom-checkbox my-2">

                           <input class="state-pass custom-control-input" onclick="showPass()" id="state-pass" type="checkbox">
                           <label class="custom-control-label text-dark"  for="state-pass">show password</label>

                       </div>

                </form>

            <div class="frogot-link">Already have an acount ?</div>
            <div class=""><a class="btn btn-primary text-light" href="login.php">Log In</a></div>

        </div>
     </div>
</main>
	


<script type='text/javascript' src="../js/main.js"></script>
<script type='text/javascript' src="../js/admin.js"></script>
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>