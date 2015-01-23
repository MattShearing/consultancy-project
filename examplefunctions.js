$(window).load(function() {

  ////////////////////////////////////////////////////////////

  // MOBILE MENU
  $('#menu').click(function(e) {
    e.preventDefault();
    $(this).toggleClass('active');
    $('nav[role="navigation"]').slideToggle();
  });

  ////////////////////////////////////////////////////////////

  // SIGN IN
  $('#login-button').click(function(e) {
    e.preventDefault();
    $('#login form.memberform').animate({"top" : "0"}, 500);
  });

  $('#login-close-button').click(function(e) {
    e.preventDefault();
    $('#login form.memberform').animate({"top" : "-400px"}, 500);
  });

  ////////////////////////////////////////////////////////////

  // NIVOSLIDER
  $('#slider').nivoSlider({
    effect: 'fade',
    pauseTime: 5000
  });

  ////////////////////////////////////////////////////////////

  // FANCYBOX
  $('.fancybox').fancybox({
    maxWidth: 900
  });

  ////////////////////////////////////////////////////////////

  // HIDE NEWSLETTER BLOCK
  //cookie functions
  function setCookie(key, value) {
    var expires = new Date();
    expires.setTime(expires.getTime() + (30 * 24 * 60 * 60 * 1000)); // 1 month
    document.cookie = key + '=' + value + ';path=/'+ ';expires=' + expires.toUTCString();
  }

  function getCookie(key) {
    var keyValue = document.cookie.match('(^|;) ?' + key + '=([^;]*)(;|$)');
    return keyValue ? keyValue[2] : null;
  }

  // check cookie
  var checkCookie = getCookie("newsletterDisplay");
  // if cookie is not no, display newsletter box
  if (checkCookie!="no"||checkCookie==""||checkCookie==null) {
    $('.newsletter-sign-up').show();
  }
  // by default, show newsletter box
  $('#hide-newsletter-sign-up').click(function(e) {
    e.preventDefault();
    $('.newsletter-sign-up').slideUp();
    setCookie("newsletterDisplay","no");
  });

  ////////////////////////////////////////////////////////////
  
  // PRODUCT FILTER
  // variables
  var filterDiv = $(".best-selling-filter");
  // javascript is loaded so overwrite CSS fallback
  // by hiding content divs and marking link as current
  filterDiv.find(".products").hide();
  filterDiv.find(".products").last().show();
  filterDiv.find("h2").find("a").last().addClass("current");
  // if filter link is clicked
  filterDiv.find("h2").find("a").click(function(e) {
    //stop link default behaviour
    e.preventDefault();
    // remove any current classes
    filterDiv.find("h2").find("a").removeClass("current");
    $(this).addClass("current");
    // get selected filter
    var selectedLink = $(this).attr("href");

    // SIMPLE ANIMATION
    // slide up any showing content
    filterDiv.find(".products").hide();
    // slide down filtered content
    filterDiv.find(selectedLink).show();
  });

  ////////////////////////////////////////////////////////////

  // SIMPLE TABS
  // variables
  var tabs = $('.tabbed').find('.tabs').find('a');
  var tabContent = $('.tabbed').find('.tab-content');
  // javascript is loaded so let's add classes and hide some content
  tabs.first().addClass("active");
  tabContent.hide();
  tabContent.first().show();
  // if user clicks tab
  tabs.click(function(e) {
    //stop link default behaviour
    e.preventDefault();
    // get selected tab
    var selectedtab = $(this).attr("href");
    // remove all active classes
    tabs.removeClass("active");
    // add active class to clicked link
    $(this).addClass("active");
    // hide all tabbed content
    tabContent.hide();
    // show selected tabbed content
    $('div'+selectedtab+'.tab-content').show();
  });

  ////////////////////////////////////////////////////////////

  // TOOLTIP / POP-UP
  $('.products').find(".product").on("click",".tooltip-trigger", function() {
    var productDiv = $(this).parent();
    var productDivActive = productDiv.attr('class');

    if (productDivActive == "product active") {
      productDiv.removeClass("active");
    } else {
      $('.products').find(".product").removeClass("active");
      productDiv.addClass("active");
    }
  });

  // close button on tooltip
  $(".tooltip").find("a.close").click(function(e) {
    //stop link default behaviour
    e.preventDefault();
    //close tooltip
    $(".product").removeClass("active");
  });

  // TOOLTIP / POP-UP
  $('.product-categories').find(".quarter-block").on("click",".tooltip-trigger", function() {
    var productDiv = $(this).parent();
    var productDivActive = productDiv.attr('class');

    if (productDivActive == "quarter-block active") {
      productDiv.removeClass("active");
    } else {
      $('.product-categories').find(".quarter-block").removeClass("active");
      productDiv.addClass("active");
    }
  });

  ////////////////////////////////////////////////////////////

  // close button on tooltip
  $(".tooltip").find("a.close").click(function(e) {
    //stop link default behaviour
    e.preventDefault();
    //close tooltip
    $(".quarter-block").removeClass("active");
  });

  ////////////////////////////////////////////////////////////

  // COLOUR PREVIEW UPDATER (ENVELOPES)
  $('.products').find(".product").find(".colours").find("label.colour").click(function() {
    var colourName = $(this).find("img").attr("alt");
    var largeImg = $(this).find("img").attr("data-largeimg");
    var tooltipImg = $(this).find("img").attr("data-tooltipimg");
    var prodDiv = $(this).parent().parent().parent();
    prodDiv.find("p.selected-color").find("span").text(colourName);
    prodDiv.find("input.selected-color").val(colourName);
    // swap out images
    prodDiv.find(".tooltip-trigger").find("img").animate({"opacity" : "0"}, 300, function() {
      // use call back to issue animation order, i.e. that image doesn't appear before fade out
      $(this).attr("src", largeImg).animate({"opacity" : "1"}, 300);
    });
    // swap out tooltip
    prodDiv.find(".tooltip").find("img.img").replaceWith('<img class="img" src="'+tooltipImg+'" alt="'+colourName+'">');
    prodDiv.find(".tooltip").find("span.selected-color").text(colourName);
  });

  ////////////////////////////////////////////////////////////

  // IMAGE SWAP (PAPER/CARD DETAIL PAGE)
  // variables
  var thumb = $(".intro-img").find(".intro-img-all").find("img.thumb");
  var main = $(".intro-img").find(".intro-img-main").find("img");
  var mainLink = $(".intro-img").find("a.fancybox");


  // count the number of thumbnails
  var thumbNum = thumb.length;

  // if there is more than one thumbnail
  if (thumbNum > 1) {

    // js is loaded, add the pointer style
    thumb.addClass("active");

    // make first the current
    thumb.first().addClass("current");

    thumb.click(function() {

      //FIND OUT IF THIS IS ON THE SPECIAL OFFERS PAGE
      var parentDiv = $(this).parent().parent().parent();
      var specialOffer = parentDiv.hasClass("special-offer");

      // remove current class
      thumb.removeClass("current");

      // add current to clicked thumb
      $(this).addClass("current");

      // get main image ref and large image ref
      var mainImg = $(this).attr("data-main");
      var largeImg = $(this).attr("data-large");
      var altTitle = $(this).attr("alt");

      //CHECK IF THIS IS A SPECIAL OFFER
      if (specialOffer == false) {
        // NOT ON THE SPECIAL OFFERS TOP-LEVEL PAGE

        // swap out images
        // new animation
        main.animate({"opacity" : "0"}, 500, function() {
          // use call back to issue animation order, i.e. that image doesn't appear before fade out
          $(this).attr("src", mainImg).animate({"opacity" : "1"}, 500);
          $(this).attr("alt", altTitle);
        });
        mainLink.attr("href", largeImg);
        mainLink.attr("title", altTitle);

      } else {
        // ON THE SPECIAL OFFERS TOP-LEVEL PAGE

        var specialOfferID = parentDiv.attr("id");

        var mainSO = $("#" + specialOfferID).find(".intro-img").find(".intro-img-main").find("img");
        var mainLinkSO = $("#" + specialOfferID).find(".intro-img").find("a.fancybox");

        // swap out images
        // new animation
        mainSO.animate({"opacity" : "0"}, 500, function() {
          // use call back to issue animation order, i.e. that image doesn't appear before fade out
          $(this).attr("src", mainImg).animate({"opacity" : "1"}, 500);
          $(this).attr("alt", altTitle);
        });
        mainLinkSO.attr("href", largeImg);
        mainLinkSO.attr("title", altTitle);

      }

    });
  }

  ////////////////////////////////////////////////////////////

  // PACK PRICE UPDATER
  $("form.pack-buy, form.simple-product-buy").find("select#packsize").change(function() {
    // price
    var packPrice = $(this).find("option:selected").attr("data-price");
    $(this).parent().parent().siblings(".option").find("b.price").text(packPrice);
    // inventory
    var packInventory = $(this).find("option:selected").attr("data-inventory");
    // check there is an inventory
    if (packInventory) {
      // check inventory is 20 or less
      if (packInventory <= 20) {
        $(this).parent().parent().siblings(".option").find("span.inventory").text("- Only "+packInventory+" left!");
      } else {
        $(this).parent().parent().siblings(".option").find("span.inventory").text("");
      }
    }
    // old price
    var packPriceOld = $(this).find("option:selected").attr("data-old-price");
    // check there is an old price
    if (packPriceOld) {
      $(this).parent().parent().siblings(".option").find("b.price").append(' <span class="old-price">&pound;'+packPriceOld+'</span>');
    }
  });

  ////////////////////////////////////////////////////////////

  // STICKY DIV
  $(window).scroll(function() {
    var stickyDivs = $(".basket-summary, .picks-aside-inner");
    var triggerPoint = 498;
    var bodyTop = $(window).scrollTop();
    var windowHeight = $(window).height();
    var productsDivHeight = $(".products").height();

    if (bodyTop > triggerPoint) {
      //only trigger if height is smaller than window
      //need to look at each box individually
      if ($(".basket-summary").height() < windowHeight) {
        if ($(".basket-summary").height() < productsDivHeight) {
          $(".basket-summary").addClass("fixed");
        }
      }
      if ($(".picks-aside-inner").height() < windowHeight) {
        if ($(".picks-aside-inner").height() < productsDivHeight) {
          $(".picks-aside-inner").addClass("fixed");
        }
      }
    } else {
      stickyDivs.removeClass("fixed");
    }
  });

  ////////////////////////////////////////////////////////////

  // FAVOURITES

  // Not logged in, can't add favourite
  $('a.favourite-login').on("click", function(){
    if (confirm("You need to log in to save favourites. Login in now?")) {
      return true;
    }
    return false;
  });

  // Apply the event handlers
  $('a.favourite-save').click (function() {
    var link = $(this).attr('href')
    $(this).siblings('.favourite-status').load(link, function() {
      $(this).siblings('.favourite-remove').show();
    });
    $(this).hide();
    return false;
  });

  $('a.favourite-remove').click (function() {
    var link = $(this).attr('href')
    $(this).siblings('.favourite-status').load(link, function() {
      $(this).siblings('.favourite-save').show();
    });
    $(this).hide();
    return false;
  });

  // Delete All Favourites
  $('a.favourite-remove-all').on("click", function(){
    if (confirm("Are you sure you want to remove all your favourites?")) {
      return true;
    }
    return false;
  });

  ////////////////////////////////////////////////////////////

  // CHECKOUT
  // Hide shipping form fields
  $('form#customer-details-form').find('select[name="use_billing_info"]').change(function() {
	if ($('form#customer-details-form').find('select[name="use_billing_info"]').val() == 'yes') {
      $('#first_name').val($('#shipping_first_name').val());
      $('#last_name').val($('#shipping_last_name').val());
      $('#phone').val($('#shipping_phone').val());
      $('#mobile').val($('#shipping_mobile').val());
	  $('#company').val($('#shipping_company').val());
	  $('#address').val($('#shipping_address').val());
	  $('#address2').val($('#shipping_address2').val());
	  $('#city').val($('#shipping_city').val());
	  $('#state').val($('#shipping_state').val());
	  $('#zip').val($('#shipping_zip').val());
	  $('select[name="country_code"]').val($('#shipping_country_code').val());
	}
  });
  
  $('form#customer-details-form').find('input#first_name').keypress(function() {
    $('select#addresscopy').val('no');
  });
  $('form#customer-details-form').find('input#last_name').keypress(function() {
    $('select#addresscopy').val('no');
  });
  $('form#customer-details-form').find('input#phone').keypress(function() {
    $('select#addresscopy').val('no');
  });
  $('form#customer-details-form').find('input#mobile').keypress(function() {
    $('select#addresscopy').val('no');
  });
  
  $('form#customer-details-form').find('input#company').keypress(function() {
    $('select#addresscopy').val('no');
  });
  $('form#customer-details-form').find('input#address').keypress(function() {
    $('select#addresscopy').val('no');
  });
  $('form#customer-details-form').find('input#address2').keypress(function() {
    $('select#addresscopy').val('no');
  });
  $('form#customer-details-form').find('input#city').keypress(function() {
    $('select#addresscopy').val('no');
  });
  $('form#customer-details-form').find('input#state').keypress(function() {
    $('select#addresscopy').val('no');
  });
  $('form#customer-details-form').find('input#zip').keypress(function() {
    $('select#addresscopy').val('no');
  });
  $('form#customer-details-form').find('select[name="country_code"]').change(function() {
    $('select#addresscopy').val('no');
  });

  // FORM ERROR CHECKING
  $('#basket-form').find('input#shipping_calculate').click(function() {
	 if ($('p[name="closed-item"]').length != 0) {
		 alert('You have items in your basket which are not currently available. Please return to your basket, removing the highlighted items before you checkout.');
		 return false;
	 }
  });
  // Billing Address
  // Required fields - check value and show error message
  $('form#customer-details-form').find('input[type="submit"]').click (function() {
    if ($('input#first_name').val().length == 0) {
      $('input#first_name').siblings('span.error').css("display","block");
      return false;
    } else {
      $('input#first_name').siblings('span.error').css("display","none");
    }
  });
  $('form#customer-details-form').find('input[type="submit"]').click (function() {
    if ($('input#last_name').val().length == 0) {
      $('input#last_name').siblings('span.error').css("display","block");
      return false;
    } else {
      $('input#last_name').siblings('span.error').css("display","none");
    }
  });
  $('form#customer-details-form').find('input[type="submit"]').click (function() {
    if ($('input#email_address').val().length == 0) {
      $('input#email_address').siblings('span.error').css("display","block");
      return false;
    } else {
      $('input#email_address').siblings('span.error').css("display","none");
    }
  });
  $('form#customer-details-form').find('input[type="submit"]').click (function() {
    if ($('input#address').val().length == 0) {
      $('input#address').siblings('span.error').css("display","block");
      return false;
    } else {
      $('input#address').siblings('span.error').css("display","none");
    }
  });
  $('form#customer-details-form').find('input[type="submit"]').click (function() {
    if ($('input#city').val().length == 0) {
      $('input#city').siblings('span.error').css("display","block");
      return false;
    } else {
      $('input#city').siblings('span.error').css("display","none");
    }
  });
  $('form#customer-details-form').find('input[type="submit"]').click (function() {
    if ($('input#state').val().length == 0) {
      $('input#state').siblings('span.error').css("display","block");
      return false;
    } else {
      $('input#state').siblings('span.error').css("display","none");
    }
  });
  $('form#customer-details-form').find('input[type="submit"]').click (function() {
	if ($('#customer-details-form').find('select[name="country_code"]').val() == 'UK') {
	  if ($('input#zip').val().length == 0) {
        $('input#zip').siblings('span.error').css("display","block");
        return false;
      } else {
        $('input#zip').siblings('span.error').css("display","none");
      }
    } else {
	  $('input#zip').siblings('span.error').css("display","none");
    }
  });
  $('form#customer-details-form').find('input[type="submit"]').click (function() {
    if ($('input#phone').val().length == 0) {
      $('input#phone').siblings('span.error').css("display","block");
      return false;
    } else {
      $('input#phone').siblings('span.error').css("display","none");
    }
  });

  // Shipping Address
  $('form#shipping-details-form').ready (function() {
	  $('input#customer_shipping_zip').prop('readonly', true);
	  $('select[name="customer_shipping_country_code"]').prop('disabled', true);
  });
  $('form#shipping-details-form').find('input[type="submit"]').click (function() {
      if ($('input#shipping_first_name').val().length == 0) {
        $('input#shipping_first_name').siblings('span.error').css("display","block");
        return false;
      } else {
        $('input#shipping_first_name').siblings('span.error').css("display","none");
      }
  });
  $('form#shipping-details-form').find('input[type="submit"]').click (function() {
      if ($('input#shipping_last_name').val().length == 0) {
        $('input#shipping_last_name').siblings('span.error').css("display","block");
        return false;
      } else {
        $('input#shipping_last_name').siblings('span.error').css("display","none");
      }
  });
  $('form#shipping-details-form').find('input[type="submit"]').click (function() {
      if ($('input#shipping_phone').val().length == 0) {
        $('input#shipping_phone').siblings('span.error').css("display","block");
        return false;
      } else {
        $('input#shipping_phone').siblings('span.error').css("display","none");
      }
  });
  $('form#shipping-details-form').find('input[type="submit"]').click (function() {
      if ($('input#shipping_address').val().length == 0) {
        $('input#shipping_address').siblings('span.error').css("display","block");
        return false;
      } else {
        $('input#shipping_address').siblings('span.error').css("display","none");
      }
  });
  $('form#shipping-details-form').find('input[type="submit"]').click (function() {
      if ($('input#shipping_city').val().length == 0) {
        $('input#shipping_city').siblings('span.error').css("display","block");
        return false;
      } else {
        $('input#shipping_city').siblings('span.error').css("display","none");
      }
  });
  $('form#shipping-details-form').find('input[type="submit"]').click (function() {
      if ($('input#shipping_state').val().length == 0) {
        $('input#shipping_state').siblings('span.error').css("display","block");
        return false;
      } else {
        $('input#shipping_state').siblings('span.error').css("display","none");
      }
  });
  $('form#shipping-details-form').find('input[type="submit"]').click (function() {
	  if ($('#customer-details-form').find('select[name="shipping_country_code"]').val() == 'UK') {
	    if ($('input#shipping_zip').val().length == 0) {
          $('input#shipping_zip').siblings('span.error').css("display","block");
          return false;
        } else {
          $('input#shipping_zip').siblings('span.error').css("display","none");
        }
      } else {
	    $('input#shipping_zip').siblings('span.error').css("display","none");
      }
  });

  // Accept terms
  $('form#checkout-form').find('input.check-terms').click (function() {
    if ($('input.order_terms_accepted').prop('checked')==false){
      alert("Please tick the checkbox to accept our terms and conditions");
      return false;
    }
    if (!$("input[name='gateway']:checked").val()) {
      alert("Please select a payment gateway. Do you want to pay by Paypal or by credit/debit card through Realex?");
      return false;
    }
  });
  
  //shipping options on basket page
  $('#basket-form').find('a[name="checkout-link"]').click(function() {
	 if ($('p[name="closed-item"]').length != 0) {
		 alert('You have items in your basket which are not currently available. Please return to your basket, removing the highlighted items before you checkout.');
		 return false;
	 } else {
	   if($('#basket-form').find('select[name="shipping_country_code"] option:selected').val().length == 0) {
	     alert("Please choose a country");
	     return false;
	   } else {
	 	  if($('#basket-form').find('select[name="shipping_country_code"] option:selected').val() == 'UK') {
	 	    if($('input[name="shipping_zip"]').val().length == 0) {
		      alert("Please enter a valid postcode");
		      return false;
	        }
	      }
	   }
     }
  });
  $('#basket-form').find('select[name="shipping_option"]').change(function() {
	 $('#basket-form').find('a[name="checkout-link"]').css("display","none");
	 if ($('p[name="closed-item"]').length != 0) {
		 alert('You have items in your basket which are not currently available. Please return to your basket, removing the highlighted items before you checkout.');
		 return false;
	 } else {
	   if($('#basket-form').find('select[name="shipping_country_code"] option:selected').val().length == 0) {
	     alert("Please choose a country");
	     return false;
	   } else {
	 	  if($('#basket-form').find('select[name="shipping_country_code"] option:selected').val() == 'UK') {
	 	    if($('input[name="shipping_zip"]').val().length == 0) {
		      alert("Please enter a valid postcode");
		      return false;
	        } else {
		      $(this).closest('form').submit();
	        }
	      } else {
		      $(this).closest('form').submit();
	      }
	   }
     }
  });
  $('#basket-form').find('input[name="shipping_calculate"]').click(function() {
     if($('#basket-form').find('select[name="shipping_country_code"] option:selected').val().length == 0) {
	   alert("Please choose a country");
	   return false;
	 } else {
	 	if($('#basket-form').find('select[name="shipping_country_code"] option:selected').val() == 'UK') {
	 	  if($('input[name="shipping_zip"]').val().length == 0) {
		    alert("Please enter a valid postcode");
		    return false;
	      }
	    }
	 }
  });
  $('#basket-form').find('select[name="shipping_country_code"]').change(function() {
    $('input[name="shipping_zip"]').val('');
    $('#basket-form').find('a[name="checkout-link"]').css("display","none");
    if ($(this).val() == 'UK') {
	    $('input[name="shipping_zip"]').css("display","inline-block");
	    $('#country_standard_del').attr("name", '');
	    $('#country_standard_del').val('');
    } else {
	    $('input[name="shipping_zip"]').css("display","none");
	    $('#country_standard_del').attr("name", 'shipping_option');
	    $('#country_standard_del').val('Standard Delivery');
	    if ($('p[name="closed-item"]').length != 0) {
		  alert('You have items in your basket which are not currently available. Please return to your basket, removing the highlighted items before you checkout.');
		  return false;
	    } else {
          $(this).closest('form').submit();
        }
    }
  });
  $('#basket-form').find('input[name="shipping_zip"]').keypress(function() {
	$('#basket-form').find('a[name="checkout-link"]').css("display","none");
    $('select[name="shipping_country_code"]').val('UK');
    $('#country_standard_del').attr("name", '');
    $('#country_standard_del').val('');
  });

  //shipping options on customer details page
    $('form#customer-details-form').find('select[name="country_code"]').change(function() {
      $('input[name="zip"]').val('');
    });
    $('form#customer-details-form').find('input[name="zip"]').keypress(function() {
      $('select[name="country_code"]').val('UK');
    });
    
    $('form#customer-details-form').find('select[name="shipping_country_code"]').change(function() {
      $('input[name="shipping_zip"]').val('');
    });
    $('form#customer-details-form').find('input[name="shipping_zip"]').keypress(function() {
      $('select[name="shipping_country_code"]').val('UK');
    });


  ////////////////////////////////////////////////////////////

});

//@codekit-prepend "jquery.nivo.slider.pack.js"
//@codekit-prepend "jquery.fancybox.pack.js"
//@codekit-append "carousel-ck.js"
//@codekit-append "paperbox-ck.js"