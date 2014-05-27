<script>gcal$perf$serverTime=53;gcal$perf$headStartTime=new Date().getTime()</script>
<?php
	$Url = "https://www.google.com/calendar/embed?showTitle=0&showCalendars=0&showTz=0&height=600&hl=ko&wkst=2&bgcolor=%23ffffff&src=po4i11bsdi2dqve7a9s2vjel2g@group.calendar.google.com&ctz=Asia/Seoul";
	$str = file_get_contents($Url);
?>
<?php
	if (strlen($str)>0):
		preg_match("/href=\"(.*)\"/", $str, $gcss);
?>
	<link type="text/css" rel="stylesheet" href="<?php echo "https://www.google.com/calendar/".$gcss[1]; ?>">
<?php
	endif;
	if (strlen($str)>0):
		preg_match("/src=\"(.*)\"/", $str, $gscript);
?>
	<script type="text/javascript" src="<?php echo "https://www.google.com/calendar/".$gscript[1]; ?>"></script>
<?php endif; ?>
	<script>
		function _onload()
<?php
    if(strlen($str)>0){
		preg_match("/_onload\(\)(.*)\<\/script\>/",$str,$title);
        echo $title[1];
    }
?>
	</script>
	<script type="text/javascript">
		function pageLoaded() { _onload(); }
	</script>
	<script>
		$(document).ready(function() {
			pageLoaded();
		});
	</script>

<h3 style="margin-top:10px;"><span class="glyphicon glyphicon-calendar"></span> Schedule</h3>
<div class="cal-container">
	<iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showDate=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;mode=WEEK&amp;height=600&amp;wkst=2&amp;hl=en&amp;bgcolor=%23FFFFFF&amp;src=akamk87%40gmail.com&amp;color=%23853104&amp;ctz=Asia%2FSeoul" style=" border-width:0 " width="800" height="600" frameborder="0" scrolling="no"></iframe>
</div>
<div class="row">
	<div class="col-md-12">
		<!-- <div class="cal-container">
			<iframe src="https://www.google.com/calendar/embed?showTitle=0&amp;showNav=0&amp;showDate=0&amp;showPrint=0&amp;showTabs=0&amp;showCalendars=0&amp;mode=WEEK&amp;height=600&amp;wkst=2&amp;hl=en&amp;bgcolor=%23FFFFFF&amp;src=akamk87%40gmail.com&amp;color=%23853104&amp;ctz=Asia%2FSeoul" style=" border-width:0 " width="800" height="600" frameborder="0" scrolling="no"></iframe>
		</div> -->
		<!-- <noscript><p></p>Cannot use scripts
		<a href="https://www.google.com/calendar/htmlembed?showTitle=0&amp;showCalendars=0&amp;showTz=0&amp;height=600&amp;hl=ko&amp;wkst=2&amp;bgcolor=%23ffffff&amp;src=po4i11bsdi2dqve7a9s2vjel2g@group.calendar.google.com&amp;ctz=Asia/Seoul">https://www.google.com/calendar/htmlembed?showTitle=0&amp;showCalendars=0&amp;showTz=0&amp;height=600&amp;hl=ko&amp;wkst=2&amp;bgcolor=%23ffffff&amp;src=po4i11bsdi2dqve7a9s2vjel2g@group.calendar.google.com&amp;ctz=Asia/Seoul</a></noscript>
		<div id="container" style="width:100%" class="locale-ko "></div> -->
	</div>
</div>