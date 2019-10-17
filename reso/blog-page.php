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
        
        $post_category_id='';
        $post_author_id='';
       
        if(isset($_GET['page'])){
            
         $result = query("update posts set post_view_count = post_view_count+1 where post_id = {$_GET['page']}");
         show_error($result);
            
        $blog_page = query("select * from posts where post_id = {$_GET['page']}");
            show_error($blog_page);
        $post_author = '';
         
        while($row = fetch_obj($blog_page)){
        
         $post_title     = $row['post_title'];
         $post_author_id = $row['post_author_id'];
         $post_image     = $row['post_image'];
         $post_content   = htmlspecialchars_decode($row['post_content']);
         $post_date      = $row['post_date'];
         $post_title     = $row['post_title'];
         $post_category_id  = $row['post_category_id'];
         $post_tag    = $row['post_tag'];
            
           $userResult = query("select * from users where user_id = {$post_author_id}");
            show_error($userResult);
            while($userRow = fetch_obj($userResult)){
                $post_author = $userRow['user_first_name'].' '.$userRow['user_last_name'];
                 $userImage = $userRow['user_image'];

                if(empty($userRow['user_image'])){
                  $userImage = "pop.jpg";  
                }

            }
        
        
        ?>
     
      <div class="container-fluid first-display-box">
            <div class="row blog-page-head">
		     
					<div  class='col-md-12'>
					     <h1 class ='blog-page-h2'><?php echo($post_title); ?>   </h1>
                         <span class="author"><i>Published By</i> -
                               <img class='user_img' height='35' width='35' src='../img_box/frontFiles/<?php echo($userImage); ?>' alt=' <?php echo($post_author); ?>' >
                               
                <a class="author" href="../author.php?author=<?php echo($post_author_id); ?>"> <?php echo($post_author); ?></a>

                               
                               </span>
                                  <br>
						 <small>Date - <date> <?php
            
                        $date = date_create($row['post_date']);
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
                                    <img src="../img_box/postFiles/<?php echo($post_image); ?>" alt="">
                                    <figcaption></figcaption>
                                </figure>
                            </div>	

                    
						<div class="story-content">
						    <?php echo($post_content); ?>
						</div>
                       
                        <div>
                            <a class="more-post" href="../author.php?author=<?php echo($post_author_id); ?>"> author's other posts</a>
                        </div>

				       <article class="tag-box">
				       	
                        <?php
                        $tags = explode(',',$post_tag);
            
                        foreach ($tags as $tag){
                         print("<span class='tag-value'><a href='../tpost.php?type=$tag'>$tag</a></span>");
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
		 	
		   <h5>Related Posts</h5>
		 	
		 </div>  
		
		   <div class="row">
	        
	          <?php  showRelatedPost($post_category_id); ?>
	        
	      </div>
		  
		  
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