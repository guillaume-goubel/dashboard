$(document).ready(function () {

    // Scrolling partie gauche**********************************************************************************
    new PerfectScrollbar('#azContactList', {
        suppressScrollX: true
    });

    new PerfectScrollbar('.az-contact-info-body', {
        suppressScrollX: true
    });


    new PerfectScrollbar('#azContractsList', {
        suppressScrollX: true
    });

    // AJAX1 pour la partie droite
    /**************************
     * Var
     ***************************/
    var pathAjax1 = $("#ajax_path1").attr("data-path");

    $('.az-contact-item').on('click touch', function () {

        // Add selected
        $(this).addClass('selected');
        $(this).siblings().removeClass('selected');
        $('body').addClass('az-content-body-show');

        //Fait apparaitre les infos clients
        $('#infoCustomer').show();
        $('#subInfosCustomer').show();

        //cache le formulaire + la liste des contrats
        $('#formInfosCustomer').hide();
        $('#azContractsList').hide();

        /*********************************
         * *var idCustomer for AJAX REQUEST
         **********************************/

        var customerId = $(this).find('#set-infoId').val();

        //Find All info Sales
        $.ajax({
                type: "post",
                url: pathAjax1,
                data: {
                    'idCustomer': customerId
                },
            })

            .done(function (data, textStatus, jqxhr) {

                /**
                 * ! FOR CUSTOMER INFO PARTS RIGHT
                 */

                console.log(data);


                // SET INFO CUSTOMER FOR INFO CUSTOMER*************************************************************
                var infoLastName = data[0].last_name
                $('#get-infoLastName').html(infoLastName);

                var customers_id = data[0].id
                $('#get-infoId').html(customers_id);

                // SET INFO CUSTOMER IN FORM*************************************************************
                $('#formCustomerLastName').attr('value', infoLastName);

                var infoFirstName = data[0].first_name
                $('#formCustomerFirstName').attr('value', infoFirstName);

                var infoEmail = data[0].email
                $('#formCustomerEmail').attr('value', infoEmail);

                var infoAddress = data[0].address
                $('#formCustomerAdress').attr('value', infoAddress);

                var infoZipCode = data[0].zip_code
                $('#formCustomerZipCode').attr('value', infoZipCode);

                var infoCity = data[0].city
                $('#formCustomerCity').attr('value', infoCity);


                // SET LINK FOR FORM *************************************************************
                var pathForSubmit = 'http://127.0.0.1:8000/user/sales/editCustomer/' + customers_id;
                $('#FormEditCustomer').attr('action', pathForSubmit);

            })

            .fail(function (jqxhr) {
                alert('fichier pas récupéré')
            })

            .always(function () {

            });

    });



    // CUSTOMER INFO (icone immeuble)
    $('#linkCustomer').on('click touch', function () {

        $('#subInfosCustomer').hide();
        $('#formInfosCustomer').show();
    });

    var pathAjax2 = $("#ajax_path2").attr("data-path");
    var pathAjax1 = $("#ajax_path1").attr("data-path");

    // CUSTOMER INFO + AJAX (icone contrats)
    $('#linkContract').on('click touch', function () {

        $('#subInfosCustomer').hide();
        $('#formInfosCustomer').hide();
        $('#azContractsList').show();

        // le parametre du customer 
        var idCustomer = $('#get-infoId').text();
        console.log(idCustomer);

        $.ajax({
                type: "post",
                url: pathAjax2,
                data: {
                    'idCustomer': idCustomer
                },
            })

            .done(function (data, textStatus, jqxhr) {
                console.log(data);
                var elmt_div_container = $('#azContractsList');
                
                elmt_div_container.empty();
                
                $.each(data, function (index, list) { 
    
                    elmt_div_container.append('<div class="az-contact-item">' +
                    '<div class="az-avatar bg-gray-500 online">' + list.sale_types_id  +'</div>' +
                    '<div class="az-contact-body">'+
                    '<h6> numéro de contrat :' + list.id + '</h6>' +
                    '<span class="phone">Zone de vente :' + list.sale_zone +'</span>' +
                    '</div>');

                });

            })

            .fail(function (jqxhr) {
                alert('fichier pas récupéré')
            })

            .always(function () {

            });

    });



});