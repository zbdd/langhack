<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="/">LangHack</a>
    </div>
    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse navbar-ex1-collapse">
      <ul class="nav navbar-nav">
        <li>
          <a href="<?php echo base_url('about'); ?>">About</a>
        </li>
        <li>
          <a href="<?php echo base_url('search'); ?>">Search</a>
        </li>
        <li>
          <a href="#">Chat</a>
        </li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
      <?php if ($this->lh_user->get('id')): ?>
        <li>
          <a href="#"><img src="<?php echo '/static/img/'.$this->lh_user->get('profile'); ?>" class="nav-profile"> <?php echo $this->lh_user->get('firstname'); ?></a>
        </li>
        <!-- <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">Dropdown <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Action</a></li>
            <li><a href="#">Another action</a></li>
            <li><a href="#">Something else here</a></li>
            <li class="divider"></li>
            <li><a href="#">Separated link</a></li>
          </ul>
        </li> -->
      <?php else: ?>
        <li>
          <button type="button" class="btn btn-primary navbar-btn btn-signup-fb">Sign Up With Facebook</button>
        </li>
      <?php endif; ?>
      </ul>
    </div>
    <!-- /.navbar-collapse -->
  </div>
  <!-- /.container -->
</nav>
<script type="text/javascript">
$(document).ready(function() {
  $('.btn-signup-fb').click(function(e) {
    e.preventDefault();
    window.location.href="/signup"
  });
});
</script>