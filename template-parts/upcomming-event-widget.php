<?php $upcomming = getFollowingEvent(); $details = getEventDetails($upcomming['id']); ?>
<div id="featured_event-5" class="widget sidebar-widget widget_featured_event">
	<div class="sidebar-widget-title" style="margin-bottom: 20px;">
		<h3 class="widgettitle post-title">
		<span class="featured-star">
		<i class="icon ion-ios-star"></i>
		</span>Próximo evento
		</h3>
		<div style="border-top: 4px solid #f8f7f3;"></div>
	</div>
	<img src="<?= $upcomming['image'] ?>" class="featured-event-image wp-post-image" alt="<?= $upcomming['titulo'] ?>">            
			<div class="featured-event-container">
                <div class="featured-event-time">
	                <span class="date"><?= $details['dianum'] ?></span>
	                <span class="month"><?= $details['mesletra'] ?>, <?= $details['aniodos'] ?></span>
	            </div>
	            <h4 class="featured-event-title">
		            <a href="<?= $upcomming['link'] ?>"><?= $upcomming['titulo'] ?> <i class="fa fa-caret-right"></i>
		            </a>
	            </h4>
	            <p><?= $upcomming['content'] ?></p>
            </div>
</div>