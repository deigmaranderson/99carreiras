$(function(){

 var teams = new Array();
 var cities = new Array();
 var commitment = new Array();

 var afterFilter = function(result, jQ){

    $('#total_vagas99').text(result.length);
    //var checkboxes  = $("#team_criteria :input:gt(0)");  

    $.each(jQ.records, function( key, value ) { 
       $.each(value.categories, function(key,value) {
        
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

/*
    checkboxes.each(function(){
      var c = $(this), count = 0

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
var teamsCompleto = unique(teams);
 
      $.each(teamsCompleto, function( key, value ) { 
          htm += "<option value='" + value + "' class='' selected='selected'>"+value+"</option>";
       
          }); 

        $('#times_filter').append(htm);
        $('#times_filter').multiselect('rebuild');         
        $('#times_filter').multiselect({
            includeSelectAllOption: true
        });

var htm = '';
var citiesCompleto = unique(cities);
 
      $.each(citiesCompleto, function( key, value ) { 
          htm += "<option value='" + value + "' class='' selected='selected'>"+value+"</option>";
                    
          });
        $('#local_filter').append(htm);
        $('#local_filter').multiselect('rebuild');         
        $('#local_filter').multiselect({
            includeSelectAllOption: true
        });

var htm = '';
var commitCompleto = unique(commitment);
 
      $.each(commitCompleto, function( key, value ) { 
       htm += "<option value='" + value + "' class='' selected='selected'>"+value+"</option>";
                    
          });
        $('#tipo_filter').append(htm);
        $('#tipo_filter').multiselect('rebuild');         
        $('#tipo_filter').multiselect({
            includeSelectAllOption: true
        });
 
  FJS.addCriteria({field: 'categories.team', ele: '#times_filter'});
  FJS.addCriteria({field: 'categories.location', ele: '#local_filter'});
  FJS.addCriteria({field: 'categories.commitment', ele: '#tipo_filter'});
 
  window.FJS = FJS;

  function unique(list) {
      var result = [];
      $.each(list, function(i, e) {
          if ($.inArray(e, result) == -1) result.push(e);
      });
      return result;
  }


});
 