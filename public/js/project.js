$(document).ready(function(){
  $('el-container').show()
  $('body').show().fadeIn(1000);
});


function lineclamp() {
  var lineheight = parseFloat($('.article-excerpt p').css('line-height'));
  var articleheight = $('.article-excerpt').height();
  var calc = parseInt(articleheight/lineheight);
  $(".article-excerpt p").css({"-webkit-line-clamp": "" + calc + ""});
}
$(document).ready(function() {
    lineclamp();
});
$( window ).resize(function() {
 	lineclamp();
});


// remove all .selected classes when clicked anywhere
// hide = true;
// $('body').on("click", function () {
//     if (hide) $('.card').removeClass('selected');
//     hide = true;
// });

// add .selected and hide siblings

//
// articles
//

$('body').on('click', '.article.card', function () {
    var self = $(this);
    self.addClass('selected');
    $('.article.card.selected .article-content').attr('id', 'copy');
    hide = false;
    $(this).siblings().hide();

    $('.back').removeAttr("href");
    $('.back').on('click', function() {
       $('.card').removeClass('selected');
       $('.card').addClass('no-transition');
       self.siblings().show();
       if (!$(".card").hasClass('selected')){
          $('.article-content').attr('id', '');
          setTimeout(function (){
            $('.back').attr("href", '/');
            $('.card').removeClass('no-transition');
          }, 200);
       }
    });

    $('.nav-link').on('click', function() {
       $('.card').removeClass('selected');
       $('.article-content').attr('id', '');
       self.siblings().show();
    });
});


//
//lifts
//

$('body').on('click', '.lift.card', function () {
    var self = $(this);
    self.addClass('selected');
    $('.lift.card.selected .lift-content').attr('id', 'copy');
    hide = false;
    $(this).siblings().hide();

    $('.back').removeAttr("href");
    $('.back').on('click', function() {
       $('.card').removeClass('selected');
       $('.card').addClass('no-transition');
       self.siblings().show();
       if (!$(".card").hasClass('selected')){
          $('.lift-content').attr('id', '');
          setTimeout(function (){
            $('.card').removeClass('no-transition');
            $('.back').attr("href", '/');
          }, 200);
       }
    });

    $('.nav-link').on('click', function() {
       $('.card').removeClass('selected');
       $('.lift-content').attr('id', '');
       self.siblings().show();
    });
});



//
// quotes
//

$(function() {
  $('.quote.card').click( function() {
    $(this).addClass('selected').siblings().removeClass('selected');
  });
});

$('body').on('click', '.quote.card', function () {
    var self = $(this);
    self.addClass('selected');
    $('.quote.card.selected .quote-inner').attr('id', 'copy');
    hide = false;
    $('.back').removeAttr("href");
    $('.back').on('click', function() {
       $('.card').removeClass('selected');
       $('.card').addClass('no-transition');
       self.siblings().show();
       if (!$(".card").hasClass('selected')){
          $('.quote-inner').attr('id', '');
          setTimeout(function (){
            $('.back').attr("href", '/');
            $('.card').removeClass('no-transition');
          }, 200);
       }
    });
    $('.nav-link').on('click', function() {
       $('.card').removeClass('selected');
       $('.quote-inner').attr('id', '');
    });
});

//prepend when clicking other quotes that are not first

$('body').on('click', '.quote.card', function (){
  $('.quote.card.selected').prependTo("#quotes");
});

// Previus and Next Buttons
$('body').on('click', '.next', function (){
  var quote = $('.quote.card');
  quote.next().addClass('selected').prependTo("#quotes").prev().removeClass('selected');
});
$('body').on("click", function () {
  $('.quote.card').eq(1).removeClass('selected');
});
$('body').on('click', '.previous', function (){
  var quote = $('.quote.card');
  quote.last().addClass('selected').prependTo("#quotes").next().removeClass('selected');
});



//
// visuals
//



$(function() {
  $('.visual.card').click( function() {
    $(this).addClass('selected').siblings().removeClass('selected');
  });
});

$('body').on('click', '.visual.card', function () {
    var self = $(this);
    self.addClass('selected');
    hide = false;

    $('.back').removeAttr("href");
    $('.back').on('click', function() {
       $('.card').removeClass('selected');
       $('.card').addClass('no-transition');
       self.siblings().show();
       if (!$(".card").hasClass('selected')){
          setTimeout(function (){
            $('.card').removeClass('no-transition');
            $('.back').attr("href", '/');
          }, 200);
       }
    });
    $('.nav-link').on('click', function() {
       $('.card').removeClass('selected');
    });
});

//prepend when clicking other quotes that are not first

$('body').on('click', '.visual.card', function (){
  $('.visual.card.selected').prependTo("#visuals");
});

// Previus and Next Buttons

$('body').on('click', '.next', function (){
  var quote = $('.visual.card');
  quote.next().addClass('selected').prependTo("#visuals").prev().removeClass('selected');
});
$('body').on("click", function () {
  $('.visual.card').eq(1).removeClass('selected');
});

$('body').on('click', '.previous', function (){
  var quote = $('.visual.card');
  quote.last().addClass('selected').prependTo("#visuals").next().removeClass('selected');
});


//
// videos
//



