<?php
/**
 * @package start
 */
?>
<?php 
                        $teamSelecionado = urldecode($_GET["team"]);      
                       // var_dump($teamSelecionado);                  
                        switch ($teamSelecionado) {
                             case 'Tecnologia':
                                $idCategoria = '4';
                                break; 
                             case 'Operações':
                                $idCategoria = '5';
                                break; 
                             case '99 Corporativo':
                                $idCategoria = '6';
                                break; 
                             case 'UAU! - Unidade de Atendimento aos Usuários':
                                $idCategoria = '7';
                                break; 
                             case 'CSI - Controle de risco e fraudes':
                                $idCategoria = '8';
                                break; 
                             case 'Marketing':
                                $idCategoria = '9';
                                break; 
                             case 'Projetos':
                                $idCategoria = '10';
                                break; 
                             case 'DIA':
                                $idCategoria = '11';
                                break; 
                              case 'RH':
                                $idCategoria = '12';
                                break; 
                              case 'Finanças':
                                $idCategoria = '13';
                                break; 
                              case 'Policies ':
                                $idCategoria = '14';
                                break; 
                              case 'Growth':
                                $idCategoria = '15';
                                break; 
                              case 'Produto':
                                $idCategoria = '16';
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
                          'category__in' => array($idCategoria), 
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