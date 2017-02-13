<?php
/**
 * @package start
 */
?>  

<?php
    $homepage = (get_the_ID()=='5')?true:false;  
?> 

  <div class="container" <? if($homepage){?> style="display:none;" <?php }else{ ?>  style="display:block;" <?php } ?>>
    <div class="row">
       <div class="col-md-12">
          <h1 class="title">Posições abertas</h1>
       </div>
    </div>
  </div>



<div class="content-section-b">


  <div class="container">
      <!--<h1 class="title">Carreiras</h1>-->
      
      <!--Só na home -->
      <?php if ( $homepage ) { ?>
        <div class="content col-md-12">
          <!--teams and vagas-->
          <div class="row">
              <div class="totalvagasteams"></div>
          </div>
        </div>
      <?php } ?>

      <!--Não é a home -->
      <div class="sidebar col-md-3" <? if($homepage){?> style="display:none;" <?php }else{ ?>  style="display:block;" <?php } ?>>
   
        <div>
          <h4 class='col-md-6'>total (<span id="total_vagas99">0</span>)</h4>
          <!--<div class="col-md-6 progress">
            <div class="progress-bar" id="stream_progress" style="width: 0%;">0%</div>
          </div>-->
        </div>
        <div>
          <label class="sr-only" for="searchbox">Filtrar</label>
          <input type="text" class="form-control" id="searchbox" placeholder="Filtrar &hellip;" autocomplete="off">
          <span class="glyphicon glyphicon-search search-icon"></span>
        </div>
        <br>
   
    <!--selects -->
         <div class="well">
            <fieldset id="times_criteria">
                <legend>Times</legend>
                <select class="form-control" id="times_filter" multiple="multiple"> 
                </select>
            </fieldset>
        </div>
         <div class="well">
            <fieldset id="local_criteria">
                <legend>Localização</legend>
                <select class="form-control" id="local_filter" multiple="multiple"> 
                </select>
            </fieldset>
        </div>

        <div class="well">
            <fieldset id="tipo_criteria">
                <legend>Tipo</legend>
                <select class="form-control" id="tipo_filter" multiple="multiple"> 
                </select>
            </fieldset>
        </div>

    </div>

<!-- /.col-md-3 -->
    <div class="col-md-9" <? if($homepage){?> style="display:none;" <?php }else{ ?>  style="display:block;" <?php } ?>>
      <div class="row">
        <div class="content col-md-12">
          <div id="pagination" class="vagas99-pagination col-md-9"></div>
          <div class="col-md-3 content">
            Por Página: <span id="per_page" class="content"></span>
          </div>
        </div>
      </div>  

       
        <div class="col-md-12 portfolio-item">
            <div class="clearfix"></div>
                    
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th data-field="text">Posição</th>
                        <th data-field="team">Time</th>
                        <th data-field="categories.location">Localização</th> 
                    </tr>
                </thead>
                <tbody class="vagas99 row" id="vagas99">
                   
                </tbody>
            </table>
        </div> 
      </div>
 
    </div>
<!-- /.col-md-9 -->
   
</div>
<!-- /.container -->

      <script id="vagas99-template" type="text/html">

         <!-- descriptionplan -> fala sobre a 99
              text-> nome vaga (text-content)
              lists -> topicos descrevendo a vaga
              categories -> team, location, commit 
              <%= _fid %>  -->
        
                      <tr>
                          <td><a href="jobdetail/?vagaid=<%= id %>"><%= text %></a></h4></td>
                          <td><%= categories.team %></td>
                          <td><%= categories.location %></td>
                          
                      </tr>        
                   

               <!--  <a href="#">
                    <img class="img-responsive" src="http://placehold.it/700x400" alt="">
                </a>
                <h3>
                   <h4><a href="vaga.html?vagaid=<%= id %>"><%= _fid %> - <%= text %></a></h4>
                </h3>
                <h4><%= categories.team %></h4> 
                <p><%= text %></p> -->
       
      
      </script>

 
      