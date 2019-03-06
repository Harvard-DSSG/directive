<div class="feature <?php echo($alignment) ?> item record">
    <?php
    $title = metadata($item, 'display_title');
    $description = metadata($item, array('Dublin Core', 'Description'), array('snippet' => 150));
    ?>
    <?php if (metadata($item, 'has files')) {
        echo link_to_item(
            item_image(null, array(), 0, $item),
            array('class' => 'image'), 'show', $item
        );
    }
    ?>
    <div class="content">
      <h3><?php echo link_to($item, 'show', $title); ?></h3>
      <?php if ($description): ?>
          <p class="item-description"><?php echo $description; ?></p>
      <?php endif; ?>
    </div>
</div>
