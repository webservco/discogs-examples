<nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
    <a class="app-nav navbar-brand" href="<?=$this->data('url/app', '/')?>App/home"><?=__('Discogs Examples')?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown-oauth" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=__('OAuth')?></a>
            <div class="dropdown-menu" aria-labelledby="dropdown-oauth">
            <?php foreach ([
                'Oauth/requestToken' => sprintf('%s 2: %s', __('Step'), __('Get request token')),
                'Oauth/redirect' => sprintf('%s 3: %s', __('Step'), __('Redirect')),
                'Oauth/callback' => sprintf('%s 3: %s', __('Step'), __('Callback')),
                'Oauth/accessToken' => sprintf('%s 4: %s', __('Step'), __('Get access token')),
                'Oauth/identity' => sprintf('%s 5: %s', __('Step'), __('Verify identity')),
                ] as $location => $title) { ?>
                <a class="app-nav dropdown-item" href="<?=$this->data('url/app', '/')?><?=$location?>"><?=$title?></a>
            <?php } ?>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown-useridentity" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=__('User Identity')?></a>
            <div class="dropdown-menu" aria-labelledby="dropdown-useridentity">
            <?php foreach ([
                'UserIdentity/profile' => __('Profile'),
                ] as $location => $title) { ?>

                <a class="app-nav dropdown-item" href="<?=$this->data('url/app', '/')?><?=$location?>"><?=$title?></a>
            <?php } ?>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown-usercollection" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=__('User Collection')?></a>
            <div class="dropdown-menu" aria-labelledby="dropdown-usercollection">
            <?php foreach ([
                'UserCollection/fields' => __('Fields'),
                'UserCollection/value' => __('Value'),
                ] as $location => $title) { ?>
                <a class="app-nav dropdown-item" href="<?=$this->data('url/app', '/')?><?=$location?>"><?=$title?></a>
            <?php } ?>
            </div>
        </li>
    </ul>
</div>
</nav>
