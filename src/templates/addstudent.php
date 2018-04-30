<form action="addstudents.php" method="post">
  <div class="form-row">
    <div class="form-group col-6">
      <label for="studentid">Student ID</label>
      <input type="text" id="studentid" class="form-control" name="studentid"/>
      <?php
        if(isset($validation['studentid']))
        {?>
          <div class="alert alert-danger" role="alert">
            You need to provide a student id number.
          </div>
        <?php }
      ?>
    </div>
    <div class="form-group col-6">
      <label for="password">Password</label>
      <input type="password" id="password" class="form-control"
      name="password"/>
      <?php
        if(isset($validation['password']))
        {?>
          <div class="alert alert-danger" role="alert">
            You need to provide a password.
          </div>
        <?php }
      ?>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-6">
      <label for="firstname">First Name</label>
      <input type="text" id="firstname" class="form-control" name="firstname"/>
      <?php
        if(isset($validation['firstname']))
        {?>
          <div class="alert alert-danger" role="alert">
            You need to provide a First Name.
          </div>
        <?php }
      ?>
    </div>
    <div class="form-group col-6">
      <label for="lastname">Last Name</label>
      <input type="text" id="lastname" class="form-control" name="lastname"/>
      <?php
        if(isset($validation['lastname']))
        {?>
          <div class="alert alert-danger" role="alert">
            You need to provide a Last Name.
          </div>
        <?php }
      ?>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-6">
      <label for="dob">Date Of Birth</label>
      <input type="date" id="dob" class="form-control" name="dob"/>
      <?php
        if(isset($validation['dob']))
        {?>
          <div class="alert alert-danger" role="alert">
            You need to provide a Date of Birth.
          </div>
        <?php }
      ?>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-6">
      <label for="house">Number and Street</label>
      <input type="text" id="house" class="form-control" name="house"/>
      <?php
        if(isset($validation['house']))
        {?>
          <div class="alert alert-danger" role="alert">
            You need to provide a Number and Street.
          </div>
        <?php }
      ?>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-6">
      <label for="town">Town</label>
      <input type="text" id="town" class="form-control" name="town"/>
      <?php
        if(isset($validation['town']))
        {?>
          <div class="alert alert-danger" role="alert">
            You need to provide a town.
          </div>
        <?php }
      ?>
    </div>
    <div class="form-group col-4">
      <label for="county">County</label>
      <input type="text" id="county" class="form-control" name="county"/>
      <?php
        if(isset($validation['county']))
        {?>
          <div class="alert alert-danger" role="alert">
            You need to provide a county.
          </div>
        <?php }
      ?>
    </div>
    <div class="form-group col-2">
      <label for="postcode">Postcode</label>
      <input type="text" id="postcode" class="form-control" name="postcode"/>
      <?php
        if(isset($validation['postcode']))
        {?>
          <div class="alert alert-danger" role="alert">
            You need to provide a postcode.
          </div>
        <?php }
      ?>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-6">
      <label for="country">Country</label>
      <input type="text" id="country" class="form-control" name="country"/>
      <?php
        if(isset($validation['country']))
        {?>
          <div class="alert alert-danger" role="alert">
            You need to provide a country.
          </div>
        <?php }
      ?>
    </div>
  </div>
  <input type="submit" class="btn btn-primary btn-md" value="Save"/>
</form>
