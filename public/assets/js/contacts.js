'use strict'

    $(function(){

        new PerfectScrollbar('#azContactList', {
          suppressScrollX: true
        });

        new PerfectScrollbar('.az-contact-info-body', {
          suppressScrollX: true
        });

        //ON START***************************************


        //ON CLICK****************************************
        $('.az-contact-item').on('click touch', function() {
          
          // Add selected
          $(this).addClass('selected');      
          $(this).siblings().removeClass('selected');
          $('body').addClass('az-content-body-show');
          
          //****************************************** */Set and get value of sales infos on the rigth page
          var infoLastName = $(this).find('#set-infoLastName').val();
          $('#get-infoLastName').html(infoLastName);

          //Id du Customer
          var infoId = $(this).find('#set-infoId').val();
          $('#get-infoId').html(infoId);

          //Id de Sale
          var infoSaleId = $(this).find('#set-infoSaleId').val();
          $('#get-infoSaleId').html(infoSaleId);

          var infoEmail = $(this).find('#set-infoEmail').val();
          $('#get-infoEmail').html(infoEmail);

          var infoAddress = $(this).find('#set-infoAddress').val();
          $('#get-infoAddress').html(infoAddress);

          var infoCreatedAt = $(this).find('#set-infoCreatedAt').val();
          $('#get-infoCreatedAt').html(infoCreatedAt);

          //Passer la valeur de l'id à l'url sans espace (lien vers edition)
          var linkEditURL = infoSaleId.trim();
          $( "#linkEdit" ).attr( 'href', 'http://127.0.0.1:8000/user/sales/salesEdit/' + linkEditURL );

          //Passer la valeur de l'id à l'url sans espace (lien vers delete)
          var linkDeleteURL = infoSaleId.trim();
          $( "#linkDelete" ).attr( 'href', 'http://127.0.0.1:8000/user/sales/salesDelete/' + linkDeleteURL );

          //Passer la valeur de l'id du customer à l'url sans espace (lien vers googleMap)
          var linkGoogleMap = infoId.trim();
          $( "#linkGoogleMap" ).attr( 'href', 'http://127.0.0.1:8000/user/customer/customerMap/' + linkGoogleMap );

        })
         //****************************************** */Set and get value of sales infos on the rigth page

      });




    
