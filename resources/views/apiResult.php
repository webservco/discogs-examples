<h1>
    <?=__('API Result')?>
    <span class="badge badge-secondary font-weight-lighter"><?=$this->data('location/current')?></span>
</h1>

<div class="accordion" id="apiResult">

    <div class="card">
        <div class="card-header" id="responseHeader">
            <h2 class="mb-0 c-pointer" data-toggle="collapse" data-target="#responseContent" aria-controls="collapseOne" aria-expanded="true">
                <?=__('Response')?>
            </h2>
        </div>
        <div class="collapse show" id="responseContent" aria-labelledby="responseHeader" data-parent="#apiResult">
            <div class="card-body">
                <?php if ($this->data('error')) { ?>
                    <div class="alert alert-danger" role="alert">
                        <?php foreach ($this->data('error') as $title => $message) { ?>
                            <h3><?=__('Error')?> <span class="badge badge-danger font-weight-lighter"><?=$title?></span></h3>
                            <p><?=$message?></p>
                        <?php } ?>
                    </div>
                <?php } else { ?>
                    <div class="alert alert-success" role="alert">
                        <pre><samp><?php var_dump($this->data('result')) ?></samp></pre>

                    </div>
                <?php } ?>
            </div>
        </div>
    </div>

    <div class="card">
        <div class="card-header" id="configHeader">
            <h2 class="mb-0 c-pointer" data-toggle="collapse" data-target="#configContent" aria-controls="collapseOne" aria-expanded="true">
                <?=__('Configuration')?>
            </h2>
        </div>
        <div class="collapse" id="configContent" aria-labelledby="configHeader" data-parent="#apiResult">
            <div class="card-body">
                <div class="alert alert-secondary" role="alert">
                    <pre><samp><?php print_r($this->data('discogs/config/api')); ?></samp></pre>
                </div>
            </div>

        </div>
    </div>

</div>
