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
  'content_class' => 'neatline'
));
?>

<div id="primary">

  <?php echo flash(); ?>
  <h1><?php echo $title; ?></h1>

  <?php if (nl_exhibitsHaveBeenCreated()): ?>

    <div class="pagination"><?php echo pagination_links(); ?></div>

      <?php foreach (loop('NeatlineExhibit') as $e): ?>
        <div class="exhibit hentry">
          <h2>
            <?php echo nl_getExhibitLink(
              $e, 'show', nl_getExhibitField('title'),
              array('class' => 'neatline'), true
            );?>
          </h2>
          <p><?php echo snippet(nl_getExhibitField('narrative'), 0, 300); ?></p>
        </div>
      <?php endforeach; ?>

    <div class="pagination"><?php echo pagination_links(); ?></div>

  <?php endif; ?>

</div>

<?php echo foot(); ?>
