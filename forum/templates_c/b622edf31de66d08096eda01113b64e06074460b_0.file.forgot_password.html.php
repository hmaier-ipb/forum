<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-27 07:24:22
  from 'D:\inetpub\www\forum\templates\forgot_password.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f97cb266cc747_66764843',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b622edf31de66d08096eda01113b64e06074460b' => 
    array (
      0 => 'D:\\inetpub\\www\\forum\\templates\\forgot_password.html',
      1 => 1603783460,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f97cb266cc747_66764843 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="cache-control" content="no-cache">
  <meta http-equiv=“pragma“ content=“no-cache“>
  <meta http-equiv=“expires“ content=“0″>
  <link rel="stylesheet" href="include/css/style_fp.css" type="text/css" >
  <?php echo '<script'; ?>
 src="include/js/ajax.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
>document.addEventListener("DOMContentLoaded", function(){init_forgot()})<?php echo '</script'; ?>
>
  <title>Forgot Password</title>
</head>
<body>
<div class="fp_container">
<form class="form" action="index.php" method="post">

    <span>Email <img id="email_check" src="/forum/include/media/red_check.png"></span>
      <input id="email" placeholder="email" name="email" autocomplete="off">

    <button id="submit_email" name="template" value="submit_forgot">Submit Email</button>

</form>
  <div class="display">
    <p><?php echo $_smarty_tpl->tpl_vars['display']->value;?>
</p>

    <p id="sec_display">Your email doesn't exists in our system.</p>
  </div>
</div>
</body>
</html><?php }
}
