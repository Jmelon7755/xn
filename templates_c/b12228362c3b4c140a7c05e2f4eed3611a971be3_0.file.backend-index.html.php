<?php
/* Smarty version 3.1.33, created on 2019-09-26 17:10:46
  from 'C:\xampp\htdocs\xn\templates\backend-index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8c809699b0c6_09893515',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b12228362c3b4c140a7c05e2f4eed3611a971be3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xn\\templates\\backend-index.html',
      1 => 1569489043,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d8c809699b0c6_09893515 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11704933155d8c8096996700_37856008', "stylesheet");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1595911825d8c8096996fd6_70658040', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4272409415d8c80969975f2_88968089', "body");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14990189585d8c809699ac91_00151447', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "master.html");
}
/* {block "stylesheet"} */
class Block_11704933155d8c8096996700_37856008 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'stylesheet' => 
  array (
    0 => 'Block_11704933155d8c8096996700_37856008',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<link rel="stylesheet" href="http://localhost/xn/css/backend-index.css">
<?php
}
}
/* {/block "stylesheet"} */
/* {block "title"} */
class Block_1595911825d8c8096996fd6_70658040 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_1595911825d8c8096996fd6_70658040',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

XN-Backend
<?php
}
}
/* {/block "title"} */
/* {block "sub-title"} */
class Block_11452067525d8c8096999d68_28046167 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "sub-title"} */
/* {block "tab-panel"} */
class Block_16830381795d8c809699a354_38857662 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                    <?php
}
}
/* {/block "tab-panel"} */
/* {block "body"} */
class Block_4272409415d8c80969975f2_88968089 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_4272409415d8c80969975f2_88968089',
  ),
  'sub-title' => 
  array (
    0 => 'Block_11452067525d8c8096999d68_28046167',
  ),
  'tab-panel' => 
  array (
    0 => 'Block_16830381795d8c809699a354_38857662',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<nav class="navbar navbar-inverse" role="navigation">
    <div class="container-fluid">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="">XN後台</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse navbar-ex1-collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a target="_blank" rel="noopener noreferrer" href="http://localhost/xn/client">小農首頁</a></li>
                <li class="dropdown">
                    <a href="" class="dropdown-toggle" data-toggle="dropdown"><?php echo $_smarty_tpl->tpl_vars['user_name']->value;?>
<b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li><a id="logout-a" href="">登出</a></li>
                    </ul>
                </li>
            </ul>
        </div><!-- /.navbar-collapse -->
    </div>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-xs-2 sidenav">
            <ul class="nav nav-pills nav-stacked">
                <li><a id="member_manager" href="http://localhost/xn/backend/member-manager">
                        <span>會員管理</span>
                        <span class="pull-right">></span>
                    </a></li>
                <li><a id="product_manager" href="http://localhost/xn/backend/product-manager">
                        <span>產品管理</span>
                        <span class="pull-right">></span>
                    </a></li>
            </ul><br>
        </div>
        <div class="col-xs-10">
            <div class="container-fluid">
                <h3 id="sub_title"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11452067525d8c8096999d68_28046167', "sub-title", $this->tplIndex);
?>
</h3>
                <br />
                <div id="tab_panel">
                    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16830381795d8c809699a354_38857662', "tab-panel", $this->tplIndex);
?>

                </div>
            </div>
        </div>
    </div>
</div>
<?php
}
}
/* {/block "body"} */
/* {block "script"} */
class Block_14990189585d8c809699ac91_00151447 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_14990189585d8c809699ac91_00151447',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
 src="http://localhost/xn/js/backend-index.js" defer><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