$(function() {
  $('.video.card').click( function() {
    $(this).addClass('selected').siblings().removeClass('selected');
  });
});

$('body').on('click', '.video.card', function () {
    var self = $(this);
    self.addClass('selected');
    hide = false;

    $('.back').removeAttr("href");
    $('.back').on('click', function() {
       $('.card').removeClass('selected');
       $('.card').addClass('no-transition');
       self.siblings().show();
       if (!$(".card").hasClass('selected')){
          setTimeout(function (){
            $('.card').removeClass('no-transition');
            $('.back').attr("href", '/');
          }, 200);
       }
    });
    $('.nav-link').on('click', function() {
       $('.card').removeClass('selected');
    });
});

//prepend when clicking other quotes that are not first

$('body').on('click', '.video.card', function (){
  $('.video.card.selected').prependTo("#videos");
});

// Previus and Next Buttons

$('body').on('click', '.next', function (){
  var quote = $('.video.card');
  quote.next().addClass('selected').prependTo("#videos").prev().removeClass('selected');
});
$('body').on("click", function () {
  $('.video.card').eq(1).removeClass('selected');
});

$('body').on('click', '.previous', function (){
  var quote = $('.video.card');
  quote.last().addClass('selected').prependTo("#videos").next().removeClass('selected');
});



//
//Jokes
//

$('body').on('click', '.joke.card', function () {
    var self = $(this);
    self.addClass('selected');
    $('.joke.card.selected .joke-content').attr('id', 'copy');
    hide = false;
    $(this).siblings().hide();

    $('.back').removeAttr("href");
    $('.back').on('click', function() {
       $('.card').removeClass('selected');
       $('.card').addClass('no-transition');
       self.siblings().show();
       if (!$(".card").hasClass('selected')){
          $('.joke-content').attr('id', '');
          setTimeout(function (){
            $('.card').removeClass('no-transition');
            $('.back').attr("href", '/');
          }, 200);
       }
    });

    $('.nav-link').on('click', function() {
       $('.card').removeClass('selected');
       $('.joke-content').attr('id', '');
       self.siblings().show();
    });
});


//
// Copy To Clipboard
//


function copyToClipboard(target) {
  var element = document.getElementById(target);
  var text = $(element).clone().find('br').prepend('\r\n').prepend('\r\n').end().text()
  CopyToClipboard(text);
  alert("Copied to clipboard!");
}

function CopyToClipboard (text) {
	if (window.clipboardData && window.clipboardData.setData) {
		// IE specific code path to prevent textarea being shown while dialog is visible.
		return clipboardData.setData("Text", text);

  } else if (document.queryCommandSupported && document.queryCommandSupported("copy")) {
    var textarea = document.createElement("textarea");
    textarea.textContent = text;
    textarea.style.position = "fixed";  // Prevent scrolling to bottom of page in MS Edge.
    document.body.appendChild(textarea);
    textarea.select();

    try {
      return document.execCommand("copy");  // Security exception may be thrown by some browsers.
    } catch (ex) {
      console.warn("Copy to clipboard failed.", ex);
      return false;
    } finally {
      document.body.removeChild(textarea);
    }
	}
}
//
// Cookie Message
//
function del_cookie(name)
{
    document.cookie = name + '=; expires=Thu, 01 Jan 1970 00:00:01 GMT;';
}

function getCookie(c_name) {
    var c_value = document.cookie;
    var c_start = c_value.indexOf(" " + c_name + "=");
    if (c_start == -1) {
        c_start = c_value.indexOf(c_name + "=");
    }
    if (c_start == -1) {
        c_value = null;
    } else {
        c_start = c_value.indexOf("=", c_start) + 1;
        var c_end = c_value.indexOf(";", c_start);
        if (c_end == -1) {
            c_end = c_value.length;
        }
        c_value = unescape(c_value.substring(c_start, c_end));
    }
    return c_value;
}


$(document).ready(function () {
    $("#delCookie").click(function(){
        del_cookie("cookie");
    });
    $("#close-message").click(function(){
        $(".welcome-message").hide();
    });

    console.log(document.cookie);
    var visit = getCookie("cookie");
    if (visit == null) {
        $(".welcome-message").show();
        var expire = new Date();
        expire = new Date(expire.getTime() + 7776000000);
        document.cookie = "cookie=here; expires=" + expire;
    } else {
      $(".welcome-message").hide();
    }
});

$(document).ready(function () {
  $('div.lift-content a').attr('target','_blank');
  $('div.article-content a').attr('target','_blank');
});



// Auto-scaling iframes
//-----------------------



// function iframeAutoScale() {
//
//   'use strict';
//
//   $('iframe').each(function () {
//     var
//       parentWidth = $(this).parent().innerWidth(),
//       ratio = 0.75,	// default ratio (4:3)
//       width = $(this).attr('width'),
//       height = $(this).attr('height');
//
//     // overwrite default ratio if width and height attributes are not set
//     if (width !== undefined && height !== undefined) {
//       ratio = height / width;
//     }
//
//     $(this).attr('width', parentWidth);
//     $(this).attr('height', parentWidth * ratio);
//   });
// }
//
// // onload
// $(document).ready(function () {
//   iframeAutoScale();
// });
//
// // on window resize
// $(window).resize(function () {
//   iframeAutoScale();
// });
