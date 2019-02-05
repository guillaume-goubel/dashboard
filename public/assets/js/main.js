//Active Menu
$(".nav-item").on({
    mouseenter: function () {
        $(this).addClass('active');
    },
    mouseleave: function () {
        $( this ).removeClass('active');
          }
  });