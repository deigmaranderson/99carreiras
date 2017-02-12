var vagas99 = (function () {
    var json = null;
    $.ajax({
        'async': false,
        'global': false,
        'url': 'https://api.lever.co/v0/postings/99taxis?skip=0&mode=json',
        'dataType': "json",
        'success': function (data) {
            json = data;
        }
    });
    return json;
})();