<?php
/* Smarty version 3.1.33, created on 2019-09-25 10:59:47
  from 'C:\xampp\htdocs\xn\templates\master.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d8b2c835fb8c6_62462369',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '51af38d89ca1749c29940803f1f9c1c3a41fabd8' => 
    array (
      0 => 'C:\\xampp\\htdocs\\xn\\templates\\master.html',
      1 => 1569401365,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d8b2c835fb8c6_62462369 (Smarty_Internal_Template $_smarty_tpl) {
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_2872477015d8b2c835f8e83_26904977', "stylesheet");
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_20581565835d8b2c835fa677_30322226', "title");
?>
</title>
</head>

<body>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_19448267235d8b2c835fac23_38723164', "body");
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
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_6584271885d8b2c835fb1b8_12623984', "script");
?>
</div>
</body>

</html><?php }
/* {block "stylesheet"} */
class Block_2872477015d8b2c835f8e83_26904977 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'stylesheet' => 
  array (
    0 => 'Block_2872477015d8b2c835f8e83_26904977',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "stylesheet"} */
/* {block "title"} */
class Block_20581565835d8b2c835fa677_30322226 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_20581565835d8b2c835fa677_30322226',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_19448267235d8b2c835fac23_38723164 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_19448267235d8b2c835fac23_38723164',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "body"} */
/* {block "script"} */
class Block_6584271885d8b2c835fb1b8_12623984 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_6584271885d8b2c835fb1b8_12623984',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "script"} */
}
