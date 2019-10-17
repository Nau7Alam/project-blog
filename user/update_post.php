<?php include('../end/config.php');  ?>

<!DOCTYPE html>
<html lang="en">

<!-------------------- <head> FOR CREATEION PAGE------------------->

<?php include("back/post-project-head.php"); ?>

<body>
	

<!--------------------HEADER FOR CREATEION PAGE------------------->

<?php include('back/create_page_header.php'); ?>
    
    	<?php  if(checkValidUser("login.php")){ ?>

	<main class="main-body">
		
		    
<!------------------CREATE SIDEBAR PHP------------------>
	<?php include("back/create_sidebar.php"); ?>
     
     
      
      <div class="row">
    
   
           <div class="col-lg-3 col-md-3 col-sm-4 col-sx-4"></div> <!-- div behind the admin bar -->
      	  	
      	  	
      	<div class="col-lg-9 col-md-9 col-sm-8 col-sx-12 admin-main-bar-container">
             <?php
                      
                                               
                        if(isset($_GET['ud_post'])){
                           $ud_id = $_GET['ud_post'];
                            
                            $fetch_post_detail = query("select * from posts where post_id = '$ud_id'");
                            show_error($fetch_post_detail);
                            while($row = fetch_obj( $fetch_post_detail )){
                               
                                $post_title   = $row['post_title'];
                                $post_image   = $row['post_image'];
                                $post_content = $row['post_content'];
                                $post_cat_id  = $row['post_category_id'];
                                $post_tag     = $row['post_tag'];
                               
                                 $_SESSION['post_id']     = $row['post_id'];
                            }
                          }
                                    
                         update_post($_SESSION['post_id']);
                                               
            ?>
            
            
            
            
      	
            <div class="create-post-continer col-lg-10">
        
                <h2 class="text-success">UPDATE POST</h2>
            <form action="update_post.php" class="" method="post" enctype="multipart/form-data">

             <div class="update-img col-md-6 col-sm-10 col-xs-12">
                 
                 <img src="../img_box/postFiles/<?php echo("$post_image"); ?>" width="100%" alt="<?php echo("$post_image"); ?>" class="ud-img">
                 
             </div>
            
             <div class="from-group ">
             
             <label for="title">Post Title *</label>
             <input type="text" class="form-control" id="title" placeholder='Title of the post..' value="<?php echo("$post_title"); ?>" name='post_title' required>
             </div>
             
             <div class="custom-file col-lg-6 col-md-10 col-sm-12  my-3">
             
             <label for="image" class='custom-file-label'><?php echo("$post_image"); ?>.</label>
             
            
             <input type="file" class="custom-file-input" id="image" placeholder='Select an image please' value="<?php echo("$post_image"); ?>" name='post_image'>
             
<!--           Assigning old immage as updated image for the post-->
             
             
             </div>
             
             <div class="from-group col-lg-10">
             
             <label for="categories" >Post Categorys *</label>
                <small class="instruction"><br>Select the category your post will be most suited.</small>
                 <select class="form-control" name='cat_id'  id="categories" required>
                   <?php 

                         $get_categories = query("select * from post_categories");
                         show_error($get_categories);
                         while($row = fetch_obj($get_categories)){
                             echo("<option value='{$row['cat_id']}'> {$row['cat_title']}</option>");
                         }
                     
                     ?>
                     
                 </select>
             </div>
           
           
            <div class="my-3">
             
             
             <label for="tags">Body of the post *</label>
             <small class="instruction"><br>Please select text and use options to modify text and add links in the fields</small>
             <textarea name="post_body" class="editable myText" id=""  cols="30" rows="10">
             <?php echo("$post_content"); ?>
             </textarea>
            
             </div>
             
             <div class="from-group">
             
             <label for="tags">Enter tags related to post *</label>
              <small class="instruction"><br>Tags must be saperated by a coma "," for better browser support. (eg->web design, front end,)</small>
             <input type="text" class="myTxt form-control" id="tags" name='post_tag' value='<?php echo("$post_tag"); ?>' placeholder='Enter related tags' required>
             </div>
             
             <div class="create_post_btn">
                 <div>
                       <button type="submit" name='draft' class="btn btn-block btn-primary">Draft</button>  
                 </div>
                 <div>
                      <button type="submit" name='publish' class="btn btn-block btn-success">Publish</button>
                 </div>
             </div>
           
           
            </form>

            </div>

      	</div>
      	      	
      </div>

	</main>


	<script type='text/javascript' src="../js/main.js"></script>
	<script type='text/javascript' src="../js/admin.js"></script>
	<script type='text/javascript' src="../js/jquery-3.3.1.min.js"></script>


<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    
  var editor = new MediumEditor('.editable', {
   
       placeholder: {
        /* This example includes the default options for placeholder,
           if nothing is passed this is what it used */
        text: 'Body of the Post',
        hideOnClick: true
    }
      
});
    
    
 </script>

<script>
	    
        $('.custom-file-input').on('change',function(){var fileName = $(this).val().split('\\').pop();
        $(this).siblings(".custom-file-label").addClass('selected').html(fileName);});
        
</script>


	<?php  } ?>
</body>
</html>