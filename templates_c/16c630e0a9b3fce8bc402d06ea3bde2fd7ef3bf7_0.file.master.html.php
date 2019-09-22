<?php
/* Smarty version 3.1.33, created on 2019-09-21 10:29:49
  from '/opt/lampp/htdocs/xn/templates/master.html' */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.33',
  'unifunc' => 'content_5d85df7d197908_92963573',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '16c630e0a9b3fce8bc402d06ea3bde2fd7ef3bf7' => 
    array (
      0 => '/opt/lampp/htdocs/xn/templates/master.html',
      1 => 1569023416,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5d85df7d197908_92963573 (Smarty_Internal_Template $_smarty_tpl) {
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
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_1321694785d85df7d194884_12801603', "stylesheet");
?>


    <?php echo '<script'; ?>
 src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"><?php echo '</script'; ?>
>
    <?php echo '<script'; ?>
 src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"><?php echo '</script'; ?>
>

    <title><?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_5440040675d85df7d195650_05148093', "title");
?>
</title>
</head>

<body>
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_4784710885d85df7d196319_87290160', "body");
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
    <?php 
$_smarty_tpl->inheritance->instanceBlock($_smarty_tpl, 'Block_7997519245d85df7d1970b8_03304063', "script");
?>

</body>

</html><?php }
/* {block "stylesheet"} */
class Block_1321694785d85df7d194884_12801603 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'stylesheet' => 
  array (
    0 => 'Block_1321694785d85df7d194884_12801603',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "stylesheet"} */
/* {block "title"} */
class Block_5440040675d85df7d195650_05148093 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'title' => 
  array (
    0 => 'Block_5440040675d85df7d195650_05148093',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "title"} */
/* {block "body"} */
class Block_4784710885d85df7d196319_87290160 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'body' => 
  array (
    0 => 'Block_4784710885d85df7d196319_87290160',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "body"} */
/* {block "script"} */
class Block_7997519245d85df7d1970b8_03304063 extends Smarty_Internal_Block
{
public $subBlocks = array (
  'script' => 
  array (
    0 => 'Block_7997519245d85df7d1970b8_03304063',
  ),
);
public function callBlock(Smarty_Internal_Template $_smarty_tpl) {
}
}
/* {/block "script"} */
}
