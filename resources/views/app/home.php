<h1><?=__('Discogs Examples')?></h1>

<hr>
<h2><?=__('OAuth')?></h2>
<div class="list-group">
    <?php foreach ([
        'Oauth/requestToken' => sprintf('%s 2: %s', __('Step'), __('Get request token')),
        'Oauth/redirect' => sprintf('%s 3: %s', __('Step'), __('Redirect')),
        'Oauth/callback' => sprintf('%s 3: %s', __('Step'), __('Callback')),
        'Oauth/accessToken' => sprintf('%s 4: %s', __('Step'), __('Get access token')),
        'Oauth/identity' => sprintf('%s 5: %s', __('Step'), __('Verify identity')),
        ] as $location => $title) { ?>
    <a href="<?=$this->data('url/app', '/')?><?=$location?>" class="app-nav list-group-item list-group-item-action"><?=$title?></a>
    <?php } ?>
</div>

<hr>
<h2><?=__('User Identity')?></h2>
<div class="list-group">
    <?php foreach ([
        'UserIdentity/profile' => __('Profile')
        ] as $location => $title) { ?>
    <a href="<?=$this->data('url/app', '/')?><?=$location?>" class="app-nav list-group-item list-group-item-action"><?=$title?></a>
    <?php } ?>
</div>

<hr>
<h2><?=__('User Collection')?></h2>
<div class="list-group">
    <?php foreach ([
        'UserCollection/fields' => __('Fields'),
        'UserCollection/value' => __('Value'),
        ] as $location => $title) { ?>
    <a href="<?=$this->data('url/app', '/')?><?=$location?>" class="app-nav list-group-item list-group-item-action"><?=$title?></a>
    <?php } ?>
</div>

<hr>
<h2><?=__('API')?></h2>
<div class="list-group">
    <?php foreach ([
        'Api/custom' => __('Custom API call'),
        ] as $location => $title) { ?>
    <a href="<?=$this->data('url/app', '/')?><?=$location?>" class="app-nav list-group-item list-group-item-action"><?=$title?></a>
    <?php } ?>
</div>
