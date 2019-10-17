<?php

$per_page = 3;
$page = 1;

//******************************************************* Query Function
function query($query_string){
    global $link;
    
    if(!$link){
        echo("Not Connected");
      }
    return mysqli_query($link,$query_string);
}

//******************************************************* MySql Error

function show_error($result){
    global $link;
    if(!$result){
        echo("Query failed ".mysqli_error($link));
    }
}

//******************************************************* MySql Result 

function fetch_obj($result){
    return mysqli_fetch_assoc($result);
}

//******************************************************* MySql Direction 

function direct($direct_link){
    return header("Location: $direct_link");
}



//******************************************************* MySql Filter 

function filterStr($str){
    $filter_str = filter_var($str,FILTER_SANITIZE_STRING);
    $filter_str = htmlspecialchars($filter_str);
    return   $filter_str;
    
}

function filterInt($str){
    $filter_str = filter_var($str,FILTER_SANITIZE_NUMBER_INT);
    $filter_str = filter_var($filter_str,FILTER_VALIDATE_INT);
    return   $filter_str;
    
}

function filterUrl($str){
    $filter_str = filter_var($str,FILTER_SANITIZE_URL);
    $filter_str = filter_var($filter_str,FILTER_VALIDATE_URL);
    return   $filter_str;
    
}

function filterEmail($str){
    $filter_str = filter_var($str,FILTER_SANITIZE_EMAIL);
    $filter_str = filter_var($filter_str,FILTER_VALIDATE_EMAIL);
    return   $filter_str;
    
}

//****************************************SET MESSAGE SESSION

function message($message){
    if(!empty($message)){
        $_SESSION['message'] = $message;
    }else{
        $_SESSION['message'] = '';
    }
}


//**********************DISPLAY SESSION

function displayMessage(){
    
    if(isset($_SESSION['message'])){
		echo($_SESSION['message']);
		unset($_SESSION['message']);
		$_SESSION['message']=null;
	}
	
}

//************************************************************ PHP FOR THE INDEX PAGE


function showProjectInIndex(){
    
$query = "select * from projects order by project_id DESC LIMIT 6";
$allProjectQuery = query($query);
  
show_error($allProjectQuery);
     $newTitle = '';

while($row = fetch_obj($allProjectQuery)){
    
    $aboutProject = htmlspecialchars_decode(substr($row['project_about'],0,60));
        $usedTech = explode(',',$row['project_tag']);
        $length = count($usedTech);
        $techTags = "";
    
        for($i = 0; $i<$length ;$i++){
           $techTags.=" <span class='lang-tag'>".$usedTech[$i]." </span>";
        }
    
    
    
    if(strlen($row['project_title']) >= 25){
       $str = substr($row['project_title'],0,27);
        $newTitle = $str."...";
    }else{
        $newTitle = $row['project_title']; 
    }
    
// *****   USER SELECT WHILE LOOP
    $userQuery = "select * from users where user_id = '{$row['project_author_id']}'";
    $userResult = query($userQuery);
    show_error($userResult);
    
    
    while($userRow = fetch_obj($userResult)){
        $userName = $userRow['user_first_name'];
        $userImage = $userRow['user_image'];
        $userId = $userRow['user_id'];
        
        if(empty($userRow['user_image'])){
          $userImage = "pop.jpg";  
        }
        
    }
    
    $project = "<div class='col-lg-4 col-md-6 col-sm-6 col-xs-12''><div class='gal-container'>
            <div class='gal-image-box'><img src='img_box/projectFiles/{$row['project_image']}' width='100%' alt='{$row['project_title']}'><a      href='reso/project-page.php?page={$row['project_id']}'>
                  <div class='overlay-desc'><span class='desc'>{$aboutProject}.. <i class='fas fa-link'></i> </span></div></a>
	                </div><div class='gal-desc-box'><div class='desc-detail'><a  href='reso/project-page.php?page={$row['project_id']}'>{$newTitle}</a></div>
							<div class='time-lang'>
								<div class='time'>
								    
                                  <a href='developer.php?dev=$userId'>
                                <img class='user_img' height='35' width='35' src='img_box/frontFiles/{$userImage}' alt='{$userName}' >
                                </a>
                                BY 
                                <a href='developer.php?dev=$userId'>
                                {$userName}
                                </a>
                                
                                </div>
								<div class='lang'>{$techTags}</div>
							</div>
                    <div class='desc-btn'>
                        <a class='git-btn' href='end/visit.php?git={$row['project_id']}'>github <i class='fab fa-github'></i></a>
                        <a  class='visit-btn' href='end/visit.php?live={$row['project_id']}'>visit <i class='fas fa-link'></i></a>
                    </div></div></div></div>";

    echo($project);
    
     }
  }

function showPostInIndex(){
    
$query = "select * from posts order by post_id DESC LIMIT 6";
$allPostQuery = query($query);

show_error($allPostQuery);
    
while($row = fetch_obj($allPostQuery)){
    
        //    formating Date
    $date = date_create($row['post_date']);
    $formatedDate = date_format($date,'F d,Y');
    $postTitle = $row['post_title'];
    $newTitle='';
    
    if(strlen($row['post_title']) >= 25){
       $str = substr($row['post_title'],0,30);
        $newTitle = $str."...";
    }else{
        $newTitle = $row['post_title']; 
    }
     
    
//----------- Quary to find the Category in which post belongs 
    $category = query("select * from post_categories where cat_id ={$row['post_category_id']}");
    show_error($category);
    while($catRow = fetch_obj($category)){
        $postCategory = $catRow['cat_title'];
    }
    
    $post = "<div class='col-lg-4 col-md-6 col-sm-6 col-xs-12'>
	             <div class='post-gal-container'>
	        			<div class='post-gal-image-box'>
	        				<a href='reso/blog-page.php?page={$row['post_id']}'><img src='img_box/postFiles/{$row['post_image']}' width='100%' alt='Picture Coming Soon'></a>
	        				<div class='post-overlay-desc'>
								<span class='post-desc'><a href='reso/category.php?catago={$row['post_category_id']}'>{$postCategory}</a></span>
				              </div>
                     </div>
	        			<div class='post-gal-desc-box'>
                           <div class='post-desc-detail'>
								<a href='reso/blog-page.php?page={$row['post_id']}'>{$newTitle}</a>
							</div>
							<div class='post-time-lang'>
								<div class='time'>{$formatedDate}</div>
								<div class='lang'>
								     <a href='end/visit.php?like={$row['post_id']}&yaw=index'><i class='fa fa-heart'></i><span class='lang-tag'>{$row['post_like_count']}</span></a>
								   <a href='end/visit.php?view={$row['post_id']}&yaw=index'><i class='fa fa-eye'></i><span class='lang-tag'>
                                   {$row['post_view_count']}</span></a>
                                    <i class='fa fa-comment'></i><span class='lang-tag'>{$row['post_comment_count']}</span>
                                  </div>
							</div>
						</div>
	        		</div>
	          </div>";
    
    echo($post);
    
     }
 
}



