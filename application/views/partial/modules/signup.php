<form class="form-horizontal signup" role="form">
  <div class="form-group">
    <label for="profile" class="col-sm-2 control-label">Profile</label>
    <div class="col-sm-10 ">
      <input type="hidden" name="user-profile" value="">
      <img src="/<?php echo $userdata['user_profile']; ?>" alt="profile" class="user-profile">
    </div>
  </div>
  <div class="form-group">
    <label for="email" class="col-sm-2 control-label">Email</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="user-email" id="user-email" placeholder="Email" value="<?php echo $userdata['user_email']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="first-name" class="col-sm-2 control-label">First Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="user-fname" id="user-fname" placeholder="First Name" value="<?php echo $userdata['user_fname']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="last-name" class="col-sm-2 control-label">Last Name</label>
    <div class="col-sm-10">
      <input type="text" class="form-control" name="user-lname" id="user-lname" placeholder="Last Name" value="<?php echo $userdata['user_lname']; ?>">
    </div>
  </div>
  <div class="form-group">
    <label for="native-lang" class="col-sm-2 control-label">Native Language</label>
    <div class="col-sm-10">
      <input type="hidden" name="user-native" value="">
      <select class="form-control form-native">
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
      <input type="hidden" name="user-learn" value="">
      <select class="form-control form-learn">
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
      <input type="text" class="form-control" name="user-interest" id="user-interest" placeholder="Interests (multiple by comma)">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="button" class="btn btn-primary btn-register">Sign Up</button>
      <button type="button" class="btn btn-default btn-cancel">Cancel</button>
    </div>
  </div>
</form>
<script type="text/javascript">
$(document).ready(function() {
  $(document).on('click', '.btn-register', function(e) {
    e.preventDefault();
    $('input[name=user-native]').val( $('select.form-native').val() );
    $('input[name=user-learn]').val( $('select.form-learn').val() );
    $('input[name=user-profile]').val( $('.user-profile').attr('src') );
    // return false;
    $.ajax({
      type: "POST", url: '/signup', data: $('form.signup').serialize(),
      success: function(response) {
        if (!response.result) {
          alert(response.message);
        } else {
          window.location.href = "/";
        }
      }
    });
    return false;
  })
  .on('click', '.btn-cancel', function(e) {
    window.location.href = '/';
  });


}); 
</script>