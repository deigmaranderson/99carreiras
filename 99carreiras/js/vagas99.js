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
            filter = "&team=" + 'Policies+%26+Communications';
        }   else {
            filter = "&team=" + getQueryStringValue("team");
        }
    }
    if(getQueryStringValue("location").length > 1) {       
        filter = "&location=" + getQueryStringValue("location");
    }
    if(getQueryStringValue("commitment").length > 1) {       
        filter = "&commitment=" + getQueryStringValue("commitment");
    }
 console.log(filter);
 
    var json = null;
    jQuery.ajax({
        'async': false,
        'global': false,
        'url': 'https://api.lever.co/v0/postings/99taxis?skip=0&mode=json'+filter,
        'dataType': "json",
        'success': function (data) {
            json = data;
        }
    });
    return json;
})();