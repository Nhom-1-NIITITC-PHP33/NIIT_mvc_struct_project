<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">
    <link href="<?php echo URL_BASE.'templates/admin';?>/css/layout.css" 
    rel="stylesheet" type="text/css"/>


    <title></title>
</head>
<body>
    <div class="page-header">
        <?php require 'templates/admin/header.php';?>
    </div>
    <?php
    require TEMPLATE;
    ?>
    <div>
        <?php require 'templates/admin/footer.php';?>
    </div>
</body>
</html>
