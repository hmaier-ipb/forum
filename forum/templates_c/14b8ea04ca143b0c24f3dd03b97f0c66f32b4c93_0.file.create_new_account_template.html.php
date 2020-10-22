<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-21 12:54:00
  from 'D:\inetpub\www\forum\templates\create_new_account_template.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f902f68414c02_35479791',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '14b8ea04ca143b0c24f3dd03b97f0c66f32b4c93' => 
    array (
      0 => 'D:\\inetpub\\www\\forum\\templates\\create_new_account_template.html',
      1 => 1603284837,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f902f68414c02_35479791 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="cache-control" content="no-cache">
  <meta http-equiv=“pragma“ content=“no-cache“>
  <meta http-equiv=“expires“ content=“0″>
  <link rel="stylesheet" href="include/css/style_cna.css" type="text/css" >
  <?php echo '<script'; ?>
 src="include/js/ajax.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
>document.addEventListener("DOMContentLoaded", function(){init_create_new_acc()})<?php echo '</script'; ?>
>
  <title>Create New Account</title>
</head>
<body>
    <div class="cna_container">
      <form class="form" action="index.php" method="post">
      <span>Name <img id="name_check" src="/forum/include/media/red_check.png"></span>
        <input name="new_name" id="new_name" placeholder="Enter Name" ><br>

      <span>Surname <img id="surname_check" src="/forum/include/media/red_check.png"></span>
        <input name="new_surname" id="new_surname" placeholder="Enter Surname"><br>

      <span>Gender</span>
      <select  name="new_gender" id="new_gender">
        <option value="male">Male</option>
        <option value="female">Female</option>
        <option value="diverse">Diverse</option>
      </select><br>

      <span>Email <img id="email_check" src="/forum/include/media/red_check.png"></span>
        <input name="new_email" id="new_email" placeholder="Enter Email" >

      <span>Birthday dd.mm.yyyy <img id="birthday_check" src="/forum/include/media/red_check.png"></span>
        <input name="new_birthday" id="new_birthday" placeholder="dd.mm.yyyy" >

      <span>City <img id="city_check" src="/forum/include/media/red_check.png"></span>
        <input id="new_city" name="new_city" placeholder="Enter City" >

      <span>Postal code <img id="postalcode_check" src="/forum/include/media/red_check.png"></span>
        <input name="new_postalcode" id="new_postalcode" placeholder="Enter Postal Code" >

      <span>Street Name <img id="streetname_check" src="/forum/include/media/red_check.png"></span>
        <input name="new_streetname" id="new_streetname" placeholder="Enter Streetname" >

      <span>Street Num <img id="streetnum_check" src="/forum/include/media/red_check.png"></span>
        <input name="new_streetnum" id="new_streetnum" placeholder="Enter Streetnum" >

      <span>New Username <img id="username_check" src="/forum/include/media/red_check.png"></span>
        <input name="new_username" id="new_username" placeholder="Enter Username" >

      <span>New Password <img id="password_check" src="/forum/include/media/red_check.png"></span>
        <input name="new_password" id="new_password" placeholder="Enter Password" type="password">

      <span>Repeat New Password <img id="passwordr_check" src="/forum/include/media/red_check.png"></span>
        <input name="repeat_new_password" id="repeat_new_password" placeholder="Repeat Password" type="password" ><br>

      <button id="create_new_acc" name="template" value="new_account_created" type="submit">Create new Account</button>
      </form>
      <span id="output_create"><?php echo $_smarty_tpl->tpl_vars['display']->value;?>
</span>
    </div>
</body>
</html><?php }
}
