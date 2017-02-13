<?php
/**
 * @package start
 */
?>
 
<?php 

 //https://api.lever.co/v0/postings/99taxis/03f6d34a-3568-4885-9aef-b614bd081ace
 
    $url = "https://api.lever.co/v0/postings/99taxis/". $_GET['vagaid'];
 
    $vagaJson = file_get_contents($url);
    //var_dump($vagaJson);
    $data = json_decode($vagaJson, TRUE);

    //var_dump($data);  

            $args = array(
              'post_type' => array('page'), 
              'tag' => 'carreiras', 
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
            .intro-header {  background: url(<?php the_post_thumbnail_url( 'full' );  ?>) no-repeat center center !important; }
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

<?php endwhile; wp_reset_query(); ?>  
<?php endif; ?> 
    <!-- /.intro-header -->
    <div class="content-section-b">

            <div class="container">
                <div class="row">
                    <div class="col-lg-12 portfolio-item"> 
                        <div class="clearfix"></div>   

                             
                             <h2><?php print($data['text']); ?></h2> 
                             <h4><?php print($data['categories']['team'] . ' - ' .$data['categories']['location'] . ' - ' . $data['categories']['commitment'])?></h4>

                             <p><?php print($data['description']); ?></p>
                             <p><?php print($data['descriptionPlain']); ?></p>

                             <div class="control-group" style="padding: 30px 0;">
                                <p>
                                    <?php 
                                        foreach ($data['lists'] as $key => $value) {
                                            foreach ($value as $key => $value) {
                                                print ($value);
                                            }                                        
                                        }
                                    ?>                                    
                                </p>
                             </div>
                             <p><?php print($data['additional']); ?></p>
                             <p></p>
                             <p><?php print($data['additionalPlain']); ?></p>
                             <p></p>
                             <p><?php// print($data['hostedUrl']); ?></p>

                             <p>
                                 <a href="<?php print($data['applyUrl']); ?>" class="btn btn-lg btn-warning">
                                    <span class="glyphicon glyphicon-plus"></span>  
                                            Candidatar-se a essa vaga
                                 </a>
                             </p>
 
 
                            </div>
                             
                        </div>
                        
        
        </div>
        <!-- /.container -->
    </div>
    <!-- /.content-section-a -->
