<?php include('end/config.php');  ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<meta name='viewport' content="width=device-width,maximum-scale=1">
    <title>Portfolio Site</title>
    

    <!----------------------------	BOOTSTRAP CSS  ------------------------>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-------------------    STYLE CSS------------------>

        <link rel="stylesheet" href="css/bootstrap.min.css">
        <link rel="stylesheet" href="css/main.css">
        <link rel="stylesheet" href="fontawesome/css/all.css">
        <link rel="stylesheet" href="css/ghost.css">
        <link rel="stylesheet" href="css/sec.css">

    <!--------	Fonts--------->
        <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans" rel="stylesheet">


</head>

<body>


<!-------------------HEADER PHP--------------->
<?PHP include("front/project_header.php"); ?>

  <main class="main-body">
		

      <div class="first-display-box">
     
                   <?PHP include("front/dots.php"); ?>
                   
                   
                   <?php
            
           if(isset($_GET['dev'])){
            $u_id = $_GET['dev'];
            
            $user_detail = query("select * from users where user_id = '$u_id'");
            
            show_error($user_detail);
              
         
            while($row = fetch_obj($user_detail)){
            
                $user_id         = $row['user_id'];
                $user_first_name = $row['user_first_name'];
                $user_last_name  = $row['user_last_name'];
                $user_image      = $row['user_image'];
                $user_about      = $row['user_about'];
                
                 if(empty($row['user_image'])){
                     $user_image = "pop.jpg";  
                 }
                
              }
               
                $user_post = query("select * from posts where post_author_id = '$user_id'");
                $user_project = query("select * from projects where project_author_id = '$user_id'");
                $user_posts = mysqli_num_rows($user_post);
                $user_projects = mysqli_num_rows($user_project);
         
               
           }else{
               direct("index.php");
           }
            
            
            
            
            ?>
      
         <div class="blog-box">
            <div class="user-box">
                
                 <a href='developer.php?dev=$userId'>
                     <img class='user_img' height='80' width='80' src='img_box/frontFiles/<?php  echo("$user_image"); ?>' alt='{$userName}' >
                 </a>
                <h1><?php  echo("$user_first_name $user_last_name"); ?></h1>
                <p><?php  echo("$user_about"); ?>
                
                </p>
                
                   <ul>
                        <li>
                           <a href="developer.php?dev=<?php  echo("$user_id"); ?>">Projects <sup><?php echo("{$user_projects}"); ?></sup></a>
                        </li>
                        <li><a href="author.php?author=<?php  echo("$user_id"); ?>">Posts<sup><?php echo("{$user_posts}"); ?></sup></a></li>
                   </ul>
                
            </div>

         </div>
     
     </div>
		
			<div class="container-fluid third-display-box gallery-box py-4">
		
		  
		  <div class="row">
		  	
	        
	        <?php showDevProject();  ?>
		  	
		  	
		  </div>
		  
		  
		  
		    <div class="row">
	        	<div class="pagination col-lg-12">
	        		<ul>
	                    <?php paginationDev('projects','developer.php?'); ?>
	        			
	        		</ul>
	        	</div>
	        </div>
		
		 </div>
		
		
	</main>

	<!--********************FOOTER PHP***********************-->
 <?php 
    
    include('front/footer.php');
    
    ?>

	<script type='text/javascript' src="js/main.js"></script>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>