<?php require_once __DIR__ . '/../../vendor/autoload.php'; ?>
<?php $minifier = (new \Minifine\Factory())->build(__DIR__, true); ?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Contributing - Documentation - Minifine</title>
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
                                <li><a href="/documentation/installation.php">Installation</a></li>
                                <li><a href="/documentation/basic-usage.php">Basic usage</a></li>
                                <li><a href="/documentation/advanced-usage.php">Advanced usage</a></li>
                                <li class="divider"></li>
                                <li class="active"><a href="/documentation/contributing.php">Contributing<span class="sr-only">(current)</span></a></li>
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
                        <h1>Contributing</h1>
                        <h2>Feature requests or bug reports</h2>
                        <p>If you would like to see a feature or you have found a bug please open <a href="https://github.com/PeeHaa/Minifine/issues">an issue</a>.</p>
                        <h2>Contributing code</h2>
                        <h3>Create a pull request</h3>
                        <ul>
                            <li>Submit one pull request per fix or feature</li>
                            <li>If your changes are not up to date - rebase your branch on master</li>
                            <li>Follow the conventions used in the project</li>
                        </ul>
                        <h3>Unit tests</h3>
                        <p>This project has <a href="https://travis-ci.org/PeeHaa/Minifine">unit tests</a> for most code. When adding a new feature or when fixing a bug and sending over a PR adding (passing) test(s) is required and will make it easier to merge code.</p>
                        <h3>Code style</h3>
                        <p>This project uses the following code style conventions / standards:</p>
                        <ul>
                            <li><a href="https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-1-basic-coding-standard.md" target="_blank">PSR-1: Basic Coding Standard</a></li>
                            <li><a href="https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-2-coding-style-guide.md" target="_blank">PSR-2: Coding Style Guide</a></li>
                            <li><a href="https://github.com/php-fig/fig-standards/blob/master/accepted/PSR-4-autoloader.md" target="_blank">PSR-4: Autoloading Standard</a></li>
                        </ul>
                    </div>
                </div>
            </section>
        </div>
        <?= $minifier->js(['/js/jquery-1.11.2.min.js', '/js/bootstrap.min.js', '/js/custom.js'], '/js', 'main.min.js'); ?>
    </body>
</html>
