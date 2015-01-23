function addNew() {
	count = document.getElementById("count").innerHTML;
	count++;
	document.getElementById("count").innerHTML = count;
	console.log(count);
    newp = '<p>Point '+count+'<br><label>Start: </label><input type="text" id="start'+count+'" name="start'+count+'"><label> End: </label><input type="text" id="end'+count+'" name="end'+count+'"></p>';
    document.getElementById("input_fields").innerHTML += newp;
}

// Login form validation 
$(window).load(function() {

 $('form#user-login').find('input[type="submit"]').click (function() {
    if ($('input#username').val().length == 0) {
      $('input#username').siblings('span.error').css("display","block");
      return false;
    } else {
      $('input#username').siblings('span.error').css("display","none");
    }
  });
  $('form#user-login').find('input[type="submit"]').click (function() {
    if ($('input#password').val().length == 0) {
      $('input#password').siblings('span.error').css("display","block");
      return false;
    } else {
      $('input#password').siblings('span.error').css("display","none");
    }
  });

// Register form validation


 $('form#user-register').find('input[type="submit"]').click (function() {
    if ($('input#username').val().length == 0) {
      $('input#username').siblings('span.error').css("display","block");
      return false;
    } else {
      $('input#username').siblings('span.error').css("display","none");
    }
  });
  $('form#user-register').find('input[type="submit"]').click (function() {
    if ($('input#password').val().length == 0) {
      $('input#password').siblings('span.error').css("display","block");
      return false;
    } else {
      $('input#password').siblings('span.error').css("display","none");
    }
  });
$('form#user-register').find('input[type="submit"]').click (function() {
    if ($('input#fname').val().length == 0) {
      $('input#fname').siblings('span.error').css("display","block");
      return false;
    } else {
      $('input#fname').siblings('span.error').css("display","none");
    }
  });
  $('form#user-register').find('input[type="submit"]').click (function() {
    if ($('input#sname').val().length == 0) {
      $('input#sname').siblings('span.error').css("display","block");
      return false;
    } else {
      $('input#sname').siblings('span.error').css("display","none");
    }
  });
$('form#user-register').find('input[type="submit"]').click (function() {
    if ($('input#studentid').val().length == 0) {
      $('input#studentid').siblings('span.error').css("display","block");
      return false;
    } else {
      $('input#studentid').siblings('span.error').css("display","none");
    }
  });
  $('form#user-register').find('input[type="submit"]').click (function() {
    if ($('input#permission').val().length == 0) {
      $('input#permission').siblings('span.error').css("display","block");
      return false;
    } else {
      $('input#permission').siblings('span.error').css("display","none");
    }
  });

});