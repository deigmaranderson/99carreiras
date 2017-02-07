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

var teamsCompleto = unique(teams);
 
      $.each(teamsCompleto, function( key, value ) { 
       // console.log(value);
          var checkbox_tool = "<div class='checkbox'>";
                    checkbox_tool += "<label>";
                    checkbox_tool += "<input type='checkbox' value='" + value + "' class=''>";
                    checkbox_tool += "<span>" + value + "</span>";
                   // checkbox_tool += "<label for='total_tools_" + tool.Id + "' class='css-label lrg vlad'>" + tool.Name + "</label>";
                    checkbox_tool += "</label>";             
                    checkbox_tool += "</div>";             
                    $("#team_criteria").append(checkbox_tool);
          });
          checkbox_tool = '';

var citiesCompleto = unique(cities);
 
      $.each(citiesCompleto, function( key, value ) { 
       // console.log(value);
          var checkbox_tool = "<div class='checkbox'>";
                    checkbox_tool += "<label>";
                    checkbox_tool += "<input type='checkbox' value='" + value + "' class=''>";
                    checkbox_tool += "<span>" + value + "</span>";
                   // checkbox_tool += "<label for='total_tools_" + tool.Id + "' class='css-label lrg vlad'>" + tool.Name + "</label>";
                    checkbox_tool += "</label>";             
                    checkbox_tool += "</div>";             
                    $("#cities_criteria").append(checkbox_tool);
          });
          checkbox_tool = '';

var commitCompleto = unique(commitment);
 
      $.each(commitCompleto, function( key, value ) { 
       // console.log(value);
          var checkbox_tool = "<div class='checkbox'>";
                    checkbox_tool += "<label>";
                    checkbox_tool += "<input type='checkbox' value='" + value + "' class=''>";
                    checkbox_tool += "<span>" + value + "</span>";
                   // checkbox_tool += "<label for='total_tools_" + tool.Id + "' class='css-label lrg vlad'>" + tool.Name + "</label>";
                    checkbox_tool += "</label>";             
                    checkbox_tool += "</div>";             
                    $("#commit_criteria").append(checkbox_tool);
          });
          checkbox_tool = '';
 
  FJS.addCriteria({field: 'categories.team', ele: '#team_criteria input:checkbox'});
  FJS.addCriteria({field: 'categories.location', ele: '#cities_criteria input:checkbox'});
  FJS.addCriteria({field: 'categories.commitment', ele: '#commit_criteria input:checkbox'});
 
  window.FJS = FJS;

  function unique(list) {
      var result = [];
      $.each(list, function(i, e) {
          if ($.inArray(e, result) == -1) result.push(e);
      });
      return result;
  }


});
 