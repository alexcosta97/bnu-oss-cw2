<form action="addstudents.php" method="post">
  <div class="form-row">
    <div class="form-group col-6">
      <label for="studentid">Student ID</label>
      <input type="text" id="studentid" class="form-control" name="studentid"/>
    </div>
    <div class="form-group col-6">
      <label for="password">Password</label>
      <input type="password" id="password" class="form-control" name="password"/>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-6">
      <label for="firstname">First Name</label>
      <input type="text" id="firstname" class="form-control" name="firstname"/>
    </div>
    <div class="form-group col-6">
      <label for="lastname">Last Name</label>
      <input type="text" id="lastname" class="form-control" name="lastname"/>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-6">
      <label for="dob">Date Of Birth</label>
      <input type="date" id="dob" class="form-control" name="dob"/>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-6">
      <label for="house">Number and Street</label>
      <input type="text" id="house" class="form-control" name="house"/>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-6">
      <label for="town">Town</label>
      <input type="text" id="town" class="form-control" name="town"/>
    </div>
    <div class="form-group col-4">
      <label for="county">County</label>
      <input type="text" id="county" class="form-control" name="county"/>
    </div>
    <div class="form-group col-2">
      <label for="postcode">Postcode</label>
      <input type="text" id="postcode" class="form-control" name="postcode"/>
    </div>
  </div>
  <div class="form-row">
    <div class="form-group col-6">
      <label for="country">Country</label>
      <input type="text" id="country" class="form-control" name="country"/>
    </div>
  </div>
  <input type="submit" class="btn btn-primary btn-md" value="Save"/>
</form>
