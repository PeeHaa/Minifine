<?php require_once __DIR__ . '/../vendor/autoload.php'; ?>
<?php $minifier = (new \Minifine\Factory())->build(__DIR__); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Minify JS and CSS (development) - Minifine examples</title>
        <?= $minifier->css(['/css/bootstrap.min.css', '/css/custom.css'], '/css/styles.min.css'); ?>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
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
                        <li class="active"><a href="/minify-js-and-css-development.php">Development environment example<span class="sr-only">(current)</span></a></li>
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
                        <h1>Minify JS and Css (development)</h1>
                        <p>This is an example of how Minifine would run when in a development environment.</p>
                        <p>When in development mode the resources will be minified, however unminified versions will be loaded when the page is requested to ease debugging.</p>
                        <p>In the head of this page two stylesheet will be minified and at the bottom of this page three javascript files will be minified:</p>
                        <h2>Stylesheet</h2>
                        <pre><code>&lt;?= $minifier->css(['/css/bootstrap.min.css', '/css/custom.css'], '/css/styles.min.css'); ?></code></pre>
                        <h2>Javascript files</h2>
                        <pre><code>&lt;?= $minifier->js(['/js/jquery-1.11.2.min.js', '/js/bootstrap.min.js', '/js/custom.js'], '/js/main.min.js'); ?></code></pre>
                        <p>Check the source of this page to see the rendered HTML.</p>
                    </div>
                </div>
            </section>
        </div>
        <?= $minifier->js(['/js/jquery-1.11.2.min.js', '/js/bootstrap.min.js', '/js/custom.js'], '/js/main.min.js'); ?>
    </body>
</html>
