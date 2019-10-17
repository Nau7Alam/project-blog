<?php include('end/config.php');  ?>



<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<meta name='viewport' content="width=device-width,maximum-scale=1">
    <title>Portfolio Site</title>
    
    
<!--------------------------------BOOTSTRAP--------------------->

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    
    
<!-------------------    STYLE CSS------------------>
  
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="fontawesome/css/all.css">
	<link rel="stylesheet" href="css/ghost.css">
	
<!--------	Fonts--------->
	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css?family=Lora" rel="stylesheet">



</head>

<body>

<!-------------------HEADER PHP--------------->
<?PHP include("front/project_header.php"); ?>

	<main class="main-body">
		

      <div class="first-display-box">
              
              <?PHP include("front/dots.php"); ?>

              
              <div class="ground-container">
			
                <div class="ground-intro">

                        <div class="ground-hello">
                        <a href="index.php" style='color:white;' class="loop">l<i class="far fa-rotate-90 fa-lg green-loop-base-main">8</i>pcode.in
					    </a></div>
                    <div class="ground-work"> loopcode is platform for Front-End &amp; Back-End Web Developers.</div>
                        <div class="ground-i">Upload Websites and Posts here.</div>
                        
                        <div class="ground-more">
                           <a class="" href="user/user.php">
                                <div class="contact">Upload Project</div>
                                <div class="ground-more-link">
                                <div class="ground-more-inner"></div>
                                </div>
                            </a>
                        </div>
                </div>
   
			
			</div>
			  
		</div>
		
		
			<div class="container-fluid third-display-box gallery-box py-4">
		
		   <div class="row ">
		  <div  class='second-display-desc col-md-12 text-light'>
						<h1 class='font-weight-light text-left-align' style='color:#40a9f3;'>PROJECTS</h1>
					</div>
		    </div>
		  
		  <div class="row">
<!-------------------------PROJECT ITEMS---------------------->
	        <?php  showProjectInIndex();  ?>
	        
	         	
		  </div>
		        <div class="row">
	        	       <div class="know-more text-center move-more">
                             <span class="resume-more "  >
                                   <p class="resume-more-link">
                                        <a class="resume-link" href="project.php">See more</a>
                                         <span class="resume-more-inner"></span>
                                   </p>
                              </span>
                        </div>
	        	   </div>
		
		 </div>
		 
		 
		 <div class="blog-page-box">
			
			
			<div class="container-fluid third-display-box post-gallery-box py-4">
		
        <div class="row ">
					<div  class='second-display-desc col-md-12 text-light'>
						<h1 class='font-weight-light text-left-align' style='color:#40a9f3;'>TECH BLOG</h1>
					</div>

		  </div>
		   
		
		   <div class="row">
	        
	  <!-------------------------POST ITEMS---------------------->
	        
	         <?php  showPostInIndex();  ?>
	        
	      	
		  </div>
		  
		   <div class="row">
                 <div class="know-more text-center move-more">
                         <span class="resume-more "  >
                               <p class="resume-more-link">
                                    <a class="resume-link" href="blog.php">See more</a>
                                     <span class="resume-more-inner"></span>
                               </p>
                        </span>
                 </div>
	        </div>
		
		 </div>
		
		</div>
		
		
		
<!---------------------	INDEX ABOUT ME PAGE ------------------->
<?php include('front/index_about_me.php'); ?>
				
<!--******************SKILL PHP**********************-->
		
<?php
//        include("front/skill.php");
?>
		
<!-------------------PHP TESTAMONY PHP------------------->

<?php
//        include("front/testamony.php");
?>
				
<!---------------------CONTACT FORM PHP-------------------->
<?php contactFunc("index.php");  ?>
<?php include("front/contact-form.php"); ?>
		
		
	</main>

<!--********************FOOTER PHP***********************-->
 <?php include('front/footer.php'); ?>


<script type='text/javascript' src="js/main.js"></script>
<!--<script type='text/javascript' src="js/slide.js"></script>-->
	
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	



	
</body>
</html>