Drupal Themes
=============

A powerful idea of Dupal is that as a content management system it separates content from presentation This is an important division of labor, because it allows customers to manage content while the presentation of that content can be kept under control of the project team. The basic themes that come with Drupal can also be supplemented with custom themes that can be made by designers or by the project team themselves.

One such designer theme is the [Bootstrap 3.0 theme](https://drupal.org/project/bootstrap). When themes are installed in Drupal:

1. Download and extract the theme to your desktop
1. Upload the theme to the sites/all/themes folder
1. Set the theme as the default by going to `Administration/Appearance`

Blocks
------

The templates for themes have a block structure. These blocks are often defined in a node.tpl.php and page.tpl.php file for the theme. For instance the built in Garland theme has the page.tpl.php:

	<?php
	?>
	  <?php print render($page['header']); ?>
	
	  <div id="wrapper">
	    <div id="container" class="clearfix">
	
	      <div id="header">
	        <div id="logo-floater">
	        <?php if ($logo || $site_title): ?>
	          <?php if ($title): ?>
	            <div id="branding"><strong><a href="<?php print $front_page ?>">
	            <?php if ($logo): ?>
	              <img src="<?php print $logo ?>" alt="<?php print $site_name_and_slogan ?>" title="<?php print $site_name_and_slogan ?>" id="logo" />
	            <?php endif; ?>
	            <?php print $site_html ?>
	            </a></strong></div>
	          <?php else: /* Use h1 when the content title is empty */ ?>
	            <h1 id="branding"><a href="<?php print $front_page ?>">
	            <?php if ($logo): ?>
	              <img src="<?php print $logo ?>" alt="<?php print $site_name_and_slogan ?>" title="<?php print $site_name_and_slogan ?>" id="logo" />
	            <?php endif; ?>
	            <?php print $site_html ?>
	            </a></h1>
	        <?php endif; ?>
	        <?php endif; ?>
	        </div>
	
	        <?php if ($primary_nav): print $primary_nav; endif; ?>
	        <?php if ($secondary_nav): print $secondary_nav; endif; ?>
	      </div> <!-- /#header -->
	
	      <?php if ($page['sidebar_first']): ?>
	        <div id="sidebar-first" class="sidebar">
	          <?php print render($page['sidebar_first']); ?>
	        </div>
	      <?php endif; ?>
	
	      <div id="center"><div id="squeeze"><div class="right-corner"><div class="left-corner">
	          <?php print $breadcrumb; ?>
	          <?php if ($page['highlighted']): ?><div id="highlighted"><?php print render($page['highlighted']); ?></div><?php endif; ?>
	          <a id="main-content"></a>
	          <?php if ($tabs): ?><div id="tabs-wrapper" class="clearfix"><?php endif; ?>
	          <?php print render($title_prefix); ?>
	          <?php if ($title): ?>
	            <h1<?php print $tabs ? ' class="with-tabs"' : '' ?>><?php print $title ?></h1>
	          <?php endif; ?>
	          <?php print render($title_suffix); ?>
	          <?php if ($tabs): ?><?php print render($tabs); ?></div><?php endif; ?>
	          <?php print render($tabs2); ?>
	          <?php print $messages; ?>
	          <?php print render($page['help']); ?>
	          <?php if ($action_links): ?><ul class="action-links"><?php print render($action_links); ?></ul><?php endif; ?>
	          <div class="clearfix">
	            <?php print render($page['content']); ?>
	          </div>
	          <?php print $feed_icons ?>
	          <?php print render($page['footer']); ?>
	      </div></div></div></div> <!-- /.left-corner, /.right-corner, /#squeeze, /#center -->
	
	      <?php if ($page['sidebar_second']): ?>
	        <div id="sidebar-second" class="sidebar">
	          <?php print render($page['sidebar_second']); ?>
	        </div>
	      <?php endif; ?>
	
	    </div> <!-- /#container -->
	  </div> <!-- /#wrapper -->

You can see from the blocks screenshot how the template lays out the blocks:

![blocks](images/INFO2120Blocks.png "Blocks")

A heavy handed way of changing a theme would be to edit that page.tpl.php. This can be avoided by instead moving content among the blocks, or disabling content altogether by setting it's block to `none`. Once you have the content in the blocks that you want it in, you can refine the appearance with css.

Theme CSS can be overridden be adding a new css file to the <themename>.info file.

	name = Garland
	description = A multi-column theme which can be configured to modify colors and switch between fixed and fluid width layouts.
	package = Core
	version = VERSION
	core = 7.x
	stylesheets[all][] = style.css
	stylesheets[print][] = print.css
	settings[garland_width] = fluid
	
	; Information added by Drupal.org packaging script on 2014-07-24
	version = "7.30"
	project = "drupal"
	datestamp = "1406239730"
 
For instance `stylesheets[all][] = rich.css`. Getting the blocks the way that you want them and then overriding some css, is a much less heavy handed way of customizing a theme. When you first add a stylesheet to a theme, you usually have to switch to another default theme, and then switch back to the them that you are modifying so that the .info file is re-read.

