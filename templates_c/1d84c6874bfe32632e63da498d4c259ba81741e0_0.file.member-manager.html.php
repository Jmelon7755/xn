<?php
/* Smarty version 3.1.33, created on 2019-09-24 04:11:16
  from 'C:\xampp\htdocs\xn\templates\member-manager.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d897b447f2da4_12201212',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '1d84c6874bfe32632e63da498d4c259ba81741e0' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xn\\templates\\member-manager.html',
      1 => 1569200685,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d897b447f2da4_12201212 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, true);
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_12510845865d897b4473b145_44492812', "sub-title");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20491976515d897b4473be11_00092756', "tab-panel");
?>


<?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_131539075d897b447f2736_81213282', "script");
$_smarty_tpl->inheritance->endChild($_smarty_tpl, "backend-index.html");
}
/* {block "sub-title"} */
class Block_12510845865d897b4473b145_44492812 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'sub-title' => 
  array (
    0 => 'Block_12510845865d897b4473b145_44492812',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

會員管理
<?php
}
}
/* {/block "sub-title"} */
/* {block "tab-panel"} */
class Block_20491976515d897b4473be11_00092756 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'tab-panel' => 
  array (
    0 => 'Block_20491976515d897b4473be11_00092756',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<div class="row">
    <div class="col-xs-12">
        <button id="all-freeze-btn" type="button" class="btn btn-danger" style="display:none">
            <span class="glyphicon glyphicon-trash"></span> 批量凍結
        </button>
    </div>
</div>
<br />
<div class="row">
    <div class="table-responsive">
        <table class="table table-bordered table-text-center">
            <thead>
                <tr>
                    <th class="checkbox-col" style="display: none">
                        <div id="all-select-div" class="checkbox" style="display:none">
                            <label><input id="all-select-checkbox" type="checkbox">全選</label>
                        </div>
                    </th>
                    <th>編號</th>
                    <th>用戶名</th>
                    <th>帳號</th>
                    <th>加入時間</th>
                    <th>權限</th>
                    <th>狀態</th>
                    <th>操作</th>
                </tr>
            </thead>
            <tbody>
                <?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['users']->value, 'user');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['user']->value) {
?>
                <tr id="<?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
">
                    <th class="checkbox-col" style="display: none">
                        <?php if (!$_smarty_tpl->tpl_vars['user']->value->administrator && !$_smarty_tpl->tpl_vars['user']->value->freeze) {?>
                        <input class="row-select-checkbox" type="checkbox">
                        <?php }?>
                    </th>
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value->id;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value->name;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value->account;?>
</td>
                    <td><?php echo $_smarty_tpl->tpl_vars['user']->value->create_time;?>
</td>
                    <td>
                        <?php if ($_smarty_tpl->tpl_vars['user']->value->administrator) {?>
                        管理員
                        <?php } else { ?>
                        一般會員
                        <?php }?>
                    </td>
                    <td>
                        <?php if ($_smarty_tpl->tpl_vars['user']->value->freeze) {?>
                        已凍結
                        <?php } else { ?>
                        已開啟
                        <?php }?>
                    </td>
                    <td>
                        <?php if (!$_smarty_tpl->tpl_vars['user']->value->administrator) {?>
                        <?php if (!$_smarty_tpl->tpl_vars['user']->value->freeze) {?>
                        <a class="upgrade-admin-a" href=""><span class="glyphicon glyphicon-user"></span></a>
                        <?php }?>
                        <?php if ($_smarty_tpl->tpl_vars['user']->value->freeze) {?>
                        <a class="unlock-a" href=""><span class="glyphicon glyphicon-refresh"></span></a>
                        <?php } else { ?>
                        <a class="lock-a" href=""><span class="glyphicon glyphicon glyphicon-lock"></span></a>
                        <?php }?>
                        <?php }?>
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
class Block_131539075d897b447f2736_81213282 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_131539075d897b447f2736_81213282',
  ),
);
public $prepend = 'true';
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
?>

<?php echo '<script'; ?>
 src="http://localhost/xn/js/member-manager.js"><?php echo '</script'; ?>
>
<?php
}
}
/* {/block "script"} */
}
