<?php
function errl($var){
  error_log(json_encode($var));
}
session_start();
//$_POST["template"] = isset($_POST["template"]) && $_POST["template"] ? $_POST["template"] : "";

$templates = [
  "login" => "login_template.html",
  "create" => "create_new_account_template.html",
  "home" => "home_template.html",
  "insert_mask" => "insert_mask.html"
];

(isset($_POST["template"]) && $_POST["template"]) ? $_POST["template"] : "";

require_once("../smarty/libs/Smarty.class.php");
define("HOST", "127.0.0.1");
define("USER", "www-data");
define("PWD", "");
define("DB_NAME", "forum");

function set_autoinc(){
  $connect = mysqli_connect(HOST,USER,PWD,DB_NAME);
  $all_data = mysqli_query($connect,"SELECT * FROM messages");
  $rows_num = mysqli_num_rows($all_data);
  $set_auto_increment_query = "ALTER TABLE messages AUTO_INCREMENT=".$rows_num+=1;
  mysqli_query($connect,$set_auto_increment_query);
}

//connect to database and send query
function query_to_db($query){
  $connect = mysqli_connect(HOST,USER,PWD,DB_NAME);
  return mysqli_query($connect,$query);
}

//checks database for postvar with result "not existing" or "existing"
function check_database_for_entry($postvar, $tablename, $column){
  $postvar = $_POST[$postvar];
  $query = "SELECT * FROM " . $tablename . " WHERE " . $column . "='" . $postvar . "'";
  $check = query_to_db($query);
  $exist_or_not = (mysqli_num_rows($check) == 0) ? "not existing" : "existing";
  $result = [$exist_or_not];
  return $result;
}
//load page with smarty
function loadSmarty($template,$vars){
$smarty_object = new Smarty();
$smarty_object->left_delimiter = '<!--{';
$smarty_object->right_delimiter = '}-->';
$smarty_object->assign($vars);
$smarty_object->display($template);
}


function reformat_date($date){
  $new_date = date ("Y-m-d", strtotime($date));
  return $new_date;
}

