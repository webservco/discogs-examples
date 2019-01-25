<h1><?=__('API Result')?></h1>

<?php if ($this->data('error')) { ?>
    <div class="alert alert-danger" role="alert">
        <?php foreach ($this->data('error') as $title => $message) { ?>
            <h2><?=__('Error')?> <span class="badge badge-danger font-weight-lighter"><?=$title?></span></h2>
            <p><?=$message?></p>
        <?php } ?>
    </div>
<?php } else { ?>
    <div class="alert alert-success" role="alert">
        <h2><?=__('Success')?></h2>
        <pre><samp><?php var_dump($this->data('result')) ?></samp></pre>

    </div>
<?php } ?>
