<?php require_once __DIR__ . '/../vendor/autoload.php'; ?>
<?php $minifier = (new \Minifine\Factory())->build(__DIR__, true); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Minifine</title>
        <?= $minifier->css(['/css/bootstrap.min.css', '/css/custom.css'], '/css/styles.min.css'); ?>
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
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Documentation <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/documentation/installation.php">Installation</a></li>
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
                        <h1>Minifine</h1>
                        <p>Minifine combines and minifies your javascript, css and html files used in your web application on the fly.</p>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Usage</h2>
                        <p>To start using using Minifine using the default minifiers simply use the factory to create a new Minifine instance:</p>
                        <code>$minifier = (new \Minifine\Factory())->build(__DIR__, true);</code>
                        <p>To combine and minify for example multiple stylesheet simply run the following code:</p>
                        <code>&lt;?= echo $minifier->css(['/css/bootstrap.min.css', '/css/custom.css']); ?&gt;</code>
                        <p>Combining and minifying javascript files works in exactly the same way:</p>
                        <code>&lt;?= echo $minifier->js(['/js/bootstrap.min.js', '/js/custom.js']); ?&gt;</code>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Examples</h2>
                        <p><a href="/minify-js-and-css-development.php">Minifiy JS and CSS on development environments</a></p>
                        <p><a href="/minify-js-and-css-production.php">Minifiy JS and CSS on production environments</a></p>
                    </div>
                </div>
            </section>
        </div>
        <?= $minifier->js(['/js/jquery-1.11.2.min.js', '/js/bootstrap.min.js', '/js/custom.js'], '/js/main.min.js'); ?>
    </body>
</html>