//************************************************************ PHP FOR THE PROJECT PAGE



function showAllProject(){
    
     global $per_page;
     global $page;

     if(isset($_GET['page'])){
        $page = filterInt($_GET['page']);
    }else{
         $page = 1;
       }
     if($page ==''|| $page== 1){
         $from_page = 0;
     }else{
         $from_page = ($page * $per_page) - $per_page;
     }
    
    
$query = "select * from projects order by project_id DESC LIMIT {$from_page},{$per_page}";
$allProjectQuery = query($query);
  
show_error($allProjectQuery);
     $newTitle = '';

while($row = fetch_obj($allProjectQuery)){
    
        $aboutProject = htmlspecialchars_decode(substr($row['project_about'],0,60));
        $usedTech = explode(',',$row['project_tag']);
        $length = count($usedTech);
        $techTags = "";
    
        for($i = 0; $i<$length ;$i++){
           $techTags.=" <span class='lang-tag'>".$usedTech[$i]." </span>";
        }
    
    if(strlen($row['project_title']) >= 25){
       $str = substr($row['project_title'],0,27);
        $newTitle = $str."...";
    }else{
        $newTitle = $row['project_title']; 
    }
    
// *****   USER SELECT WHILE LOOP
    $userQuery = "select * from users where user_id = '{$row['project_author_id']}'";
    $userResult = query($userQuery);
    show_error($userResult);
    
    while($userRow = fetch_obj($userResult)){
        $userName = $userRow['user_first_name'];
        $userImage = $userRow['user_image'];
        $userId = $userRow['user_id'];
        
        if(empty($userRow['user_image'])){
          $userImage = "pop.jpg";  
        }
            
    }
    
    $project ="<div class='col-lg-4 col-md-6 col-sm-6 col-xs-12''><div class='gal-container'>
               <div class='gal-image-box'><img src='img_box/projectFiles/{$row['project_image']}' width='100%' alt='{$row['project_title']}'><a href='reso/project-page.php?page={$row['project_id']}'>
                  <div class='overlay-desc'><span class='desc'>{$aboutProject}.. <i class='fas fa-link'></i> </span></div></a>
	                </div><div class='gal-desc-box'><div class='desc-detail'><a  href='reso/project-page.php?page={$row['project_id']}'>{$newTitle}</a></div>
							<div class='time-lang'>
								<div class='time'>
                                <a href='developer.php?dev=$userId'>
                                <img class='user_img' height='35' width='35' src='img_box/frontFiles/{$userImage}' alt='{$userName}' >
                                </a>
                                BY 
                                <a href='developer.php?dev=$userId'>
                                {$userName}
                                </a>
                                
                                </div>
								<div class='lang'>{$techTags}</div>
							</div>
                    <div class='desc-btn'>
                        <a class='git-btn' href='end/visit.php?git={$row['project_id']}'>github <i class='fab fa-github'></i></a>
                        <a  class='visit-btn' href='end/visit.php?live={$row['project_id']}'>visit <i class='fas fa-link'></i></a>
                    </div></div></div></div>";

    echo($project);
    
     }
  
}

//************************************************************ PHP FOR THE SHOW PAGE

function showAllPost(){

     global $per_page;
     global $page;

    if(isset($_GET['page'])){
        $page = filterInt($_GET['page']);
     }else{
         $page = 1;
     }
     if($page ==''|| $page== 1){
         $from_page = 0;
     }else{
         $from_page = ($page * $per_page) - $per_page;
     }
    
    
$query = "select * from posts order by post_id DESC LIMIT {$from_page},{$per_page}";
$allPostQuery = query($query);

show_error($allPostQuery);
    

while($row = fetch_obj($allPostQuery)){
    
        //    formating Date
    $date = date_create($row['post_date']);
    $formatedDate = date_format($date,'F d,Y');
    $postTitle = $row['post_title'];
    $newTitle='';
    
    if(strlen($row['post_title']) >= 25){
       $str = substr($row['post_title'],0,30);
        $newTitle = $str."...";
    }else{
        $newTitle = $row['post_title']; 
    }
     
    
//----------- Quary to find the Category in which post belongs 
    $category = query("select * from post_categories where cat_id ={$row['post_category_id']}");
    show_error($category);
    while($catRow = fetch_obj($category)){
        $postCategory = $catRow['cat_title'];
    }
    
    $post = "<div class='col-lg-4 col-md-6 col-sm-6 col-xs-12'>
	             <div class='post-gal-container'>
	        			<div class='post-gal-image-box'>
	        				<a href='reso/blog-page.php?page={$row['post_id']}'><img src='img_box/postFiles/{$row['post_image']}' width='100%' alt='Picture Coming Soon'></a>
	        				<div class='post-overlay-desc'>
								<span class='post-desc'><a href='reso/category.php?catago={$row['post_category_id']}'>{$postCategory}</a></span>
				              </div>
                     </div>
	        			<div class='post-gal-desc-box'>
                           <div class='post-desc-detail'>
								<a href='reso/blog-page.php?page={$row['post_id']}'>{$newTitle}</a>
							</div>
							<div class='post-time-lang'>
								<div class='time'>{$formatedDate}</div>
								<div class='lang'>
								     <a href='end/visit.php?like={$row['post_id']}&yaw=blog'><i class='fa fa-heart'></i><span class='lang-tag'>{$row['post_like_count']}</span></a>
								   <a href='end/visit.php?view={$row['post_id']}&yaw=blog'><i class='fa fa-eye'></i><span class='lang-tag'>
                                   {$row['post_view_count']}</span></a>
                                    <i class='fa fa-comment'></i><span class='lang-tag'>{$row['post_comment_count']}</span>
                                  </div>
							</div>
						</div>
	        		</div>
	          </div>";
    
    echo($post);
    
    
     }


    
}








//************************************************************ PHP FOR THE PROJECT PAGE



