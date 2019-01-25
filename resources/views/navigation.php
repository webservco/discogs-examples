<nav class="navbar navbar-expand-md navbar-dark bg-primary fixed-top">
    <a class="app-nav navbar-brand" href="<?=$this->data('url/app', '/')?>App/home"><?=__('Discogs Examples')?></a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarCollapse">
    <ul class="navbar-nav mr-auto">
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown-useridentity" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=__('User Identity')?></a>
            <?php foreach ([
                'UserIdentity/profile' => __('Profile')
                ] as $location => $title) { ?>
            <div class="dropdown-menu" aria-labelledby="dropdown-useridentity">
                <a class="app-nav dropdown-item" href="<?=$this->data('url/app', '/')?><?=$location?>"><?=$title?></a>
            </div>
            <?php } ?>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="dropdown-useridentity" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=__('User Collection')?></a>
            <?php foreach ([
                'UserCollection/value' => __('Value')
                ] as $location => $title) { ?>
            <div class="dropdown-menu" aria-labelledby="dropdown-useridentity">
                <a class="app-nav dropdown-item" href="<?=$this->data('url/app', '/')?><?=$location?>"><?=$title?></a>
            </div>
            <?php } ?>
        </li>
    </ul>
</div>
</nav>
