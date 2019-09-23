<?php
/* Smarty version 3.1.33, created on 2019-09-23 10:55:03
  from 'C:\xampp\htdocs\xn\templates\client.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d888867e35b11_02418758',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f1bbf428cedc800507d6a7ac313b8f7f2f71ea9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xn\\templates\\client.html',
      1 => 1569228901,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:product-unit.html' => 1,
  ),
),false)) {
function content_5d888867e35b11_02418758 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4935997005d888867e24480_08692066', "stylesheet");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11943164075d888867e24e06_39818059', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17705480055d888867e25433_44995150', "body");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "master.html");
}
/* {block "stylesheet"} */
class Block_4935997005d888867e24480_08692066 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'stylesheet' => 
  array (
    0 => 'Block_4935997005d888867e24480_08692066',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<link rel="stylesheet" href="http://localhost/xn/css/index.css">
<?php
}
}
/* {/block "stylesheet"} */
/* {block "title"} */
class Block_11943164075d888867e24e06_39818059 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_11943164075d888867e24e06_39818059',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

XN
<?php
}
}
/* {/block "title"} */
/* {block "script"} */
class Block_2214160925d888867e35185_38930631 extends Smarty_Internal_Block
{
public $prepend = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
 src="http://localhost/xn/js/client.js" defer><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
/* {block "body"} */
class Block_17705480055d888867e25433_44995150 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_17705480055d888867e25433_44995150',
  ),
  'script' => 
  array (
    0 => 'Block_2214160925d888867e35185_38930631',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">XiaoNon農場</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                <?php if ($_smarty_tpl->tpl_vars['user_name']->value) {?>
                <li><a href="">我的菜籃</a></li>
                <li><a href="">我的訂單</a></li>
                <?php }?>
                <li class="dropdown">
                    <a id="user-name" href="" class="dropdown-toggle" data-toggle="dropdown">
                        <?php if ($_smarty_tpl->tpl_vars['user_name']->value) {?>
                        <?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>

                        <?php } else { ?>
                        會員
                        <?php }?>
                        <b class="caret"></b>
                    </a>
                <ul class="dropdown-menu">
                    <?php if ($_smarty_tpl->tpl_vars['user_name']->value) {?>
                    <li><a id="user-logout-a" href="#">登出</a></li>
                    <?php } else { ?>
                    <li><a id="register-a" data-toggle="modal" href="#modal">註冊</a></li>
                    <li><a id="user-login-a" data-toggle="modal" href="#modal">登入</a></li>
                    <?php }?>
                </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>

<div class="container">
    <div class="row">
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
        <?php $_smarty_tpl->_subTemplateRender("file:product-unit.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, true);
?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </div>
</div>

<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2214160925d888867e35185_38930631', "script", $this->tplIndex);
?>


<?php
}
}
/* {/block "body"} */
}
