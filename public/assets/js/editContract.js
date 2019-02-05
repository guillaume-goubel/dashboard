'use strict'

$(document).ready(function () {
    
    $('#linkEdit').on('click touch', function() {

        var saleId = $( "#get-infoSaleId" ).html(); 
        var path  = 'http://127.0.0.1:8000/user/sales/salesEdit/' + saleId ;

        $.ajax({
            type: "post",
            url: path,
            // dataType: 'html',	
        })      
        .done(function (data, textStatus, jqxhr) {
            $('#infoCustomerContainer').empty();
            $('#infoCustomerContainer').html(data);
        })      
        .fail(function (jqxhr) {
            alert('fichier pas récupéré')
        })      
        .always(function () {       
        });

    });




});

