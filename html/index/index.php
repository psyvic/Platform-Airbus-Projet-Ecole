<?php include(HTML_DIR . 'overall/header.php'); ?>
<body>
<section class="engine"><a rel="nofollow" href="#"><?php echo APP_TITLE; ?></a></section>

<?php include(HTML_DIR . 'overall/topnav.php'); ?>

<div class="modal fade" id="Login" role="dialog">
   <div class="modal-dialog">

     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span> Login</h4>
       </div>
       <div class="modal-body">
         <div role="form">
           <div class="form-group">
             <label for="usrname_or_email"><span class="glyphicon glyphicon-user"></span> Username (email)</label>
             <input type="text" class="form-control" id="user_login" placeholder="Type your Email">
           </div>
           <div class="form-group">
             <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
             <input type="text" class="form-control" id="pass_login" placeholder="Type your Password">
           </div>
           <div class="checkbox">
             <label><input type="checkbox" value="1" id="session_login" checked>Remind me</label>
           </div>
           <button type="button" class="btn btn-default btn-success btn-block" id="iniciar_sesion"><span class="glyphicon glyphicon-off"></span> Login</button>
         </div>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
         <p>¿Not registered? <a data-toggle="modal" data-target="#Registro">Register!</a></p>
         <p>Password <a data-toggle="modal" data-target="#Lostpass">lost?</a></p>
       </div>
     </div>
   </div>
</div>

<div class="modal fade" id="Registro" role="dialog">
   <div class="modal-dialog">

     <div class="modal-content">
       <div class="modal-header">
         <button type="button" class="close" data-dismiss="modal">&times;</button>
         <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span> Login</h4>
       </div>
       <div class="modal-body">
         <form role="form">
           <div class="form-group">
             <label for="usrname"><span class="glyphicon glyphicon-user"></span> Username</label>
             <input type="text" class="form-control" id="user_reg" placeholder="Type your Email">
           </div>
<!--            
           <div class="form-group">
             <label for="usrname"><span class="glyphicon glyphicon-envelope"></span> Email</label>
             <input type="email" class="form-control" id="email_reg" placeholder="Introduce tu correo electrónico">
           </div> -->
           <div class="form-group">
             <label for="psw"><span class="glyphicon glyphicon-eye-open"></span> Password</label>
             <input type="text" class="form-control" id="pass_reg" placeholder="Introduce tu contraseña">
           </div>
           <div class="form-group">
             <label for="psw_two"><span class="glyphicon glyphicon-eye-open"></span> Repeat your Password</label>
             <input type="text" class="form-control" id="pass_reg_dos" placeholder="Type your Password">
           </div>
           <div class="checkbox">
             <label><input type="checkbox" id="tyc_reg" value="1" checked>Accept T&C</label>
           </div>
           <button type="button" id="registrarme" class="btn btn-default btn-success btn-block"><span class="glyphicon glyphicon-off"></span> Register</button>
         </form>
       </div>
       <div class="modal-footer">
         <button type="button" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
       </div>
     </div>
   </div>
 </div>

 <div class="modal fade" id="Lostpass" role="dialog">
    <div class="modal-dialog">

      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 style="color:red;"><span class="glyphicon glyphicon-lock"></span> Recover Password</h4>
        </div>
        <div class="modal-body">
          <div role="form">
            <div class="form-group">
              <label for="usrname"><span class="glyphicon glyphicon-enveloper"></span> Email</label>
              <input type="email" class="form-control" id="email_lostpass" placeholder="Enter email">
            </div>
            <button type="button" class="btn btn-default btn-success btn-block" id="recuperar_passs"><span class="glyphicon glyphicon-off"></span> Recover</button>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default btn-default pull-left" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Cancel</button>
        </div>
      </div>
    </div>
  </div>

<section class="mbr-section mbr-after-navbar" id="content1-10">
    <div class="mbr-section__container container mbr-section__container--isolated">
        <div class="row">
            <div class="mbr-article mbr-article--wysiwyg col-sm-8 col-sm-offset-2">
            <p>
              Filling text
            </p>
          </div>
        </div>
    </div>
</section>

<section class="mbr-section mbr-after-navbar" id="content1-10">
    <div class="mbr-section__container container mbr-section__container--isolated">
        <div class="row">
            <div class="mbr-article mbr-article--wysiwyg col-sm-8 col-sm-offset-2">
            <p>
              Filling text
            </p>
          </div>
        </div>
    </div>
</section>

<?php include(HTML_DIR . 'overall/footer.php'); ?>

</body>
</html>
