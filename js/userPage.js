//SshowMainProjectBox() for display and hidding of the all post and project alternatively
function showMainProjectBox(){
        document.querySelector(".post-container").classList.toggle('item-content-hidden');
        document.querySelector('.post-button').onclick = function(){
        document.querySelector(".post-container").classList.remove('item-content-hidden');
        document.querySelector(".project-container").classList.add('item-content-hidden'); 
        document.querySelector('.admin-side-bar-container').classList.remove('admin-menu-show'); 
        document.querySelector('.admin-side-bar-container').classList.add('admin-menu-hide'); 

    }
    
     document.querySelector('.project-button').onclick = function(){
        document.querySelector(".project-container").classList.remove('item-content-hidden');
        document.querySelector(".post-container").classList.add('item-content-hidden');
        document.querySelector('.admin-side-bar-container').classList.add('admin-menu-hide'); 
        document.querySelector('.admin-side-bar-container').classList.remove('admin-menu-show'); 
        document.querySelector('.admin-side-bar-container').classList.add('admin-menu-hide'); 

    
    }
     
}

    showMainProjectBox();
    
