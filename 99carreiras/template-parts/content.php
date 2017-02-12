<?php
/**
 * @package start
 */
?>
<div class="intro-header" >
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1>JOIN US ON MISSION INCREDIBLE</h1>
                         
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->
    <!-- Page Content -->

    <div class="content-section-a">

        <div class="container">
            <div class="row">
                <div class="col-lg-5 col-sm-6"> 
                    <div class="clearfix"></div>
                    <?php
                    // WP_Query arguments
					$args = array(
						'tag' => 'sobre99',
					);

					// The Query
					$query = new WP_Query( $args );

					// The Loop
					if ( $query->have_posts() ) {
						while ( $query->have_posts() ) {
							$query->the_post();
					?>
                    <h2 class="section-heading"><?php the_title(); ?></h2>
                    <p class="lead">
                        <?php the_content(); ?>                      
                    </p>

                    <p><a target="_blank" href="<?php the_permalink(); ?>">Saiba mais sobre a 99 táxis</a></p>
                   
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                     <?php the_post_thumbnail();?>
                </div> 
                	<?
                        
						}
					} else {
						echo 'cadastrar post';
					}

					// Restore original Post Data
					wp_reset_postdata();
					?>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

    
<!-- /.content-section-b -->
<a id="team" ></a>
<?php get_template_part( 'template-parts/content', 'integration' ); ?>
   
    
    <div class="content-section-a">

        <div class="container">

            <div class="row">
                <div class="col-lg-5 col-sm-6">
                    <!--<hr class="section-heading-spacer">-->
                    <div class="clearfix"></div>
                    <h2 class="section-heading">Google Web Fonts and<br>Font Awesome Icons</h2>
                    <p class="lead">This template features the 'Lato' font, part of the <a target="_blank" href="http://www.google.com/fonts">Google Web Font library</a>, as well as <a target="_blank" href="http://fontawesome.io">icons from Font Awesome</a>.</p>
                </div>
                <div class="col-lg-5 col-lg-offset-2 col-sm-6">
                    <img class="img-responsive" src="img/phones.png" alt="">
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

	<a  name="contact"></a>
    <div class="banner">

        <div class="container">

            <div class="row">
                <div class="col-lg-6">
                    <h2>Connect to Start Bootstrap:</h2>
                </div>
                <div class="col-lg-6">
                    <ul class="list-inline banner-social-buttons">
                        <li>
                            <a href="https://twitter.com/SBootstrap" class="btn btn-default btn-lg"><i class="fa fa-twitter fa-fw"></i> <span class="network-name">Twitter</span></a>
                        </li>
                        <li>
                            <a href="https://github.com/IronSummitMedia/startbootstrap" class="btn btn-default btn-lg"><i class="fa fa-github fa-fw"></i> <span class="network-name">Github</span></a>
                        </li>
                        <li>
                            <a href="#" class="btn btn-default btn-lg"><i class="fa fa-linkedin fa-fw"></i> <span class="network-name">Linkedin</span></a>
                        </li>
                    </ul>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    