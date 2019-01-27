<h1><?=__('Custom API call')?></h1>

<form class="" action="" method="post" enctype="multipart/form-data">
    <div class="form-row">
        <div class="col-md-2">
            <label class="sr-only" for="method"><?=$this->data('form/meta/method')?></label>
            <select class="form-control<?=$this->data('form/errors/method')?' is-invalid':''?>" id="method" name="method" aria-describedby="methodHelp"<?=$this->data('form/required/method')?' required':''?>>
            <?php foreach (['GET', 'POST'] as $item) { ?>
                <option value="<?=$item?>"<?=$item==$this->data('form/data/method')?' selected':''?>><?=$item?></option>
            <?php } ?>
            </select>
            <?php if ($this->data('form/errors/method')) { ?>
                <div class="invalid-feedback">
                <?=implode(', ', $this->data('form/errors/method'))?>
                </div>
            <?php } ?>
        </div>
        <div class="col-md-8">
            <label class="sr-only" for="endpoint"><?=$this->data('form/meta/endpoint')?></label>
            <div class="input-group">
                <div class="input-group-prepend d-none d-sm-block">
                    <div class="input-group-text"><?=$this->data('api/method')?> <?=$this->data('api/url')?></div>
                </div>
                <input type="text" class="form-control<?=$this->data('form/errors/endpoint')?' is-invalid':''?>" id="endpoint" name="endpoint" aria-describedby="endpointHelp"
                placeholder="<?=$this->data('api/defaultEndpoint')?>" value="<?=$this->data('form/data/endpoint')?>"
                <?=$this->data('form/required/endpoint')?' required':''?>>
                <?php if ($this->data('form/errors/endpoint')) { ?>
                    <div class="invalid-feedback">
                    <?=implode(', ', $this->data('form/errors/endpoint'))?>
                    </div>
                <?php } ?>
            </div>
        </div>
        <div class="col-md-2">
            <button type="submit" name="submit" class="btn btn-primary mb-2"><?=__('Submit')?></button>
        </div>
    </div>
</form>
