$(document).ready(function () {
    'use strict'

    var elmt_btn = $('#submitBtn');
    var elmt_list = $('#list');

    elmt_btn.on('click', function(){

        var path = 'http://127.0.0.1:8000/ajax';
    
        $.ajax({
            url: path,
            dataType: "json",
        })

        .done(function(data, textStatus, jqxhr){
            console.log(data);
            console.log(jqxhr);
            console.log(textStatus);

            $.each(data, function (indexInArray, valueOfElement) { 
                // console.log(valueOfElement.id);

                var elmt_option = $('<option>');

                elmt_option.attr("value", valueOfElement.id );
                elmt_option.text('vente :' + valueOfElement.id + 'zone :' + valueOfElement.sale_zone  );
                elmt_list.append(elmt_option); 
        
            });
        })
        
        .fail(function(jqxhr){
            alert('fichier pas récupéré')
        })
        
        .always(function(){

        });

    });





    
});