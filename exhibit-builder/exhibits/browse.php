<?php
$title = __('Browse Exhibits');
echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
?>
<h1><?php echo $title; ?></h1>
<?php if (count($exhibits) > 0): ?>

<?php echo pagination_links(); ?>

<?php $exhibitCount = 0; ?>
<?php foreach (loop('exhibit') as $exhibit): ?>
    <?php $exhibitCount++; ?>
    <div class="exhibit <?php if ($exhibitCount%2==1) echo ' even'; else echo ' odd'; ?>">
        <?php if ($exhibitImage = record_image($exhibit)): ?>
            <?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'image')); ?>
        <?php endif; ?>
        <div class="exhibit-meta">
            <h2><?php echo link_to_exhibit(); ?></h2>
            <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
            <div class="description"><?php echo $exhibitDescription; ?></div>
            <?php endif; ?>
            <?php if ($exhibitTags = tag_string('exhibit', 'exhibits')): ?>
            <p class="tags"><?php echo $exhibitTags; ?></p>
            <?php endif; ?>
        </div>
    </div>
<?php endforeach; ?>

<?php echo pagination_links(); ?>

<?php else: ?>
<p><?php echo __('There are no exhibits available yet.'); ?></p>
<?php endif; ?>

<?php echo foot(); ?>
