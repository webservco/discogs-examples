<h1><?=__('API Result')?></h1>

<div class="row">
    <div class="col-md-1 py-1">
        <?=__('Endpoint')?>
    </div>
    <div class="col-md-auto py-1">
        <samp class="bg-light rounded p-2"><?=$this->data('result/endpoint')?></samp>
    </div>

    <div class="w-100"></div>

    <div class="col-md-1 py-1">
        <?=__('Method')?>
    </div>
    <div class="col-md-auto py-1">
        <samp class="bg-light rounded p-2"><?=$this->data('result/method')?></samp>
    </div>

    <div class="w-100"></div>

    <div class="col-md-1 py-1">
        <?=__('Status')?>
    </div>
    <div class="col-md-auto py-1">
        <samp class="bg-light rounded p-2"><?=$this->data('result/status')?></samp>
    </div>
</div>

<hr>

<div class="accordion" id="apiResult">

    <div class="card">
        <div class="card-header" id="responseHeader">
            <h2 class="mb-0 c-pointer" data-toggle="collapse" data-target="#responseContent" aria-controls="collapseOne" aria-expanded="true">
                <?=__('Response')?>
            </h2>
        </div>
        <div class="collapse show" id="responseContent" aria-labelledby="responseHeader" data-parent="#apiResult">
            <div class="card-body">
                <?php if ($this->data('result/errorMessage')) { ?>
                    <div class="alert alert-danger" role="alert">
                        <h3><?=__('Error')?></h3>
                        <samp><?=$this->data('result/errorMessage')?></samp>
                    </div>
                <?php } else if ($this->data('result/data')) { ?>
                    <div class="alert alert-success" role="alert">
                        <pre><samp><?php var_dump($this->data('result/data')) ?></samp></pre>
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
