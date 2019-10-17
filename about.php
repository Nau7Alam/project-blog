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
      
         <div class="blog-box">
            <div class="ground-hello" >ABOUT ME.</div>

         </div>
     
        </div>
		
				
		<div class="container-fluid second-display-box py-4">
		
			<div class="row">
			    
				<div class="col-md-5 col-xs-12 my-box">
					
					<div class="my-img">
						
						<img src="img_box/frontFiles/naushad-1.jpg" width="100%" alt="">
					</div>
				</div>
         			
				<div class="col-md-7 col-xs-12">
					<h2 class='font-weight-light text-center' style='color:#40a9f3;'>Hi. <br>I am Naushad Alam</h2>


					<p class='display-desc'>
					I design &amp; Build Digital Experiences Your Audience can Love and Enjoy.
					</p>
					
					<p class="about-p font-weight-light">
						   I am Full Stack Web Developer and also design Web Applications. I have created various websites / web applications ( Please view my <a href="project.php" style='color:#40a9f3;'>project page</a>, if not done yet <i class="fas fa-smile fa-lg" style='color:yellow;'></i> ). I like challenges of creating complex applications which can perform an array of functions.
						   I am a final year Computer Science Engineering student from Dehradoon, India.
					
					</p>
					
					<p class="about-p font-weight-light">
						
						During my studies I learned a lot about Programming , Computers , Operating Systems, Databases and much more and find ways to use this skills while creating web applications.
						
					</p>
					
					<p class="about-p font-weight-light">
						I am a very passionate about Web Development and  I build interactive web applications that have great UI as well as functionality and use some of the latest technologies to do so.
					</p>
					
					<p class="about-p">
						I look forward to working with Brands and Individuals and build somthing great together. <br>
					</p>
					
					<h5 class='font-weight-light' > <a href="#contact" style='color:#40a9f3;'>Get in touch!</a></h5>
					
					  <div class='nav-item'>
						<li class="text-center " id='resume-li' style='margin: 0; padding:0px;list-style:none;'>
							  <span class="resume-more"  >
									   <p class="resume-more-link">
									        <a class="resume-link" href="">Resume</a>
											 <span class="resume-more-inner"></span>
								       </p>
							</span>
						</li>
				   </div>
                </div>
			</div>
		</div>
		
				
<!--******************		SKILL PHP    **********************-->
		
<?php  include("front/skill.php");   ?>

	
		

		
<!---------------------		CONTACT FORM PHP         --------------->
    
       <?php contactFunc("about.php");  ?>
    
		<?php include("front/contact-form.php"); ?>
		
	</main>

<!-----------------FOOTER PHP------------>

 <?php include('front/footer.php'); ?>

	<script type='text/javascript' src="js/main.js"></script>
	
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>