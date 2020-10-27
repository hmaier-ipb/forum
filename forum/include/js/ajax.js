
//HTML  <script>document.addEventListener("DOMContentLoaded", function(){init()})</script>

function $ (id) {
  return document.getElementById(id);
}
var json_response;
var params;
var ajaxObj;
var action;
var output_city;
var output_postalcode;
var output_create;
var city;
var error_message;
var insert;
var postalcode;
var new_streetnum;
var streetname;
var output_streetname;
var output_insert;
var output_message;
var checked_input;
var create_new_acc;
var new_name;
var new_surname;
var new_gender;
var new_email;
var new_birthday;
var new_city;
var new_postalcode;
var new_streetname;
var new_username;
var new_password;
var repeat_new_password;
var user;
var pwd;
var submit_login;
var submit_create;
var submit_forgot;
var post_button;
var message;
var chars_left;
var characters_left;
var feed;
var refresh;
var template;
var parameters;
var img_name;
var img_surname;
var img_email;
var img_birthday;
var img_city;
var img_postalcode;
var img_streetname;
var img_streetnum;
var img_username;
var img_password;
var img_passwordr;
var time_span;
var seconds;
var minutes;
var hours;
var logout;
var email;
var submit_email;
var email_check;
var sec_display;
var personalinfo_button;
var personalinfo_div;
var changepassword_button;
var changepassword_div1;
var changepassword_div2;



