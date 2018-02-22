$(document).ready(function(){
  $("#register_btn").click(activeRegister);
  $("#login_btn").click(activeLogin);

  function activeLogin()
  {
    $(".panel_register_form").css("display","none");
    $(".panel_login_form").css("display","block");
    $("#register_btn").removeClass("active");
    $("#login_btn").removeClass("disable");
    $("#register_btn").addClass("disable");
    $("#login_btn").addClass("active");
  }
  function activeRegister()
  {
    $(".panel_login_form").css("display","none");
    $(".panel_register_form").css("display","block");
    $("#register_btn").removeClass("disable");
    $("#login_btn").removeClass("active");
    $("#register_btn").addClass("active");
    $("#login_btn").addClass("disable");
  }

  var url = window.location.href;
  if(url == "http://localhost/library/web/app_dev.php/register")
  {
    activeRegister();
  }
  else if(url == "http://localhost/library/web/app_dev.php/login")
  {
    activeLogin();
  }

  var firstname = $("#firstname");
  var firstnameInfo = $("#firstnameInfo");

  var lastname = $("#lastname");
  var lastnameInfo = $("#lastnameInfo");

  var username = $("#username");
  var usernameInfo = $("#usernameInfo");

  var password = $("#password");
  var passwordInfo = $("#passwordInfo");

  var repeatpassword = $("#repeatpassword");
  var repeatpasswordInfo = $("#repeatpasswordInfo");

  var username_login = $("#username_login");
  var username_loginInfo = $("#username_loginInfo");

  var password_login = $("#password_login");
  var password_loginInfo = $("#password_loginInfo");

  firstname.keyup(ValidFirstName);
  lastname.keyup(ValidLastName);
  username.keyup(ValidateUsername);
  password.keyup(ValidatePassword);
  repeatpassword.keyup(ValidRepeatPassword);
  username_login.keyup(ValidLoginUsername);
  password_login.keyup(ValidLoginPassword);

  function ValidFirstName()
  {
    if($.trim(firstname.val()) == '')
    {
      firstname.removeClass("validate");
      firstnameInfo.removeClass("validate");
      firstname.addClass("error");
      firstnameInfo.addClass("error");
      firstnameInfo.html("This field is required");
      status = false;
    }
    else if( $.trim(firstname.val().length) <= 3 || $.trim(firstname.val().length) >= 15 )
    {
      firstname.removeClass("validate");
      firstnameInfo.removeClass("validate");
      firstname.addClass("error");
      firstnameInfo.addClass("error");
      firstnameInfo.html("The first name is between 3 to 15 characters");
      status = false;
    }
    else
    {
      firstname.removeClass("error");
      firstnameInfo.removeClass("error");
      firstname.addClass("validate");
      firstnameInfo.addClass("validate");
      firstnameInfo.html("");
      status = true;
    }
    return status;
  }

  function ValidLastName()
  {
    if($.trim(lastname.val()) == '')
    {
      lastname.removeClass("validate");
      lastnameInfo.removeClass("validate");
      lastname.addClass("error");
      lastnameInfo.addClass("error");
      lastnameInfo.html("This field is required");
      status = false;
    }
    else if( $.trim(lastname.val().length) <= 2 || $.trim(lastname.val().length) >= 15 )
    {
      lastname.removeClass("validate");
      lastnameInfo.removeClass("validate");
      lastname.addClass("error");
      lastnameInfo.addClass("error");
      lastnameInfo.html("This field must have between 2 to 15 characters");
      status = false;
    }
    else
    {
      lastname.removeClass("error");
      lastnameInfo.removeClass("error");
      lastname.addClass("validate");
      lastname.addClass("validate");
      lastname.html("");
      status = true;
    }
    return status;
  }

  function ValidateUsername()
  {
    if( $.trim(username.val()) == '' )
    {
      username.removeClass("validate");
      usernameInfo.removeClass("validate");
      username.addClass("error");
      usernameInfo.addClass("error");
      usernameInfo.html("This field is required");
      status = false;
    }
    else if( $.trim(username.val().length) <= 5 || $.trim(username.val().length) >= 40 )
    {
      username.removeClass("validate");
      usernameInfo.removeClass("validate");
      username.addClass("error");
      usernameInfo.addClass("error");
      usernameInfo.html("The username must have between 5 to 40 characters");
      status = false;
    }
    else
    {
      username.removeClass("error");
      usernameInfo.removeClass("error");
      username.addClass("validate");
      usernameInfo.addClass("validate");
      usernameInfo.html("");
      status = true;
    }
    return status;
  }

  function ValidatePassword()
  {
    if($.trim(password.val()) == '')
    {
      password.removeClass("validate");
      passwordInfo.removeClass("validate");
      password.addClass("error");
      passwordInfo.addClass("error");
      passwordInfo.html("This field is required");
      status = false;
    }
    else if( $.trim(password.val().length) <= 6)
    {
      password.removeClass("validate");
      passwordInfo.removeClass("validate");
      password.addClass("error");
      passwordInfo.addClass("error");
      passwordInfo.html("The password must have minimum 6 characters");
      status = false;
    }
    else
    {
      password.removeClass("error");
      passwordInfo.removeClass("error");
      password.addClass("validate");
      passwordInfo.addClass("validate");
      passwordInfo.html("");
      status = true;
    }
    return status;
  }

  function ValidRepeatPassword()
  {
    if($.trim(repeatpassword.val()) == '')
    {
      repeatpassword.removeClass("validate");
      repeatpasswordInfo.removeClass("validate");
      repeatpassword.addClass("error");
      repeatpasswordInfo.addClass("error");
      repeatpasswordInfo.html("This field is required");
      status = false;
    }
    else if( $.trim(repeatpassword.val()) != $.trim(password.val()) )
    {
      repeatpassword.removeClass("validate");
      repeatpasswordInfo.removeClass("validate");
      repeatpassword.addClass("error");
      repeatpasswordInfo.addClass("error");
      repeatpasswordInfo.html("This password don't match");
      status = false;
    }
    else
    {
      repeatpassword.removeClass("error");
      repeatpasswordInfo.removeClass("error");
      repeatpassword.addClass("validate");
      repeatpasswordInfo.addClass("validate");
      repeatpasswordInfo.html("");
      status = true;
    }
    return status;
  }

  function ValidLoginUsername()
  {
    if($.trim(username_login.val()))
    {
      username_login.removeClass("validate");
      username_loginInfo.removeClass("validate");
      username_login.addClass("error");
      username_loginInfo.addClass("error");
      username_login.html("This field is required");
      status = false;
    }
    else if( $.trim(username_login.val().length) <= 5 || $.trim(username_login.val().length) >= 40 )
    {
      username_login.removeClass("validate");
      username_loginInfo.removeClass("validate");
      username_login.addClass("error");
      username_loginInfo.addClass("error");
      username_loginInfo.html("The username must have between 5 to 40 characters");
      status = false;
    }
    else
    {
      username_login.removeClass("error");
      username_loginInfo.removeClass("error");
      username_login.addClass("validate");
      username_loginInfo.addClass("validate");
      username_loginInfo.html("");
      status = true;
    }
    return status;
  }

  function ValidLoginPassword()
  {
    if($.trim(password_login.val()) == '')
    {
      password_login.removeClass("validate");
      password_loginInfo.removeClass("validate");
      password_login.addClass("error");
      password_loginInfo.addClass("error");
      password_loginInfo.html("This field is required");
      status = false;
    }
    else if( $.trim(password_login.val().length) <= 6 )
    {
      password_login.removeClass("validate");
      password_loginInfo.removeClass("validate");
      password_login.addClass("error");
      password_loginInfo.addClass("error");
      password_loginInfo.html("The password must have minimum 6 characters");
      status = false;
    }
    else
    {
      password_login.removeClass("error");
      password_loginInfo.removeClass("error");
      password_login.addClass("validate");
      password_loginInfo.addClass("validate");
      password_loginInfo.html("");
      status = true;
    }
    return status;
  }

})
