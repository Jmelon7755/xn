<?php
/* Smarty version 3.1.33, created on 2019-09-26 05:51:42
  from 'C:\xampp\htdocs\xn\templates\product.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8c35ceb8b3f4_98515933',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a8f8e65dbc3602cf8c55316333ae76c03ea6f31c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xn\\templates\\product.html',
      1 => 1569469901,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:product-unit.html' => 1,
  ),
),false)) {
function content_5d8c35ceb8b3f4_98515933 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_14349867895d8c35ceb83593_26388527', "client-main");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5899049885d8c35ceb8af78_03357583', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "client.html");
}
/* {block "client-main"} */
class Block_14349867895d8c35ceb83593_26388527 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'client-main' => 
  array (
    0 => 'Block_14349867895d8c35ceb83593_26388527',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

    <h3>農場產品</h3>
    <br/>
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
class Block_5899049885d8c35ceb8af78_03357583 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_5899049885d8c35ceb8af78_03357583',
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