function showDevProject(){
    
     global $per_page;
     global $page;

     if(isset($_GET['page'])){
        $page = filterInt($_GET['page']);
     }else{
         $page = 1;
       }
     if($page ==''|| $page== 1){
         $from_page = 0;
     }else{
         $from_page = ($page * $per_page) - $per_page;
     }
    
     if(isset($_GET['dev'])){
        $project_id = filterStr($_GET['dev']);
     }
    
    
$query = "select * from projects where project_author_id = '$project_id' order by project_id DESC LIMIT {$from_page},{$per_page}";
$allProjectQuery = query($query);
  
show_error($allProjectQuery);
     $newTitle = '';

while($row = fetch_obj($allProjectQuery)){
    
    $aboutProject = htmlspecialchars_decode(substr($row['project_about'],0,60));
        $usedTech = explode(',',$row['project_tag']);
        $length = count($usedTech);
        $techTags = "";
    
        for($i = 0; $i<$length ;$i++){
           $techTags.=" <span class='lang-tag'>".$usedTech[$i]." </span>";
        }
    
    if(strlen($row['project_title']) >= 25){
       $str = substr($row['project_title'],0,27);
        $newTitle = $str."...";
    }else{
        $newTitle = $row['project_title']; 
    }
    
// *****   USER SELECT WHILE LOOP
    $userQuery = "select * from users where user_id = '{$row['project_author_id']}'";
    $userResult = query($userQuery);
    show_error($userResult);
    
    while($userRow = fetch_obj($userResult)){
        $userName = $userRow['user_first_name'];
        $userImage = $userRow['user_image'];
        $userId = $userRow['user_id'];
        
        if(empty($userRow['user_image'])){
          $userImage = "pop.jpg";  
        }
    
            
    }
    
    $project ="<div class='col-lg-4 col-md-6 col-sm-6 col-xs-12''><div class='gal-container'>
               <div class='gal-image-box'><img src='img_box/projectFiles/{$row['project_image']}' width='100%' alt='{$row['project_title']}'><a    href='reso/project-page.php?page={$row['project_id']}'>
                  <div class='overlay-desc'><span class='desc'>{$aboutProject}.. <i class='fas fa-link'></i> </span></div></a>
	                </div><div class='gal-desc-box'><div class='desc-detail'><a  href='reso/project-page.php?page={$row['project_id']}'>{$newTitle}</a></div>
							<div class='time-lang'>
								<div class='time'>
                                <a href='developer.php?dev=$userId'>
                                <img class='user_img' height='35' width='35' src='img_box/frontFiles/{$userImage}' alt='{$userName}' >
                                </a>
                                BY 
                                <a href='developer.php?dev=$userId'>
                                {$userName}
                                </a>
                                
                                </div>
								<div class='lang'>{$techTags}</div>
							</div>
                    <div class='desc-btn'>
                        <a class='git-btn' href='end/visit.php?git={$row['project_id']}'>github <i class='fab fa-github'></i></a>
                        <a  class='visit-btn' href='end/visit.php?live={$row['project_id']}'>visit <i class='fas fa-link'></i></a>
                    </div></div></div></div>";

    echo($project);
    
     }
  
}








//---------------------SHOW AUTHOR PAGE POSTS


function showAuthorPost($id){
    
     global $per_page;
     global $page;

    if(isset($_GET['page'])){
        $page = filterInt($_GET['page']);
     }else{
         $page = 1;
     }
     if($page ==''|| $page== 1){
         $from_page = 0;
     }else{
         $from_page = ($page * $per_page) - $per_page;
     }
    

    
$user_id = $id;
$query = "select * from posts where post_author_id = '$user_id' order by post_id DESC LIMIT {$from_page},{$per_page}";

$allPostQuery = query($query);

show_error($allPostQuery);
    
while($row = fetch_obj($allPostQuery)){
    
        //    formating Date
    $date = date_create($row['post_date']);
    $formatedDate = date_format($date,'F d,Y');
    $postTitle = $row['post_title'];
    $newTitle='';
    
    if(strlen($row['post_title']) >= 25){
       $str = substr($row['post_title'],0,30);
        $newTitle = $str."...";
    }else{
        $newTitle = $row['post_title']; 
    }
     
    
//----------- Quary to find the Category in which post belongs 
    $category = query("select * from post_categories where cat_id ={$row['post_category_id']}");
    show_error($category);
    while($catRow = fetch_obj($category)){
        $postCategory = $catRow['cat_title'];
    }
    
    $post = "<div class='col-lg-4 col-md-6 col-sm-6 col-xs-12'>
	             <div class='post-gal-container'>
	        			<div class='post-gal-image-box'>
	        				<a href='reso/blog-page.php?page={$row['post_id']}'><img src='img_box/postFiles/{$row['post_image']}' width='100%' alt='Picture Coming Soon'></a>
	        				<div class='post-overlay-desc'>
								<span class='post-desc'><a href='reso/category.php?catago={$row['post_category_id']}'>{$postCategory}</a></span>
				              </div>
                     </div>
	        			<div class='post-gal-desc-box'>
                           <div class='post-desc-detail'>
								<a href='reso/blog-page.php?page={$row['post_id']}'>{$newTitle}</a>
							</div>
							<div class='post-time-lang'>
								<div class='time'>{$formatedDate}</div>
								<div class='lang'>
								     <a href='end/visit.php?like={$row['post_id']}&yaw=index'><i class='fa fa-heart'></i><span class='lang-tag'>{$row['post_like_count']}</span></a>
								   <a href='end/visit.php?view={$row['post_id']}&yaw=index'><i class='fa fa-eye'></i><span class='lang-tag'>
                                   {$row['post_view_count']}</span></a>
                                    <i class='fa fa-comment'></i><span class='lang-tag'>{$row['post_comment_count']}</span>
                                  </div>
							</div>
						</div>
	        		</div>
	          </div>";
    
    echo($post);
    
     }
 
  

}



///----------------------------------------------SHOW POST ON THE BASIC OF LANGUAGE TYPE


function showTypePost($type){
    
     global $per_page;
     global $page;

    if(isset($_GET['page'])){
        $page = filterInt($_GET['page']);
     }else{
         $page = 1;
     }
     if($page ==''|| $page== 1){
         $from_page = 0;
     }else{
         $from_page = ($page * $per_page) - $per_page;
     }
    

    

    
$lang_type = $type;
$query = "select * from posts where post_tag like '%$lang_type%' order by post_id DESC LIMIT {$from_page},{$per_page}";

$allPostQuery = query($query);

show_error($allPostQuery);
    
while($row = fetch_obj($allPostQuery)){
    
        //    formating Date
    $date = date_create($row['post_date']);
    $formatedDate = date_format($date,'F d,Y');
    $postTitle = $row['post_title'];
    $newTitle='';
    
    if(strlen($row['post_title']) >= 25){
       $str = substr($row['post_title'],0,30);
        $newTitle = $str."...";
    }else{
        $newTitle = $row['post_title']; 
    }
     
    
//----------- Quary to find the Category in which post belongs 
    $category = query("select * from post_categories where cat_id ={$row['post_category_id']}");
    show_error($category);
    while($catRow = fetch_obj($category)){
        $postCategory = $catRow['cat_title'];
    }
    
    $post = "<div class='col-lg-4 col-md-6 col-sm-6 col-xs-12'>
	             <div class='post-gal-container'>
	        			<div class='post-gal-image-box'>
	        				<a href='reso/blog-page.php?page={$row['post_id']}'><img src='img_box/postFiles/{$row['post_image']}' width='100%' alt='Picture Coming Soon'></a>
	        				<div class='post-overlay-desc'>
								<span class='post-desc'><a href='reso/category.php?catago={$row['post_category_id']}'>{$postCategory}</a></span>
				              </div>
                     </div>
	        			<div class='post-gal-desc-box'>
                           <div class='post-desc-detail'>
								<a href='reso/blog-page.php?page={$row['post_id']}'>{$newTitle}</a>
							</div>
							<div class='post-time-lang'>
								<div class='time'>{$formatedDate}</div>
								<div class='lang'>
								     <a href='end/visit.php?like={$row['post_id']}&yaw=index'><i class='fa fa-heart'></i><span class='lang-tag'>{$row['post_like_count']}</span></a>
								   <a href='end/visit.php?view={$row['post_id']}&yaw=index'><i class='fa fa-eye'></i><span class='lang-tag'>
                                   {$row['post_view_count']}</span></a>
                                    <i class='fa fa-comment'></i><span class='lang-tag'>{$row['post_comment_count']}</span>
                                  </div>
							</div>
						</div>
	        		</div>
	          </div>";
    
    echo($post);
    
     }
 
  

}




