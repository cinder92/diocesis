<div class="clear"></div>

<!-- You can start editing here. -->

<?php if ( have_comments() ) : ?>

    <h5 id="comments" class="h5"><?php comments_number('<span>No</span> Responses', '<span>One</span> Response', '<span>%</span> Responses' );?> to &#8220;<?php the_title(); ?>&#8221;</h5>

    <nav id="comment-nav">
        <ul class="clearfix">
            <li><?php previous_comments_link() ?></li>
            <li><?php next_comments_link() ?></li>
        </ul>
    </nav>

    <ol class="commentlist">
        <?php wp_list_comments('callback=qs_comments'); ?>
    </ol>

    <nav id="comment-nav">
        <ul class="clearfix">
            <li><?php previous_comments_link() ?></li>
            <li><?php next_comments_link() ?></li>
        </ul>
    </nav>

    <?php else : // this is displayed if there are no comments so far ?>

    <?php if ( comments_open() ) : ?>
        <!-- If comments are open, but there are no comments. -->

    <?php else : // comments are closed ?>
    <!-- If comments are closed. -->
    <!--<p class="nocomments">Comments are closed.</p>-->

    <?php endif; ?>

<?php endif; ?>


<?php if ( comments_open() ) : ?>

<?php comment_form(); ?>

<?php endif; // if you delete this the sky will fall on your head ?>