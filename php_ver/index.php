<?php include 'header.php'; ?>
            
<main class="main_content">
    <section class="top_banner">
        <div class="btn_wrapper clearfix">
            <a href="#" class="active">Buy</a>
            <a href="#">Sell</a>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 text-center">
                    <div class="logo_wrapper">
                        <a href="/">
                           <img src="img/logo.png" alt="farm buy">  
                        </a>
                    </div>
                </div>
                <div class="col-sm-12">
                    <div class="search_form_wrapper">
                        <form action="" class="serach_form">
                            <div class="row">
                                <div class="col-sm-3">
                                    <select class="form-control">
                                        <option value="" disabled selected>Select State</option>
                                        <option value="All">All</option>
                                        <option value="VIC">VIC</option>
                                        <option value="NSW">NSW</option>
                                        <option value="NT">NT</option>
                                        <option value="QLD">QLD</option>
                                        <option value="WA">WA</option>
                                        <option value="SA">SA</option>
                                        <option value="TAS">TAS</option>
                                    </select>
                                </div>
                                <div class="col-sm-9">
                                    <div class="row">
                                        <div class="col-sm-9 col-xs-12">
                                             <div class="form-group">
                                                <input name="property" type="text" class="form-control" id="location" placeholder="Search by region, suburb, postcode or address">
                                              </div>
                                        </div>
                                        <div class="col-sm-3">
                                            <button type="submit" class="search_btn btn btn-green"><i class="fa fa-search"></i><span>Search</span></button>
                                        </div>
                                    </div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox"> Surrounding suburbs
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="featured_properties">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <div class="text-center">
                        <h2 class="underline">Featured Properties</h2>
                    </div>
                </div>
            </div>
        </div>
        <div class="featured_slider">
            <?php 
                $url = 'data.php';
                $content = file_get_contents($url);
                $json = json_decode($content, true);

                $properties = $json["properties"];
                for($i=0; $i<count($properties); $i++) {

                    echo '<div class="slide">';
                        echo '<div class="property">';
                            echo '<div class="img_wrapper">';
                                echo '<img src="img/'.$properties[$i]["img"].'" alt="">';
                                echo '<p class="price">$'.$properties[$i]["price"].'</p>';
                            echo '</div>';
                            echo '<div class="property_content">';
                                echo '<div class="clearfix">';
                                    echo '<div class="col-sm-7 col-xs-7 left-col">';
                                        echo '<p class="category">'.$properties[$i]["category"].'</p>';
                                        echo '<p><span class="number">'.$properties[$i]["numver"].'</span> <span class="street">'.$properties[$i]["street"].'</span>, <span class="suburb">'.$properties[$i]["suburb"].'</span> <span class="postCode">'.$properties[$i]["postCode"].'</span> <span class="state">'.$properties[$i]["state"].'</span></p>';
                                    echo '</div>';
                                    echo '<div class="col-sm-5 col-xs-5 text-center right-col">';
                                        echo '<div class="map_wrapper">';
                                            echo '<img src="img/map.jpg" alt="">';
                                        echo '</div>';
                                        echo '<p><span class="hectares">'.$properties[$i]["hectares"].'</span>H <span class="acres">'.$properties[$i]["acres"].'</span>AC</p>';
                                    echo '</div>';
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';
                }

            ?>
        </div>
                
        
    </section><!-- section end -->
    <section class="search_state">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                   <div class="text-center">
                     <h2 class="underline text-whiteColor">Search by State</h2>
                    </div>  
                </div>
            </div>
            <div class="row">
                <div class="col-sm-11 col-sm-offset-1 col-md-12 col-md-offset-0">
                    <div class="row">
                        <div class="tile_wrapper col-md-3 col-sm-6">
                            <div class="tile vertical Western-Australia">
                                <div class="title_wrapper">
                                    <h3>Western Australia</h3>
                                    <h4>563 Farms for sale</h4>
                                </div>
                            </div>
                            <div class="tile vertical South-Australia">
                                <div class="title_wrapper">
                                    <h3>South Australia</h3>
                                    <h4>679 Farms for sale</h4>
                                </div>
                            </div>
                        </div>
                        <div class="tile_wrapper col-md-6 col-sm-6">
                            <div class="tile horizontal Queensland">
                                <div class="title_wrapper">
                                    <h3>Queensland</h3>
                                    <h4>852 Farms for sale</h4>
                                </div>
                            </div>
                            <div class="tile horizontal  New-South-Wales">
                                <div class="title_wrapper">
                                    <h3>New South Wales</h3>
                                    <h4>2699 Farms for sale</h4>
                                </div>
                            </div>
                            <div class="tile horizontal Victoria">
                                <div class="title_wrapper">
                                    <h3>Victoria</h3>
                                    <h4>3156 Farms for sale</h4>
                                </div>
                            </div>
                        </div>
                        <div class="tile_wrapper col-md-3 col-sm-6 last">
                            <div class="clearfix">
                                <div class="tile vertical Northern-Territory">
                                    <div class="title_wrapper">
                                        <h3>Northern Territory</h3>
                                        <h4>920 Farms for sale</h4>
                                    </div>
                                </div>
                                <div class="tile vertical Tasmania">
                                    <div class="title_wrapper">
                                        <h3>Tasmania</h3>
                                        <h4>251 Farms for sale</h4>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-10 col-md-offset-1 text-center">
                    <div class="ad">
                        <img src="img/ad-img.png" alt="">
                    </div>
                </div>
            </div>
            
            <div class="calculator-wrapper">
                <div class="row">
                    <div class="col-sm-12">
                        <div class="calculator_img"></div>
                    </div>
                    <div class="col-sm-4 col-md-4">
                        <div class="supporter">
                            <p>Supported by Rabobank</p>
                        </div>
                    </div>
                    <div class="col-sm-8 col-md-7 col-md-offset-1">
                        <div class="calculator_content">
                            <h3 class="text-whiteColor">Farm Loan Calculator</h3>
                            <p>Lorem ipsum dolor sit fees, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
                            <a href="#" class="btn btn-lightGreen calculator_btn">Get Started</a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
        

    </section><!-- section end -->
</main><!-- main end -->
<?php include 'footer.php'; ?>