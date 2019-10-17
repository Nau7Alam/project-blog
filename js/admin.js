//ADD ID TO DROPDOWN Element IN SUCH A WAY THAT CLICKABLE DOROPDOWN Element HAS ID EQUAL TO Id OF CLICK ITEM + DROP

function displayItemOnClick(ele){
  var dropElementClass = ele.target.id+"-drop";
    console.log(ele.target.id);   
    document.querySelector('.'+dropElementClass).classList.toggle('item-content-hidden');
    
}
 


//**************FUNCTION TO SHOW PASSWORD

function showPass(){

 var passField = document.querySelector('.password-btn'); 
    if( passField.type === 'password' ){
      passField.type = "text";
    }
    else{
      passField.type = 'password';
    }
}


//Function to add click event to multiple that have same class
function addClickEvent(className){   
  var menu_item_link = document.querySelectorAll(className);
    for( var i=0 ; i<menu_item_link.length ; i++ ){
      menu_item_link[i].addEventListener( 'click', displayItemOnClick );
    }
}

function showAdminMenu(){
    if(!document.querySelector('.admin-side-bar-container').classList.contains('admin-menu-show')){
          document.querySelector('.admin-side-bar-container').classList.remove('admin-menu-hide'); 
          document.querySelector('.admin-side-bar-container').classList.add('admin-menu-show');  

    }else{
         document.querySelector('.admin-side-bar-container').classList.add('admin-menu-hide');  
         document.querySelector('.admin-side-bar-container').classList.remove('admin-menu-show');  

    }
}


//Funtion to add click event for admin menu
function mobileAdminMenu(className){

        document.querySelector(className).addEventListener('click',showAdminMenu);
   
    
}



window.onload = function(){
    
	addClickEvent('.menu-item-link');
	mobileAdminMenu('.admin-menu');    
}