//************************************************************ PHP FOR THE PROJECT ON THE BASIS OF LANGUAGE TYPE



function showTypeProject($type){
    
    $lang_type = $type;
     global $per_page;
     global $page;

     if(isset($_GET['page'])){
        $page = filterInt($_GET['page']);
     }else{
         $page = 1;
       }
     if($page ==''|| $page== 1){
         $from_page = 0;
     }else{
         $from_page = ($page * $per_page) - $per_page;
     }
    
     if(isset($_GET['dev'])){
        $project_id = filterStr($_GET['dev']);
     }
    
    
$query = "select * from projects where project_tag like '%$lang_type%' order by project_id DESC LIMIT {$from_page},{$per_page}";
$allProjectQuery = query($query);
  
show_error($allProjectQuery);
     $newTitle = '';

while($row = fetch_obj($allProjectQuery)){
    
    $aboutProject = htmlspecialchars_decode(substr($row['project_about'],0,60));
        $usedTech = explode(',',$row['project_tag']);
        $length = count($usedTech);
        $techTags = "";
    
        for($i = 0; $i<$length ;$i++){
           $techTags.=" <span class='lang-tag'>".$usedTech[$i]." </span>";
        }
    
    if(strlen($row['project_title']) >= 25){
       $str = substr($row['project_title'],0,27);
        $newTitle = $str."...";
    }else{
        $newTitle = $row['project_title']; 
    }
    
// *****   USER SELECT WHILE LOOP
    $userQuery = "select * from users where user_id = '{$row['project_author_id']}'";
    $userResult = query($userQuery);
    show_error($userResult);
    
    while($userRow = fetch_obj($userResult)){
        $userName = $userRow['user_first_name'];
        $userImage = $userRow['user_image'];
        $userId = $userRow['user_id'];
        
        if(empty($userRow['user_image'])){
          $userImage = "pop.jpg";  
        }
    
            
    }
    
    $project ="<div class='col-lg-4 col-md-6 col-sm-6 col-xs-12''><div class='gal-container'>
               <div class='gal-image-box'><img src='img_box/projectFiles/{$row['project_image']}' width='100%' alt='{$row['project_title']}'><a    href='reso/project-page.php?page={$row['project_id']}'>
                  <div class='overlay-desc'><span class='desc'>{$aboutProject}.. <i class='fas fa-link'></i> </span></div></a>
	                </div><div class='gal-desc-box'><div class='desc-detail'><a  href='reso/project-page.php?page={$row['project_id']}'>{$newTitle}</a></div>
							<div class='time-lang'>
								<div class='time'>
                                <a href='developer.php?dev=$userId'>
                                <img class='user_img' height='35' width='35' src='img_box/frontFiles/{$userImage}' alt='{$userName}' >
                                </a>
                                BY 
                                <a href='developer.php?dev=$userId'>
                                {$userName}
                                </a>
                                
                                </div>
								<div class='lang'>{$techTags}</div>
							</div>
                    <div class='desc-btn'>
                        <a class='git-btn' href='end/visit.php?git={$row['project_id']}'>github <i class='fab fa-github'></i></a>
                        <a  class='visit-btn' href='end/visit.php?live={$row['project_id']}'>visit <i class='fas fa-link'></i></a>
                    </div></div></div></div>";

    echo($project);
    
     }
  
}










//---------------------------------SHOW POST IN BLOG-PAGE AND RELATED AND POPULAR POSTS 


function showRelatedPost($category_id){
    

$query = "select * from posts where post_category_id = {$category_id} order by post_id DESC LIMIT 4";
$allPostQuery = query($query);

show_error($allPostQuery);
    
$postCategory = '';
while($row = fetch_obj($allPostQuery)){
    

    $newTitle='';
    
    if(strlen($row['post_title']) >= 25){
       $str = substr($row['post_title'],0,30);
        $newTitle = $str."...";
    }else{
        $newTitle = $row['post_title']; 
    }
//----------- Quary to find the Category in which post belongs 
    $category = query("select * from post_categories where cat_id ={$row['post_category_id']}");
    show_error($category);
    while($catRow = fetch_obj($category)){
        $postCategory = $catRow['cat_title'];
    }
    
    $post = "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12'>
	             <div class='post-gal-container'>
	        			<div class='post-page-gal-image-box'>
	        				<a href='../reso/blog-page.php?page={$row['post_id']}'><img src='../img_box/postFiles/{$row['post_image']}' width='100%' alt='Picture Coming Soon'></a>
	        				<div class='post-overlay-desc'>
								<span class='post-desc'><a href='category.php?catago={$row['post_category_id']}''>{$postCategory}</a></span>
				              </div>
                     </div>
	        			<div class='post-gal-desc-box'>
                            <div class='post-desc-detail'>
								<a href='../reso/blog-page.php?page={$row['post_id']}'>{$newTitle}</a>
							</div>
						</div>
	        		</div>
	          </div>";
    
    echo($post);
    
    
     }


    
}



//---------------------------------SHOW POST IN BLOG-PAGE AND RELATED AND POPULAR POSTS 


function showPopularPost(){
    
$query = "select * from posts order by post_view_count DESC LIMIT 4";
$allPostQuery = query($query);

show_error($allPostQuery);
    
while($row = fetch_obj($allPostQuery)){
    

    $newTitle='';
    
    if(strlen($row['post_title']) >= 25){
       $str = substr($row['post_title'],0,30);
        $newTitle = $str."...";
    }else{
        $newTitle = $row['post_title']; 
    }
//----------- Quary to find the Category in which post belongs 
    $category = query("select * from post_categories where cat_id ={$row['post_category_id']}");
    show_error($category);
    while($catRow = fetch_obj($category)){
        $postCategory = $catRow['cat_title'];
    }
    
    $post = "<div class='col-lg-3 col-md-4 col-sm-6 col-xs-12'>
	             <div class='post-gal-container'>
	        			<div class='post-page-gal-image-box'>
	        				<a href='../reso/blog-page.php?page={$row['post_id']}'><img src='../img_box/postFiles/{$row['post_image']}' width='100%' alt='Picture Coming Soon'></a>
	        				<div class='post-overlay-desc'>
								<span class='post-desc'><a href='category.php?catago={$row['post_category_id']}'>{$postCategory}</a></span>
				              </div>
                     </div>
	        			<div class='post-gal-desc-box'>
                           <div class='post-desc-detail'>
								<a href='../reso/blog-page.php?page={$row['post_id']}'>{$newTitle}</a>
							</div>
							
						</div>
	        		</div>
	          </div>";
    
    echo($post);
    
    
     }


    
}




