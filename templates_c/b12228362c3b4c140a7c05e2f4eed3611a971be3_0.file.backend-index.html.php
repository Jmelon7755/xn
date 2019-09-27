<?php
/* Smarty version 3.1.33, created on 2019-09-27 09:29:24
  from 'C:\xampp\htdocs\xn\templates\backend-index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8d65f4307033_76939299',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b12228362c3b4c140a7c05e2f4eed3611a971be3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xn\\templates\\backend-index.html',
      1 => 1569489060,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d8d65f4307033_76939299 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9464756935d8d65f42d8504_41938838', "stylesheet");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4678121515d8d65f42d9406_30167474', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20051361795d8d65f42d9a20_33494764', "body");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11374269445d8d65f4306894_31429665', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "master.html");
}
/* {block "stylesheet"} */
class Block_9464756935d8d65f42d8504_41938838 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'stylesheet' => 
  array (
    0 => 'Block_9464756935d8d65f42d8504_41938838',
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
class Block_4678121515d8d65f42d9406_30167474 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_4678121515d8d65f42d9406_30167474',
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
class Block_12194341425d8d65f4305820_26180747 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "sub-title"} */
/* {block "tab-panel"} */
class Block_13554487805d8d65f4305f03_45882812 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                    <?php
}
}
/* {/block "tab-panel"} */
/* {block "body"} */
class Block_20051361795d8d65f42d9a20_33494764 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_20051361795d8d65f42d9a20_33494764',
  ),
  'sub-title' => 
  array (
    0 => 'Block_12194341425d8d65f4305820_26180747',
  ),
  'tab-panel' => 
  array (
    0 => 'Block_13554487805d8d65f4305f03_45882812',
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
                <!-- <li><a id="transaction_manager" href="http://localhost/xn/backend/transaction-manager">
                        <span>交易管理</span>
                        <span class="pull-right">></span>
                    </a></li> -->
            </ul><br>
        </div>
        <div class="col-xs-10">
            <div class="container-fluid">
                <h3 id="sub_title"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12194341425d8d65f4305820_26180747', "sub-title", $this->tplIndex);
?>
</h3>
                <br />
                <div id="tab_panel">
                    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_13554487805d8d65f4305f03_45882812', "tab-panel", $this->tplIndex);
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
class Block_11374269445d8d65f4306894_31429665 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_11374269445d8d65f4306894_31429665',
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
