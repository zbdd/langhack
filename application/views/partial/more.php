<div class="row">
	<div class="col-md-12">
	    <div class="row">
	      	<div class="col-sm-12 col-lg-12 col-md-12">
	      		<div id="user<?php echo $userdata->id; ?>" class="item-short">
	          		<div class="short-left align-center">
	              		<img src="<?php echo $userdata->profile; ?>" alt="" />
	              		<p class="short-name">
		          			<?php echo $userdata->firstname.' '.$userdata->lastname; ?>
		          		</p>
	              		<p class="short-stars">
	              			<?php
	              				for ($i=0; $i<$userdata->rating; $i++) {
	              					echo '<span class="glyphicon glyphicon-star"></span>';
	              				}
	              				for ($i=5; $i>$userdata->rating; $i--) {
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
						      			<td class="top"><?php echo $userdata->native; ?></td>
						      		</tr>
						        	<tr>
						        		<th>To learn</th>
						          		<td><?php echo $userdata->learn; ?></td>
						        	</tr>
						        	<tr>
						        		<th>Interests</th>
						        		<td><?php echo $userdata->interest; ?></td>
						        	</tr>
						        	<tr>
						        		<td colspan="2" style="text-align:right;">
						        			<a href="#" class="btn btn-info btn-sm" role="button"><span class="glyphicon glyphicon-comment"></span> Chat</a>
						        			<a href="/search/calendar" class="btn btn-warning btn-sm" role="button"><span class="glyphicon glyphicon-calendar"></span> Schedule</a>
						        			<!-- <button type="button" class="btn btn-success btn-sm">Chat</button>
						        			<button type="button" class="btn btn-warning btn-sm btn-booking">Schedule</button> -->
						        		</td>
						        	</tr>
						        </tbody>
						    </table>
		          		</div>
		          	</div>
		        </div>
	     	</div>
		</div>
		<div class="row">
			<div class="col-sm-12 col-lg-12 col-md-12">
				<h3 style="margin-top:10px;"><span class="glyphicon glyphicon-edit"></span> Reviews</h3>
				<hr>
				<div class="media">
					<a class="pull-left" href="#">
						<img class="media-object" alt="64x64" src="http://0.academia-photos.com/13912/4664/52996/s200_aaron.meskin.jpg" style="width: 48px; height: 48px; border-radius:50%;">
					</a>
					<div class="media-body">
						<h4 class="media-heading">Aaron Truman</h4>
						Not sure what I was expecting from this but <em><?php echo $userdata->firstname.' '.$userdata->lastname; ?></em> was so helpful and understanding.  What was originally just a casual catchup over coffee lead to many more language exchanges. I feel like I’ve made a lot of progress. Thank you!
					</div>
				</div>
				<hr>
				<div class="media">
					<a class="pull-left" href="#">
						<img class="media-object" alt="64x64" src="http://www.aspenideas.org/sites/default/files/pictures/people/Robinson-Craig_pic.jpg" style="width: 48px; height: 48px; border-radius:50%;">
					</a>
					<div class="media-body">
						<h4 class="media-heading">Kim Robinson</h4>
						Great catchup and language exchange. Thanks!
					</div>
				</div>
				<hr>
				<div class="media">
					<a class="pull-left" href="#">
						<img class="media-object" alt="64x64" src="http://qph.is.quoracdn.net/main-thumb-1984183-200-HV8CPpNlOq4bFiArsTPmkLTmuMZEYd4K.jpeg" style="width: 48px; height: 48px; border-radius:50%;">
					</a>
					<div class="media-body">
						<h4 class="media-heading">Susie Hwuang</h4>
						 Level of proficiency was lower than stated but overall a nice experience.
					</div>
				</div>
			</div>
		</div>
	</div>
</div>