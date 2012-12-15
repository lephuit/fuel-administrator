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
                <?php if ($menues): ?>
                    <div class="accordion" id="accordion">
                        <?php foreach( $menues as $category ): ?>

                        <div class="accordion-group">
                            <div class="accordion-heading">
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion" href="#collapse_<?php echo $category['catid']; ?>">
                                    <h3>
                                        <?php echo $category['catname']; ?> 
                                        <small>(Alias: <?php echo $category['alias']; ?>)</small>
                                    </h3>

                                </a>

                            </div>

                            <div id="collapse_<?php echo $category['catid']; ?>" class="accordion-body collapse">
                                <div class="accordion-inner">
                                    <div class="navbar">
                                        <div class="navbar-inner">
                                            <ul class="nav pull-right">
                                                <li>
                                                    <?php echo Html::anchor('menu/edit_category/'.$category['catid'], 'Edit Category'); ?>
                                                </li>
                                                <li class="divider-vertical"></li>
                                                <li>
                                                    <?php echo Html::anchor('menu/create/'.$category['catid'], 'Add Link'); ?>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                    <table class="table table-striped table-bordered table-condensed">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Title</th>
                                                <th>Link</th>
                                                <th>Position</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            <?php foreach($category['menu'] as $menu): ?>
                                                <tr>
                                                    <td class="span1"><?php echo $menu['id']; ?></td>
                                                    <?php if($menu['divider'] == 0): ?>
                                                        <td class="span4"><?php echo $menu['name']; ?></td>
                                                        <td class="span4"><?php echo $menu['link']; ?></td>
                                                    <?php else: ?>
                                                        <td class="span8" colspan="2">-----------</td>
                                                    <?php endif; ?>
                                                    <td class="span1"><?php echo $menu['position']; ?></td>
                                                    <td class="span2">
                                                            <?php echo Html::anchor('menu/edit/'.$menu['id'], 'Edit'); ?> |
                                                            <?php echo Html::anchor('menu/delete/'.$menu['id'], 'Delete', array('onclick' => "return confirm('Are you sure?')")); ?>

                                                    </td>
                                                </tr>

                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                        <?php endforeach; ?>
                    </div>
                <?php endif; ?>
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
