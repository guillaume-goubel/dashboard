$(function(){
    'use strict'

    // $('#wizard1').steps({
    //   headerTag: 'h3',
    //   bodyTag: 'section',
    //   autoFocus: true,
    //   titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>'
    // });

    $('#wizard2').steps({
      headerTag: 'h3',
      bodyTag: 'section',
      autoFocus: true,
      titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
      onStepChanging: function (event, currentIndex, newIndex) {
        if(currentIndex < newIndex) {

          // Step 1 form validation
          if(currentIndex === 0) {

            var fname = $('#new_customer_firstName').parsley();
            var lname = $('#new_customer_lastName').parsley();
            
            if(fname.isValid() && 
               lname.isValid() 
               ) {

              return true;
            } else {
              fname.validate();
              lname.validate();
            }
          }

          // Step 2 form validation
          if(currentIndex === 1) {
            
            var address = $('#new_customer_lastName').parsley();
            var zipcode = $('#new_customer_zipCode').parsley();
            var city = $('#new_customer_city').parsley();

            if(address.isValid() && 
               zipcode.isValid() &&
               city.isValid() ) 
            
            {
              return true;
            } else { 
              address.validate();
              zipcode.validate();
              city.validate(); 
            }
          }

          // Step 3 form validation
          if(currentIndex === 2) {
            var email = $('#new_customer_email').parsley();

            if(email.isValid() 
            ) {

           return true;
         } else {
           email.validate();
         }

          }


        // Always allow step back to the previous step even if the current step is not valid.
        } else { return true; }
      }
    });

    // $('#wizard3').steps({
    //   headerTag: 'h3',
    //   bodyTag: 'section',
    //   autoFocus: true,
    //   titleTemplate: '<span class="number">#index#</span> <span class="title">#title#</span>',
    //   stepsOrientation: 1
    // });
  });