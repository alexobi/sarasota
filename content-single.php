<div class="well well-lg">
        <h3 class="posthead"><?php the_title(); ?></h3>
        <div class="meta row">
            <div class="col-md-8">POSTED ON <?php the_time('F jS, Y') ?></div>
            <div class="col-md-4">BY <?php the_author() ?></div>
        </div>
        <?php 
            if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                the_post_thumbnail('large', array('class' => 'img-thumbnail img-responsive'));
        } ?>
        <div class="article-content"><?php the_content(); ?></div>
        <hr/>
        <?php the_tags(); ?>
        <div class="navi">
            <div class="right">
                <?php previous_post_link(); ?> / <?php next_post_link(); ?>
            </div>
        </div>
</div>