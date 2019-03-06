<?php echo head(array('bodyid'=>'home')); ?>

              <?php if ($homepageText = get_theme_option('Homepage Text')): ?>
                <footer class="major container 75%">
                  <p><?php echo $homepageText; ?></p>
                </footer>
              <?php endif; ?>
              <p></p>
              <?php
                $num_featured_items = get_theme_option('Display Featured Item');
                if ($num_featured_items >= 1):
              ?>
                <header class="major container medium">
                  <h2><?php echo(__('Featured Items')) ?></h2>
                </header>
                <div class="box alt container">
                  <?php echo directive_random_featured_items($num_featured_items); ?>
                </div>
              <?php endif; ?>
              <?php
              $recentItems = get_theme_option('Homepage Recent Items');
              if ($recentItems === null || $recentItems === ''):
                  $recentItems = 3;
              else:
                  $recentItems = (int) $recentItems;
              endif;
              if ($recentItems):
              ?>
                <header class="major container medium">
                  <h2><?php echo __('Recently Added Items'); ?></h2>
                </header>
                <div class="box alt container">
                  <?php echo directive_recent_items($recentItems); ?>
                  <p class="view-items-link"><a href="<?php echo html_escape(url('items')); ?>"><?php echo __('View All Items'); ?></a></p>
                </div><!--end recent-items -->
              <?php endif; ?>
            </div>
        <?php fire_plugin_hook('public_home', array('view' => $this)); ?>
    <?php echo foot(); ?>
