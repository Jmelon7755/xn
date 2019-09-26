<?php
/* Smarty version 3.1.33, created on 2019-09-26 16:59:40
  from 'C:\xampp\htdocs\xn\templates\order.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8c7dfc5c7b64_31205949',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e3dfea671bc760cc9f724920f3273842ad23056f' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xn\\templates\\order.html',
      1 => 1569488280,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:order-unit.html' => 1,
  ),
),false)) {
function content_5d8c7dfc5c7b64_31205949 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_8306802885d8c7dfc5befd5_00427444', "title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_17241450485d8c7dfc5bfb68_52663700', "client-main");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5509678205d8c7dfc5c7545_51669147', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "client.html");
}
/* {block "title"} */
class Block_8306802885d8c7dfc5befd5_00427444 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_8306802885d8c7dfc5befd5_00427444',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

Order
<?php
}
}
/* {/block "title"} */
/* {block "client-main"} */
class Block_17241450485d8c7dfc5bfb68_52663700 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'client-main' => 
  array (
    0 => 'Block_17241450485d8c7dfc5bfb68_52663700',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>


<h3>我的訂單</h3>

<table class="table table-hover">
    <thead>
        <tr>
            <th>訂單編號</th>
            <th>訂單創建時間</th>
            <th>操作</th>
        </tr>
    </thead>
    <tbody>
        <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['orders']->value, 'order');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['order']->value) {
?>
        <?php $_smarty_tpl->_subTemplateRender("file:order-unit.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('order'=>$_smarty_tpl->tpl_vars['order']->value), 0, true);
?>
        <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
    </tbody>
</table>

<?php
}
}
/* {/block "client-main"} */
/* {block "script"} */
class Block_5509678205d8c7dfc5c7545_51669147 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_5509678205d8c7dfc5c7545_51669147',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
 src="http://localhost/xn/js/order.js" defer><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
