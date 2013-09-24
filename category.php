<?php 
/**
 * Category Template
 *
 *
 * @file           category.php
 * @package        Sarasota
 * @author         DCI group
 * @copyright      2013 DCI Group
 * @version        Release: 1.0
 * 
 */
get_header(); ?>

<article id="content" class="col-md-8">                  
    <?php if (have_posts()) : ?>
    <?php while (have_posts()) : the_post(); ?>
        <?php get_template_part( 'content'); ?>
    <?php  endwhile; ?>
    <?php endif;?>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>