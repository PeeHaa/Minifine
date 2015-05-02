<?php require_once __DIR__ . '/../../vendor/autoload.php'; ?>
<?php $minifier = (new \Minifine\Factory())->build(__DIR__, true); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Basic usage - Documentation - Minifine</title>
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
                                <li class="active"><a href="/documentation/basic-usage.php">Basic usage<span class="sr-only">(current)</span></a></li>
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
                        <h1>Basic usage</h1>
                        <p>Minifine uses <a href="https://github.com/matthiasmullie/minify" target="_blank">Matthias Mullie's minify library</a> by default to minify javascript and stylesheet files.</p>
                        <p>In order to use Minifine an instance needs to be created of the main minifier. This minifier will be able to minify both javascript as well as stylesheets. To create an instance a factory can be used to set up the object using the default minifiers:</p>
                        <code>$minifier = (new \Minifine\Factory())->build('/path/to/resources');</code>
                        <p>The above creates a new minifer instance ready to be used to minify resources. The <code>Minifine\Factory::build()</code> method accepts two parameters:</p>
                        <code>string $basePath</code>
                        <p>The base path is a required parameter. This will be used to find the resources on disk. Under many circumstances this point to the project's document root.</p>
                        <code>bool $production</code>
                        <p>The production flag prevents minifying resources on production environments. Instead a cached files will be loaded to prevent spending resources and time on production environment. The default value is <code>false</code>.</p>
                        <p>When testing and developing this parameter should either be ommitted or set to <code>false</code>. This means the resources will be minified, but the unminified resources will still be loaded to ease development and debugging.</p>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Minifying stylesheets</h2>
                        <p>A typical <code>&lt;head&gt;</code> section in an HTML document will look something like below:</p>
                        <pre><code>&lt;head>
    &lt;meta charset="UTF-8">
    &lt;title>Page title&lt;/title>
    &lt;link rel="stylesheet" href="/css/bootstrap.min.css">
    &lt;link rel="stylesheet" href="/css/jquery.ui.min.css">
    &lt;link rel="stylesheet" href="/css/theme.css">
    &lt;link rel="stylesheet" href="/css/custom.css">
&lt;/head></code></pre>
                        <p>To use Minifine to combine and minify these stylesheet simply use the following code:</p>
                        <pre><code>&lt;head>
    &lt;meta charset="UTF-8">
    &lt;title>Page title&lt;/title>
    &lt;?= $minifier->css(['/css/bootstrap.min.css', '/css/jquery.ui.min.css', '/css/theme.css', '/css/custom.css'], '/css/min.css'); ?>
&lt;/head></code></pre>
                        <p>Minifine will now combine and minify the four stylesheet and the resuling HTML will (on production environments) look like:</p>
                        <pre><code>&lt;head>
    &lt;meta charset="UTF-8">
    &lt;title>Page title&lt;/title>
    &lt;link rel="stylesheet" href="/css/min.css">
&lt;/head></code></pre>
                        <p>The <code>Minifine\Minifine::css()</code> method used above accepts three parameters:</p>
                        <code>array $files</code>
                        <p>Contains a list of files that need to be combined and minified.</p>
                        <code>string $outputDirectory</code>
                        <p>The relative path to the directory that is used to generate the minified file in. This path is relative to the <code>$basepath</code> parameter used when setting op Minifine.</p>
                        <code>string $outputFile</code>
                        <p>The filename of the generated file (containing the combined and minified files). This name is used both for storing the data on the server as well as for generating the correct HTML tags.</p>
                    </div>
                </div>
            </section>
            <section>
                <div class="row">
                    <div class="col-lg-12">
                        <h2>Minifying javascript files</h2>
                        <p>Combining and minifying javascript files works basically the same as for stylesheets.</p>
                        <p>A typical block of javascript files in an HTML document will look something like below:</p>
                        <pre><code>&lt;script src="/js/jquery-1.11.2.min.js">&lt;/script>
&lt;script src="/js/bootstrap.min.js">&lt;/script>
&lt;script src="/js/custom.js">&lt;/script></code></pre>
                        <p>To use Minifine to combine and minify these javascript files simply use the following code:</p>
                        <pre><code>&lt;?= $minifier->js(['/js/jquery-1.11.2.min.js', '/js/bootstrap.min.js', '/js/custom.js'], '/js/min.js'); ?></code></pre>
                        <p>Minifine will now combine and minify the three javascript files and the resuling HTML will (on production environments) look like:</p>
                        <pre><code>&lt;script src="/js/min.js">&lt;/script></code></pre>
                        <p>The <code>Minifine\Minifine::js()</code> method used above accepts three parameters:</p>
                        <code>array $files</code>
                        <p>Contains a list of files that need to be combined and minified.</p>
                        <code>string $outputDirectory</code>
                        <p>The relative path to the directory that is used to generate the minified file in. This path is relative to the <code>$basepath</code> parameter used when setting op Minifine.</p>
                        <code>string $outputFile</code>
                        <p>The filename of the generated file (containing the combined and minified files). This name is used both for storing the data on the server as well as for generating the correct HTML tags.</p>
                    </div>
                </div>
            </section>
        </div>
        <?= $minifier->js(['/js/jquery-1.11.2.min.js', '/js/bootstrap.min.js', '/js/custom.js'], '/js/main.min.js'); ?>
    </body>
</html>
