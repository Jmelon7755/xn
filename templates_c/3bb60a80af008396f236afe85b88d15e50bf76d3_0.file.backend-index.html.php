<?php
/* Smarty version 3.1.33, created on 2019-09-21 10:34:41
  from '/opt/lampp/htdocs/xn/templates/backend-index.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d85e0a1386b41_29759242',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3bb60a80af008396f236afe85b88d15e50bf76d3' => 
    array (
      0 => '/opt/lampp/htdocs/xn/templates/backend-index.html',
      1 => 1569054865,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d85e0a1386b41_29759242 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6795440195d85e0a1380d42_34637498', "stylesheet");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20438743225d85e0a1381ce1_74684156', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6643048035d85e0a1382a18_96605900', "body");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7474956455d85e0a1386228_94173290', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "master.html");
}
/* {block "stylesheet"} */
class Block_6795440195d85e0a1380d42_34637498 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'stylesheet' => 
  array (
    0 => 'Block_6795440195d85e0a1380d42_34637498',
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
class Block_20438743225d85e0a1381ce1_74684156 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_20438743225d85e0a1381ce1_74684156',
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
class Block_21051237405d85e0a13840d9_97812083 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "sub-title"} */
/* {block "tab-panel"} */
class Block_4697240525d85e0a1384d18_39809214 extends Smarty_Internal_Block
{
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

                    <?php
}
}
/* {/block "tab-panel"} */
/* {block "body"} */
class Block_6643048035d85e0a1382a18_96605900 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_6643048035d85e0a1382a18_96605900',
  ),
  'sub-title' => 
  array (
    0 => 'Block_21051237405d85e0a13840d9_97812083',
  ),
  'tab-panel' => 
  array (
    0 => 'Block_4697240525d85e0a1384d18_39809214',
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21051237405d85e0a13840d9_97812083', "sub-title", $this->tplIndex);
?>
</h3>
                <br />
                <div id="tab_panel">
                    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4697240525d85e0a1384d18_39809214', "tab-panel", $this->tplIndex);
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
class Block_7474956455d85e0a1386228_94173290 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_7474956455d85e0a1386228_94173290',
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
