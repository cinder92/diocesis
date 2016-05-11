<div id="upcoming_events-2" class="widget sidebar-widget widget_upcoming_events">
	<div class="sidebar-widget-title">
		<h3 class="widgettitle">Upcoming Events</h3>
	</div>
	<ul>
		<?php 
			$events = getEvents();
			foreach($events as $event){
		?>
		<li class="item event-item clearfix">
		  <div class="event-date"> 
			  <span class="date"><?= $event['dianum'] ?></span> 
			  <span class="month"><?= $event['mes'] ?></span> 
		  </div>
		  <div class="event-detail">
		   <h4><a href="<?= $event['link'] ?>"><?= $event['title'] ?></a></h4><span class="event-dayntime meta-data"><?= $event['dia'] ?> | <?= $event['hora'] ?></span> 
		   </div>
		</li>
		<?php } ?>
	</ul>
</div>