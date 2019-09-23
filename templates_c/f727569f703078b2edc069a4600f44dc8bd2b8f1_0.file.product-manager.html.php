<?php
/* Smarty version 3.1.33, created on 2019-09-23 10:44:35
  from 'C:\xampp\htdocs\xn\templates\product-manager.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8885f34fbab2_29760850',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f727569f703078b2edc069a4600f44dc8bd2b8f1' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xn\\templates\\product-manager.html',
      1 => 1569212367,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d8885f34fbab2_29760850 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12308000155d8885f34ec0a2_71523551', "sub-title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2599060725d8885f34ed1c1_90612725', "tab-panel");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5332917135d8885f34fb434_41785168', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "backend-index.html");
}
/* {block "sub-title"} */
class Block_12308000155d8885f34ec0a2_71523551 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'sub-title' => 
  array (
    0 => 'Block_12308000155d8885f34ec0a2_71523551',
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
class Block_2599060725d8885f34ed1c1_90612725 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'tab-panel' => 
  array (
    0 => 'Block_2599060725d8885f34ed1c1_90612725',
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
                    <td><img id="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
-img" src=
                        <?php if ($_smarty_tpl->tpl_vars['product']->value->img) {?>
                        "<?php echo $_smarty_tpl->tpl_vars['product']->value->img;?>
"
                        <?php } else { ?>
                        "http://localhost/xn/resource/img/595prodImg20180823033204_1.jpg"
                        <?php }?>
                    width="100" height="100"></td>
                    <td id="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
-name"><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</td>
                    <td id="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
-count"><?php echo $_smarty_tpl->tpl_vars['product']->value->count;?>
</td>
                    <td id="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
-price"><?php echo $_smarty_tpl->tpl_vars['product']->value->price;?>
</td>
                    <td id="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
-comment"><?php echo $_smarty_tpl->tpl_vars['product']->value->comment;?>
</td>
                    <td>
                        <a class="edit-btn" href=""><span class="glyphicon glyphicon-pencil"></span></a>
                        <a class="delete-btn" href=""><span class="glyphicon glyphicon-trash"></span></a>
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
class Block_5332917135d8885f34fb434_41785168 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_5332917135d8885f34fb434_41785168',
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
