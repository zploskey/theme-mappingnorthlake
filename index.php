<?php echo head(array('bodyid' => 'home', 'bodyclass' => 'two-col')); ?>

<?php if ($homepage_text = get_theme_option('Homepage Text')): ?>
<div id="homepage-text"><p><?php echo $homepage_text; ?></p></div>
<?php endif; ?>

<ul id="tiles">
    <li id="maps"><a href="<?php echo html_escape(url('neatline')); ?>">Maps</a></li>
    <li id="exhibits"><a href="<?php echo html_escape(url('exhibits')); ?>">Exhibits</a></li>
    <li id="people"><a href="<?php echo html_escape(url('collections/show/20')); ?>">People</a></li>
    <li id="collections"><a href="<?php echo html_escape(url('collections')); ?>">Collections</a></li>
</ul>
<?php
$recentItems = get_theme_option('Homepage Recent Items');
if ($recentItems === null || $recentItems === ''):
    $recentItems = 3;
else:
    $recentItems = (int) $recentItems;
endif;
if ($recentItems):
?>
<div id="recent-items">
    <h2><?php echo __('Recently Added Items'); ?></h2>
    <?php echo recent_items($recentItems); ?>
    <p class="view-items-link"><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p>
</div><!--end recent-items -->
<?php endif; ?>
<?php if (get_theme_option('Display Featured Item') == 1): ?>
<!-- Featured Item -->
<div id="featured-item">
    <h2><?php echo __('Featured Item'); ?></h2>
    <?php echo random_featured_items(1); ?>
</div><!--end featured-item-->
<?php endif; ?>
<?php if (get_theme_option('Display Featured Collection')): ?>
<!-- Featured Collection -->
<div id="featured-collection">
    <h2><?php echo __('Collection'); ?></h2>
    <?php echo random_featured_collection(); ?>
</div><!-- end featured collection -->
<?php endif; ?>
<?php if ((get_theme_option('Display Featured Exhibit')) && function_exists('exhibit_builder_display_random_featured_exhibit')): ?>
<!-- Featured Exhibit -->
<?php echo exhibit_builder_display_random_featured_exhibit(); ?>
<?php endif; ?>

<?php fire_plugin_hook('public_home', array('view' => $this)); ?>

<?php echo foot(); ?>
