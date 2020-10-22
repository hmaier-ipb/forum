<?php
/* Smarty version 3.1.34-dev-7, created on 2020-10-20 11:25:52
  from 'D:\inetpub\www\forum\templates\login_template.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.34-dev-7',
  'unifunc' => 'content_5f8ec9402b85f3_52865213',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0487e6a303fff5da97a9932bdba99436040b9070' => 
    array (
      0 => 'D:\\inetpub\\www\\forum\\templates\\login_template.html',
      1 => 1603193144,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5f8ec9402b85f3_52865213 (Smarty_Internal_Template $_smarty_tpl) {
?><!DOCTYPE html>
<html lang="en">
<head>

  <meta charset="UTF-8">
  <meta http-equiv="cache-control" content="no-cache">
  <meta http-equiv=“pragma“ content=“no-cache“>
  <meta http-equiv=“expires“ content=“0″>
  <link rel="stylesheet" href="include/css/style_l.css" type="text/css" >
  <?php echo '<script'; ?>
 src="include/js/ajax.js"><?php echo '</script'; ?>
>
  <?php echo '<script'; ?>
>document.addEventListener("DOMContentLoaded", function(){init_login()})<?php echo '</script'; ?>
>
  <title>Login</title>
</head>
<body>
    <form class="form" action="index.php" method="post" >
      <div class="input">
        <span>Username</span><input id="user" placeholder="username" name="user">
        <span>Password</span><input id="pwd" type="password"  placeholder="password" name="pwd">
      </div>
      <div class="buttons">
        <button id="submit_login" name="template" value="home">Login existing Account</button>
        <button id="submit_create" name="template" value="create">Create new Account</button>
        <button id="submit_forgot" name="template" value="">Forgot Password</button>
      </div>
    </form>
    <div class="display">
      <p><?php echo $_smarty_tpl->tpl_vars['display']->value;?>
</p>
    </div>

</body>
</html><?php }
}
