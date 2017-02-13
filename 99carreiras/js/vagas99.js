function getQueryStringValue (key) {  
  return decodeURIComponent(window.location.search.replace(new RegExp("^(?:.*[&\\?]" + encodeURIComponent(key).replace(/[\.\+\*]/g, "\\$&") + "(?:\\=([^&]*))?)?.*$", "i"), "$1"));  
}  

// Would write the value of the QueryString-variable called name to the console  
///console.log(getQueryStringValue("name")); 
    //location
    //commitment
    //team
    
var vagas99 = (function () {  

    var filter = '';
    if(getQueryStringValue("team").length > 1) {    
        if(getQueryStringValue("team")=='Policies '){
            filter = "?skip=0&mode=json&team=" + 'Policies+%26+Communications';
        }   else {
            filter = "?skip=0&mode=json&team=" + getQueryStringValue("team");
        }
    }
    if(getQueryStringValue("location").length > 1) {       
        filter = "?skip=0&mode=json&location=" + getQueryStringValue("location");
    }
    if(getQueryStringValue("commitment").length > 1) {       
        filter = "?skip=0&mode=json&commitment=" + getQueryStringValue("commitment");
    }
  
    if(getQueryStringValue("vagaid").length > 1) {       
        filter = "/" + getQueryStringValue("vagaid");
    }
//console.log(filter);
    var urlLever = 'https://api.lever.co/v0/postings/99taxis'+filter;
    console.log(urlLever);
    var json = null;
    jQuery.ajax({
        'async': false,
        'global': false,
        'url': urlLever,
        'dataType': "json",
        'success': function (data) {
            json = data;
        }
    });
    return json;
})();