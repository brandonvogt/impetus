<!DOCTYPE html>
<html>
<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>
        IMPETUS:
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon') ?>
    
    <?= $this->Html->css('bootstrap.css') ?>
    <?= $this->Html->css('bootstrap-theme.css') ?>
    <?= $this->Html->css('remodal.css') ?>
    
    <?= $this->Html->css('remodal-default-theme.css') ?>
    <?= $this->Html->css('preload.css') ?>
    <?= $this->Html->css('impetus.css') ?>
    

    <?= $this->Html->script('jquery.min.js') ?>
    <?= $this->Html->script('bootstrap.min.js') ?>
    <?= $this->Html->script('remodal.min.js') ?>
    

    <?= $this->fetch('meta') ?>
    <?= $this->fetch('css') ?>
    <?= $this->fetch('script') ?>
</head>
<body>
    <section class="container-fluid clearfix">
        <?php if ($loggedin) : ?>
        <p><?= $this->Html->link('IMPETUS', ['controller' => 'Pages', 'action' => 'portal']); ?> <?= $username ?> - <span id="gold"></span> <?= $this->Html->image('gold.png', ['class' => 'goldimg']) ?> <?= $this->Html->image('divider.png') ?> <?= $this->Html->link('Logout', ['controller' => 'DbUsers', 'action' => 'logout']) ?></p>
        <?php else: ?>
        <p><?= $this->Html->link('Please log in!', ['controller' => 'DbUsers', 'action' => 'login'])?></p>
        <?php endif; ?>
        <div class="row">
            <div class="col-md-4 col-centered">
            <?= $this->Html->image('title.png',['url' => ['controller' => 'Pages', 'action' => 'portal']]); ?>
            </div>
        </div>
        <?= $this->fetch('content') ?>
    </section>
    <footer>
    </footer>
</body>
</html>
