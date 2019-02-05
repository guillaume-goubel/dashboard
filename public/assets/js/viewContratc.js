$(function(){
  'use strict'

  new PerfectScrollbar('#azInvoiceList', {
    suppressScrollX: true
  });

  new PerfectScrollbar('.az-content-body-invoice', {
    suppressScrollX: true
  });

  $('#azInvoiceList .media').on('click', function(e){
    $(this).addClass('selected');
    $(this).siblings().removeClass('selected');

    $('body').addClass('az-content-body-show');
  });

});
