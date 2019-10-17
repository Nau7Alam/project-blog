	    
       	<div class="col-lg-3 col-md-3 col-sm-4 col-sx-4 admin-side-bar-container">
      		  <div class="admin-side-bar" >
     

					 <div class="side-bar-menu">
					
					 <div class="menu-item">
					        <div class="admin-img-box">
					 	        <img class='admin-img' src="../img_box/frontFiles/<?php echo($_SESSION['user_image']); ?>" title="UserImage" width="100%"  alt="">
					 	    </div>
					 	<div  id='user' class="menu-item-link dropdown-toggle admin-img-container" title="profile options">
					 	          First Admin
					 	</div>
					 	<div class="user-drop menu-dropdown item-content-hidden">
					 		<div class="user-opts"><a href="usr.php?ops=pro"> <i class="fas fa-user"></i>View Profile </a>  </div>
					 		<div class="user-opts"> <a href="usr.php?ops=upd"> <i class="fas fa-cog"></i>Update Profile </a> </div>
					 	</div>
					 </div>
					 
                         <div class="view-button-box">
                                <div  id='' ><a class="show-button" href="user.php">PROJECT &amp; POST</a></div>
                            </div>    
     
					 <div class="menu-item">
					 	<div  id='post' class="menu-item-link dropdown-toggle" title='modify post'><i class="fas fa-scroll" ></i> Post</div>
					 	<div class="post-drop menu-dropdown item-content-hidden">
					 		<div class="post-opts"><a href="create_post.php"> <i class="fas fa-pen"></i> Create Post </a>  </div>
<!--					 		<div class="post-opts"> <a href="update_post.php"> <i class="fas fa-edit"></i> Update Post </a> </div>-->
					 	</div>
					 </div>
					 
					  <div class="menu-item">
					 	<div id='site' class="menu-item-link dropdown-toggle" title="upload projects"><i class="fas fa-code" ></i> Portfolio </div>
					 	<div class="site-drop menu-dropdown item-content-hidden">
					 	    <div class="project-opts"> <a href="upload_project.php"> <i class="fas fa-code"></i>Upload Project</a></div>
<!--					 		<div class="project-opts"> <a href="update_project.php"> <i class="fas fa-code-branch"></i>Update Project</a></div>-->
					 		
					 	</div>
					 </div>
					 
					 </div>	 
				
		    </div>
     		
      	</div>