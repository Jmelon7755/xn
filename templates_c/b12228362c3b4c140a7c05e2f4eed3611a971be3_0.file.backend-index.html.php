<?php
/* Smarty version 3.1.33, created on 2019-09-23 10:44:35
  from 'C:\xampp\htdocs\xn\templates\backend-index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8885f350ed78_40164155',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'b12228362c3b4c140a7c05e2f4eed3611a971be3' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xn\\templates\\backend-index.html',
      1 => 1569200685,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d8885f350ed78_40164155 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_11433939845d8885f350c637_85009452', "stylesheet");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8199527695d8885f350cd45_29203200', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9989850765d8885f350d335_11519277', "body");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1454339605d8885f350e988_22572101', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "master.html");
}
/* {block "stylesheet"} */
class Block_11433939845d8885f350c637_85009452 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'stylesheet' => 
  array (
    0 => 'Block_11433939845d8885f350c637_85009452',
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
class Block_8199527695d8885f350cd45_29203200 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_8199527695d8885f350cd45_29203200',
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
class Block_12550769145d8885f350db22_54708134 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "sub-title"} */
/* {block "tab-panel"} */
class Block_7493242205d8885f350e094_01549834 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                    <?php
}
}
/* {/block "tab-panel"} */
/* {block "body"} */
class Block_9989850765d8885f350d335_11519277 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_9989850765d8885f350d335_11519277',
  ),
  'sub-title' => 
  array (
    0 => 'Block_12550769145d8885f350db22_54708134',
  ),
  'tab-panel' => 
  array (
    0 => 'Block_7493242205d8885f350e094_01549834',
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
                <li><a id="transaction_manager" href="http://localhost/xn/backend/transaction-manager">
                        <span>交易管理</span>
                        <span class="pull-right">></span>
                    </a></li>
            </ul><br>
        </div>
        <div class="col-xs-10">
            <div class="container-fluid">
                <h3 id="sub_title"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12550769145d8885f350db22_54708134', "sub-title", $this->tplIndex);
?>
</h3>
                <br />
                <div id="tab_panel">
                    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7493242205d8885f350e094_01549834', "tab-panel", $this->tplIndex);
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
class Block_1454339605d8885f350e988_22572101 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_1454339605d8885f350e988_22572101',
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