//works the logic for tables(tablenames: citys,postal_codes and street_names)
function insert_by_result(){
//  error_log(json_encode($_POST));
  $city_result = check_database_for_entry("new_city", "citys", "city_names");
  $postalcode_result = check_database_for_entry("new_postalcode", "postal_codes", "postal_code");
  $streetname_result = check_database_for_entry("new_streetname", "street_names", "street_name");
  $input_city = $_POST["new_city"];
  $input_postalcode = $_POST["new_postalcode"];
  $input_streetname = $_POST["new_streetname"];
  //error_log(json_encode($city_result) . " " . json_encode($postalcode_result) . " " . json_encode($streetname_result));

    //111 FUNKTIONIERT!
    if($city_result[0] === "existing" && $postalcode_result[0] === "existing" && $streetname_result[0] === "existing"){
      $output = "All values are already in the database.";
    }

    //110 Funktioniert!
    if($city_result[0] == "existing" && $postalcode_result[0] == "existing" && $streetname_result[0] == "not existing"){
      $id_postalcode = query_to_db("SELECT id FROM postal_codes WHERE postal_code='" . $input_postalcode . "'");
      //errl($id_postalcode);
      $record_postalcode_id = mysqli_fetch_assoc($id_postalcode);
      //errl($record_postalcode_id["id"]);
      query_to_db("INSERT INTO street_names(postal_code_id,street_name) VALUES('".$record_postalcode_id['id']."','".$input_streetname."')");
      $output = "Streetname has been added to the database.";
    }

  //100 Funktioniert!
  if($city_result[0] ===  "existing" && $postalcode_result[0] === "not existing" && $streetname_result[0] === "not existing"){
    $id_city = query_to_db("SELECT id FROM citys WHERE city_names='".$input_city."'");
    $record_city_id = mysqli_fetch_assoc($id_city);
    //errl($record_city_id);
    //errl($input_postalcode);
    //query_to_db("INSERT INTO postal_codes(city_id,postal_code) VALUES ('" . $record_city_id['id'] . "','" . $input_postalcode . "'");
    //warum ich beide variablen nicht auf einmal inserten kann ist mir fremd...
    query_to_db("INSERT INTO postal_codes(postal_code)VALUE('".$input_postalcode."')");
    query_to_db("UPDATE postal_codes SET city_id='".$record_city_id['id']."' WHERE postal_code='".$input_postalcode."'");
    $id_postalcode = query_to_db("SELECT id FROM postal_codes WHERE postal_code='".$input_postalcode."'");
    $record_postalcode_id = mysqli_fetch_assoc($id_postalcode);
    errl($record_postalcode_id);
    query_to_db("INSERT INTO street_names(postal_code_id,street_name) VALUES ('".$record_postalcode_id['id']."','".$input_streetname."')");
    $output = "Postalcode and Streetname have been added to the Database.";
    }

  //000 FUNKTIONIERT! nix verändern!!
  if($city_result[0] === "not existing" && $postalcode_result[0] === "not existing" && $streetname_result[0] === "not existing") {
    query_to_db("INSERT INTO postal_codes(postal_code) VALUE('".$input_postalcode."')");
    query_to_db("INSERT INTO citys(city_names) VALUE('".$input_city."')");
    $id_city = query_to_db("SELECT id FROM citys WHERE city_names='".$input_city."'");
    $record_city_id = mysqli_fetch_assoc($id_city);
    query_to_db("UPDATE postal_codes SET city_id='".$record_city_id['id']."' WHERE postal_code='".$input_postalcode."'");
    $id_postalcode = query_to_db("SELECT id FROM postal_codes WHERE postal_code='".$input_postalcode."'");
    $record_postalcode_id = mysqli_fetch_assoc($id_postalcode);
    //error_log(json_encode($record_postalcode_id));
    query_to_db("INSERT INTO street_names(postal_code_id,street_name) VALUES('".$record_postalcode_id['id']."','".$input_streetname."')");
    $output = "City, Postalcode and Streetname have been added to the Database.";
    }

  //001 Funktioniert!
  if($city_result[0] === "not existing" && $postalcode_result[0] === "not existing" && $streetname_result[0] === "existing"){
    query_to_db("INSERT INTO postal_codes(postal_code)VALUE('".$input_postalcode."')");
    query_to_db("INSERT INTO citys(city_names)VALUE('".$input_city."')");
    $id_city  = query_to_db("SELECT id FROM citys WHERE city_names='". $input_city . "'");
    errl($id_city);
    $record_city_id = mysqli_fetch_assoc($id_city);
    errl($record_city_id);
    //query_to_db("INSERT INTO postal_codes(city_id)VALUE('".$id_city."') WHERE postal_code='".$input_postalcode."'");
    query_to_db("UPDATE postal_codes SET city_id='".$record_city_id['id']."' WHERE postal_code='".$input_postalcode."'");
    $id_postalcode = query_to_db("SELECT id FROM postal_codes WHERE postal_code='".$input_postalcode."'");
    $record_postalcode_id = mysqli_fetch_assoc($id_postalcode);
    query_to_db("INSERT INTO street_names(postal_code_id,street_name)VALUE('".$record_postalcode_id['id']."','".$input_streetname."')");
    $output = "City and Postalcode have been added to the Database.";
    }

  //011 Funktioniert!
  if($city_result[0] === "not existing" && $postalcode_result[0] === "existing" && $streetname_result[0] === "existing"){
    $output = "You probably entered a false city.";
    }

  //010 Funktioniert!
  if($city_result[0] === "not existing" && $postalcode_result[0] === "existing" && $streetname_result[0] === "not existing"){
    $output = "You probably entered a false city(check streetname also).";
    }

  //101 Funktioniert!
  if($city_result[0] === "existing" && $postalcode_result[0] === "not existing" && $streetname_result[0] === "existing"){
    $output = "You probably entered a false postal code.";
    }
  return $output;
}

function submit_post(){
  errl($_POST);
  $connect = mysqli_connect(HOST,USER,PWD,DB_NAME);
  $message = mysqli_real_escape_string($connect,$_POST["message"]);
  set_autoinc();
  $user = $_SESSION["user"];
  errl($_POST["user"]);
  date_default_timezone_set("Europe/Berlin");
  $timestamp = time();
  $date = date('d/m/Y H:i:s',$timestamp);
  query_to_db("INSERT INTO messages(message,user,date)VALUES('".$message."','".$user."','".$date."')");
}

