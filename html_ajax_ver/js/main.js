$(function(){

	// window load & resize function
	$(window).load(resizing).resize(resizing);

	//hambuger_nav click handler
	$(".hambuger_nav").click(function(){
		$("body").toggleClass("nav_open");
	});

	// window resizing function
	function resizing(){
		windowWidth = $(window).width();
		// replace placeholder text handler
		if(windowWidth < 769){
			$(".serach_form #properties").attr("placeholder", 'Location');
		}else{
			$(".serach_form #properties").attr("placeholder", 'Search by region, suburb, postcode or address');
		}
	}

	// get json data
	$.getJSON( "/js/properties.json", function( data ) {
		
		//set variable
		var stateSearch = '';
	    var stateOptions = '';

		// get properties data
        $(data.properties).each(function(i, val) {

            $('<div class="slide"></div>')
                .html('<div class="property"><div class="img_wrapper"><img src="img/'+val.img+'" alt=""><p class="price">$'+val.price+'</p></div><div class="property_content"><div class="clearfix"><div class="col-sm-7 col-xs-7 left-col"><p class="category">'+val.category+'</p><p><span class="number">'+val.number+'</span> <span class="street">'+val.street+'</span>, <span class="suburb">'+val.suburb+'</span> <span class="postCode">'+val.postCode+'</span> <span class="state">'+val.state+'</span></p></div><div class="col-sm-5 col-xs-5 text-center right-col"><div class="map_wrapper"><img src="img/map.jpg" alt=""></div><p><span class="hectares">'+val.hectares+'</span>H <span class="acres">'+val.acres+'</span>AC</p></div></div></div></div>')
                .appendTo('.featured_slider');
        });

        // get states data
        $(data.states).each(function(i, val) {

        	var className =  val.name.replace(/ /g, "_");

        	if(between((i%7), 0,1)){
                proportion = 'vertical';
                grid = 'left-col';
            }else if(between((i%7), 2,4)){
                proportion = 'horizontal'; 
                grid = 'mid-col';
            }else if(between((i%7), 5,6)){
                proportion = 'vertical';
                grid = 'right-col';
            }

        	stateSearch += '<div class="tile '+ proportion+' '+className+ ' '+grid+'">'
        	+'<div class="title_wrapper">'
        	+'<h3>'+val.name+'</h3>'
        	+'<h4>'+val.count+' Farms for sale</h4>'
        	+'</div>'
        	+'</div>'
        	return stateSearch;
        });

        // number between range function
        function between(x, min, max) {
		  return x >= min && x <= max;
		}

		// add into  tile container
		$(".tile_container").html(stateSearch);
	    
	    // group by col
        $(".tile.left-col").wrapAll('<div class="tile_wrapper col-md-3 col-sm-6" />');
        $(".tile.mid-col").wrapAll('<div class="tile_wrapper col-md-6 col-sm-6" />');
        $(".tile.right-col").wrapAll('<div class="tile_wrapper col-md-3 col-sm-6 last" />');

        // sort function
	    function sortResults(prop) {
		    data.states = data.states.sort(function(a, b) {
		        return (b[prop] > a[prop]);
		    });
		}

		// sort count by desc
		sortResults('count');

		$(data.states).each(function(i, val) {	
        	 stateOptions += '<option value="'+val.abbr+'">'
        	 +val.abbr
        	 +'</option>'
           	return stateOptions;
        });
       	
       	// add state options
        $(".serach_form #state").html('<option value="" disabled selected>Select State</option>'+stateOptions);

	}).done(function() {
		// call Generate Slider function
	    GenerateSlider('.featured_slider');
  	}).fail(function (jqXHR, textStatus, error){
        console.log("Post error: " + error);
    });;

	// Generate Slider function
	function GenerateSlider(slider){
		// slider
		$(slider).slick({
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
	}

});