<?php
$isPerson = isset($elementsForDisplay['Person Item Type Metadata']);
?>
<?php foreach ($elementsForDisplay as $setName => $setElements): ?>
<div class="element-set">
    <?php if ($showElementSetHeadings): ?>
    <h2><?php echo html_escape(__($setName)); ?></h2>
    <?php endif; ?>
    <?php foreach ($setElements as $elementName => $elementInfo): ?>
<?php
        $displayName = $elementName;
        if ($isPerson) {
            if ($elementName === 'Birth Date' || $elementName === 'Death Date') {
                continue;
            } elseif ($elementName === 'Title') {
                $displayName = 'Name';
            } elseif ($elementName === 'Biographical Text') {
                $displayName = 'Biography';
            }
        }
?>
    <div id="<?php echo text_to_id(html_escape("$setName $elementName")); ?>" class="element">
        <h3><?php echo html_escape(__($displayName)); ?></h3>
        <?php foreach ($elementInfo['texts'] as $text): ?>
            <div class="element-text"><?php echo $text; ?></div>
        <?php endforeach; ?>
    </div><!-- end element -->
    <?php endforeach; ?>
</div><!-- end element-set -->
<?php endforeach;
