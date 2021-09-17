<body>
  <div class="settings-errors"><?php settings_errors(); ?> </div>
  <div class="fishing-bd-admin-general">
    <div class="admin-main-body">
      <div class="fishing-table">
        <div class="admin-general-fishing-content">
          <div class="tab-content" id="v-pills-tabContent" style="color: #FFF;">
            <form class="auto-submit" method="post" action="options.php">
              <?php settings_fields( 'fishing-social-setting' ); ?>
              <?php do_settings_sections( 'social_options' ); ?>
              <?php submit_button( 'Save Changes', 'primary', 'btnSubmit' ); ?>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</body>