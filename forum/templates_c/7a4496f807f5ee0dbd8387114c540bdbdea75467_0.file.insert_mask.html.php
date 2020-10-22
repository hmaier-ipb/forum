<?php
/* Smarty version 3.1.34-dev-7, created on 2020-09-23 12:44:44
  from 'D:\inetpub\www\forum\templates\insert_mask.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f6b433c34aa71_28936049',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '7a4496f807f5ee0dbd8387114c540bdbdea75467' => 
    array (
      0 => 'D:\\inetpub\\www\\forum\\templates\\insert_mask.html',
      1 => 1600865078,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f6b433c34aa71_28936049 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <link rel="stylesheet" href="include/css/style_im.css">
  <?php echo '<script'; ?>
 src="include/js/ajax.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
>document.addEventListener("DOMContentLoaded", function(){init()})<?php echo '</script'; ?>
>
  <title>insert mask</title>
</head>
<body>
  <div class="input">
    <span>City</span><input id="city" name="city" placeholder="Enter City" autocomplete="off" >
    <span>Postal code</span><input id="postalcode" name="postalcode" placeholder="Enter Postal Code" autocomplete="off" >
    <span>Street Name</span><input id="streetname" name="streetname" placeholder="Enter Streetname" autocomplete="off" >
  <button id="insert" name="insert">insert</button><br>
  </div>

  <div class="output">
    <span id="output_city"></span><br>
    <span id="output_postalcode"></span><br>
    <span id="output_streetname"></span><br>
    <span id="output_insert"></span>
  </div>
</body>
</html><?php }
}
