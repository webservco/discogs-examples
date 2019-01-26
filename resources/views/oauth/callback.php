<h1><?=__('OAuth Callback')?></h1>

<?php if ($this->data('denied')) { ?>
    <div class="alert alert-danger" role="alert">
        <h2><?=__('Authoritarion denied')?></h2>
    </div>
<?php } else if ($this->data('oauth_verifier')) { ?>
    <div class="alert alert-success" role="alert">
        <h2><?=__('Authorization successfull')?></h2>
    </div>
    <table class="table table-bordered">
        <thead>
            <th>oauth_token</th>
            <th>oauth_verifier</th>
        </thead>
        <tbody>
            <tr>
                <td><samp><?=$this->data('oauth_token')?></samp></td>
                <td><samp><?=$this->data('oauth_verifier')?></samp></td>
            </tr>
        </tbody>
    </table>
<?php } else { ?>
    <div class="alert alert-secondary" role="alert">
        <h2><?=__('No authorization')?></h2>
    </div>
<?php } ?>
