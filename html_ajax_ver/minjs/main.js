$(function(){function s(){windowWidth=$(window).width(),windowWidth<769?$(".serach_form #properties").attr("placeholder","Location"):$(".serach_form #properties").attr("placeholder","Search by region, suburb, postcode or address")}function e(s){$(s).slick({slidesToShow:5,slidesToScroll:1,autoplay:!1,arrows:!0,centerMode:!0,focusOnSelect:!0,responsive:[{breakpoint:1250,settings:{arrows:!0,centerMode:!0,slidesToShow:3,slidesToScroll:1}},{breakpoint:992,settings:{arrows:!1,centerMode:!0,slidesToShow:3,slidesToScroll:3}},{breakpoint:768,settings:{arrows:!1,centerMode:!0,slidesToShow:2,slidesToScroll:2}},{breakpoint:480,settings:{arrows:!1,centerMode:!0,autoplay:!1,slidesToShow:1,slidesToScroll:1}}]})}$(window).load(s).resize(s),$(".hambuger_nav").click(function(){$("body").toggleClass("nav_open")}),$.getJSON("/js/properties.json",function(s){function e(s,e,o){return s>=e&&s<=o}function o(e){s.states=s.states.sort(function(s,o){return o[e]>s[e]})}var r="",t="";$(s.properties).each(function(s,e){$('<div class="slide"></div>').html('<div class="property"><div class="img_wrapper"><img src="img/'+e.img+'" alt=""><p class="price">$'+e.price+'</p></div><div class="property_content"><div class="clearfix"><div class="col-sm-7 col-xs-7 left-col"><p class="category">'+e.category+'</p><p><span class="number">'+e.number+'</span> <span class="street">'+e.street+'</span>, <span class="suburb">'+e.suburb+'</span> <span class="postCode">'+e.postCode+'</span> <span class="state">'+e.state+'</span></p></div><div class="col-sm-5 col-xs-5 text-center right-col"><div class="map_wrapper"><img src="img/map.jpg" alt=""></div><p><span class="hectares">'+e.hectares+'</span>H <span class="acres">'+e.acres+"</span>AC</p></div></div></div></div>").appendTo(".featured_slider")}),$(s.states).each(function(s,o){var t=o.name.replace(/ /g,"_");return e(s%7,0,1)?(proportion="vertical",grid="left-col"):e(s%7,2,4)?(proportion="horizontal",grid="mid-col"):e(s%7,5,6)&&(proportion="vertical",grid="right-col"),r+='<div class="tile '+proportion+" "+t+" "+grid+'"><div class="title_wrapper"><h3>'+o.name+"</h3><h4>"+o.count+" Farms for sale</h4></div></div>"}),$(".tile_container").html(r),$(".tile.left-col").wrapAll('<div class="tile_wrapper col-md-3 col-sm-6" />'),$(".tile.mid-col").wrapAll('<div class="tile_wrapper col-md-6 col-sm-6" />'),$(".tile.right-col").wrapAll('<div class="tile_wrapper col-md-3 col-sm-6 last" />'),o("count"),$(s.states).each(function(s,e){return t+='<option value="'+e.abbr+'">'+e.abbr+"</option>"}),$(".serach_form #state").html('<option value="" disabled selected>Select State</option>'+t)}).done(function(){e(".featured_slider")}).fail(function(s,e,o){console.log("Post error: "+o)})});