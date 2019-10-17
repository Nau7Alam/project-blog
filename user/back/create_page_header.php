
<header>
	
	
	<nav class='nav-bar'>
	   
	   <div class="navigation-box">
	   	
			<div class="nav-container  nav-left">

				    <div class='brand-name nav-item' >
					   <li><a href="../index.php" style='color:white;' class="loop">
					    l<i class="far fa-rotate-90 fa-lg green-loop">8</i>pcode
					    </a></li>
				   </div>

				   
				   
				  
				   <div class='project hide-nav'>
					   <li><a href="../project.php">Project</a></li>
				  
				    </div>

				   <div class='blog hide-nav'>
					   <li><a href="../blog.php">Blog</a></li>
				   </div>
                  <div class='about hide-nav'>
					   <li><a href="../about.php" >About</a></li>
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
					   
					      <form class="search-form" action="../project_search.php" method="post">
					      
					        <input class='search-box' type="text" name='project_search' placeholder="Find projects..">
					        
					        <button class='search-button' type="submit" name='project_search_btn'><i class="fas fa-search"></i></button>
					      
					      </form>
					      
					      </li>
				     </div>
				   
				   </div>

		   <div class="nav-container  nav-right">
                  
				   
				   
				     <?php
               if(checkSession()){

               echo("<div class='nav-item'><li><a href='logout.php'>LogOut</a></li></div>");
           }
                 
    
            
               ?>
			
		   </div>
	   
	   	
	   </div>
	   
	   <div class="dropdown-container">
	   	
	   	    <div class="dropdown-box">
	   	           
	   	           <div >
					    <li class='search'>
					   
					      <form class="search-form" action="">
					      
					        <input class='search-box' type="text" placeholder="Search post..">
					        
					        <button class='search-button' type="submit" ><i class="fas fa-search"></i></button>
					      
					      </form>
					      
					      </li>
				   </div>
  	               
  	              
   	            
  	               <div class='project drop-item'>
					   <li><a href="../project.php">Project</a></li>
				   </div>
				
				   <div class='blog  drop-item'>
					   <li><a href="../blog.php">Blog</a></li>
				   </div>
				   
  	               
   	               <?php
               if(checkSession()){

               echo("<div class='nav-item drop-item'><li><a href='logout.php'>Log Out</a></li></div>");
           }
                 
               ?>
   	           
   	           
	   	           <div class='about drop-item'>
					   <li><a href="../about.php">About</a></li>
				   </div>
				   
				  
	   	
	       </div>
	   	
	   </div>
	   
	
	
   </nav>
	
</header>

		