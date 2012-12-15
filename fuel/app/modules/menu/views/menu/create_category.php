<!DOCTYPE html>
<html>
    <head>
	<meta charset="utf-8">
	<title>FuelPHP Framework</title>
	<?php echo Asset::js('jquery.js'); ?>
        <?php echo Asset::js('bootstrap.js'); ?>
        <?php echo Asset::css('bootstrap.css'); ?>
	
    </head>
    <body>

        <?php echo \View::forge('subnavigation'); ?>

        <div class="container">
		
            <div class="row">
                <h1>Create Category</h1>
                <hr />
                <?php echo \View::forge('menu/_form_category'); ?>
            </div>
            
            <hr/>
            <footer>
                <p class="pull-right">Page rendered in {exec_time}s using {mem_usage}mb of memory.</p>
                <p>
                    <a href="http://fuelphp.com">FuelPHP</a> is released under the MIT license.<br>
                    <small>Version: <?php echo Fuel::VERSION; ?></small>
                </p>
            </footer>
        </div>
    </body>
</html>
