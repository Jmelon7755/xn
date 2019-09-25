<?php
/* Smarty version 3.1.33, created on 2019-09-25 05:50:18
  from 'C:\xampp\htdocs\xn\templates\product-info.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8ae3fabbf102_51322486',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'de2283bdb46856aef3a57b79fc000349cadb444b' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xn\\templates\\product-info.html',
      1 => 1569383327,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d8ae3fabbf102_51322486 (Smarty_Internal_Template $_smarty_tpl) {
?><br />
<div class="row">
    <div class="col-xs-12">
        <img src="
            <?php if ($_smarty_tpl->tpl_vars['product']->value->img) {?>
            <?php echo $_smarty_tpl->tpl_vars['product']->value->img;?>

            <?php } else { ?>
            http://localhost/xn/resource/img/595prodImg20180823033204_1.jpg
            <?php }?>
            " class="img-responsive" width="250" height="250" style="float:left">
        <h3 class="text-danger"><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</h3>
        <p class="text-danger">售價: <?php echo $_smarty_tpl->tpl_vars['product']->value->price;?>
元</p>
        數量:
        <select id="product-count" required="required">
            <?php
$_smarty_tpl->tpl_vars['i'] = new Smarty_Variable(null, $_smarty_tpl->isRenderingCache);$_smarty_tpl->tpl_vars['i']->step = 1;$_smarty_tpl->tpl_vars['i']->total = (int) ceil(($_smarty_tpl->tpl_vars['i']->step > 0 ? $_smarty_tpl->tpl_vars['count_max']->value+1 - (1) : 1-($_smarty_tpl->tpl_vars['count_max']->value)+1)/abs($_smarty_tpl->tpl_vars['i']->step));
if ($_smarty_tpl->tpl_vars['i']->total > 0) {
for ($_smarty_tpl->tpl_vars['i']->value = 1, $_smarty_tpl->tpl_vars['i']->iteration = 1;$_smarty_tpl->tpl_vars['i']->iteration <= $_smarty_tpl->tpl_vars['i']->total;$_smarty_tpl->tpl_vars['i']->value += $_smarty_tpl->tpl_vars['i']->step, $_smarty_tpl->tpl_vars['i']->iteration++) {
$_smarty_tpl->tpl_vars['i']->first = $_smarty_tpl->tpl_vars['i']->iteration === 1;$_smarty_tpl->tpl_vars['i']->last = $_smarty_tpl->tpl_vars['i']->iteration === $_smarty_tpl->tpl_vars['i']->total;?>
            <option value="<?php echo $_smarty_tpl->tpl_vars['i']->value;?>
"><?php echo $_smarty_tpl->tpl_vars['i']->value;?>
</option>
            <?php }
}
?>
        </select>
        箱

        <button id="buy-btn" type="button" class="btn btn-default" value="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
">放入菜籃</button>
        <p class="text-warning">每人限購20箱</p>
        <p class="text-danger">目前庫存: <?php echo $_smarty_tpl->tpl_vars['product']->value->count;?>
箱</p>
        <p id="comment"><?php echo $_smarty_tpl->tpl_vars['product']->value->comment;?>
</p>
    </div>
</div><?php }
}