//************************************************************ PHP FOR THE SHOW PAGE

function showCategoryPost(){

 if(isset($_GET['catago'])){
    
     global $per_page;
     global $page;

    if(isset($_GET['page'])){
        $page = filterInt($_GET['page']);
     }else{
         $page = 1;
     }
     if($page ==''|| $page== 1){
         $from_page = 0;
     }else{
         $from_page = ($page * $per_page) - $per_page;
     }
    $catago = filterInt($_GET['catago']);
    
$query = "select * from posts where post_category_id = {$catago} order by post_id DESC LIMIT {$from_page},{$per_page}";
$allPostQuery = query($query);

show_error($allPostQuery);
    

while($row = fetch_obj($allPostQuery)){
    
        //    formating Date
    $date = date_create($row['post_date']);
    $formatedDate = date_format($date,'F d,Y');
    $postTitle = $row['post_title'];
    $newTitle='';
    
    if(strlen($row['post_title']) >= 25){
       $str = substr($row['post_title'],0,35);
        $newTitle = $str."...";
    }else{
        $newTitle = $row['post_title']; 
    }
     
    
//----------- Quary to find the Category in which post belongs 
    $category = query("select * from post_categories where cat_id ={$row['post_category_id']}");
    show_error($category);
    while($catRow = fetch_obj($category)){
        $postCategory = $catRow['cat_title'];
    }
    
    $post = "<div class='col-lg-4 col-md-6 col-sm-6 col-xs-12'>
	             <div class='post-gal-container'>
	        			<div class='post-gal-image-box'>
	        				<a href='blog-page.php?page={$row['post_id']}'><img src='../img_box/postFiles/{$row['post_image']}' width='100%' alt='{$newTitle}'></a>
	        				<div class='post-overlay-desc'>
								<span class='post-desc'><a href='category.php?catago={$row['post_category_id']}'>{$postCategory}</a></span>
				              </div>
                     </div>
	        			<div class='post-gal-desc-box'>
                           <div class='post-desc-detail'>
								<a href='blog-page.php?page={$row['post_id']}'>{$newTitle}</a>
							</div>
							<div class='post-time-lang'>
								<div class='time'>{$formatedDate}</div>
								<div class='lang'>
								     <a href='../end/visit.php?like={$row['post_id']}&yaw=blog'><i class='fa fa-heart'></i><span class='lang-tag'>{$row['post_like_count']}</span></a>
								   <a href='../end/visit.php?view={$row['post_id']}&yaw=blog'><i class='fa fa-eye'></i><span class='lang-tag'>
                                   {$row['post_view_count']}</span></a>
                                    <i class='fa fa-comment'></i><span class='lang-tag'>{$row['post_comment_count']}</span>
                                  </div>
							</div>
						</div>
	        		</div>
	          </div>";
    
    echo($post);
    
     }
     
  }
    
}


//-------------------------------FUNCTIN TO SHOW THE POST CATEGORIES

function showAllCategories($category_page){

    $categories = query("SELECT * from post_categories");
    show_error($categories);
    while($row = fetch_obj($categories)){
        
        echo("<a href='{$category_page}?catago={$row['cat_id']}'><div class='cat-element'> {$row['cat_title']}</div></a>");
    }
    
}




//////////-------------------LOGIN FUNCTION

function loginFunction(){
    
    if(isset($_POST['login'])){
         $db_password='';
        
        $username = filterStr($_POST['username']);
        $password = filterStr($_POST['password']);

        $logQuery = query("select * from users where user_username ='$username'") ;
        show_error($logQuery);
        $userPresent = mysqli_num_rows($logQuery);
        
        while($row = fetch_obj($logQuery)){
           $db_id           =   $row['user_id'];
           $db_first_name   =   $row['user_first_name'];
           $db_last_name    =   $row['user_last_name'];
           $db_image        =   $row['user_image'];
           $db_username     =   $row['user_username'];
           $db_password     =   $row['user_password'];
           $db_role         =   $row['user_role'];
            
       }
          if($username == '' || $password == ''){
              
            message("<h6 class='text-center text-danger'>Please enter your username and password.</h6>");
              
          }else if(password_verify($password,$db_password) and $username == $db_username){

               $_SESSION['username']   = $db_username;
               $_SESSION['first_name'] = $db_first_name;
               $_SESSION['last_name']  = $db_last_name;
               $_SESSION['user_image'] = $db_image;
               $_SESSION['user_id']    = $db_id;
               $_SESSION['role']       = $db_role;

                   direct('user.php');
           }else{
                  message("<h6 class='text-center text-danger'>Incorrect username or password.</h6>");
           }
    } 
}


//-------------------------------SIGNUP FUNCTION

function signupFunction(){
    
    if(isset($_POST['signup'])){
        
      $firstname    =  $_POST['firstname'];
      $lastname     =  $_POST['lastname'];
      $username     =  $_POST['username'];
      $email_id     =  $_POST['email'];
      $password1    =  $_POST['password1'];
      $password2    =  $_POST['password2'];
    
        if($password1 == $password2){
        
         $password1 = password_hash($password1,PASSWORD_BCRYPT,array('cost'=>12));
         
         $query = "insert into users (user_first_name,user_last_name,user_username,user_password,user_email_id)
         values ('{$firstname}','{$lastname}','{$username}','{$password1}','{$email_id}')";    
         $userResult = query($query);
         
         show_error($userResult);
            message("<h6 class='text-center text-danger'>Please login using your username and password.</h6>");
            direct('login.php');
        
    
     }else{
            message("<h6 class='text-center text-danger'>Please enter matching password.</h6>");
        }
       
    }
}

////---------------FUNCTION TO CHECK SESSION
function checkSession(){
    if(isset($_SESSION['username']) and isset( $_SESSION['first_name'])){
        return true;
    
}}


function checkValidUser($directPage){
    if(isset($_SESSION['username']) and isset( $_SESSION['first_name'])){
        return true;
    }else{
        direct($directPage);
    }  
}

//-------------------------------------FUNCTION TO CREATE PAGINATION 