function load_posts(){
  $message_table = query_to_db("SELECT message,user,date FROM messages ORDER by id DESC ");
  $out = "";

  while($array = mysqli_fetch_row($message_table)){
      $out .= "<p>[".$array[2]."] ".$array[1].":".$array[0]."</p>";
  }
  return $out;
}

function load_personalinfo(){
  $personal_info = query_to_db("SELECT * FROM user WHERE username='".$_SESSION["user"]."'");
  $array = mysqli_fetch_row($personal_info);
  $postal_code = query_to_db("SELECT postal_code FROM postal_codes WHERE id='".$array[6]."'");
  $postal_code = mysqli_fetch_row($postal_code);
  $city_id = query_to_db("SELECT city_id FROM postal_codes WHERE id='".$array[6]."'");
  $city_id = mysqli_fetch_row($city_id);
  $city = query_to_db("SELECT city_names FROM citys WHERE id='".$city_id[0]."'");
  $city = mysqli_fetch_row($city);
  $streetname = query_to_db("SELECT street_name FROM street_names WHERE id='".$array[7]."'");
  $streetname = mysqli_fetch_row($streetname);

  $info = "";

  $info .= "Name: ".$array[1]."<br>";

  $info .= "Surname: ".$array[2]."<br>";

  $info .= "City: ".$city[0]."<br>";

  $info .= "Postal Code: ".$postal_code[0]."<br>";

  $info .= "Street: ".$streetname[0]." ".$array[8]."";

  return $info;
}

function create_new_account(){
  //insert into user table
  $name = $_POST["new_name"];
  $surname = $_POST["new_surname"];
  $gender = $_POST["new_gender"];
  $email = $_POST["new_email"];
  $birthday = reformat_date($_POST["new_birthday"]);
  //$city = $_POST["city"];
  //$postalcode = $_POST["postalcode"];
  $streetname = $_POST["new_streetname"];
  $street_num = $_POST["new_streetnum"];
  $id_streetname = query_to_db("SELECT id FROM street_names WHERE street_name='".$streetname."'");
  $record_streetname = mysqli_fetch_assoc($id_streetname);
  $street_id = $record_streetname['id'];
  //errl($street_id);
  $id_postalcode = query_to_db("SELECT postal_code_id FROM street_names WHERE street_name='".$streetname."'");
  $record_postalcode_id = mysqli_fetch_assoc($id_postalcode);
  //errl($record_postalcode_id);
  $postalcode_id = $record_postalcode_id['postal_code_id'];
  $username = $_POST["new_username"];
  $password = $_POST["new_password"];
  $email_result = check_database_for_entry("new_email","user","email");
  $username_result = check_database_for_entry("new_username","user","username");

  if($email_result[0] === "existing" && $username_result[0] === "existing" ){
    return "There is already a account with this email and username.";
  }else{
    query_to_db("INSERT INTO user(email)VALUE('".$email."')");
    query_to_db("UPDATE user SET name='".$name."' WHERE email='".$email."'");
    query_to_db("UPDATE user SET surname='".$surname."' WHERE email='".$email."'");
    query_to_db("UPDATE user SET gender='".$gender."' WHERE email='".$email."'");
    query_to_db("UPDATE user SET birthday='" . $birthday . "' WHERE email='".$email."'");
    query_to_db("UPDATE user SET postalcode_id='" . $postalcode_id . "' WHERE email='".$email."'");
    query_to_db("UPDATE user SET street_id='".$street_id."' WHERE email='".$email."'");
    query_to_db("UPDATE user SET street_num='".$street_num."' WHERE email='".$email."'");
    query_to_db("UPDATE user SET username='".$username."' WHERE email='".$email."'");
    query_to_db("UPDATE user SET password='".$password."' WHERE email='".$email."'");

  }

}

//handles EventListeners which sending info with AJAX
//main if statement: checking for event listeners
if (isset($_POST["action"])) {
  switch ($_POST["action"]) {
    case "postalcode":
      $postalcode_result = check_database_for_entry("postalcode", "postal_codes", "postal_code");
      print json_encode($postalcode_result);
      exit;
    case "city":
      $city_result = check_database_for_entry("city", "citys", "city_names");
      print json_encode($city_result);
      exit;
    case "streetname":
      $streetname_result = check_database_for_entry("streetname", "street_names", "street_name");
      print json_encode($streetname_result);
      exit;
    case "insert":
      $output = insert_by_result();
      print json_encode($output);
      exit;
    case "refresh":
      $posts = load_posts();
      print(json_encode($posts));
      exit;
    case "submit_post":
      submit_post();
      $posts = load_posts();
      print(json_encode($posts));
      exit;
    default:
      print json_encode("Keine gültige Aktion!");
  }
}

