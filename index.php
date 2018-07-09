<!DOCTYPE html>
<html>
    <head>
        <title>Test</title>
        <meta charset='UTF-8'>
        <meta http-equiv='X-UA-Compatible' content='IE=edge'>
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name='description' content='test' />
        <meta name='keywords' content='test, website' />
        <meta name='author' content='test' />

        <!-- Styles -->
        <link href="https://fonts.googleapis.com/css?family=Work+Sans:300,400,500" rel="stylesheet">
        <link href='https://fonts.googleapis.com/css?family=Rubik' rel='stylesheet'>
        <link href='css/bootstrap.min.css' rel='stylesheet' type='text/css'>
        <link href='css/style.css' rel='stylesheet' type='text/css'>

        <link href="slick/slick.css" rel="stylesheet">
        <link href="slick/slick-theme.css" rel="stylesheet">
    </head>

    <body>
        <div class='container-fluid'>
            <div class='row'>
                <header>
                    <div class='container'>
                        <div class='row'>
                            <nav id='cssmenu'>
                                <div class='logo'>
                                    <a href='/'>
                                        <img src='images/offline.png' alt="Test logo" class="desktop-logo"/>
                                    </a>
                                </div>
                                <div class='button'></div>
                                <ul>
                                    <li class="desktop-menu active"><a href='#'>overview</a></li>
                                    <li class="desktop-menu"><a href='#'>applications</a></li>
                                    <li class="desktop-menu"><a href='#'>products</a></li>
                                    <li class="desktop-menu desktop-menu-last"><a href='#'>about us</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </header>
            </div>
        </div>

        <div class='container-fluid'>
            <div class='row'>
                <div id='myCarousel' class='carousel slide myCarousel' data-interval='false' data-ride='carousel'>
                    <ol class='carousel-indicators'>
                        <li data-target='#myCarousel' data-slide-to='0' class='active'></li>
                        <li data-target='#myCarousel' data-slide-to='1'></li>
                        <li data-target='#myCarousel' data-slide-to='2'></li>
                    </ol>
                    <div class="progress-bar-wrapper">
                        <hr class='transition-timer-carousel-progress-bar' />
                    </div>
                    <!-- Carousel items -->
                    <div class='carousel-inner'>
                        <div class='active item'>
                            <!-- Astronaut image from first slide -->
                            <img src='images/astronaut.jpg' alt='astronaut' class="img-responsive" />
                            <div class='container'>
                                <div class='carousel-caption'>
                                    <div class="container">
                                        <div class='carousel-caption-table'>
                                            <div class='carousel-caption-table-cell'>
                                                <h3>A lot has changed<br/> last 50 years</h3>
                                                <p>We went to the moon which triggered our fantasy and<br/> inspiration during the 'space age'</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='item'>
                            <!-- Image from second slide -->
                            <img src='images/astronaut.jpg' alt='astronaut' />
                            <div class='container'>
                                <div class='carousel-caption'>
                                    <div class="container">
                                        <div class='carousel-caption-table'>
                                            <div class='carousel-caption-table-cell'>
                                                <h3>A lot has changed<br/> last 50 years</h3>
                                                <p>We went to the moon which triggered our fantasy and<br/> inspiration during the 'space age'</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class='item'>
                            <!-- Image from third slide -->
                            <img src='images/astronaut.jpg' alt='astronaut' />
                            <div class='container'>
                                <div class='carousel-caption'>
                                    <div class="container">
                                        <div class='carousel-caption-table'>
                                            <div class='carousel-caption-table-cell'>
                                                <h3>A lot has changed<br/> last 50 years</h3>
                                                <p>We went to the moon which triggered our fantasy and<br/> inspiration during the 'space age'</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class='container-fluid full-width-desc'>
            <div class='row'>
                <div class='container'>
                    <h2>We bring smart technology to help<br/> you build a sustainable business in a<br/> healthy world</h2>
                    <p>Our mission is clear: Use technology to keep the world a great place to live. We do that by developing smart applications that read huge amounts of data from sensornetworks and use analytics and machine learning to transform it into actionable information.</p>
                </div>
            </div>
        </div>

        <div class='container-fluid three-row-container'>
            <!-- Aici completeaza HTML -->
            <div class="row"> 
                <div class="container">
                    <div class="row">
                        <div class="three-row-desc">
                            <?php
                            //Aici afisez div-urile din baza de date in index.php
                            require 'ObjectFactoryService.php';

                            $config = ObjectFactoryService::getConfig();
                            $db= ObjectFactoryService::getDb($config);

                            $sql = "SELECT * FROM item ";
                            $result=$db->query($sql);

                            foreach ($result as $row) {
                                echo "<div class=\"col-md-4\">";
                                echo "<img src=\"images/{$row['image']}\" alt=\"{$row['category']}\">";
                                echo "<h5><a href='#'>{$row['category']}</a></h5>";
                                echo "<h4><a href=\"#\">{$row['title']}</a></h4>";
                                echo "<p>{$row['text']}</p>";
                                echo "</div>";
                            }
                            ?>

                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class='container-fluid container-background' >
            <!-- Aici completeaza HTML -->
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="container-section">
                            <div class="col-md-8">
                                <h2>Check how we can kickstart your smart projects</h2>
                            </div>

                            <div class="col-md-4">
                                <img src="images/arrow.svg" alt="arrow"  >
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
        </div>

        <div class='container-fluid case-section-container'>
            <div class='row'>
                <div class='container'>
                    <div class='row'>
                        <div class='case-section'>
                            <div class="col-md-12">
                                <h5><a href='#'>CASE</a></h5>
                                <h4><a href="#">Nam porttitor blandit accumsan. Ut vel dictum.</a></h4>
                                <p>Curabitur lobortis id lorem id bibendum. Ut id consectetur magna.
                                    Quisque volutpat augue enim, pulvinar lobortis nibh lacinia at.
                                    Vestibulum nec erat ut mi sollicitudin porttitor id sit amet risus.
                                    Nam tempus vel odio vitae aliquam. In imperdiet eros.</p>
                                </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class='container-fluid'>
            <div class='row'>
                <div class="meet-team-background">
                    <div class='container'>
                            <div class='meet-team-section'>
                                <div class="highlight-upper-line "></div>
                                <h3>MEET THE TEAM</h3>
                                <div class="slick-slider">
                                    <div>
                                        <div class="slide-div">
                                            <img class="img-responsive" src="images/488x488.png"/>
                                            <h5>Daniel Jameson</h5>
                                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                                Ut pretium pretium tempor. Ut eget imperdiet neque.
                                                In volutpat ante.</p>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="slide-div">
                                            <img class="img-responsive" src="images/488x488.png"/>
                                            <h5>Donald Garrett</h5>
                                            <p>Donec facilisis tortor ut augue lacinia, at viverra est semper.
                                                Sed sapien metus, scelerisque nec pharetra id, tempor a torto.</p>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="slide-div">
                                            <img class="img-responsive" src="images/488x488.png"/>
                                            <h5>Ryan Howell</h5>
                                            <p>Nam porttitor blandit accumsan. Ut vel dictum sem, a pretium dui.
                                                In malesuada enim in dolor euismod, id commodo mi consectet.</p>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="slide-div">
                                            <img class="img-responsive" src="images/488x488.png"/>
                                            <h5>slide-4</h5>
                                            <p>Donec facilisis tortor ut augue lacinia, at viverra est semper.
                                                Sed sapien metus, scelerisque nec pharetra id, tempor a torto.</p>
                                        </div>
                                    </div>
                                    <div>
                                        <div class="slide-div">
                                            <img class="img-responsive" src="images/488x488.png"/>
                                            <h5>Cosmin</h5>
                                            <p>Nam porttitor blandit accumsan. Ut vel dictum sem, a pretium dui.
                                                In malesuada enim in dolor euismod, id commodo mi consectet.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    </div>
                </div>
            </div>
        </div>

        <div class='container-fluid container-background'>
            <!-- Aici completeaza HTML -->
             <!-- Poti elimina <br/> dupa ce completezi HTML-ul -->
            <div class="row">
                <div class="container">
                    <div class="row">
                        <div class="container-section">
                            <div class="col-md-8">
                                <h2>Check how we can kickstart your smart projects</h2>
                            </div>
    
                            <div class="col-md-4">
                                <img src="images/arrow.svg" alt="arrow"  >
                            </div>
                        </div>
                    </div>    
                </div>
            </div>
            
        </div>

        <div class='container-fluid'>
            <div class='row'>
                <div class='container'>
                    <div class='row'>
                        <div class='footer-section'>
                            <div class="col-md-8">
                                <a href="/">
                                    <img src="images/offline.png" alt="Test Logo" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-6">
                                    <p>Info</p>
                                    <h5>
                                        <a href="dummy.html">Application</a>
                                    </h5>
                                    <h5><a href="dummy.html">Products</a></h5>
                                    <h5><a href="dummy.html">About us</a></h5>
                                </div>
                                <div class="col-md-6 col-md-push-1">
                                    <p>Offices</p>
                                    <h5><a href="dummy.html">Netherlands</a></h5>
                                    <h5><a href="dummy.html">Dubai</a></h5>
                                </div>
                            </div>
                        </div>
                    </div>

                    <hr id="footer-line">

                    <div class="row">
                        <div class="copyright-section">
                            <div class="col-md-8">
                                <p><a href="/">(c) Test Web 2018</a></p>
                            </div>
                            <div class="col-md-4">
                                <div class="col-md-6">
                                    <p><a href="#">Terms and conditions</a></p>
                                </div>
                                <div class="col-md-6 col-md-push-2">
                                    <p><a href="#">Privacy policy</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <script src='https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js'></script>
        <script src='js/bootstrap.min.js'></script>
        <script src="//cdnjs.cloudflare.com/ajax/libs/jquery.touchswipe/1.6.4/jquery.touchSwipe.min.js"></script>
        <script src='js/scripts.js'></script>

        <script src="slick/slick.js"></script>
    </body>
</html>
