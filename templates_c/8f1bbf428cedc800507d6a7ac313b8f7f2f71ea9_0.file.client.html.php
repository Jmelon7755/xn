<?php
/* Smarty version 3.1.33, created on 2019-09-24 12:00:05
  from 'C:\xampp\htdocs\xn\templates\client.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d89e925d90e20_16179358',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8f1bbf428cedc800507d6a7ac313b8f7f2f71ea9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xn\\templates\\client.html',
      1 => 1569318456,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d89e925d90e20_16179358 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5837564305d89e925d897f1_41208721', "stylesheet");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14127003725d89e925d8a0b1_20243983', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17759632415d89e925d8a6a0_26175337', "body");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6350717595d89e925d909e0_59211247', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "master.html");
}
/* {block "stylesheet"} */
class Block_5837564305d89e925d897f1_41208721 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'stylesheet' => 
  array (
    0 => 'Block_5837564305d89e925d897f1_41208721',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<link rel="stylesheet" href="http://localhost/xn/css/client.css">
<?php
}
}
/* {/block "stylesheet"} */
/* {block "title"} */
class Block_14127003725d89e925d8a0b1_20243983 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_14127003725d89e925d8a0b1_20243983',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

XN
<?php
}
}
/* {/block "title"} */
/* {block "client-main"} */
class Block_19928701305d89e925d8fca6_53610477 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <?php
}
}
/* {/block "client-main"} */
/* {block "body"} */
class Block_17759632415d89e925d8a6a0_26175337 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_17759632415d89e925d8a6a0_26175337',
  ),
  'client-main' => 
  array (
    0 => 'Block_19928701305d89e925d8fca6_53610477',
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
                <li><a id="m-cart" href="">我的菜籃<span class="badge"></span></a></li>
                <?php if ($_smarty_tpl->tpl_vars['user_name']->value) {?>
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

<div id="index-main" class="container">
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19928701305d89e925d8fca6_53610477', "client-main", $this->tplIndex);
?>

</div>

<?php
}
}
/* {/block "body"} */
/* {block "script"} */
class Block_6350717595d89e925d909e0_59211247 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_6350717595d89e925d909e0_59211247',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
 src="http://localhost/xn/js/client.js" defer><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
