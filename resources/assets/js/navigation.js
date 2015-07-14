// ACTIVE_NAV
    $(".nav a").on("click", function(){
        $(".nav").find(".active_my").removeClass("active_my");
        $(this).parent().addClass("active_my");
    });
// COLLAPSE
    $(".nav a").on("click", function(){
      $('.collapse').collapse('hide')
    });
