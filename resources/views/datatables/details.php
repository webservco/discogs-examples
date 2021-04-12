<?php

declare(strict_types=1);

?>
<h1>Item details</h1>
<?php

if ($this->data('item')) { ?>
    <p>
        <strong>Id</strong>: <code><?=$this->data('item/id')?></code>
    </p>
    <p>
        <strong>Name</strong>: <code><?=$this->data('item/name')?></code>
    </p>
    <p>
        <strong>Value</strong>: <code><?=$this->data('item/value')?></code>
    </p>
<?php } else { ?>
    <div class="alert alert-danger" role="alert">No data</div>
<?php } ?>
