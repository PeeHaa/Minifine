<?php require_once __DIR__ . '/../../vendor/autoload.php'; ?>
<?php $minifier = (new \Minifine\Factory())->build(__DIR__, true); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Advanced usage - Documentation - Minifine</title>
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
                        <li class="dropdown active">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Documentation <span class="caret"></span></a>
                            <ul class="dropdown-menu" role="menu">
                                <li><a href="/documentation/installation.php">Installation</a></li>
                                <li><a href="/documentation/basic-usage.php">Basic usage</a></li>
                                <li class="active"><a href="/documentation/advanced-usage.php">Advanced usage<span class="sr-only">(current)</span></a></li>
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
                        <h1>Advanced usage</h1>
                        <p>Minifine exposes a public API for more advanced usages. This may include using different minification schemes or even chaining together several minifion schemes.</p>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Using different minification schemes</h2>
                        <p>To use different minificators (instead of the default ones provided by Minifine) all you have to do is setup the Minifine object using the different minificators:</p>
                        <pre><code>$minifier = new \Minifine\Minifine('/path/to/resources');
$minifier->appendJsMinifier(new \CustomJsMinifier());
$minifier->appendCssMinifier(new \CustomCssMinifier());</code></pre>
                        <p>The minifier can now be used using the custom minifiers for CSS and javascript files.</p>
                        <p>All (custom) minifiers must implement the <code>Minifine\Minifier\Minifier</code> interface which has a single method with a single parameter:</p>
                        <code>Minifine\Minifier\Minifier::minify(string $data)</code>
                        <p>The <code>$data</code> parameter is the actual data that needs to be minified.</p>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Chaining minifcations</h2>
                        <p>To chain minifications the public API contains four methods being <code>appendJsMinifier()</code>, <code>prependJsMinifier()</code>, <code>appendCssMinifier()</code> and <code>prependCssMinifier()</code></p>
                        <p>When multiple minifiers are defined for a specific type of resource (CSS or javascript) they will be chained together and ran after eachother.</p>
                        <p>All (custom) minifiers must implement the <code>Minifine\Minifier\Minifier</code> interface which has a single method with a single parameter:</p>
                        <code>Minifine\Minifier\Minifier::minify(string $data)</code>
                        <p>The <code>$data</code> parameter is the actual data that needs to be minified.</p>
                    </div>
                </div>
            </section>
        </div>
        <?= $minifier->js(['/js/jquery-1.11.2.min.js', '/js/bootstrap.min.js', '/js/custom.js'], '/js/main.min.js'); ?>
    </body>
</html>