function pagination($table,$page_name){
    global $per_page;
    global $page;
       
  if($page != ''){
    
    $select_items = query("select * from {$table}");
    show_error($select_items);
    $row_count = mysqli_num_rows($select_items);
    
    $total_page = ceil($row_count/$per_page);
    $href_link = $page_name;
    
    for($i = 1;$i <= $total_page; $i++){

        if($i == $page){
             echo("<a href='{$href_link}page={$i}'><li class='page active'>{$i}</li></a>");
        }else{
             echo("<a href='{$href_link}page={$i}'><li class='page'>{$i}</li></a>");
       }
    }
  }
    
}

function paginationDev($table,$page_name){
    global $per_page;
    global $page;
    
     if(isset($_GET['dev'])){
        $project_id = filterStr($_GET['dev']);
     }
       
  if($page !=''){
        $select_items = query("select * from {$table} where project_author_id = '$project_id'");
    show_error($select_items);
    $row_count = mysqli_num_rows($select_items);
    
    $total_page = ceil($row_count/$per_page);
    $href_link = $page_name;
    
    for($i = 1;$i <= $total_page; $i++){

        if($i == $page){
             echo("<a href='{$href_link}page={$i}&dev=$project_id'><li class='page active'>{$i}</li></a>");
        }else{
             echo("<a href='{$href_link}page={$i}&dev=$project_id'><li class='page'>{$i}</li></a>");
       }
    }
  }
    
}

function paginationAuthor($table,$page_name){
    global $per_page;
    global $page;
    
     if(isset($_GET['author'])){
        $post_id = filterStr($_GET['author']);
     }
       
  if($page !=''){
    $select_items = query("select * from {$table} where post_author_id = '$post_id'");
    show_error($select_items);
    $row_count = mysqli_num_rows($select_items);
    
    $total_page = ceil($row_count/$per_page);
    $href_link = $page_name;
    
    for($i = 1;$i <= $total_page; $i++){

        if($i == $page){
             echo("<a href='{$href_link}page={$i}&author=$post_id'><li class='page active'>{$i}</li></a>");
        }else{
             echo("<a href='{$href_link}page={$i}&author=$post_id'><li class='page'>{$i}</li></a>");
       }
    }
  }
    
}

function paginationType($table,$page_name){
    global $per_page;
    global $page;
    
    if($table == 'posts'){
        $tag_table = 'post';
    }else{
        $tag_table = 'project';
    }
    
     if(isset($_GET['type'])){
        $lang_type = filterStr($_GET['type']);
     }
       
  if($page !=''){
        $select_items = query("select * from {$table} where {$tag_table}_tag like '%$lang_type%'");
    show_error($select_items);
    $row_count = mysqli_num_rows($select_items);
    
    $total_page = ceil($row_count/$per_page);
    $href_link = $page_name;
    
    for($i = 1;$i <= $total_page; $i++){

        if($i == $page){
             echo("<a href='{$href_link}page={$i}&type=$lang_type'><li class='page active'>{$i}</li></a>");
        }else{
             echo("<a href='{$href_link}page={$i}&type=$lang_type'><li class='page'>{$i}</li></a>");
       }
    }
  }
    
}








/////////////////////////////////////////////////ADMIN SIDE OF WEB////////////////////////////////////////////////////////
/////////////////////////////////////////////////ADMIN SIDE OF WEB////////////////////////////////////////////////////////
/////////////////////////////////////////////////ADMIN SIDE OF WEB////////////////////////////////////////////////////////


//-----------------------------------SHOW Users POST

function userSidePost(){
    
    
//       <div> <i id='post-id-{$row['post_id']}' class='post-icon fas fa-ellipsis-v fa-lg' title='see post's detail'></i></div>
//
//      	            <div class='post-detail-content post-id-{$row['post_id']}-drop item-content-hidden'>
//
//                        <div class='post-operations text-center'>
//                            
//                            <a class='post-btn' href=''>Comments</a> 
//                            <a class='post-btn'href='user.php?del={$row['post_id']}&author={$_SESSION['user_id']}'  onclick='return $con;' >Delete</a> 
//                            <a class='post-btn' href='update_post.php?ud_post={$row['post_id']}'> Update </a>
//                            
//                        </div>
//                        
//      	            </div>
//    
    
    
    $userPost = query("select * from posts where post_author_id = '{$_SESSION['user_id']}' order by post_id DESC");
    show_error($userPost);
    $con = 'confirm("Do you want to delete the Post?")';
    while($row = fetch_obj($userPost)){
           $date = date_create($row['post_date']);
           $formatedDate = date_format($date,'F d,Y');
        
           if(strlen($row['post_title']) >= 35){
       $str = substr($row['post_title'],0,35);
        $newTitle = $str."...";
    }else{
        $newTitle = $row['post_title']; 
    }
       
             
    $post = "<div class='col-lg-6 col-md-12 col-sm-12 col-xs-12'>
      	        <div class='post-box'>
                     <div class='post-box-content'>
                         
                         <div class='post-img'> 
      	                   <img src='../img_box/postFiles/{$row['post_image']}'  width='100%'  height='100%' alt=''>
      	                 </div>
      	                 <div class='post-title'>
      	                    <h6><a href='../reso/blog-page.php?page={$row['post_id']}'>{$newTitle}</a></h6>
                             <div class='post-date'>
                                <small>{$formatedDate}</small></br>
                                 <small> {$row['post_view_count']} views</small> 
                             </div>
      	                 </div> 
                         
                      <div class='post-operations'>
                            
                        <a class='post-btn post-btn-update' href='update_post.php?ud_post={$row['post_id']}'> Update </a>
                        <a class='post-btn post-btn-delete' href='user.php?del={$row['post_id']}&author={$_SESSION['user_id']}'  onclick='return $con;' >Delete</a> 
                      </div> 
                    </div>
      	            
      	        </div>
      	        
      	    </div>";
            

        
        echo($post);
    }
    
    

}



