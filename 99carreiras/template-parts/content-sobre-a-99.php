<?php
/**
 * @package start
 */
?> 
<?php 
      // background-color: rgb(245, 216, 42) !important;                 
                         
                        $args = array(
                          'post_type' => array('page'), 
                          'tag' => 'sobre99',  
                          'post_status' => 'publish', 
                          'order' => 'DESC', 
                          'orderby' => 'date'
                        );

                        // WP_Query
                        $query = new WP_Query( $args );
                        if ($query->have_posts()) : // The Loop
                        ?>
                        
                                 

                                    <?php 
                                    while ($query->have_posts()): $query->the_post();
                                    ?> 
    
    <div id="scoped-content">
        <style>
            .intro-header {  background: url(<?php the_post_thumbnail_url( 'full' );  ?>) no-repeat center center !important;  }
        </style>  
    </div>                  
    <div class="intro-header">
        <div class="container">

            <div class="row">
                <div class="col-lg-12">
                    <div class="intro-message">
                        <h1><?php the_title(); ?></h1>                       
                    </div>
                </div>
            </div>

        </div>
        <!-- /.container -->

    </div>
    <!-- /.intro-header -->
    <div class="content-section-b">

            <div class="container">
                <div class="row">
                    <div class="col-lg-12"> 
                        <div class="clearfix"></div>             
                                      
                                       <?php the_content(); ?>
                                 
                                <?php endwhile; wp_reset_query(); ?> 
                            </div>
                             
                        </div>
                        <?php else: 
                                $conteudoNaoExiste = true;
                        ?> 
                        <h1>não encontrado</h1>
                        <?php endif; ?>   
        
        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-section-a -->

