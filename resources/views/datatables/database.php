<?php

declare(strict_types=1);

?>
<h1>DataTables <small><span class="badge badge-primary font-weight-lighter">Database</span></small></h1>

<p>Full implementation using a database backend.</p>
<p>Uses <code>\WebServCo\Framework\DataTables\AbstractDataTablesDatabase</code></p>
<p>
    The search is customized in the following way:
    <ul>
        <li><code>id</code> <small>exact match <em>= {search}</em></small></li>
        <li><code>name</code> <small>partial match <em>LIKE %{search}%</em></small></li>
        <li><code>value</code> <small>matches items starting with the search query <em>LIKE {search}%</em></small></li>
    </ul>
</p>


<table id="datatables-database" class="table table-sm <?php /*layout problems table-striped */ ?>
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
