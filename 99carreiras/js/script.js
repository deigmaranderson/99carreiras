jQuery(function(){

 var teams = new Array();
 var cities = new Array();
 var commitment = new Array();
 var quantidadeVagas = {};
 var categoriesFinal = new Array();

 var afterFilter = function(result, jQ){

    jQuery('#total_vagas99').text(result.length);
    //var checkboxes  = jQuery("#team_criteria :input:gt(0)");  

    jQuery.each(jQ.records, function( key, value ) { 
       jQuery.each(value.categories, function(key,value) {
        
          if(key == 'team'){
             var teamReturn = value;     
                teams.push(teamReturn);             
          }

          if(key == 'location'){
             var citieReturn = value;      
                cities.push(citieReturn);
          }

          if(key == 'commitment'){
             var commitReturn = value;      
                commitment.push(commitReturn);
          }

       });

    }); 

    // cria objeto com quantidade de vagas
    jQuery.each(teams, function(key,value) {
      if (!quantidadeVagas.hasOwnProperty(value)) {
        quantidadeVagas[value] = 1;
      } else {
        quantidadeVagas[value]++;
      }
    });

    //console.log(quantidadeVagas);

/*
    checkboxes.each(function(){
      var c = jQuery(this), count = 0

      if(result.length > 0){
        count = jQ.where({ 'categories.team': c.val() }).count;
      }
      c.next().text(c.val() + '(' + count + ')')
    });*/

//end afterfilter
}


//console.log(teams);
  var FJS = FilterJS(vagas99, '#vagas99', {
   
    template: '#vagas99-template',
    search: { ele: '#searchbox' },

    callbacks: {
      afterFilter: afterFilter 
    },
 
    pagination: {
      container: '#pagination',
      visiblePages: 5,
      perPage: {
        values: [10, 20, 30, 40, 50],
        container: '#per_page'
      },
    }
  });


//array teams completo sem duplicados
//console.log(unique(teams));

var htm = ''; 
  
  jQuery.each(extCategories, function( key, value ) { 
      var categoriaWP = value[0];
      var imgCategoriaWP = value[1];
      //console.log(categoriaWP);

        var str= "&amp;";
        
        categoriaWP= categoriaWP.replace(/\&amp;/g,'&');
        //console.log(str);

    jQuery.each(quantidadeVagas, function( key, value ) { 
      var categoriaAPI = key;
      //console.log(categoriaAPI);

      comparaCategoria = similitude(categoriaWP, categoriaAPI);
      // console.log(comparaCategoria); 
            
          if((typeof comparaCategoria === 'undefined')){
              if(imgCategoriaWP==''){
                imgCategoriaWP = 'http://placehold.it/350x175';
              }
                  htm += "<div class='col-md-4 portfolio-item'>";
                  htm += "<div class='clearfix'></div>";
                  htm += "<a href='team?team="+categoriaAPI+"'><img class='img-responsive' src='"+imgCategoriaWP+"'></a>";    
                  htm += "<h5><i>"+ ""+value+ " vagas</i> - "+categoriaAPI+"</h5>";
                  htm += "</div>"; 
          
          }
     });
        
  });   


 if(jQuery('.totalvagasteams').length ){
            jQuery('.totalvagasteams').append(htm);   
  } 

var htm = '';
var teamsCompleto = unique(teams);
//console.log(teamsCompleto);
      jQuery.each(teamsCompleto, function( key, value ) { 
          htm += "<option value='" + value + "' class='' selected='selected'>"+value+"</option>";
       
          }); 

        jQuery('#times_filter').append(htm);                
        jQuery('#times_filter').multiselect({
            includeSelectAllOption: true
        });
        if(jQuery('#times_filter').length ){
          jQuery('#times_filter').multiselect('rebuild'); 
        }

var htm = '';
var citiesCompleto = unique(cities);
 
      jQuery.each(citiesCompleto, function( key, value ) { 
          htm += "<option value='" + value + "' class='' selected='selected'>"+value+"</option>";
                    
          });
        jQuery('#local_filter').append(htm);
        jQuery('#local_filter').multiselect({
            includeSelectAllOption: true
        });
        if(jQuery('#local_filter').length ){
          jQuery('#local_filter').multiselect('rebuild');  
        }      
        
var htm = '';
var commitCompleto = unique(commitment);
 
      jQuery.each(commitCompleto, function( key, value ) { 
       htm += "<option value='" + value + "' class='' selected='selected'>"+value+"</option>";
                    
          });
        jQuery('#tipo_filter').append(htm);
        jQuery('#tipo_filter').multiselect({
            includeSelectAllOption: true
        });
        if(jQuery('#tipo_filter').length ){
          jQuery('#tipo_filter').multiselect('rebuild');
        }        
        
 
  FJS.addCriteria({field: 'categories.team', ele: '#times_filter'});
  FJS.addCriteria({field: 'categories.location', ele: '#local_filter'});
  FJS.addCriteria({field: 'categories.commitment', ele: '#tipo_filter'});
 
  window.FJS = FJS;

  function unique(list) {
      var result = [];
      jQuery.each(list, function(i, e) {
          if (jQuery.inArray(e, result) == -1) result.push(e);
      });
      return result;
  }

  function slug(str) {
  str = str.replace(/^\s+|\s+$/g, ''); // trim
  str = str.toLowerCase();

  // remove accents, swap ñ for n, etc
  var from = "ãàáäâẽèéëêìíïîõòóöôùúüûñç·/_,:;";
  var to   = "aaaaaeeeeeiiiiooooouuuunc------";
  for (var i=0, l=from.length ; i<l ; i++) {
    str = str.replace(new RegExp(from.charAt(i), 'g'), to.charAt(i));
  }

  str = str.replace(/[^a-z0-9 -]/g, '') // remove invalid chars
    .replace(/\s+/g, '-') // collapse whitespace and replace by -
    .replace(/-+/g, '-'); // collapse dashes

  return str;
  };

  function similitude(a, b) {
    for (var i = 0, len = Math.max(a.length, b.length); i < len; i++)
        if (a.charAt(i) != b.charAt(i)) 
            return Math.round(i / len * 100);
  }

});
 