function new_acc_regex(){
  $name = $_POST["new_name"];
  $surname = $_POST["new_surname"];
  $email = $_POST["new_email"];
  $birthday = $_POST["new_birthday"];
  $city = $_POST["new_city"];
  $postalcode = $_POST["new_postalcode"];
  $streetname = $_POST["new_streetname"];
  $streetnum = $_POST["new_streetnum"];
  $username = $_POST["new_username"];
  $password = $_POST["new_password"];
  $r_password = $_POST["repeat_new_password"];
  $count = 0;

  //name

  $pattern = "/^[a-zA-Z]+$/";
  if (preg_match($pattern,$name)){
    $count += 1;
  }

  //surname

  $pattern = "/^[a-zA-Z]+$/";
  if (preg_match($pattern,$surname)){
    $count += 1;
  }

  //email

  $pattern = "/^[a-zA-Z0-9_.+-]+@[a-zA-Z0-9-]+\.[a-zA-Z0-9-.]+$/";
  if (preg_match($pattern,$email)){
    $count += 1;
  }

  //birthday

  $pattern = "/^\s*(3[01]|[12][0-9]|0?[1-9])\.(1[012]|0?[1-9])\.((?:19|20)\d{2})\s*$/";
  if (preg_match($pattern,$birthday)){
    $count += 1;
  }

  //city

  $pattern = "/^[a-zA-Z\-\s]+$/";
  if (preg_match($pattern,$city)){
    $count += 1;
  }

  //postalcode

   $pattern = "/\d{5}/";
  if (preg_match($pattern,$postalcode)){
    $count += 1;
  }

  //streetname

  $pattern = "/^[\Da-zA-Z\s-]+$/";
  if (preg_match($pattern,$streetname)){
    $count += 1;
  }

  //streetnum

  $pattern = "/^[\d]{1,3}$/";
  if (preg_match($pattern,$streetnum)){
    $count += 1;
  }

  //username

  $pattern = "/.{3,}/";
  if (preg_match($pattern,$username)){
    $count += 1;
  }
  if ($password !== "") {
    if (strcmp($r_password, $password) == 0) {
      $count += 1;
    }
  }

  return $count;
}

//all handles request from HTML to PHP
//handles which template has to be loaded
if (isset($_POST["template"])){
  switch ($_POST["template"]){
    case "create":
      loadSmarty($templates["create"],$vars = ["display"=>"Enter your Data to create a new Account."]);
      break;
    case "home":
      $user_result = check_database_for_entry("user","user","username");
      $pwd_result = check_database_for_entry("pwd","user","password");
      if($user_result[0] === "existing" && $pwd_result[0] === "existing") {
        $vars = ["display"=>"Loggin in.",
          "user"=>$_POST["user"],
          "personalinfo"=>load_personalinfo(),
          "posts"=>load_posts()
        ];
        loadSmarty($templates["home"], $vars);

        $_SESSION["user"] = $_POST["user"];
        unset($_POST["template"]);
      }else{
        loadSmarty($templates["login"], $vars = ["display"=>"Username or Password not existing"]);
        unset($_POST["template"]);
      }

      break;
    case "new_account_created":
      $regex = new_acc_regex();
      if ($regex  === 10) {
        insert_by_result();
        create_new_account();
        insert_by_result();
        loadSmarty($templates["login"], $vars = ["display" => "New Account has been created. Please log in now."]);
        unset($_POST["template"]);
      }else{
        $errors = 10 - $regex;
        loadSmarty($templates["create"], $vars = ["display" => "New Account couldn't be created due to invalid input. ERRORS:".$errors]);
        unset($_POST["template"]);
      }
      break;
    default:
      print json_encode("Kein gültiges Template!");
  }
}else{
  loadSmarty($templates["login"], $vars=["display"=>""]);
}