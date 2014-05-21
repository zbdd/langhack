<form class="form-horizontal" role="form">
  <div class="form-group">
    <label for="profile" class="col-sm-2 control-label">Profile</label>
    <div class="col-sm-10">
      <img src="/<?php echo $userdata['user_profile']; ?>" alt="profile" class="user-profile">
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="email" class="form-control" id="user-email" placeholder="Email" value="<?php echo $userdata['user_email']; ?>" disabled>
    </div>
  </div>
  <div class="form-group">
    <label for="first-name" class="col-sm-2 control-label">First Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="user-first-name" placeholder="First Name" value="<?php echo $userdata['user_fname']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="last-name" class="col-sm-2 control-label">Last Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="user-last-name" placeholder="Last Name" value="<?php echo $userdata['user_lname']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="native-lang" class="col-sm-2 control-label">Native Language</label>
    <div class="col-sm-10">
      <select class="form-control">
        <option>Korean</option>
        <option>English</option>
        <option>Chineses</option>
        <option>Japanese</option>
        <option>Other</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="learn-lang" class="col-sm-2 control-label">Language To Learn</label>
    <div class="col-sm-10">
      <select class="form-control">
        <option>Korean</option>
        <option>English</option>
        <option>Chineses</option>
        <option>Japanese</option>
        <option>Other</option>
      </select>
    </div>
  </div>
  <div class="form-group">
    <label for="interests" class="col-sm-2 control-label">Interests</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" id="user-interest" placeholder="Interests (multiple by comma)">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-primary">Sign in</button>
    </div>
  </div>
</form>