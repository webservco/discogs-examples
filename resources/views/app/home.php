<h1><?=__('Discogs Examples')?></h1>

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
        'UserCollection/value' => __('Value')
        ] as $location => $title) { ?>
    <a href="<?=$this->data('url/app', '/')?><?=$location?>" class="app-nav list-group-item list-group-item-action"><?=$title?></a>
    <?php } ?>
