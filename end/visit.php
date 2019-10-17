<?php 
include('config.php');


$blog_key = '';
$project_key = '';


//--------------FUNCTION TO INCREASE VIEWS WHEN USERS CLICKS ON GIT OR LIVE SITE LINK;

if(isset($_GET['git'])){
    $git = filterInt($_GET['git']);
    
    $result = query("update projects set project_view_count = project_view_count+1 where project_id = {$git}");
    show_error($result);
    
    $projects = query("select project_git_link from projects where project_id = {$git}");
     show_error($projects);
    while($row= fetch_obj($projects)){
       header("Location: {$row['project_git_link']}"); 
    }   
}

if(isset($_GET['live'])){
    
    $live  = filterInt($_GET['live']);
    $result = query("update projects set project_view_count = project_view_count+1 where project_id = {$live}");
    show_error($result);
    
    $projects = query("select project_live_link from projects where project_id = {$live}");
     show_error($projects);
    while($row= fetch_obj($projects)){
       header("Location: {$row['project_live_link']}"); 
    }
}

//_____________FUNCTION TO ADD LIKE ,VIEWS etc..

function addValues($setVal,$tableName,$idColumn,$colValToInc){
    
    if(isset($_GET[$setVal])){
        $setVal = filterStr($_GET[$setVal]);
        $page = filterStr($_GET['yaw']);
        $directPage = $page.".php";
        $result = query("update {$tableName} set $colValToInc = $colValToInc+1 where {$idColumn} = {$setVal}");
        show_error($result);
        header("Location: ../$directPage"); 
    }
    
}

addValues('like','posts','post_id','post_like_count');
addValues('view','posts','post_id','post_view_count');


//----------------SEARCH OPERATION AREA

function blogSearchOperation(){
    global $blog_key;
    
    if(isset($_POST['blog_search_btn'])){
       $blog_key = filterStr($_POST['blog_search']); 
    }
    
            
     global $per_page;
     global $page;

    if(isset($_GET['page'])){
        $page = filterInt($_GET['page']);
     }else{
         $page = 1;
     }
     if($page =='' || $page== 1){
         $from_page = 0;
     }else{
         $from_page = ($page * $per_page) - $per_page;
     }
    
    $query = "select * from posts where post_title LIKE '%$blog_key%' order by post_id DESC LIMIT {$from_page},{$per_page}";
    $allPostQuery = query($query);
    show_error($allPostQuery);

    
    $query_count = mysqli_num_rows($allPostQuery);
    
    if($query_count == 0 ){
        echo"<div class='col-12 result'>No results found for </br> {$blog_key}.</div>";
    }else{

    while($row = fetch_obj($allPostQuery)){

        //------------------------Formating Date
        
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
                                     <a href='end/visit.php?like={$row['post_id']}&yaw=blog_search'><i class='fa fa-heart'></i><span class='lang-tag'>{$row['post_like_count']}</span></a>
                                       <a href='end/visit.php?view={$row['post_id']}&yaw=blog_search'><i class='fa fa-eye'></i><span class='lang-tag'>
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


function projectSearchOperation(){
    global $project_key;
    
    if(isset($_POST['project_search_btn'])){
       $project_key = filterStr($_POST['project_search']); 
    }
    
            
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
    

    $query = "select * from projects where project_title LIKE '%$project_key%' order by project_id DESC LIMIT {$from_page},{$per_page}";
    $allProjectQuery = query($query);
    
    $query_count = mysqli_num_rows($allProjectQuery);
    show_error($allProjectQuery);
    $newTitle = '';
    
    if($query_count == 0 ){
        echo"<div class='col-12 result'>NO SEARCH RESULT FOUND FOR</br> {$project_key}</div>";
    }else{
        
      while($row = fetch_obj($allProjectQuery)){
    
    $aboutProject = substr($row['project_about'],0,60);
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
        $userName = $userRow['user_username'];
        
    }
    
    $project = "<div class='col-lg-4 col-md-6 col-sm-6 col-xs-12''><div class='gal-container'>
            <div class='gal-image-box'><img src='img_box/projectFiles/{$row['project_image']}' width='100%' alt='{$row['project_title']}'><a    href='reso/project-page.php?page={$row['project_id']}'>
                  <div class='overlay-desc'><span class='desc'>{$aboutProject}.. <i class='fas fa-link'></i> </span></div></a>
	                </div><div class='gal-desc-box'><div class='desc-detail'><a  href='reso/project-page.php?page={$row['project_id']}'>{$newTitle}</a></div>
							<div class='time-lang'>
								<div class='time'>{$userName}</div>
								<div class='lang'>{$techTags}</div>
							</div>
                    <div class='desc-btn'>
                        <a class='git-btn' href='end/visit.php?git={$row['project_id']}'>github <i class='fab fa-github'></i></a>
                        <a  class='visit-btn' href='end/visit.php?live={$row['project_id']}'>visit <i class='fas fa-link'></i></a>
                    </div></div></div></div>";

    echo($project);
    
      }  
         
    }

   
}






?>
