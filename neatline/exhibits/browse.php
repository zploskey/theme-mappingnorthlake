<?php

/**
 * @package     omeka
 * @subpackage  neatline
 * @copyright   2014 Rector and Board of Visitors, University of Virginia
 * @license     http://www.apache.org/licenses/LICENSE-2.0.html
 */

$title = __('Browse Maps');

echo head(array(
  'title' => $title,
  'bodyclass' => 'neatline exhibits browse'
));
?>

<?php echo flash(); ?>

<h1><?php echo $title; ?></h1>

<?php if (nl_exhibitsHaveBeenCreated()): ?>

  <div class="pagination"><?php echo pagination_links(); ?></div>

    <?php foreach (loop('NeatlineExhibit') as $i => $e): ?>
      <?php $file = $this->files[$i]; ?>
      <div class="exhibit">
        <?php if (isset($file->id)): ?>
          <?php echo nl_getExhibitLink($e, 'show', file_image('square_thumbnail', array(), $file), array('class' => 'image'), true); ?>
        <?php endif; ?>
        <div class="exhibit-meta">
          <h2>
            <?php echo nl_getExhibitLink($e, 'show', nl_getExhibitField('title'), array(), true); ?>
          </h2>
          <p><?php echo snippet(nl_getExhibitField('narrative'), 0, 300); ?></p>
        </div>
      </div>
    <?php endforeach; ?>

  <div class="pagination"><?php echo pagination_links(); ?></div>

<?php endif; ?>

<?php echo foot(); ?>
