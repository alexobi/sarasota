<?php 
/**
 * Index Template
 *
 * @file           index.php
 * @package        Sarasota
 * @author         Alexander Obi (DCI group)
 * @copyright      2013 DCI Group
 * @version        Release: 1.0
 * 
 */
get_header(); ?>

<article id="content" class="col-md-8">                  
    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part( 'content','page'); ?>
    <?php  endwhile; ?>
    <?php endif;?>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>