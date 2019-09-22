<?php
/* Smarty version 3.1.33, created on 2019-09-21 10:34:41
  from '/opt/lampp/htdocs/xn/templates/product-manager.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d85e0a1363aa2_86893439',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f65acd71b7ca94beeca7b567e91fa00d50f4318e' => 
    array (
      0 => '/opt/lampp/htdocs/xn/templates/product-manager.html',
      1 => 1569054872,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d85e0a1363aa2_86893439 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_15527027675d85e0a1354f88_68496165', "sub-title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_16386008355d85e0a1356811_95199985', "tab-panel");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_3794594565d85e0a13629f1_95231622', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "backend-index.html");
}
/* {block "sub-title"} */
class Block_15527027675d85e0a1354f88_68496165 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'sub-title' => 
  array (
    0 => 'Block_15527027675d85e0a1354f88_68496165',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

產品管理
<?php
}
}
/* {/block "sub-title"} */
/* {block "tab-panel"} */
class Block_16386008355d85e0a1356811_95199985 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'tab-panel' => 
  array (
    0 => 'Block_16386008355d85e0a1356811_95199985',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="row">
    <div class="col-xs-12">
        <button id="add-btn" type="button" class="btn btn-success">
            <span class="glyphicon glyphicon-plus"></span> 新增產品
        </button>
    </div>
</div>
<br />
<div class="row">
    <div class="table-responsive">
        <table class="table table-bordered table-text-center">
            <thead>
                <tr>
                    <th>編號</th>
                    <th>圖片</th>
                    <th>名稱</th>
                    <th>庫存(箱)</th>
                    <th>價錢</th>
                    <th>描述</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['products']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
?>
                <tr id="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
">
                    <td><?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
</td>
                    <td>圖片</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['product']->value->count;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['product']->value->price;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['product']->value->comment;?>
</td>
                    <td>
                        <a href=""><span class="glyphicon glyphicon-pencil"></span></a>
                        <a href=""><span class="glyphicon glyphicon-trash"></span></a>
                    </td>
                </tr>
                <?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);?>
            </tbody>
        </table>
    </div>
</div>
<?php
}
}
/* {/block "tab-panel"} */
/* {block "script"} */
class Block_3794594565d85e0a13629f1_95231622 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_3794594565d85e0a13629f1_95231622',
  ),
);
public $append = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
 src="http://localhost/xn/js/product-manager.js" defer><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
