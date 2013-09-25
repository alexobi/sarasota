<?php 
/*
 * Template Name: Front-Page.php
 * 
 * @file           front-page.php
 * @package        Sarasota
 * @author         DCI group
 * @copyright      2013 DCI Group
 * @version        Release: 1.0
*/
    
    get_header(); 
    global $simplefluid_options;
    $settings = get_option( 'simplefluid_options', $simplefluid_options );
    $handle = $settings['featured_article'];
    $latest = $settings['latest_news'];
?>
<article id="content" class="col-md-8">          
    <?php if($handle != '') {
        $args = array ('p'=>$handle);
        $featured_query = new WP_Query($args); ?>
        <div class="well well-lg">
            <h3 class="heading">Featured Article</h3>
            <?php if ($featured_query->have_posts()) : while ($featured_query->have_posts()) : $featured_query->the_post() ?>
            <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
            <div class="meta row">
                <div class="col-md-8">POSTED ON <?php the_time('F jS, Y'); ?></div>
                <div class="col-md-4">BY <?php the_author(); ?></div>
            </div>
            <?php 
                if ( has_post_thumbnail() ) { // check if the post has a Post Thumbnail assigned to it.
                    the_post_thumbnail('thumbnail', array('class' => 'img-thumbnail img-responsive pull-right'));
            } ?>
            <div class="article-content"><?php the_excerpt(); ?> </div>
        </div>
    <?php endwhile; endif; wp_reset_postdata(); } else { ?>
    <div class="well well-lg">
       <h3 class="heading">Featured Article</h3>
       <h3><a href="lorem.html">Lorem ipsum dolor sit amet, consectetur</a></h3>
       <div class="meta row">
            <div class="col-md-8">POSTED ON AUGUST 29, 2013</div>
            <div class="col-md-4">BY LOREM</div>
       </div>
       <img src="<?php echo get_template_directory_uri(); ?>/images/image.png" class="img-thumbnail img-responsive pull-right"/>
       <p class="article-content">Nulla aliquet cursus erat, ut tempus nisl molestie ac. In sollicitudin ac urna vitae pretium. Praesent aliquam convallis viverra. Nunc laoreet dui eget leo pharetra tincidunt a et orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin vel tincidunt ligula, ut elementum tellus. </p>
       <a href="lorem.html"><button>Read More</button></a>
    </div>
    <?php }?> 
    <?php if($latest != '') {
        $args2 = array ('cat'=>$latest);
        $cat_query = new WP_Query($args2);
        ?>
        <div class="well well-lg">
            <h3 class="heading">Latest News</h3>
            <div class="latest-news">
                <ul>
                <?php if($cat_query->have_posts()): while ($cat_query->have_posts()) : $cat_query->the_post(); ?>
                    <li><a href="<?php the_permalink(); ?>"><?php the_title() ?></a></li>
                <?php endwhile; endif; wp_reset_postdata(); ?>
                </ul>
            </div>
        </div>
    <?php } else { ?>
        <div class="well well-lg">
            <h3 class="heading">Latest News</h3>
            <div class="latest-news">
                <ul>
                    <li><a href="#">Morbi nec urna adipiscing, dignissim mi a, convallis lorem.</a></li>
                    <li><a href="#">Phasellus facilisis orci vel purus iaculis accumsan.</a></li>
                    <li><a href="#">Donec vel sem tincidunt, vehicula tortor a, faucibus dolor.</a></li>
                </ul>
            </div>
        </div>
  <?php } ?>
</article>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
