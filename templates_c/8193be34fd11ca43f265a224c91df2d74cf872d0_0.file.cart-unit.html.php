<?php
/* Smarty version 3.1.33, created on 2019-09-25 09:24:55
  from 'C:\xampp\htdocs\xn\templates\cart-unit.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8b16475adbb0_49809603',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8193be34fd11ca43f265a224c91df2d74cf872d0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xn\\templates\\cart-unit.html',
      1 => 1569396294,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d8b16475adbb0_49809603 (Smarty_Internal_Template $_smarty_tpl) {
?><div id="<?php echo $_smarty_tpl->tpl_vars['cart']->value->id;?>
" class="panel panel-default">
    <div class="panel-body">
        <div class="row">
            <div class="col-xs-12">
                <button type="button" class="btn btn-default pull-right delete-btn" value="<?php echo $_smarty_tpl->tpl_vars['cart']->value->id;?>
">刪除</button>
                <img src="<?php echo $_smarty_tpl->tpl_vars['cart']->value->img;?>
" class="img-responsive" width="250" height="250" style="float:left">
                <h3 class="text-danger"><?php echo $_smarty_tpl->tpl_vars['cart']->value->name;?>
</h3>
                <p class="text-danger">售價: <?php echo $_smarty_tpl->tpl_vars['cart']->value->price;?>
</p>
                數量:
                <?php echo $_smarty_tpl->tpl_vars['cart']->value->count;?>

                箱
            </div>
        </div>
    </div>
</div><?php }
}
