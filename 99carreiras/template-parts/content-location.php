<?php
/**
 * @package start
 */
?>

<?php 

$tag='';
                        $teamSelecionado = urldecode($_GET["location"]);      
                       // var_dump($teamSelecionado);                  
                        switch ($teamSelecionado) {
                             case 'São Paulo':
                                $tag = 'sp';
                                break; 
                             case 'Rio de Janeiro':
                                $tag = 'rj';
                                break; 
                             case 'Belo Horizonte':
                                $tag = 'bh';
                                break; 
                             case 'Porto Alegre':
                                $tag = 'pa';
                                break; 
                              
                        }
                        /*99 Corporativo
99 Corporativo
CSI – Controle de risco e fraudes
DIA
Finanças
Growth
Marketing
Operações
Policies & Communications
Produto
Projetos
RH
Tecnologia
UAU! – Unidade de Atendimento aos Usuários*/
                         
                        $args = array(
                          'post_type' => array('page'), 
                          'tag' => $tag, 
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
    <!-- /.intro-header -->
    <div class="content-section-a">

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

<?php if(!$conteudoNaoExiste) { ?>
<?php get_template_part( 'template-parts/content', 'integration' ); ?>
<?php } ?>