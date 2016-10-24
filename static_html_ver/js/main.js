$(function(){

	$(window).load(resizing).resize(resizing);

	//hambuger_nav click handler
	$(".hambuger_nav").click(function(){
		$("body").toggleClass("nav_open");
	});

	// //slider 
	 $('.featured_slider').slick({
			slidesToShow: 5,
			slidesToScroll: 1,
			autoplay: false,
			arrows: true,
			centerMode: true,
			focusOnSelect: true,
			responsive: [
				{
					breakpoint: 1250,
					settings: {
					arrows: true,
					centerMode: true,
					slidesToShow: 3,
					slidesToScroll: 1
			      }
			    },
			    {
					breakpoint: 992,
					settings: {
					arrows: false,
					centerMode: true,
					slidesToShow: 3,
					slidesToScroll: 3
			      }
			    },
			    {
					breakpoint: 768,
					settings: {
					arrows: false,
					centerMode: true,
					slidesToShow: 2,
					slidesToScroll: 2
			      }
			    },
			    {
					breakpoint: 480,
					settings: {
					arrows: false,
					centerMode: true,
					autoplay: false,
					slidesToShow: 1,
					slidesToScroll: 1
			      }
			    }
			  ]
		});
	
	// window resizing function
	function resizing(){
		windowWidth = $(window).width();
		if(windowWidth < 769){
			$("#location").attr("placeholder", 'Location');
		}else{
			$("#location").attr("placeholder", 'Search by region, suburb, postcode or address');
		}
	}

});