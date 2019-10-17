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
/*        height: 100%;*/
/*        overflow: hidden;  This lines were used to FIX the 100% size of display*/
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

        
        <div class="col-lg-4 col-md-5 col-sm-8 col-xs-10 login-form-box">
        <h2 class="signin-txt text-center">Log In to loopcode</h2>
                    <?php
                         loginFunction();
                         displayMessage();
            
                     ?>
            <form action="login.php" method="post" class="login-form">

                <input class="login-input username-btn" type="text" placeholder="username" name="username" >
                <input class="login-input password-btn" type="password" placeholder="password" name="password" >
                <input class="login-input submit-btn" type="submit" name='login' value='Log in'>
                   
                   <div class="custom-control custom-checkbox">
                       
                       <input class="state-pass custom-control-input" onclick="showPass()" id="state-pass" type="checkbox">
                       <label class="custom-control-label text-dark"  for="state-pass">show password</label>
                       
                   </div>   
            </form>
        
        <div class="frogot-link"><a href="">forgot password?</a></div>
        <div class="frogot-link">Don't have an Account? Please click on create account to sign in.</div>
        <div class=""><a class="btn btn-primary text-light" href="signup.php">Create Account</a></div>
        
    </div>
    
</div>

	</main>
	
	<script type='text/javascript' src="../js/main.js"></script><script type='text/javascript' src="../js/admin.js"></script>
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>