function init_create_new_acc(){
  //button
  create_new_acc = $("create_new_acc");
  //input fields
  new_name = $("new_name");
  new_surname = $("new_surname");
  new_gender = $("new_gender");
  new_email = $("new_email");
  new_birthday = $("new_birthday");
  new_city = $("new_city");
  new_postalcode = $("new_postalcode");
  new_streetname = $("new_streetname");
  new_streetnum = $("new_streetnum");
  new_username = $("new_username");
  new_password = $("new_password");
  repeat_new_password = $("repeat_new_password");
  output_create = $("output_create");
  img_name = $("name_check");
  img_surname = $("surname_check");
  img_email = $("email_check");
  img_birthday = $("birthday_check");
  img_city = $("city_check");
  img_postalcode = $("postalcode_check");
  img_streetname = $("streetname_check");
  img_streetnum = $("streetnum_check");
  img_username = $("username_check");
  img_password = $("password_check");
  img_passwordr = $("passwordr_check");
  initEventListeners_create();
}
function initEventListeners_create(){

  //checking name
  new_name.addEventListener("keydown", function (){
    var pattern = /^[a-zA-Z]{3,}$/;
    var reg = new RegExp(pattern);
    if(reg.test(new_name.value)) {
      img_name.src = "/forum/include/media/green_check.png"
    }else{
      img_name.src = "/forum/include/media/red_check.png"
    }
  })

  //checking surname
  new_surname.addEventListener("keydown", function (){
    var pattern = /^[a-zA-Z]{3,}$/;
    var reg = new RegExp(pattern);
    if(reg.test(new_name.value)) {
      img_surname.src = "/forum/include/media/green_check.png"
    }else{
    img_surname.src = "/forum/include/media/red_check.png"
  }
  })

  //checking email
  new_email.addEventListener("keydown", function (){
    var pattern = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
    var reg = new RegExp(pattern);
    if(reg.test(new_email.value)) {
      img_email.src = "/forum/include/media/green_check.png"
    }else{
    img_email.src = "/forum/include/media/red_check.png"
  }
  })

  //checking birthday
  new_birthday.addEventListener("keyup", function (){
    var pattern = /^\s*(3[01]|[12][0-9]|0?[1-9])\.(1[012]|0?[1-9])\.((?:19|20)\d{2})\s*$/;
    var reg = new RegExp(pattern);
    if(reg.test(new_birthday.value)) {
      img_birthday.src = "/forum/include/media/green_check.png"
    }else{
      img_birthday.src = "/forum/include/media/red_check.png"
    }
  })

  //checking city
  new_city.addEventListener("keydown", function (){
    var pattern = /^[a-zA-Z\-\s]{2,}$/;
    var reg = new RegExp(pattern);
    if(reg.test(new_city.value)) {
      img_city.src = "/forum/include/media/green_check.png"
    }else{
      img_city.src = "/forum/include/media/red_check.png"
    }
  })

  //checking postalcode
  new_postalcode.addEventListener("keyup", function (){
    var pattern = /\d{5}/;
    var reg = new RegExp(pattern);
    if(reg.test(new_postalcode.value)) {
      img_postalcode.src = "/forum/include/media/green_check.png"
    }else{
      img_postalcode.src = "/forum/include/media/red_check.png"
    }
  })

  //checking streetname
  new_streetname.addEventListener("keydown", function (){
    var pattern = /^[\Da-zA-Z\s-]{2,}$/;
    var reg = new RegExp(pattern);
    if(reg.test(new_streetname.value)) {
      img_streetname.src = "/forum/include/media/green_check.png"
    }else{
      img_streetname.src = "/forum/include/media/red_check.png"
    }
  })

  //checking streetnum
  new_streetnum.addEventListener("keydown", function (){
    var pattern = /^[\d]{1,3}$/;
    var reg = new RegExp(pattern);
    if(reg.test(new_streetnum.value)) {
      img_streetnum.src = "/forum/include/media/green_check.png";
    }else{
      img_streetnum.src = "/forum/include/media/red_check.png";
    }
  })

  //checking username
  new_username.addEventListener("keydown", function (){
    var pattern = /.{5,}/;
    var reg = new RegExp(pattern);
    if(reg.test(new_username.value)) {
      img_username.src = "/forum/include/media/green_check.png";
    }else{
      img_username.src = "/forum/include/media/red_check.png";
    }
  })

  //comparing both passwords in the repeate_new_password input field
  repeat_new_password.addEventListener("keyup", function(){
    if(repeat_new_password.value === new_password.value){
      img_password.src = "/forum/include/media/green_check.png"
      img_passwordr.src = "/forum/include/media/green_check.png";
    }else{
      img_passwordr.src = "/forum/include/media/red_check.png";
    }
  })

}
/*function init_login(){
  user = $("user");
  pwd = $("pwd");
  submit_login = $("submit_login");
  submit_create = $("submit_create");
  submit_forgot = $("submit_forgot");

}*/
function init_home(){
  post_button = $("submit_post");
  refresh = $("refresh");
  message = $("textarea");
  chars_left = 150;
  characters_left = $("characters_left");
  characters_left.innerHTML = chars_left;
  feed = $("feed");
  user = $("user");
  time_span  = $("time_logged_in");
  time_span.innerHTML = "[Hours: 0 Minutes: 0 Seconds: 0]";
  logout = $("logout");
  personalinfo_button = $("personalinfo_button");
  personalinfo_div = $("personalinfo_div");
  changepassword_button = $("changepassword_button");
  changepassword_div1 = $("changepassword_div1");
  changepassword_div2 = $("changepassword_div2");
  //counting the time logged in
  function time_logged_in() {

    seconds = 0;
    minutes = 0;
    hours = 0;
    function mytimer(){
      seconds += 1;
      if (seconds === 59) {
        seconds = 0;
        minutes += 1;
        if (minutes >= 60 && seconds >= 0){
          minutes = 0;
          hours += 1;
        }
      }

      time_span.innerHTML = "[Hours: "+hours+" Minutes: " + minutes + " Seconds: " + seconds + "]";
    }
    var t = window.setInterval(mytimer, 1000);
  }
  time_logged_in();
  initEventListeners_home();
}
function initEventListeners_home(){
  post_button.addEventListener("click",function(){
    action = "submit_post";
    params = "action="+action+"&message="+message.value+"&user="+user.innerText;
    if (chars_left < 150) {
      send_info(params);
    }
    message.value = "";
    chars_left = 150 - message.value.length;
    characters_left.innerHTML = chars_left;

  })
  refresh.addEventListener("click", function (){
    action = "refresh";
    params = "action="+action;
    send_info(params);
  })
  message.addEventListener("keydown", function (){
    chars_left = 150 - message.value.length;
    if (chars_left < 1){
      message.value = message.value.slice(0,-1);
    }
    characters_left.innerHTML = chars_left;

  })
  message.addEventListener("click", function (){
    chars_left = 150 - message.value.length;
    characters_left.innerHTML = chars_left;

  })
  personalinfo_button.addEventListener("click", function (){
    personalinfo_div.style.display = "flex";
    //hide change password divs
    changepassword_div1.style.display = "none";
    changepassword_div2.style.display = "none";
  })
  changepassword_button.addEventListener("click", function (){
    changepassword_div1.style.display = "flex";
    //hide personalinfo div
    personalinfo_div.style.display ="none";
  })

}

