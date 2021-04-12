<?php

declare(strict_types=1);

?>
<!doctype html>
<html lang="<?=$this->data('i18n/lang', 'en')?>">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title><?=$this->data('meta/title', 'App')?></title>
    <meta name="description" content="<?=$this->data('meta/description', '')?>">

    <base href="<?=$this->data('url/app', '/')?>">

    <?php /* specify favicon path when not in domain root */ ?>
    <link href="<?=$this->data('url/app', '/')?>favicon.ico" rel="icon" type="image/x-icon" />

    <?php /* Optimized css file, do not edit. Please see docs/Layout.md */ ?>
    <link rel="stylesheet" href="<?=$this->data('url/app', '/')?>assets/css/styles.min.css?v=3587e8d">
</head>
<body>

<?=$this->data('tpl_navigation')?>

    <main role="main" id="main">
        <div id="content" class="container" data-url="<?=$this->data('url/current')?>">
<?=$this->data('tpl_content')?>
        </div>
    </main>

    <script>
    //<![CDATA[
    var urlApp = '<?=$this->data('url/app', '/')?>';
    //]]>
    </script>
    <?php /* Optimized js file, do not edit. Please see docs/Layout.md */ ?>
    <script defer src="<?=$this->data('url/app', '/')?>assets/js/scripts.min.js?v=3587e8d"></script>
    <script>
    //<![CDATA[
    window.addEventListener('load', function () { <?php /* https://stackoverflow.com/questions/45869839/javascript-run-inline-script-after-load-async-resources */ ?>
        <?php /* Inline page scripts. Only for custom per-page scripts. Put general scripts in JS files. */ ?>
    });
    //]]>
    </script>

</body>
</html>
