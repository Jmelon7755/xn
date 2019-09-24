<?php
/* Smarty version 3.1.33, created on 2019-09-24 09:14:56
  from 'C:\xampp\htdocs\xn\templates\master.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d89c270c854f4_29672118',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51af38d89ca1749c29940803f1f9c1c3a41fabd8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xn\\templates\\master.html',
      1 => 1569308878,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d89c270c854f4_29672118 (Smarty_Internal_Template $_smarty_tpl) {
$_smarty_tpl->_loadInheritance();
$_smarty_tpl->inheritance->init($_smarty_tpl, false);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <div id="stylesheet"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_21023928985d89c270c823f2_59584955', "stylesheet");
?>
</div>

    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://cdnjs.cloudflare.com/ajax/libs/jquery-cookie/1.4.1/jquery.cookie.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>

    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20693562325d89c270c842e9_70059833', "title");
?>
</title>
</head>

<body>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_9577088575d89c270c848b0_80848681', "body");
?>


    <div class="modal fade" id="modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title"></h4>
                </div>
                <div class="modal-body"></div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">取消</button>
                    <button type="button" class="btn btn-primary" id="modal-ok-btn"></button>
                </div>
            </div>
        </div>
    </div>

    <?php echo '<script'; ?>
 src="http://localhost/xn/js/master.js"><?php echo '</script'; ?>
>
    <div id="script"><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1654892065d89c270c84e65_48516866', "script");
?>
</div>
</body>

</html><?php }
/* {block "stylesheet"} */
class Block_21023928985d89c270c823f2_59584955 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'stylesheet' => 
  array (
    0 => 'Block_21023928985d89c270c823f2_59584955',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "stylesheet"} */
/* {block "title"} */
class Block_20693562325d89c270c842e9_70059833 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_20693562325d89c270c842e9_70059833',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_9577088575d89c270c848b0_80848681 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_9577088575d89c270c848b0_80848681',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "body"} */
/* {block "script"} */
class Block_1654892065d89c270c84e65_48516866 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_1654892065d89c270c84e65_48516866',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "script"} */
}
