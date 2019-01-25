<h1><?=__('Profile')?></h1>

<?php if ($this->data('error')) { ?>
    <div class="alert alert-danger" role="alert">
        <?php foreach ($this->data('error') as $title => $message) { ?>
            <h2><?=$title?></h2>
            <p><?=$message?></p>
        <?php } ?>
    </div>
<?php } else { ?>
    <div class="alert alert-info" role="alert">
        <pre><?php var_dump($this->data('result')) ?></pre>
    </div>
<?php } ?>
