// =============================================
// Get lat and long for Google API
// =============================================

$(document).ready(function () {

    "use strict"

    // (street)
    var street = $('#streetForMap').val();

    // (code postale)
    var zipcode = $('#zipCodeForMap').val();

    // (city)
    var city = $('#cityForMap').val();
    // (country)
    var country = 'France';

    var source = 'https://nominatim.openstreetmap.org/search?q=' + street + '+' + zipcode + '+' + city + '+' + country + '+' + '&format=json&polygon=1&addressdetails=1'

    $.ajax({
            url: source,
            dataType: "json",
        })

        .done(function (data, textStatus, jqxhr) {
            var latitude = data[0].lat;
            var longitude = data[0].lon;

            var mapMarker = new GMaps({
                el: '#map2',
                lat: latitude,
                lng: longitude,
                zoom: 15
            });
        
            mapMarker.addMarker({
                lat: latitude,
                lng: longitude,
                title: 'Themepixels',
                click: function (e) {
                    alert('You clicked in this marker');
                }
            });
        })

        .fail(function (jqxhr) {
            alert('fichier pas récupéré')
        })

        .always(function () {

        });




});