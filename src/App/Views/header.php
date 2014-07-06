<html>
<head>
    <title><?php echo $app->conf['title']; ?></title>
    <link rel="stylesheet" href="assets/css/bootsketch.css" />
    <link rel="stylesheet" href="assets/css/phpShop.css" />
</head>
<body>
<nav class="navbar navbar-default" role="navigation">
    <div class="container-fluid">
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li><a class="navbar-brand" href="index.php"><?php echo $app->conf['title']; ?></a></li>
                <li><a href="korb.php">Warenkorb</a></li>
                <li><a href="kasse1.php">Kasse (<?php echo $app->getWarenkorb()->getPreis(); ?>)</a></li>
            </ul>
        </div>
    </div>
</nav>
    <div class="container">
        <div class="notifications">
            <?php foreach ($app->getNotifications() as $notification) { ?>
                <div class="alert alert-block alert-<?php echo $notification['type']; ?> alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <?php echo $notification['body']; ?>
                </div>
             <?php } ?>
        </div>
        <div class="row">
            <div class="col-lg-12">