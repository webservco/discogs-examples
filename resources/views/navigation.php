<nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
    <a class="app-nav navbar-brand" href="<?=$this->data('url/app', '/')?>App/home"><?=__('Discogs Examples')?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
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
            <a class="nav-link dropdown-toggle" href="#" id="dropdown-useridentity" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=__('User Collection')?></a>
            <div class="dropdown-menu" aria-labelledby="dropdown-useridentity">
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
