<?php
/* Smarty version 3.1.33, created on 2019-09-26 05:52:26
  from 'C:\xampp\htdocs\xn\templates\cart.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8c35face7398_08276933',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '08bca02db5aca2e94a41eb078832cd624cd0bef0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xn\\templates\\cart.html',
      1 => 1569469939,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:cart-unit.html' => 1,
  ),
),false)) {
function content_5d8c35face7398_08276933 (Smarty_Internal_Template $_smarty_tpl) {
?><h3>我的菜籃</h3>
<br/>
<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['cart']->value, 'product');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['product']->value) {
$_smarty_tpl->_subTemplateRender("file:cart-unit.html", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array('product'=>$_smarty_tpl->tpl_vars['product']->value), 0, true);
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl, 1);
if (count($_smarty_tpl->tpl_vars['cart']->value)) {?>
<button id="confirm-buy-btn" type="button" class="btn btn-primary pull-right" style="margin-bottom: 5px">確認購買</button>
<?php }
}
}