function userSideProjects(){
    
    $userPost = query("select * from projects where project_author_id = '{$_SESSION['user_id']}' order by project_id DESC");
    show_error($userPost);
    $con = 'confirm("Do you want to delete the Project?")';
    while($row = fetch_obj($userPost)){
           $date = date_create($row['project_date']);
           $formatedDate = date_format($date,'F d,Y');
         
    if(strlen($row['project_title']) >= 45){
       $str = substr($row['project_title'],0,45);
        $newTitle = $str."...";
    }else{
        $newTitle = $row['project_title']; 
    }
        
        
//        <i id='project-id-{$row['project_id']}' class='post-icon fas fa-ellipsis-v fa-lg' title='see post's detail'></i>
         
//      	            <div class='post-detail-content project-id-{$row['project_id']}-drop item-content-hidden'>
//                        <div class='post-operations text-center'>
//                            <a class='post-btn' href=''>Comments</a> 
//                            <a class='post-btn'href='user.php?delpr={$row['project_id']}&authorpr={$_SESSION['user_id']}'  onclick='return $con;' >Delete</a> 
//                           <a class='post-btn' href='update_project.php?ud_project={$row['project_id']}'> Update </a>
//                        </div>
//      	            </div>
            
    $post = "<div class='col-lg-6 col-md-12 col-sm-12 col-xs-12'>
      	        <div class='post-box'>
                     <div class='post-box-content'>
                         <div class='post-img'> 
      	                   <img src='../img_box/projectFiles/{$row['project_image']}'  width='100%'  height='100%' alt=''>
      	                 </div>
      	                 <div  class='post-title'>
      	                 <h6>{$newTitle}</h6>
                             <div class='post-date'>
                             <small>{$formatedDate}</small></br>
                             <small> views {$row['project_view_count']}</small> 
                             </div>
      	                 </div> 
                         
                    <div class='post-operations'>
                       <a class='post-btn post-btn-update' href='update_project.php?ud_project={$row['project_id']}'> Update </a>
                       <a class='post-btn post-btn-delete' href='user.php?delpr={$row['project_id']}&authorpr={$_SESSION['user_id']}' onclick='return $con;'>Delete</a> 
                     </div>  
                             
                        
                     </div>
                     
      	        </div>
      	    </div>";
        
        echo($post);
    }
    
    
 
}






//***************************FUNCTION CREATE A POST.

function create_post(){
    if(isset($_POST['publish'])){
        
        $post_title      =  filterStr($_POST['post_title']);
        $post_cat_id     =  filterStr($_POST['cat_id']);
        $post_body       =  htmlspecialchars($_POST['post_body']);
        $post_tag        =  filterStr($_POST['post_tag']);
        
        $post_image      =  filterStr($_FILES['post_image']['name']);
        $post_image_temp =  filterStr($_FILES['post_image']['tmp_name']);
        
        
        
        move_uploaded_file($post_image_temp,"../img_box/postFiles/{$post_image}");
      
        $post_add = "insert into posts (post_category_id,post_title,post_author_id,post_image,post_content,post_date,post_tag,post_status)
        values ('{$post_cat_id}','{$post_title}','{$_SESSION['user_id']}','{$post_image}','{$post_body}',now(),'{$post_tag}','publish')";
        $post_publish = query($post_add);
        show_error($post_publish);
        message("<h6 class='text-center text-danger'>Your new post was successfully <strong>Published</strong>.</h6>");
        direct("user.php");
        
        
    }else if(isset($_POST['draft'])){
        
        $post_title      =  filterStr($_POST['post_title']);
        $post_cat_id     =  filterStr($_POST['cat_id']);
        $post_body       =  htmlspecialchars($_POST['post_body']);
        $post_tag        =  filterStr($_POST['post_tag']);
        
        $post_image      =  filterStr($_FILES['post_image']['name']);
        $post_image_temp =  filterStr($_FILES['post_image']['tmp_name']);
        
        
        
        move_uploaded_file($post_image_temp,"../img_box/postFiles/{$post_image}");
      
        $post_add = "insert into posts (post_category_id,post_title,post_author_id,post_image,post_content,post_date,post_tag,post_status)
        values ('{$post_cat_id}','{$post_title}','{$_SESSION['user_id']}','{$post_image}','{$post_body}',now(),'{$post_tag}','draft')";
        $post_publish = query($post_add);
        show_error($post_publish);
        message("<h6 class='text-center text-danger'>Your new post was successfully <strong>Drafted</strong>.</h6>");
        direct("user.php");
        
        
    }
}



//***************************FUNCTION UPDATE A POST.

function update_post($p_id){
    if(isset($_POST['publish'])){
     
        $post_title      =  filterStr($_POST['post_title']);
        $post_cat_id     =  filterStr($_POST['cat_id']);
        $post_body       =  $_POST['post_body'];
        $post_tag        =  filterStr($_POST['post_tag']);
        
        $post_image      =  filterStr($_FILES['post_image']['name']);
        $post_image_temp =  filterStr($_FILES['post_image']['tmp_name']);
        
        
          
        if(empty($post_image)){
			
			$fetch_post_detail = query("select post_image from posts where post_id ='$p_id'");
			 show_error($fetch_post_detail);
            while($row = fetch_obj( $fetch_post_detail )){
            
            
			      $post_image = $row['post_image'];	
			}
			
			
		}
        
        
        
        move_uploaded_file($post_image_temp,"../img_box/postFiles/{$post_image}");
      
        $post_add = "update posts set post_category_id={$post_cat_id},post_title='{$post_title}',
                    post_author_id={$_SESSION['user_id']},post_image='{$post_image}',post_content='{$post_body}',
                    post_date = now(),post_tag='{$post_tag}',post_status='publish' where post_id =$p_id";


        $post_publish = query($post_add);
        show_error($post_publish);
        message("<h6 class='text-center text-danger'>Your updated post was successfully <strong>Published</strong>.</h6>");
        direct("user.php");
        
        
    }else if(isset($_POST['draft'])){
        
     
        $post_title      =  filterStr($_POST['post_title']);
        $post_cat_id     =  filterStr($_POST['cat_id']);
        $post_body       =  $_POST['post_body'];
        $post_tag        =  filterStr($_POST['post_tag']);
        
        $post_image      =  filterStr($_FILES['post_image']['name']);
        $post_image_temp =  filterStr($_FILES['post_image']['tmp_name']);
        
        
        if(empty($post_image)){
			
			$fetch_post_detail = query("select post_image from posts where post_id ='$p_id'");
			 show_error($fetch_post_detail);
            while($row = fetch_obj( $fetch_post_detail )){
            
            
			      $post_image = $row['post_image'];	
			}
			
			
		}
        
        
        move_uploaded_file($post_image_temp,"../img_box/postFiles/{$post_image}");
      
        $post_add = "update posts set post_category_id={$post_cat_id},post_title='{$post_title}',
                     post_author_id={$_SESSION['user_id']},post_image='{$post_image}',post_content='{$post_body}',
                     post_date = now(),post_tag='{$post_tag}',post_status='publish' where post_id =$p_id";

        
        $post_publish = query($post_add);
        show_error($post_publish);
        message("<h6 class='text-center text-danger'>Your updated post was successfully <strong>Drafted</strong>.</h6>");
        direct("user.php");
        
        
    }
}

//***************************FUNCTION TO DELETE POST

function delete_port(){
    if(isset($_GET['del'])){
        $post_id = filterStr($_GET['del']);
        $author_id = filterStr($_GET['author']);
        $delete_result = query("delete from posts where post_id = '$post_id' and post_author_id = '$author_id'");
        show_error($delete_result);
        message("<h6 class='text-center text-danger'>POST was successfully <strong>Deleted</strong></h6>");
        direct("user.php");

    }
}





//***************************FUNCTION UPDATE A PROJECT.

