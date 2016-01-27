$(document).ready(function () {

  var bottom = $('#locacao').offset().top;
$(window).scroll(function(){
    if ($(window).scrollTop() > $('#locacao').offset().top){
        $('.menu').addClass('fixo');
    }
    else{
        $('.menu').removeClass('fixo');
    }
});

  $('.fa-bars').click(function() {

    // $('.menu .menu-item').toggle('slow');
    $('.menu .fa-bars').toggleClass('active');
    $('.menu .menu-item').slideToggle( "slow" );
  });

  $('.menu .fa-bars:not(.active)').click(function() {

    $('html, body').animate({
      scrollTop: $('.menu-icon').offset().top
    }, 'slow');
  });
});

$(document).ready(function () {

  $('.label.experiencia').click(function() {

    $('.label').removeClass('active');
    $('.label.experiencia').addClass('active');

    $('.content').removeClass('visible');
    $('.content.experiencia').addClass('visible');
  });

  $('.label.profissionalismo').click(function() {

    $('.label').removeClass('active');
    $('.label.profissionalismo').addClass('active');

    $('.content').removeClass('visible');
    $('.content.profissionalismo').addClass('visible');
  });

  $('.label.variedade').click(function() {

    $('.label').removeClass('active');
    $('.label.variedade').addClass('active');

    $('.content').removeClass('visible');
    $('.content.variedade').addClass('visible');
  });

  $('.label.custo-beneficio').click(function() {

    $('.label').removeClass('active');
    $('.label.custo-beneficio').addClass('active');

    $('.content').removeClass('visible');
    $('.content.custo-beneficio').addClass('visible');
  });
  
  $('.label.atendimento').click(function() {

    $('.label').removeClass('active');
    $('.label.atendimento').addClass('active');

    $('.content').removeClass('visible');
    $('.content.atendimento').addClass('visible');
  });
});

$(document).ready(function () {

  if ($('.resolucao').css('position') == 'static') {

    $('.btn.buffet').click(function() {

      $('.btn').removeClass('active');
      $('.btn.buffet').addClass('active');
      $('.card').removeClass('visible');
      $('.card').hide();
      $('.card.buffet').addClass('visible');
      $('.card.buffet').slideDown(1000);
      $('html, body').animate({ scrollTop: $('.btn.buffet').offset().top - 30}, 'slow');
    });

    $('.btn.decoracao').click(function() {

      $('.btn').removeClass('active');
      $('.btn.decoracao').addClass('active');
      $('.card').removeClass('visible');
      $('.card').hide();
      $('.card.decoracao').addClass('visible');
      $('.card.decoracao').slideDown(1000);
      $('html, body').animate({ scrollTop: $('.btn.decoracao').offset().top - 30}, 'slow');
    });

    $('.btn.areia').click(function() {

      $('.btn').removeClass('active');
      $('.btn.areia').addClass('active');
      $('.card').removeClass('visible');
      $('.card').hide();
      $('.card.areia').addClass('visible');
      $('.card.areia').slideDown(1000);
      $('html, body').animate({ scrollTop: $('.btn.areia').offset().top - 30}, 'slow');
    });

    $('.btn.openbar').click(function() {

      $('.btn').removeClass('active');
      $('.btn.openbar').addClass('active');
      $('.card').removeClass('visible');
      $('.card').hide();
      $('.card.openbar').addClass('visible');
      $('.card.openbar').slideDown(1000);
      $('html, body').animate({ scrollTop: $('.btn.openbar').offset().top - 30}, 'slow');
    });

    $('.btn.assessoria').click(function() {

      $('.btn').removeClass('active');
      $('.btn.assessoria').addClass('active');
      $('.card').removeClass('visible');
      $('.card').hide();
      $('.card.assessoria').addClass('visible');
      $('.card.assessoria').slideDown(1000);
      $('html, body').animate({ scrollTop: $('.btn.assessoria').offset().top - 30}, 'slow');
    });

  } else {

    $('.btn.buffet').click(function() {

      $('.btn').removeClass('active');
      $('.btn.buffet').addClass('active');
      $('.card').removeClass('visible');
      $('.card').fadeOut();
      $('.card.buffet').addClass('visible');
      $('.card.buffet').fadeIn(500);
      $('html, body').animate({ scrollTop: $('.btn.buffet').offset().top - 30 - 30}, 'slow');
    });

    $('.btn.decoracao').click(function() {

      $('.btn').removeClass('active');
      $('.btn.decoracao').addClass('active');
      $('.card').removeClass('visible');
      $('.card').fadeOut();
      $('.card.decoracao').addClass('visible');
      $('.card.decoracao').fadeIn(500);
      $('html, body').animate({ scrollTop: $('.btn.decoracao').offset().top - 30 - 30}, 'slow');
    });

    $('.btn.areia').click(function() {

      $('.btn').removeClass('active');
      $('.btn.areia').addClass('active');
      $('.card').removeClass('visible');
      $('.card').fadeOut();
      $('.card.areia').addClass('visible');
      $('.card.areia').fadeIn(500);
      $('html, body').animate({ scrollTop: $('.btn.areia').offset().top - 30 - 30}, 'slow');
    });

    $('.btn.openbar').click(function() {

      $('.btn').removeClass('active');
      $('.btn.openbar').addClass('active');
      $('.card').removeClass('visible');
      $('.card').fadeOut();
      $('.card.openbar').addClass('visible');
      $('.card.openbar').fadeIn(500);
      $('html, body').animate({ scrollTop: $('.btn.openbar').offset().top - 30 - 30}, 'slow');
    });

    $('.btn.assessoria').click(function() {

      $('.btn').removeClass('active');
      $('.btn.assessoria').addClass('active');
      $('.card').removeClass('visible');
      $('.card').fadeOut();
      $('.card.assessoria').addClass('visible');
      $('.card.assessoria').fadeIn(500);
      $('html, body').animate({ scrollTop: $('.btn.assessoria').offset().top - 30 - 30}, 'slow');
    });
  }


});

$(document).ready(function () {

  $(".slider").cycle({

    timeout: 5000,
    speed: 1000
  });
});
