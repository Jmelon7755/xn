<?php
/* Smarty version 3.1.33, created on 2019-09-24 12:05:29
  from 'C:\xampp\htdocs\xn\templates\product.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d89ea69286df1_25907422',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8f8e65dbc3602cf8c55316333ae76c03ea6f31c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xn\\templates\\product.html',
      1 => 1569319526,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:product-unit.html' => 1,
  ),
),false)) {
function content_5d89ea69286df1_25907422 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14787722365d89ea6927e018_21969906', "client-main");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19020342745d89ea692869a5_16718465', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "client.html");
}
/* {block "client-main"} */
class Block_14787722365d89ea6927e018_21969906 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'client-main' => 
  array (
    0 => 'Block_14787722365d89ea6927e018_21969906',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

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
<?php
}
}
/* {/block "client-main"} */
/* {block "script"} */
class Block_19020342745d89ea692869a5_16718465 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_19020342745d89ea692869a5_16718465',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
 src="http://localhost/xn/js/product.js" defer><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
