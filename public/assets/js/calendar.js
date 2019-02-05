$(function(){
    'use strict'

    $('.select2-modal').select2({
      minimumResultsForSearch: Infinity,
      dropdownCssClass: 'az-select2-dropdown-modal',
    });

    $('#dateToday').text(moment().format('ddd, MMMM DD YYYY'));

  });