function update_project($p_id){
    if(isset($_POST['publish'])){
     
        $project_title      =  filterStr($_POST['project_title']);
        $project_cat_id     =  filterStr($_POST['cat_id']);
        $project_about      =  $_POST['project_body'];
        $project_git_link   =  $_POST['project_git_link'];
        $project_live_link  =  $_POST['project_live_link'];
        $project_tag        =  filterStr($_POST['project_tag']);
        
        $project_image      =  filterStr($_FILES['project_image']['name']);
        $project_image_temp =  filterStr($_FILES['project_image']['tmp_name']);
        
        
          
        if(empty($project_image)){
			
			$fetch_project_detail = query("select project_image from projects where project_id ='$p_id'");
			 show_error($fetch_project_detail);
            while($row = fetch_obj( $fetch_project_detail )){
            
                $project_image = $row['project_image'];	
			}
				
		}
        
        move_uploaded_file($project_image_temp,"../img_box/projectFiles/{$project_image}");
      
        $project_add = "update projects set project_title='{$project_title}',
                    project_author_id={$_SESSION['user_id']},project_image='{$project_image}',project_about='{$project_about}',
                    project_date = now(),project_tag='{$project_tag}',project_git_link='{$project_git_link}',project_live_link='{$project_live_link}' ,project_status='publish' where project_id =$p_id";


        $project_publish = query($project_add);
        show_error($project_publish);
        message("<h6 class='text-center text-danger'>Your updated post was successfully <strong>Published</strong>.</h6>");
        direct("user.php");
        
        
    }else if(isset($_POST['draft'])){
        
     
     
        $project_title      =  filterStr($_POST['project_title']);
        $project_cat_id     =  filterStr($_POST['cat_id']);
        $project_about      =  $_POST['project_body'];
        $project_git_link   =  $_POST['project_git_link'];
        $project_live_link  =  $_POST['project_live_link'];
        $project_tag        =  filterStr($_POST['project_tag']);
        
        $project_image      =  filterStr($_FILES['project_image']['name']);
        $project_image_temp =  filterStr($_FILES['project_image']['tmp_name']);
        
        
          
        if(empty($project_image)){
			
			$fetch_project_detail = query("select project_image from projects where project_id ='$p_id'");
			 show_error($fetch_project_detail);
            while($row = fetch_obj( $fetch_project_detail )){
            
			      $project_image = $row['project_image'];	
			}
		}
        
        
        
        move_uploaded_file($project_image_temp,"../img_box/projectFiles/{$project_image}");
      
        $project_add = "update projects set project_title='{$project_title}',
                    project_author_id={$_SESSION['user_id']},project_image='{$project_image}',project_about='{$project_about}',
                    project_date = now(),project_tag='{$project_tag}',project_git_link='{$project_git_link}',project_live_link='{$project_live_link}' ,project_status='publish' where project_id =$p_id";


        $project_publish = query($project_add);
        show_error($project_publish);
        message("<h6 class='text-center text-danger'>Your updated post was successfully <strong>Published</strong>.</h6>");
        direct("user.php");
        
    }
}





//***************************FUNCTION CREATE A PROJECT.

function create_project(){
    if(isset($_POST['publish'])){
     
        $project_title =  filterStr($_POST['project_title']);
        $project_body =    htmlspecialchars($_POST['project_body']);
        $project_tag =  $_POST['project_tag'];
        $project_git_link =  $_POST['project_git_link'];
        $project_live_link =  $_POST['project_live_link'];
        
        $project_image      =  $_FILES['project_image']['name'];
        $project_image_temp =  $_FILES['project_image']['tmp_name'];
        
        
        move_uploaded_file($project_image_temp,"../img_box/projectFiles/{$project_image}");
      
        $project_add = "insert into projects (project_title,project_author_id,project_image,project_about,project_date,project_tag,project_status,project_git_link,project_live_link)  values('{$project_title}','{$_SESSION['user_id']}','{$project_image}','{$project_body}',now(),'{$project_tag}','publish','{$project_git_link}','{$project_live_link}')";
        $project_publish = query($project_add);
        show_error($project_publish);
        message("<h6 class='text-center text-danger'>Your new project was successfully <strong>Published</strong>.</h6>");
        direct("user.php");
        
        
    }else if(isset($_POST['draft'])){
        
         $project_title =  $_POST['projectt_title'];
        $project_cat_id =  $_POST['cat_id'];
        $project_body   =  htmlspecialchars($_POST['project_body']);
        $project_tag    =  $_POST['project_tag'];
        
        $post_image      =  $_FILES['project_image']['name'];
        $post_image_temp =  $_FILES['project_image']['tmp_name'];
        
        
        move_uploaded_file($post_image_temp,"../img_box/projectFiles/{$project_image}");
      
        $project_add = "insert into projects (project_title,project_author_id,project_image,project_about,project_date,project_tag,project_status,project_git_link,project_live_link)  values('{$project_title}','{$_SESSION['user_id']}','{$project_image}','{$project_body}',now(),'{$project_tag}','draft','{$project_git_link}','{$project_live_link}')";
        $project_publish = query($project_add);
        show_error($project_publish);
        message("<h6 class='text-center text-danger'>Your new project was successfully <strong>Drafted</strong>.</h6>");
        direct("user.php");
        
        
    }
}





//***************************FUNCTION TO DELETE PROJECT

function delete_project(){
    if(isset($_GET['delpr'])){
        $project_id = filterStr($_GET['delpr']);
        $author_id = filterStr($_GET['authorpr']);
        $delete_result = query("delete from projects where project_id = '$project_id' and project_author_id='$author_id'");
        show_error($delete_result);
        message("<h6 class='text-center text-danger'>PROJECT was successfully <strong>Deleted</strong>.</h6>");
        direct("user.php");

    }
}




//PHPMAILER FUNCTION ****************************************************************************************

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;



function contactFunc($direct_page_to){
    


require 'PHPMailer/Exception.php';
require 'PHPMailer/PHPMailer.php';
require 'PHPMailer/SMTP.php';

if(isset($_POST['contact'])){
    
    $user_name = filterStr($_POST['user_name']); 
    $user_email_id = filterEmail($_POST['user_email_id']); 
    $site_mail = SITE_MAIL; 
    $subject = filterStr($_POST['subject']); 
    $message = filterStr($_POST['message']); 
    
 echo("1- {$user_name} 2- {$user_email_id} 3- {$site_mail} 4- {$message} 5- {$subject} ");   

    

$mail = new PHPMailer;

$mail->isSMTP(); 
$mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is deprecated
$mail->SMTPAuth = true;
$mail->Username = SMTP_EMAIL; // email
$mail->Password = SMTP_PASS; // password
$mail->setFrom($user_email_id, $user_name); // From email and name
$mail->addAddress($site_mail); // to email and name
$mail->Subject = $subject;
$mail->msgHTML($message); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
$mail->AltBody = 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

if(!$mail->send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
//    echo "Message sent!";
}

   direct($direct_page_to);
    
    
    
}
    
}

































