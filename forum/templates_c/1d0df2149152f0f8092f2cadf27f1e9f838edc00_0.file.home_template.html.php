<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-21 13:21:52
  from 'D:\inetpub\www\forum\templates\home_template.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f9035f010c4f2_22312291',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1d0df2149152f0f8092f2cadf27f1e9f838edc00' => 
    array (
      0 => 'D:\\inetpub\\www\\forum\\templates\\home_template.html',
      1 => 1603286458,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f9035f010c4f2_22312291 (Smarty_Internal_Template $_smarty_tpl) {
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
  <nav>
    <ul><div class="personalinfo">
      <?php echo $_smarty_tpl->tpl_vars['personalinfo']->value;?>

    </div></ul>
    <ul> <form action="index.php" method="post"> <button>Logout</button> </form></ul>
  </nav>

  <div class="feed" id="feed">
      <?php echo $_smarty_tpl->tpl_vars['posts']->value;?>

  </div>

  <div class="display">
    <p>USER: <span id="user"><?php echo $_smarty_tpl->tpl_vars['user']->value;?>
</span></p>
    <p>characters left:<span id="characters_left"></span></p>
    <textarea id="textarea" rows="10"></textarea>
    <p></p>
    <button type="button" id="submit_post">submit</button>
    <p></p>
    <button type="button" id="refresh">refresh</button>
  </div>

  <div id="change_password">

  </div>

</body>
</html><?php }
}
