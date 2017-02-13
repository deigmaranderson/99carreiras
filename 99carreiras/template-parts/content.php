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
                        <h1>FAÇA PARTE DE NOSSO TIME</h1>
                         
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
						'tag' => 'homepage',
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
                    <br/><br/>
                    <p><a target="_blank" href="/sobre-a-99/"><i class="fa fa-plus-circle"></i> Saiba mais sobre a 99 táxis</a></p>
                   
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
   
    <!-- são Paulo
Rio de Janeiro
Belo Horizonte
Porto Alegre -->
<a id="location" ></a>
    <div class="content-section-a">

        <div class="container">
                <div class="content col-md-12">
                  <!--teams and vagas-->
                  <div class="row">
                      <div class="blocoCidades"></div>
                  </div>
                </div>
 
        </div>
        <!-- /.container -->

    </div>
    <!-- /.content-section-a -->

	