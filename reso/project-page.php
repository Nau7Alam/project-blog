<?php include('../end/config.php');  ?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	
	<meta name='viewport' content="width=device-width,maximum-scale=1">
    <title>Portfolio Site</title>
    
<!-------------------    STYLE CSS------------------>
    
	<link rel="stylesheet" href="../css/bootstrap.min.css">
	<link rel="stylesheet" href="../css/main.css">
	<link rel="stylesheet" href="../fontawesome/css/all.css">
	<link rel="stylesheet" href="../css/ghost.css">
	<link rel="stylesheet" href="../css/sec.css">
	
<!--------	Fonts--------->
	<link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans" rel="stylesheet">

</head>

<body>

  <?PHP include("../front/reso_header.php"); ?>
   
    <main class="main-body">
      
       <?php 
        
        $project_id=$_GET['page'];
        $project_author_id='';
       
        if(isset($_GET['page'])){
            
         $result = query("update projects set project_view_count = project_view_count+1 where project_id = {$_GET['page']}");
         show_error($result);
            
        $blog_page = query("select * from projects where project_id = {$_GET['page']}");
            show_error($blog_page);
        $project_author = '';
         
        while($row = fetch_obj($blog_page)){
        
         $project_title     = $row['project_title'];
         $project_author_id = $row['project_author_id'];
         $project_image     = $row['project_image'];
         $project_about     = htmlspecialchars_decode($row['project_about']);
         $project_date      = $row['project_date'];
         $project_title     = $row['project_title'];
         $project_tag    = $row['project_tag'];
            
           $userResult = query("select * from users where user_id = {$project_author_id}");
            show_error($userResult);
            while($userRow = fetch_obj($userResult)){
                $project_author = $userRow['user_first_name'].' '.$userRow['user_last_name'];
                 $userImage = $userRow['user_image'];

                if(empty($userRow['user_image'])){
                  $userImage = "pop.jpg";  
                }

            }
        
        
        ?>
     
      <div class="container-fluid first-display-box">
            <div class="row blog-page-head">
		     
					<div  class='col-md-12'>
					     <h1 class ='blog-page-h2'><?php echo($project_title); ?>   </h1>
                         <span class="author"><i>Published By</i> -
                               <img class='user_img' height='35' width='35' src='../img_box/frontFiles/<?php echo($userImage); ?>' alt=' <?php echo($project_author); ?>' >
                               
                <a class="author" href="../author.php?author=<?php echo($project_author_id); ?>"> <?php echo($project_author); ?></a>

                               
                               </span>
                                  <br>
						<small> <date>Date -  <?php
            
                        $date = date_create($row['project_date']);
                         $formatedDate = date_format($date,'F d,Y');
                         echo($formatedDate);
                              
                              ?></date></small>
                              
                    </div>
            </div>
     
            <div class="ghost ghost1"></div><div class="ghost ghost2"></div><div class="ghost ghost3"></div><div class="ghost ghost4"></div><div class="ghost ghost5"></div><div class="ghost ghost6"></div><div class="ghost ghost7"></div><div class="ghost ghost8"></div><div class="ghost ghost9"></div><div class="ghost ghost10"></div><div class="ghost ghost11"></div><div class="ghost ghost12"></div><div class="ghost ghost13"></div><div class="ghost ghost14"></div><div class="ghost ghost15"></div><div class="ghost ghost16"></div><div class="ghost ghost17"></div><div class="ghost ghost18"></div><div class="ghost ghost19"></div><div class="ghost ghost20"></div>
	
		</div>
		
		
		
		<div class="container-fluid blog-page-box">
		
        <div class="row" style="padding-top: 0;margin-top: 0px;">
			
			
				<div class="col-lg-8 col-md-12 col-sm-12 blog-page-content">

					<div class="page-container">




						<div class="story">
                            <div class="blog-page-img">
                                <figure>
                                   <a  href='../end/visit.php?live=<?php echo($project_author_id); ?>'>
                                     <img src="../img_box/projectFiles/<?php echo($project_image); ?>" alt="">
                                   </a>
                                    <figcaption></figcaption>
                                </figure>
                            </div>	

                    
						<div class="story-content">
						    <?php echo($project_about); ?>
						</div>
                      
                          <div class="col-lg-7 col-md-8 col-sm-6 col-xs-12" style="padding:15px 0px;">


                            <a class='git-btn' href='../end/visit.php?git=<?php echo($project_author_id); ?>'>get code <i class='fab fa-github'></i></a>
                            <a  class='visit-btn' href='../end/visit.php?live=<?php echo($project_author_id); ?>'>visit <i class='fas fa-link'></i></a>


                          </div>
                      
                        <div>
                            <a class="more-post" href="../developer.php?dev=<?php echo($project_author_id); ?>"> author's other projects</a>
                        </div>

				       <article class="tag-box">
				       	
                        <?php
                        $tags = explode(',',$project_tag);
            
                        foreach ($tags as $tag){
                         print("<span class='tag-value'><a href='../tproject.php?type=$tag'>$tag</a></span>");
                            }
                           
                         ?>
				          				       	
				       </article>
						</div>
				       
				
						
					</div>
                    
                    <?php } } ?>
				        
				</div>
				
				
			   
				<div class="col-md-4 col-sm-12 blog-page-type">

						<div class="blog-about-section">

								   <h4 class='font-weight-light text-center type-head' style='padding:5px 0;'>
										ABOUT ME
										</h4>

										<p class='py-3'>
										I design &amp; Build Digital Experiences Your Audience can Love and Enjoy.
										</p>

										<p class="blog-about-p ">
										I am a creative and passionate Full Stack Web Developer form Dehradoon, India. I build interactive web experience that brings Happiness and Ease in the life of the user.
										</p>

										<p class="blog-about-p">

											I look forward to share my creativity and dedication. <br>
											<span class='text-primary'>Lets build something great together.</span>

										</p>


								          <div class="know-more text-center">
								             <span class="resume-more "  >
                                                   <p class="resume-more-link">
                                                        <a class="resume-link" href="../about.html">Know more</a>
                                                         <span class="resume-more-inner"></span>
                                                   </p>
											</span>

										  </div>

						   </div>

							<div class="type-container">


							 </div>




				</div>
				
				
				
	</div>
		
		
			<div class="container-fluid third-display-box post-gallery-box py-4">
		
		  
		   <div class="row">
		 	
		   <h5>Popular Posts</h5>
		 	
		   </div>  
		
		   <div class="row">
	        
              <?php  showPopularPost(); ?>
		  	
		   </div>
		
		
		
		 </div>
			
</div>
			<div class="category-box">
           <div class="row">
				<div class=" col-lg-12">
					<h5>CATEGORIES</h5>
				</div>
	        	
	        	<div class="col-lg-12">
	        		<?php showAllCategories('category.php'); ?>	
	        	</div>
	        </div>
	    </div>
		
		
	</main>

 <?php 
    
    include('reso_footer.php');
    
    ?>

	<script type='text/javascript' src="../js/main.js"></script>

</body>
</html>