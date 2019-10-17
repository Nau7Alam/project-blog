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
		
		<div class="">
	
		    
<!------------------CREATE SIDEBAR PHP------------------>
	<?php include("back/create_sidebar.php"); ?>
       
      <div class="row">
    
        <div class="col-lg-3 col-md-3 col-sm-4 col-sx-4"></div> <!-- div behind the admin bar -->
      	 <?php create_project(); ?>
      	  	
      	  <div class="col-lg-9 col-md-9 col-sm-8 col-sx-12 admin-main-bar-container">
      	
            <div class="create-post-continer col-lg-10">

            <h2 class="text-success">UPLOAD PROJECT</h2>
      
            <form action="upload_project.php" class="" method="post" enctype="multipart/form-data">

             <div class="from-group ">
                 <label for="title">Project Title*</label>
                 <input type="text" class="form-control" id="title" placeholder='Title of the project..' name='project_title' required>
             </div>
             
             <div class="custom-file col-lg-6 col-md-10 col-sm-12  my-3">
                 <label for="image" class='custom-file-label'> Select project's image or screenshort*</label>
                 <input type="file" class="custom-file-input" id="image" placeholder='Select an Image please' name='project_image' required>
             </div>
             
             <div class="from-group  my-2">
             
                 <label for="git_link">Github Link *</label>
                 <input type="url" class="form-control" id="git_link" placeholder='link to github repository' name='project_git_link' required>
             </div>
             
             <div class="from-group my-2">
             
                 <label for="live_link">Live project link *</label>
                 <input type="url" class="form-control" id='live_link' placeholder='link to live project' name='project_live_link' required>
            </div>
           
             <div class="my-3">
             
             <label for="tags">About the project * </label>
             <small class='instruction'><br>Please select text and use options to style text and add links in the fields</small>
             <textarea name="project_body" class="editable myProject" id="" cols="30" rows="10">
             </textarea>
            
             </div>
             
             <div class="from-group">
             
             <label for="tags">Enter tags related to project *</label>
             <input type="text" class="myTxt form-control" id="tags" name='project_tag' placeholder='Enter related tags' required>
             </div>
             
             <div class="create_post_btn">
                 <div>
                       <button type="submit" name='draft' class="btn btn-block btn-primary">Draft</button>  
                 </div>
                 <div>
                      <button type="submit" name="publish" class="btn btn-block btn-success">Publish</button>
                 </div>
             </div>
           
             </form>

            </div>
          </div>
      	 </div>
       </div>
	
	</main>
	
	
	<?php } ?>

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
        text: 'Description of the project...',
        hideOnClick: true
    }
      
});
    
    
    </script>

    <script>
	    
        $('.custom-file-input').on('change',function(){var fileName = $(this).val().split('\\').pop();
        $(this).siblings(".custom-file-label").addClass('selected').html(fileName);});
        
        
	</script>
</body>
</html>