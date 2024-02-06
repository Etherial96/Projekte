var wood = document.querySelector('.wood');

    window.addEventListener('scroll', function () {
	        var rect = wood.getBoundingClientRect();
	        if (rect.bottom <= 0) {	
	            document.querySelector('.stickimenu').style.top = 0;
	            document.querySelector('.stickichatbot').style.top = 'auto';
	            document.querySelector('.stickichatbot').style.bottom = 10+'px';
	            //document.querySelector('.navbar').style.position = "sticky";
	        }
	        if (rect.bottom >= 0) {	
				document.querySelector('.stickichatbot').style.bottom = 'auto';
	            document.querySelector('.stickichatbot').style.top = 10+'px';
			}
	        
    });