  <?php
  $title = __('Browse Exhibits');
  echo head(array('title' => $title, 'bodyclass' => 'exhibits browse'));
  ?>

  <div class="box container">
    <p><a href="<?php echo WEB_ROOT; ?>">Home</a> > <?php echo($title); ?></p>
    <h2><?php echo $title; ?> <?php echo __('(%s total)', $total_results); ?></h2>
    <?php if (count($exhibits) > 0): ?>

    <nav class="navigation secondary-nav">
        <?php echo nav(array(
            array(
                'label' => __('Browse All'),
                'uri' => url('exhibits')
            ),
            array(
                'label' => __('Browse by Tag'),
                'uri' => url('exhibits/tags')
            )
        )); ?>
    </nav>

    <?php echo pagination_links(); ?>

    <?php $exhibitCount = 0; ?>
    <table>
      <tr>
        <th></th>
        <th>Title</th>
        <th>Description</th>
        <th>Tags</th>
      </tr>
      <?php foreach (loop('exhibit') as $exhibit): ?>
        <?php $exhibitCount++; ?>
        <tr class="exhibit <?php if ($exhibitCount%2==1) echo ' even'; else echo ' odd'; ?>">
          <td>
          <?php if ($exhibitImage = record_image($exhibit)): ?>
              <?php echo exhibit_builder_link_to_exhibit($exhibit, $exhibitImage, array('class' => 'image')); ?>
          <?php endif; ?>
          </td>
          <td><?php echo link_to_exhibit(); ?></td>
          <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
          <td class="description"><?php echo $exhibitDescription; ?></td>
          <?php endif; ?>
          <?php if ($exhibitTags = tag_string('exhibit', 'exhibits')): ?>
          <td class="tags"><?php echo $exhibitTags; ?></td>
          <?php endif; ?>
        </tr>
      <?php endforeach; ?>
    </table>

    <?php echo pagination_links(); ?>

    <?php else: ?>
    <p><?php echo __('There are no exhibits available yet.'); ?></p>
    <?php endif; ?>
  </div>
</div>

<?php echo foot(); ?>
