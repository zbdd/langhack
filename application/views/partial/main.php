<div class="row">
    <?php //var_dump($users); ?>
    <div class="col-md-12">
        <div class="row">
          <?php if (count($users) > 0): foreach($users as $user): ?>
            <div class="col-sm-4 col-lg-4 col-md-4">
                <div id="user<?php echo $user->id; ?>" class="item-short-border">
                <div class="short-left align-center">
                    <img src="<?php echo $user->profile; ?>" alt="" />
                    <p class="short-name">
                    <?php echo $user->firstname.' '.$user->lastname; ?>
                  </p>
                    <p class="short-stars">
                      <?php
                        for ($i=0; $i<$user->rating; $i++) {
                          echo '<span class="glyphicon glyphicon-star"></span>';
                        }
                        for ($i=5; $i>$user->rating; $i--) {
                          echo '<span class="glyphicon glyphicon-star-empty"></span>';
                        }
              ?>
                  </p>
                </div>
                <div class="short-right">
                  <div class="short-stats">
                    <table class="table short-table">
                    <tbody>
                      <tr>
                        <th class="top">Native</th>
                        <td class="top"><?php echo $user->native; ?></td>
                      </tr>
                      <tr>
                        <th>To learn</th>
                          <td><?php echo $user->learn; ?></td>
                      </tr>
                      <tr>
                        <th>Interests</th>
                        <td><?php echo $user->interest; ?></td>
                      </tr>
                      <tr>
                        <td colspan="2" style="text-align:right;">
                          <a class="short-more" href="/search/more/<?php echo $user->id; ?>">more info &gt;</a>
                        </td>
                      </tr>
                    </tbody>
                </table>
                  </div>
                </div>
            </div>
                
            </div>
            <?php endforeach; endif; ?>
        </div>
    </div>
</div>