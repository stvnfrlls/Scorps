function getUrlParameters() {
    var params = {};
    var queryString = window.location.search.substring(1);
    var vars = queryString.split("&");

    for (var i = 0; i < vars.length; i++) {
        var pair = vars[i].split("=");
        params[pair[0]] = decodeURIComponent(pair[1]);
    }

    return params;
}