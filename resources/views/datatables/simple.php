<?php

declare(strict_types=1);

?>
<h1>DataTables <small><span class="badge badge-primary font-weight-lighter">Simple</span></small></h1>

<p>Basic implementation without database.</p>
<p><strong>Search and filter not implemented.</strong></p>
<p>Uses <code>\WebServCo\Framework\DataTables\AbstractDataTables</code></p>

<table id="datatables-simple" class="table table-sm <?php /*layout problems table-striped */ ?>
    <?php /* doesn't work for complex headers ?>dt-responsive */ ?>" style="width:100%">
    <thead>
        <tr>
            <th></th>
            <th><?=__('Id')?></th>
            <th><?=__('Name')?></th>
            <th><?=__('Value')?></th>
        </tr>
    </thead>
    <tfoot>
        <tr>
            <th></th>
            <th><?=__('Id')?></th>
            <th><?=__('Name')?></th>
            <th><?=__('Value')?></th>
        </tr>
    </tfoot>
</table>
