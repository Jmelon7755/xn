<?php
/* Smarty version 3.1.33, created on 2019-09-24 04:11:10
  from 'C:\xampp\htdocs\xn\templates\backend-login.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d897b3ebc8ef0_67667759',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'ac70d6de1dd8df7c84fa506600349c641092cc9a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xn\\templates\\backend-login.html',
      1 => 1569200685,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d897b3ebc8ef0_67667759 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3827936005d897b3ebc6fe1_94878020', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5311669125d897b3ebc8205_33311326', "body");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19473341215d897b3ebc88b9_61460898', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "master.html");
}
/* {block "title"} */
class Block_3827936005d897b3ebc6fe1_94878020 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_3827936005d897b3ebc6fe1_94878020',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

XN-Backend-login
<?php
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_5311669125d897b3ebc8205_33311326 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_5311669125d897b3ebc8205_33311326',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="container">
    <h3>後台管理員登入</h3>
    <br />
    <div class="panel panel-default">
        <div class="panel-body">
            <form role="form">
                <legend>登入</legend>
                <div class="form-group">
                    <label for="account">帳號</label>
                    <input type="text" id="account" class="form-control" placeholder="管理員帳號">
                    <p id="account-warning" class="text-warning"></p>
                    <br />
                    <label for="password">密碼</label>
                    <input type="password" id="password" class="form-control" placeholder="設定密碼">
                    <p id="password-warning" class="text-warning"></p>
                </div>
                <br />
                <p id="login-failed" class="text-danger"></p>
                <button type="submit" class="btn btn-primary pull-right">登入</button>
            </form>
        </div>
    </div>
</div>
<?php
}
}
/* {/block "body"} */
/* {block "script"} */
class Block_19473341215d897b3ebc88b9_61460898 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_19473341215d897b3ebc88b9_61460898',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
 src="http://localhost/xn/js/backend-login.js" defer><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
