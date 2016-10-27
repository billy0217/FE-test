<?php 
    include 'header.php'; 

    $url = 'data.php';
    $content = file_get_contents($url);
    $json = json_decode($content, true);

?>
            
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
                                    
                                    <div class="select-controls">
                                        <select class="form-control" name="state" id="state">
                                            <option value="All" selected disabled>All</option>
                                            <?php

                                                $states = $json[1]["states"];

                                                usort($states, function($a, $b) { 
                                                  if ($a['count'] == $b['count']) {
                                                    return $a['abbr'] > $b['abbr'] ? 1 : -1;
                                                  } else {
                                                    return $b['count'] - $a['count'];
                                                  }
                                                });

                                                foreach ($states as $state) {
                                                     echo '<option value="'.$state['abbr'].'">'.$state['abbr'].'</option>';;
                                                }

                                            ?>
                                            
                                        </select>
                                    </div>
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

                $properties = $json[0]["properties"];
                foreach($properties as $property) {

                    echo '<div class="slide">';
                        echo '<div class="property">';
                            echo '<div class="img_wrapper">';
                                echo '<img src="img/'.$property["img"].'" alt="">';
                                echo '<p class="price">$'.$property["price"].'</p>';
                            echo '</div>';
                            echo '<div class="property_content">';
                                echo '<div class="clearfix">';
                                    echo '<div class="col-sm-7 col-xs-7 left-col">';
                                        echo '<p class="category">'.$property["category"].'</p>';
                                        echo '<p><span class="number">'.$property["numver"].'</span> <span class="street">'.$property["street"].'</span>, <span class="suburb">'.$property["suburb"].'</span> <span class="postCode">'.$property["postCode"].'</span> <span class="state">'.$property["state"].'</span></p>';
                                    echo '</div>';
                                    echo '<div class="col-sm-5 col-xs-5 text-center right-col">';
                                        echo '<div class="map_wrapper">';
                                            echo '<img src="img/map.jpg" alt="">';
                                        echo '</div>';
                                        echo '<p><span class="hectares">'.$property["hectares"].'</span>H <span class="acres">'.$property["acres"].'</span>AC</p>';
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

                        <?php

                            $statesList = $json[1]["states"];

                            $i = 0;
                            foreach($statesList as $state){

                                if(($i%7) <= 1 ||  ($i%7) == 5 || ($i%7) ==6 ){
                                    $proportion = 'vertical'; 
                                }else{
                                    $proportion = 'horizontal';
                                }

                                if(($i%7) == 0 ){
                                    $openingTag = '<div class="tile_wrapper col-md-3 col-sm-6">'; 
                                    $closeingTag = '';
                                }elseif(($i%7) == 2 ){
                                    $openingTag = '</div><div class="tile_wrapper col-md-6 col-sm-6">';
                                    $closeingTag = '';
                                }elseif(($i%7) == 5 ){
                                    $openingTag = '</div><div class="tile_wrapper col-md-3 col-sm-6 last">'; 
                                    $closeingTag = '';
                                }elseif(($i%7) == 6 ){
                                    $openingTag = '';
                                    $closeingTag = '</div>';
                                }else{
                                    $openingTag = '';
                                    $closeingTag = '';
                                }

                                $className = preg_replace('/\s+/', '_', $state["name"]);

                                echo $openingTag;    
                                    echo'<div class="tile '.$proportion .' '.$className.'">';
                                        echo'<div class="title_wrapper">';
                                            echo'<h3>'.$state["name"].'</h3>';
                                            echo'<h4>'.$state["count"].' Farms for sale</h4>';
                                        echo'</div>';
                                    echo'</div>';
                                echo $closeingTag;

                                $i++;
                            }

                        ?>

                        
                        
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