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

<body>
	
<?php  if(checkValidUser("login.php")){ ?>
	
<!--------------------HEADER FOR CREATEION PAGE------------------->

<?php include('back/create_page_header.php'); ?>
    
	<main class="main-body">
		
<!---------------------   MAIN SIDEBAR PHP------------------>
      <?PHP include("back/main_sidebar.php"); ?>
      
      
      <div class="row">
    
   
        <div class="col-lg-3 col-md-3 col-sm-4 col-sx-4"></div> <!-- div behind the admin bar -->
      	 
      	  <div id='admin-menu' class="admin-menu">
                <div class="admin-menu-item">
                <i class="fab fa-creative-commons-nd" style="font-size:38px;"></i>
                
<!--                <i class="far fa-rotate-90 " style="font-size:40px;">8</i>-->
                </div>
            </div> 	
      	  	
      	  	
      	<div class="col-lg-9 col-md-9 col-sm-8 col-sx-12  admin-main-bar-container"> 
            
           

               <div class="dashboard">
                   <h3 class="text-success">Dashboard</h3>
                       <?php 
                                displayMessage();
                                delete_port();
                                delete_project();


                        ?>
                   <div class="show"></div>

               </div>


            <div class="post-container">
                <h6 class=" element-txt">YOUR POSTS</h6>
                        <div class="row">




                        <?php userSidePost(); ?>

                    </div>

            </div>






            <!--__________________________________________ PROJECT CONTAINER _________________________________________________-->

            <div class="project-container">
                <h6 class="element-txt">YOUR PROJECTS</h6> 
                        <div class="row">



                        <?php userSideProjects(); ?>

                    </div>

            </div>

      	
      	</div>
      	
      	
      </div>

	</main>
	
	
	    
	<?php } else{
	    direct('login.php');
	}
    
    ?>


	<script type='text/javascript' src="../js/main.js"></script>
	<script type='text/javascript' src="../js/admin.js"></script>
	<script type='text/javascript' src="../js/userPage.js"></script>
	
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>


</body>
</html>