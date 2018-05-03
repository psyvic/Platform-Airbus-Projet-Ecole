<?php 
include(HTML_DIR . 'overall/header.php'); ?>
<body>
<section class="engine"><a rel="nofollow" href="#"><?php echo APP_TITLE; ?></a></section>

<?php include(HTML_DIR . 'overall/topnav.php'); ?>

<?php
if(isset($_GET['success'])) {
    echo '<section class="mbr-section mbr-after-navbar" id="content1-10">
            <div class="mbr-section__container container mbr-section__container--isolated">
              <div class="alert alert-dismissible alert-success">
                <strong>Account activated</strong>Your user has been successfully activated.
              </div>
            </div>
          </section>';
} 
?>

<?php
if(isset($_GET['error'])) {
    echo '<section class="mbr-section mbr-after-navbar" id="content1-10">
            <div class="mbr-section__container container mbr-section__container--isolated">
              <div class="alert alert-dismissible alert-danger">
                <strong>ERROR: </strong>There was a problem with activating your account.
              </div>
            </div>
          </section>';
} 
?>

<?php
if (isset($_SESSION['app_id']) && $_SESSION['admin'] == 1) {
    echo '<section class="mbr-section mbr-after-navbar" id="content1-10">
              <div class="mbr-section__container container mbr-section__container--isolated">
                  <div class="row">
                        <p style="text-align: center">
                        Panneau admin.
                        </p>
                        <p>
                        Events to be confirmed
                        </p>
                        <div id="_AJAX_ADMINEVENTS_"></div>
                        <table id="events" class="table table-hover">
                          <thead>
                            <tr style="background-color: whitesmoke">
                              <th scope="col">User</th>
                              <th scope="col">Date Start</th>
                              <th scope="col">Date End</th>
                              <th scope="col">Validate</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                        <p>
                        Users to be validated
                        </p>
                        <div id="_AJAX_ADMINUSERS_"></div>
                        <table id="users_off" class="table table-hover">
                          <thead>
                            <tr style="background-color: whitesmoke">
                              <th scope="col">User</th>
                              <th scope="col">Validate</th>
                            </tr>
                          </thead>
                          <tbody>
                          </tbody>
                        </table>
                  </div> 
                </div>
              </div>
          </section>';

}
?>

<?php
if (isset($_SESSION['app_id']) && $_SESSION['active'] == 1) {
    echo '<section class="mbr-section mbr-after-navbar" id="content1-10">
              <div class="mbr-section__container container mbr-section__container--isolated">
                  <div class="row">
                      <div id="_AJAX_CALENDAR_"></div>
                      <div class="mbr-article mbr-article--wysiwyg col-sm-8 col-sm-offset-2">
                      <div id="calendar"></div>
                    </div>
                  </div>
              </div>
          </section>';
} else if (isset($_SESSION['app_id']) && $_SESSION['active'] == 0) {
    echo '<section class="mbr-section mbr-after-navbar" id="content1-10">
              <div class="mbr-section__container container mbr-section__container--isolated">
                  <div class="row">
                      <div class="mbr-article mbr-article--wysiwyg col -sm-8 col-sm-offset-2">
                      <p>
                        Your account needs to be activated to access your calendar.
                      </p>
                    </div>
                  </div>
              </div>
          </section>';
}
?>

<?php include(HTML_DIR . 'overall/footer.php'); ?>

</body>
</html>

