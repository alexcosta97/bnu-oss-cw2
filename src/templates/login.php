<?php echo $message; ?>
<div class="row justify-content-center">
  <h1>BNU Students Application Login</h1>
</div>

<form name="frmLogin" action="authenticate.php" method="post">
  <div class="row justify-content-center">
    <div class="form-group col-3">
    <label for="txtid">Student ID</label>
    <input name="txtid" class="form-control" type="text" />
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="form-group col-3">
      <label for="txtpwd">Password</label>
      <input name="txtpwd" class="form-control" type="password" />
    </div>
  </div>
  <div class="row justify-content-center">
    <div class="form-group col-3">
    <input type="submit" value="Login" class="btn btn-primary btn-md" name="btnlogin" />
    </div>
  </div>
</form>
