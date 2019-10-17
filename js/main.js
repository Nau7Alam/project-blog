




document.querySelector('.bar-btn').addEventListener('click', function () {
	
	var currnetClass = document.querySelector('.dropdown-box');
    console.log("CLICKED ME????");
	
	if (!currnetClass.classList.contains('dropdown-box-open')){
		currnetClass.classList.add('dropdown-box-open');
		currnetClass.classList.remove('dropdown-box-close');
		document.querySelector('.fst').classList.add('fst-cross');
		document.querySelector('.thrd').classList.add('thrd-cross');
		document.querySelector('.sec').style.display='none';
		
	}
	else if (currnetClass.classList.contains('dropdown-box-open')){
		currnetClass.classList.remove('dropdown-box-open');
		currnetClass.classList.add('dropdown-box-close');
		document.querySelector('.fst').classList.remove('fst-cross');
		document.querySelector('.thrd').classList.remove('thrd-cross');
		document.querySelector('.sec').style.display='inline-block';
	}
	
	
});

