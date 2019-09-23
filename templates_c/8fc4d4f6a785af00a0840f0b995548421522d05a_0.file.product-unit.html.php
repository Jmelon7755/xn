<?php
/* Smarty version 3.1.33, created on 2019-09-23 11:16:35
  from 'C:\xampp\htdocs\xn\templates\product-unit.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d888d73870179_66120513',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8fc4d4f6a785af00a0840f0b995548421522d05a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xn\\templates\\product-unit.html',
      1 => 1569230190,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d888d73870179_66120513 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="col-xs-3">
    <div class="panel panel-default">
        <div class="panel-body">
            <a id="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" class="product-img-a" href="">
                <img src="<?php echo $_smarty_tpl->tpl_vars['product']->value->img;?>
" class="img-responsive" alt="Image" width="250" height="250">
            </a>
            <p class="text-success"><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</p>
            <p class="text-danger"><span><?php echo $_smarty_tpl->tpl_vars['product']->value->price;?>
</span><span>元</span></p>
        </div>
    </div>
</div><?php }
}
