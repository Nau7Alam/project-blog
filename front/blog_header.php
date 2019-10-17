<header>
	
	
	<nav class='nav-bar'>
	   
	   <div class="navigation-box">
	   	
			<div class="nav-container  nav-left">

				    <div class='brand-name nav-item' >
					   <li><a href="index.php" style='color:white;' class="loop">
					    l<i class="far fa-rotate-90 fa-lg green-loop">8</i>pcode
					    </a></li>
				   </div>

				   <div class='project hide-nav'>
					   <li><a href="project.php">Project</a></li>
				   </div>

				   <div class='blog hide-nav'>
					   <li><a href="blog.php">Blog</a></li>
				   </div>
                
                
				   <div class='about hide-nav'>
					   <li><a href="about.php">About</a></li>
				   </div>
                 
                  
                   <div class='nav-btn'>
					   <li class=''>
					       <i class="bar-btn"> 
							    <span class="fst bar"></span> 
							    <span class="sec bar"></span>
								<span class=" thrd bar"></span> 
					       </i>
					  </li>
				   </div>


		   </div>
		   
		   <div class="nav-center">
				   
				      <div class='search'>
					   <li>
					      <form class="search-form" action="blog_search.php" method="post">
					      
					        <input class='search-box' type="text" name='blog_search' placeholder="Find posts..">
					        <button class='search-button' type="submit" name='blog_search_btn'><i class="fas fa-search"></i></button>
					      
					      </form>
					   </li>
				     </div>
				   
				   
				   
				   </div>

		    <div class="nav-container  nav-right">

           
           <?php
               if(checkSession()){
                   if(empty($_SESSION['user_image'])){
                       $username = "pop.jpg";
                   }else{
                       $username = $_SESSION['user_image'];
                   }
               echo("<div class='nav-item'><li class='account'><a href='user/user.php'><img height='100%' width='100%' class='account-img' src='img_box/frontFiles/{$username}' title='account' ></a></li>
                   
               </div><div class='nav-item'><li><a href='user/logout.php'>LogOut</a></li></div>");
           }else{
              
            echo("<div class='nav-item'><li><a href='user/login.php'>LogIn</a></li></div>
                  <div class='nav-item'><li><a href='user/signup.php'>SignUp</a></li></div>");
    
           } 
               ?>
			   
				   
		   </div>
	   
	   </div>
	   
	   <div class="dropdown-container">
	   	
	   	    <div class="dropdown-box">
	   	           <div >
					    <li class='search'>
					   
					       <form class="search-form" action="blog_search.php" method="post">
					      
					        <input class='search-box' type="text" name='blog_search' placeholder="Find posts..">
					        
					        <button class='search-button' type="submit" name='blog_search_btn'><i class="fas fa-search"></i></button>
					      
					      </form>
					      
					      </li>
				   </div>
  	               
  	            
  	                   <?php
                $menu_options  = "<div class='project drop-item'><li><a href='project.php'>Project</a></li></div><div class='blog  drop-item'>
					   <li><a href='blog.php'>Blog</a></li>";
               if(checkSession()){
                   if(empty($_SESSION['user_image'])){
                       $username = "pop.jpg";
                   }else{
                       $username = $_SESSION['user_image'];
                   }
               echo("<div class='nav-item drop-item'><li class='account'><a  href='user/user.php'><img class='user_img' height='35' width='35' src='img_box/frontFiles/{$username}' title='account' > {$_SESSION['username']}</a></li></div>
               {$menu_options}
				   </div><div class='nav-item drop-item'><li><a href='user/logout.php'>Log Out</a></li></div>");
           }else{
              
            echo("{$menu_options}<div class='nav-item drop-item'><li><a href='user/login.php'>Log In</a></li></div>
                  <div class='nav-item'><li><a href='user/signup.php'>Sign Up</a></li></div>");
    
           } 
               ?>
   	               <div class='about drop-item'>
					   <li><a href="about.php">About</a></li>
				   </div>
				   
	       </div>
	   	
	   </div>
	 
   </nav>
	
</header>

		