<?php 
/*
 * @file           content-page.php
 * @package        Sarasota
 * @author         DCI group
 * @copyright      2013 DCI Group
 * @version        Release: 1.0
*/
?>

<div class="well well-lg">
        <h3 class="posthead"><?php the_title(); ?></h3>
        <?php 
            if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                the_post_thumbnail('large', array('class' => 'img-thumbnail img-responsive'));
        } ?>
        <div class="article-content"><?php the_content(); ?></div>
        <hr/>
</div>