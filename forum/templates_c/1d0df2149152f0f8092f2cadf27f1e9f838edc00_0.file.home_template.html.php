<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-27 08:09:53
  from 'D:\inetpub\www\forum\templates\home_template.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f97d5d1b9a069_86665236',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1d0df2149152f0f8092f2cadf27f1e9f838edc00' => 
    array (
      0 => 'D:\\inetpub\\www\\forum\\templates\\home_template.html',
      1 => 1603786189,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f97d5d1b9a069_86665236 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta charset="UTF-8">
  <meta http-equiv="cache-control" content="no-cache">
  <meta http-equiv=“pragma“ content=“no-cache“>
  <meta http-equiv=“expires“ content=“0″>
  <link rel="stylesheet" href="include/css/style_h.css" type="text/css" >
  <?php echo '<script'; ?>
 src="include/js/ajax.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
>document.addEventListener("DOMContentLoaded", function(){init_home()})<?php echo '</script'; ?>
>
  <title>Home</title>
</head>
<body>

  <nav class="nav">
    <div class="options_menu">
      <button id="personalinfo_button">Personal Information</button>
      <button id="changepassword_button">Change Password</button>
    </div>

    <div class="div_container">

    <div id="personalinfo_div" style="display: none;">
      <?php echo $_smarty_tpl->tpl_vars['personalinfo']->value;?>

    </div>

    <div id="changepassword_div1" style="display: none;">
      <span>Enter current Password <input id="current_password"></span>
    </div>

    <div id="changepassword_div2" style="display: none;">
      <span>Enter new Password <input id="new_password"></span>
    </div>

    </div>

  </nav>

  <div class="feed" id="feed">
      <?php echo $_smarty_tpl->tpl_vars['posts']->value;?>

      <!-- Format: [".DATUM."] ".NAME.": ".MESSAGE."-->
  </div>

  <div class="display">
    <div>
      <div id="user">USER:<?php echo $_smarty_tpl->tpl_vars['user']->value;?>
<form action="index.php" method="post"><button>logout</button></form></div>
      <div id="time_logged_in">[Hours: 0 Minutes: 0 Seconds: 0]</div>
    </div>
    <p>[characters left:<span id="characters_left"></span>]</p>
    <textarea id="textarea" rows="3"></textarea>
    <div class="display_buttons">
      <button type="button" id="submit_post">submit</button>
      <button type="button" id="refresh">refresh</button>
    </div>
  </div>

</body>
</html><?php }
}
