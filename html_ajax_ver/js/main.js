$(function(){

	$(window).load(resizing).resize(resizing);

	//hambuger_nav click handler
	$(".hambuger_nav").click(function(){
		$("body").toggleClass("nav_open");
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


	$.getJSON( "/js/properties.json", function( data ) {
		

		for (var properties in data) {

            $(data[properties]).each(function(key, val) {

                $('<div class="slide"></div>')
                    .html('<div class="property"><div class="img_wrapper"><img src="img/'+val.img+'" alt=""><p class="price">$'+val.price+'</p></div><div class="property_content"><div class="clearfix"><div class="col-sm-7 col-xs-7 left-col"><p class="category">'+val.category+'</p><p><span class="number">'+val.number+'</span> <span class="street">'+val.street+'</span>, <span class="suburb">'+val.suburb+'</span> <span class="postCode">'+val.postCode+'</span> <span class="state">'+val.state+'</span></p></div><div class="col-sm-5 col-xs-5 text-center right-col"><div class="map_wrapper"><img src="img/map.jpg" alt=""></div><p><span class="hectares">'+val.hectares+'</span>H <span class="acres">'+val.acres+'</span>AC</p></div></div></div></div>')
                    .appendTo('.featured_slider');
            });
	    }


	}).done(function() {
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
	  });





});