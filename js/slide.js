

var ind = 0;

var slide_img = document.querySelectorAll('.slide-div');


function slideImgSet(){
	
	slide_img[ind].classList.add('activeSlide');
	
	for(var i=0;i<slide_img.length;i++){
		
		if(i==ind){
			continue;
		}
		slide_img[i].classList.remove('activeSlide');
	}
	
	
	ind++;
	if( ind >= slide_img.length){
		ind=0;
	}

}


setInterval(slideImgSet,5000);



window.onload = function(){
    	document.querySelector('.ground-intro').classList.remove('ground-intro-size-inc');
    document.querySelector('.ground-intro').classList.remove('ground-intro-size-dec');
	
}


window.onscroll = function(){scrollfunction(); };


function scrollfunction(){

	if( document.body.scrollTop >=300 || document.documentElement.scrollTop >=300 ){
		document.querySelector('.ground-intro').classList.remove('ground-intro-size-dec');
		document.querySelector('.ground-intro').classList.add('ground-intro-size-inc');
		
		
	}
		else  {
		document.querySelector('.ground-intro').classList.add('ground-intro-size-dec');
		document.querySelector('.ground-intro').classList.remove('ground-intro-size-inc');
	}
		
}


