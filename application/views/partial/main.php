<div class="row">
  <?php //var_dump($users); ?>
  <div class="col-md-12">
    <div class="row">
      <?php if (count($users) > 0): foreach($users as $user): ?>
      <div class="col-sm-4 col-lg-4 col-md-4">
        <div class="item-1">
          <div class="public-header header-<?php echo $user->background; ?>">
              <img src="<?php echo $user->profile; ?>" alt="" />
              <h1><?php echo $user->lastname.' '.$user->firstname; ?></h1>
              <p><?php echo $user->email; ?></p>
          </div> 
          <ul class="list-style">
            <li><a href="#">Setting <i class="fa fa-cog pull-right"></i></a></li>
            <li><a href="#">Location <i class="fa fa-map-marker pull-right"></i></a></li>
            <li><a href="#">Favourite <i class="fa fa-heart pull-right"></i></a></li>
            <li><a href="#">Album <i class="fa fa-picture-o pull-right"></i></a></li>
          </ul>
        </div>
      </div>
      <?php endforeach; endif; ?>
      <!-- <div class="col-sm-4 col-lg-4 col-md-4" >
        <div class="thumbnail">
          <img src="http://placehold.it/320x150" alt="">
          <div class="caption">
            <h4 class="pull-right">$24.99</h4>
            <h4><a href="#">First Product</a>
            </h4>
            <p>See more snippets like this online store item at <a target="_blank" href="http://www.bootsnipp.com">Bootsnipp - http://bootsnipp.com</a>.</p>
          </div>
          <div class="ratings">
            <p class="pull-right">15 reviews</p>
            <p>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
              <span class="glyphicon glyphicon-star"></span>
            </p>
          </div>
        </div>
      </div> -->
    </div>
  </div>
</div>