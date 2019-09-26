<?php
/* Smarty version 3.1.33, created on 2019-09-26 17:00:25
  from 'C:\xampp\htdocs\xn\templates\order-unit.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8c7e299c1a31_38270251',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'd4d37f02c7c38f54ff9d12517f684e86aadc664c' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xn\\templates\\order-unit.html',
      1 => 1569488424,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d8c7e299c1a31_38270251 (Smarty_Internal_Template $_smarty_tpl) {
?><tr id="<?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
">
    <td><?php echo $_smarty_tpl->tpl_vars['order']->value->id;?>
</td>
    <td><?php echo $_smarty_tpl->tpl_vars['order']->value->create_time;?>
</td>
    <!-- <td>
        <?php if ($_smarty_tpl->tpl_vars['order']->value->progress === 1) {?>
        <p class="text-primary">七日鑑賞期</p>
        <?php } elseif ($_smarty_tpl->tpl_vars['order']->value->progress === 2) {?>
        <p class="text-success">已結單</p>
        <?php } elseif ($_smarty_tpl->tpl_vars['order']->value->progress === 4) {?>
        <p class="text-success">已結單</p>
        <?php }?>
    </td> -->
    <td>
        <!-- <?php if ($_smarty_tpl->tpl_vars['order']->value->cancel) {?>
        <button class="cancel-btn" type="button" class="btn btn-danger">退貨</button>
        <?php } else { ?>
        <p class="text-success">已結單</p>
        <?php }?> -->
        <button type="button" class="btn btn-success detail-btn">明細</button>
    </td>
</tr><?php }
}
