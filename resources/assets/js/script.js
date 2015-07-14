// ACRIVE_NAV
    $(".nav a").on("click", function(){
        $(".nav").find(".active").removeClass("active");
        $(this).parent().addClass("active");
    });
// COLLAPSE
    $(".nav a").on("click", function(){
      $('.collapse').collapse('hide')
    });
// SCROLL
$('.smoothScroll').click(function(event) {
    event.preventDefault();
    var href=$(this).attr('href');
    var target=$(href);
    var top=target.offset().top;
    $('html,body').clearQueue().animate({
      scrollTop: top
    }, 1700);
});
// MORE ITEMS
load_items();
load_items();

$('.tech_wrap').find('.more_item').on('click', function(){
    $('.tech_wrap').find('.more_item').find('.fa').css('display','inline-block');
    setTimeout(function() {
        load_items();
        load_items();
        var $items = $('.tech_wrap').find('.one_item').filter(function(){
            return  $(this).css('display') == 'none';
        })
        if (!$items.length) {
            $('.tech_wrap').find('.more_item').css('visibility','hidden');
        }
    $('.tech_wrap').find('.more_item').find('.fa').css('display','none');
    }, 500);

})
function load_items (){
    var $items = $('.tech_wrap').find('.one_item').filter(function(){
        return  $(this).css('display') == 'none';
    })
    // if ($items.length) {
        $items.slice(0,3).css('display','block');
    // } else {
        // $('.tech_wrap').find('.more_item').css('visibility','hidden');
    // }
}
// MORE SPARES
load_spares();
load_spares();
$('.sapre_wrap').find('.more_item').on('click', function(){
    $('.sapre_wrap').find('.more_item').find('.fa').css('display','inline-block');
    setTimeout(function() {
        load_spares();
       load_spares(); 
        var $spares = $('.sapre_wrap').find('.one_item').filter(function(){
            return  $(this).css('display') == 'none';
        })
        if (!$spares.length) {
            $('.sapre_wrap').find('.more_item').css('visibility','hidden');
        }
    $('.sapre_wrap').find('.more_item').find('.fa').css('display','none');
   }, 500);
})
function load_spares (){
    var $spares = $('.sapre_wrap').find('.one_item').filter(function(){
        return  $(this).css('display') == 'none';
    })
    // if ($spares.length) {
        $spares.slice(0,3).css('display','inline-block');
    // } else {
        // $('.sapre_wrap').find('.more_item').css('visibility','hidden');
    // }
}
// MODALS
$('.o_btn').on('click', function(event){
    // event.preventDefault();
    // event.stopPropagation();
    $('.item_m').modal('hide');
    setTimeout(function(){
        $('body').addClass('modal-open');
        $('.modal-backdrop').addClass('in');
    }, 400)
})