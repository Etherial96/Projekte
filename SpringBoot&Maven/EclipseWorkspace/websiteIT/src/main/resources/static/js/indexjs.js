var wood = document.querySelector('.wood');

    window.addEventListener('scroll', function () {
	        var rect = wood.getBoundingClientRect();
	        if (rect.bottom <= 0) {	
	            document.querySelector('.stickimenu').style.top = 0;
	            //document.querySelector('.navbar').style.position = "sticky";
	        } 
    });