<?php
/**
 * @package    LetItPlay Widget Loader
 * @author     Vadim Kropotin <kropvad@letitplay.io>
 * @copyright  Copyright (c) 2018 - 2996, Vadim Kropotin
 * @link       http://letitplay.io
 * @license    https://opensource.org/licenses/MIT
 */?>
<div class="wrap">
  <h2><?php _e( 'LetItPlay Widget Loader', 'letitplay-widget-loader'); ?></h2>

  <hr />
  <div id="poststuff">
  <div id="post-body" class="metabox-holder columns-2">
    <div id="post-body-content">
      <div class="postbox">
        <div class="inside">
          <form name="dofollow" action="options.php" method="post">

            <?php settings_fields( 'letitplay-widget-loader' ); ?>


            <h3 class="labels footerlabel" for="insert_code"><?php _e( 'Insert widget code:', 'letitplay-widget-loader'); ?></h3>
            <textarea style="width:98%;" rows="10" cols="57" id="insert_code" name="insert_code"><?php echo esc_html( get_option( 'insert_code' ) ); ?></textarea>
            

          <p class="submit">
            <input class="button button-primary" type="submit" name="Submit" value="<?php _e( 'Save settings', 'letitplay-widget-loader'); ?>" />
          </p>

          </form>
        </div>
    </div>
    </div>

    <?php require_once(WID_LR . '/inc/sidebar.php'); ?>
    </div>
  </div>
</div>
