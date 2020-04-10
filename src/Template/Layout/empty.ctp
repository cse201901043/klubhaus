<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>KLUBHAUS</title>


    <?= $this->Html->css('vendors/bootstrap/dist/css/bootstrap.min.css') ?>

    <?= $this->Html->css('vendors/font-awesome/css/font-awesome.min.css') ?>
    <!-- NProgress -->
    <?= $this->Html->css('vendors/nprogress/nprogress.css') ?>

    <?= $this->Html->css('vendors/animate.css/animate.min.css') ?>


    <?= $this->Html->css('template/build/css/custom.min.css') ?>

    <?= $this->Html->css('base.css') ?>
    <?= $this->Html->css('cake.css') ?>

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>

</head>

<body class="login">

<?= $this->Flash->render() ?>

<?= $this->fetch('content') ?>

</body>
</html>

