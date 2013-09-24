<?php 
/*
 * @file           content.php
 * @package        Sarasota
 * @author         DCI group
 * @copyright      2013 DCI Group
 * @version        Release: 1.0
*/
?>

<div class="well well-lg">
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <div class="meta row">
            <div class="col-md-8">POSTED ON <?php the_time('F jS, Y') ?></div>
            <div class="col-md-4">BY <?php the_author() ?></div>
        </div>
        <div class="article-content"><?php the_excerpt(); ?></div>
    </div>