function initEventlisteners_insertmask() {
    //if user types in input field
    postalcode.addEventListener("keyup", function() {
    action = "postalcode";
    params = "action=postalcode&postalcode="+this.value;
    send_info(params);
    });
    city.addEventListener("keyup", function (){
    action = "city";
    params = "action=city&city="+this.value;
    send_info(params);
    });
    new_streetname.addEventListener("keyup", function (){
    action = "streetname";
    params = "action=streetname&streetname="+this.value;
    send_info(params);
    });

    //if focus on input field
    postalcode.addEventListener("focus", function() {
      action = "postalcode";
      params = "action=postalcode&postalcode="+this.value;
      send_info(params);
    });
    city.addEventListener("focus", function (){
      action = "city";
      params = "action=city&city="+this.value;
      send_info(params);
    });
    streetname.addEventListener("focus", function (){
      action = "streetname";
      params = "action=streetname&streetname="+this.value;
      send_info(params);
    });

    insert.addEventListener("click", function (){
      action = "insert";
      params = "action="+action+"&city="+new_city.value+"&postalcode="+new_postalcode.value+"&streetname="+new_streetname.value;
      check_insert_input_field();
      if (checked_input == true){
        send_info(params);
      }else{
        output_insert.innerHTML = "Kein Insert in Datenbank wegen ungültiger Eingaben.";
      }
    })
}

function init_insert_mask() {
  city = $("city");
  postalcode = $("postalcode");
  streetname = $("streetname");
  output_city = $("output_city")
  output_postalcode = $("output_postalcode");
  output_streetname = $("output_streetname");
  output_insert = $("output_insert");
  error_message = $("error_message");
  insert = $("insert");
  initEventlisteners_insertmask();
}
function check_insert_input_field(){
  //city input (no numbers, just letters, whitespaces and -)
  checked_input = true;
  var pattern = /^[a-zA-Z\-\s]{2,}$/;
  var reg = new RegExp(pattern);
  if  (!reg.test(new_city.value)){
    output_city.innerHTML = "Stadtname ungültig!";
    checked_input = false;
  }
  var pattern = /\d{5}/;
  var reg = new RegExp(pattern);
  if (!reg.test(new_postalcode.value)){
    output_postalcode.innerHTML = "Ungültige Postleitzahl!";
    checked_input = false;
  }
  var pattern = /.{5}/;
  var reg = new RegExp(pattern);
  if (!reg.test(new_streetname.value)){
    output_streetname.innerHTML = "Ungültiger Straßenname!";
    checked_input = false;
  }
  return checked_input;
}

function init_forgot(){
  email = $("email");
  submit_email = $("submit_email");
  email_check = $("email_check");
  sec_display = $("sec_display");
  initEventListeners_forgot();
}
function initEventListeners_forgot(){
  email.addEventListener("keydown", function (){
    var pattern = /^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/;
    var reg = new RegExp(pattern);
    if(reg.test(email.value)) {
      email_check.src = "/forum/include/media/green_check.png"
    }else{
      email_check.src = "/forum/include/media/red_check.png"
    }
  })
  email.addEventListener("keyup", function (){
    action = "forgot_email_check";
    params = "action="+action+"&email_check="+email.value;
    console.log(params);
    send_info(params);
    console.log(params);
  })
}

function getAjaxObject() {
  if (window.ActiveXObject)
    return new ActiveXObject("Microsoft.XMLHTTP");
  else if (window.XMLHttpRequest)
    return new XMLHttpRequest();
  else {
    return null;
  }
}

function send_info(parameters) {
  var URL = "index.php";
  ajaxObj = getAjaxObject();
  if (ajaxObj !== null) {
    ajaxObj.open("POST", URL, true);
    ajaxObj.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    ajaxObj.onreadystatechange = setOutput;
    ajaxObj.send(parameters);
  }
  else {
    console.log("Kein Ajax Objekt.");
    return false;
  }
}

function setOutput() {
  if (ajaxObj.readyState === 4) {
    //console.log(ajaxObj.responseText);
    if (ajaxObj.status === 200) {
      try {
        json_response = JSON.parse(ajaxObj.responseText);
      } catch (e) {
        console.log("Ungültige Daten. Kein JSON String!");
        console.log(ajaxObj.responseText);
        return false;
      }
      switch (action) {
        case "postalcode":
          output_postalcode.innerHTML = json_response[0];
          action = "";
          break;
        case "city":
          output_city.innerHTML = json_response[0];
          action = "";
          break;
        case "streetname":
          output_streetname.innerHTML = json_response[0];
          action = "";
          break;
        case "insert":
          output_message = json_response;
          output_insert.innerHTML = output_message;
          action = "";
          break;
        case "create_new_acc":
          output_create.innerHTML = json_response;
          action = "";
          break;
        case "submit_login":
          output_message = json_response;
          action = "";
          break;
        case "submit_post":
          feed.innerHTML = json_response;
          action = "";
          break;
        case "refresh":
          feed.innerHTML = json_response;
          //console.log();
          action = "";
          break;
        case "forgot_email_check":
          if (json_response === "existing"){
            output_message = "Your email exists in our system.";
          }else{
            output_message = "Your email doesn't exists in our system.";
          }
          sec_display.innerHTML = output_message;
          action = "";
          break;
        default:
           console.log("Keine gültige Aktion");
      }

    }

  }
}
