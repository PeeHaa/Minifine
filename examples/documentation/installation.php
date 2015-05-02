<?php require_once __DIR__ . '/../../vendor/autoload.php'; ?>
<?php $minifier = (new \Minifine\Factory())->build(__DIR__, true); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Installation - Documentation - Minifine</title>
        <?= $minifier->css(['/css/bootstrap.min.css', '/css/custom.css'], '/css', 'styles.min.css'); ?>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="/">Minifine</a>
                </div>
                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                    <ul class="nav navbar-nav">
                        <li class="dropdown active">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Documentation <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li class="active"><a href="/documentation/installation.php">Installation<span class="sr-only">(current)</span></a></li>
                                <li><a href="/documentation/basic-usage.php">Basic usage</a></li>
                                <li><a href="/documentation/advanced-usage.php">Advanced usage</a></li>
                                <li class="divider"></li>
                                <li><a href="/documentation/contributing.php">Contributing</a></li>
                            </ul>
                        </li>
                        <li><a href="/minify-js-and-css-development.php">Development environment example</a></li>
                        <li><a href="/minify-js-and-css-production.php">Production environment example</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li><a href="https://github.com/PeeHaa/Minifine" target="_blank"><span class="hidden-sm hidden-md hidden-lg">Project on GitHub </span><span class="glyphicon glyphicon-cloud-download"></span></a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="container">
            <section>
                <div class="row">
                    <div class="col-lg-12">
                        <h1>Installation</h1>
                        <p>To install Minifine use composer:</p>
                        <code>composer require peehaa/minifine</code>
                        <p>or add the project as a depedency to your <code>composer.json</code> file:</p>
                        <pre><code>"require": {
    "peehaa/minifine": "1.0.*"
},</code></pre>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Requirements</h2>
                        <p>Minifine officially supports PHP 5.5+, however it should also work on PHP 5.4. Note however that any PHP < 5.5 specific bugs will not be fixed.</p>
                    </div>
                </div>
            </section>
        </div>
        <?= $minifier->js(['/js/jquery-1.11.2.min.js', '/js/bootstrap.min.js', '/js/custom.js'], '/js', 'main.min.js'); ?>
    </body>
</html>
