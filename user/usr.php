<?php include('../end/config.php');  ?>

<!DOCTYPE html>
<html lang="en">


<!-------------------- <head> FOR CREATEION PAGE------------------->

<?php include("back/post-project-head.php"); ?>

<body>
	

<!--------------------HEADER FOR CREATEION PAGE------------------->

<?php include('back/create_page_header.php'); ?>
    
    <?php  if(checkValidUser("login.php")){ ?>

	<main class="main-body">
		
		    
<!------------------CREATE SIDEBAR PHP------------------>
	<?php include("back/create_sidebar.php"); ?>
     
     
      <div class="row">
    
    <div class="col-lg-3 col-md-3 col-sm-4 col-sx-4"></div> <!-- div behind the admin bar -->
      	  	
      	  	
      	<div class="col-lg-9 col-md-9 col-sm-8 col-sx-12 admin-main-bar-container">
            
      	
            <div class="create-post-continer col-lg-10">
        

             <?php
            if(isset($_GET['ops'])){
               $op_type = filterStr($_GET['ops']); 
             switch($op_type){
                 case "upd":include("back/user_setting.php");
                     break;
                 case "pro":include("back/user_profile.php");
                     break;
                 default: direct("user.php");
             
               }
                
            }
            
                
            
            

            ?>

            </div>

      	</div>
      	      	
      </div>

	</main>


	<script type='text/javascript' src="../js/main.js"></script>
	<script type='text/javascript' src="../js/admin.js"></script>
	<script type='text/javascript' src="../js/jquery-3.3.1.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>




	<?php  } ?>
</body>
</html>