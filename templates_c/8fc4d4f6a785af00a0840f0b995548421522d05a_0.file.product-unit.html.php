<?php
/* Smarty version 3.1.33, created on 2019-09-25 07:42:40
  from 'C:\xampp\htdocs\xn\templates\product-unit.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8afe50f1e239_82279083',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '8fc4d4f6a785af00a0840f0b995548421522d05a' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xn\\templates\\product-unit.html',
      1 => 1569390159,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d8afe50f1e239_82279083 (Smarty_Internal_Template $_smarty_tpl) {
?><div class="col-xs-3">
    <div class="panel panel-default">
        <div class="panel-body">
            <a id="<?php echo $_smarty_tpl->tpl_vars['product']->value->id;?>
" class="product-img-a" href="">
                <img src="
                <?php if ($_smarty_tpl->tpl_vars['product']->value->img) {?>
                <?php echo $_smarty_tpl->tpl_vars['product']->value->img;?>

                <?php } else { ?>
                http://localhost/xn/resource/img/595prodImg20180823033204_1.jpg
                <?php }?>
                " class="img-responsive" width="250" height="250">
            </a>
            <p class="text-success"><?php echo $_smarty_tpl->tpl_vars['product']->value->name;?>
</p>
            <p class="text-danger"><span><?php echo $_smarty_tpl->tpl_vars['product']->value->price;?>
</span><span>元</span></p>
        </div>
    </div>
</div><?php }
}
