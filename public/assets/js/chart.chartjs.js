'use strict';
  
  // Valeurs récupérée grace aux input cachés en %
  var lowP = $('#lowP').val();
  var middleP = $('#middleP').val();
  var premiumP = $('#premiumP').val();

  // Valeurs récupérée grace aux input cachés en absolu
  var low = $('#low').val();
  var middle = $('#middle').val();
  var premium = $('#premium').val();

$(document).ready(function () {

  var ctx4 = document.getElementById('chartBar4').getContext('2d');
  new Chart(ctx4, {
    type: 'horizontalBar',
    data: {
      labels: ["Starter : " + low , "Middle : " + middle, "Premium : " + premium],
      datasets: [{
        label: 'types de contrats en %',
        data: [lowP, middleP, premiumP],
        backgroundColor: ['#560bd0', '#74de00','#f10075']
      }]
    },
    options: {
      maintainAspectRatio: true,
      legend: {
        display: false,
          labels: {
            display: true
          }
      },
      scales: {
        yAxes: [{
          ticks: {
            beginAtZero:true,
            fontSize: 15,
          }
        }],
        xAxes: [{
          ticks: {
            beginAtZero:true,
            fontSize: 15,
            max: 100
          }
        }]
      }
    }
  });

});


  
  // var variable = document.getElementById(variable).value;
  // console.log(variable);










