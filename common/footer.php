<!-- Footer won't show if you navigate to a neatline exhibit -->
<?php if (is_current_url('/neatline/show/')): ?>

<!-- Footer shows on all other pages -->
<?php else: ?>
      <!-- Footer -->
      <div id="footer">
        <div class="container 75%">

          <!--
          <header class="major last">
            <h2>Questions or comments?</h2>
          </header>

          <p>Vitae natoque dictum etiam semper magnis enim feugiat amet curabitur tempor
          orci penatibus. Tellus erat mauris ipsum fermentum etiam vivamus.</p>

          <form method="post" action="#">
            <div class="row">
              <div class="6u 12u(mobilep)">
                <input type="text" name="name" placeholder="Name" />
              </div>
              <div class="6u 12u(mobilep)">
                <input type="email" name="email" placeholder="Email" />
              </div>
            </div>
            <div class="row">
              <div class="12u">
                <textarea name="message" placeholder="Message" rows="6"></textarea>
              </div>
            </div>
            <div class="row">
              <div class="12u">
                <ul class="actions">
                  <li><input type="submit" value="Send Message" /></li>
                </ul>
              </div>
            </div>
          </form>
          -->

          <?php if (
            get_theme_option("social_icon_1")
             || get_theme_option("social_icon_2")
             || get_theme_option("social_icon_3")
             || get_theme_option("social_icon_4")
             || get_theme_option("social_icon_5")):
          ?>
          <ul class="icons">
            <?php if (get_theme_option("social_icon_1")): ?>
              <li>
                <a href="<?php echo(get_theme_option("social_icon_1_link")); ?>" class="icon fab fa-<?php echo(strtolower(get_theme_option("social_icon_1"))); ?>">
                  <span class="label"><?php echo(ucfirst(get_theme_option("social_icon_1"))) ?></span>
                </a>
              </li>
            <?php endif; ?>
            <?php if (get_theme_option("social_icon_2")): ?>
              <li>
                <a href="<?php echo(get_theme_option("social_icon_2_link")); ?>" class="icon fab fa-<?php echo(strtolower(get_theme_option("social_icon_2"))); ?>">
                  <span class="label"><?php echo(ucfirst(get_theme_option("social_icon_2"))) ?></span>
                </a>
              </li>
            <?php endif; ?>
            <?php if (get_theme_option("social_icon_3")): ?>
              <li>
                <a href="<?php echo(get_theme_option("social_icon_3_link")); ?>" class="icon fab fa-<?php echo(strtolower(get_theme_option("social_icon_3"))); ?>">
                  <span class="label"><?php echo(ucfirst(get_theme_option("social_icon_3"))) ?></span>
                </a>
              </li>
            <?php endif; ?>
            <?php if (get_theme_option("social_icon_4")): ?>
              <li>
                <a href="<?php echo(get_theme_option("social_icon_4_link")); ?>" class="icon fab fa-<?php echo(strtolower(get_theme_option("social_icon_4"))); ?>">
                  <span class="label"><?php echo(ucfirst(get_theme_option("social_icon_4"))) ?></span>
                </a>
              </li>
            <?php endif; ?>
            <?php if (get_theme_option("social_icon_5")): ?>
              <li>
                <a href="<?php echo(get_theme_option("social_icon_5_link")); ?>" class="icon fab fa-<?php echo(strtolower(get_theme_option("social_icon_5"))); ?>">
                  <span class="label"><?php echo(ucfirst(get_theme_option("social_icon_5"))) ?></span>
                </a>
              </li>
            <?php endif; ?>
          </ul>
        <?php endif; ?>

          <ul class="copyright">
            <?php if (option('copyright')): ?>
              <li><?php echo(option('copyright')); ?></li>
            <?php else: ?>
              <li>&copy; <?php echo(option('site_title')); ?>. All rights reserved.</li>
            <?php endif; ?>
            <li><?php echo __('Proudly powered by <a href="http://omeka.org">Omeka</a>.'); ?></li>
            <li>Design: <a href="http://html5up.net">HTML5 UP</a></li>
          </ul>

        </div>
      </div>
<?php endif ?>
</body>
</html>
