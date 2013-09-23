<?php get_header(); 

global $sarasota_options;
$sarasota_setting = get_option('sarasota_options',$sarasota_options);
$handle = $sarasota_setting[$sarasota_header_option['featured_article']];
$article = get_post($handle);
?>
 <article id="content" class="col-md-8">
   <?php if($article != '') {?>
     <div class="well well-lg">
     <h3 class="heading">Featured Article</h3>
     <h3><a href="<?php echo post_permalink($handle); ?>"><?php $article -> post_title ?></a></h3>
     <div class="meta row">
            <div class="col-md-8">POSTED ON AUGUST 29, 2013</div>
            <div class="col-md-4">BY LOREM</div>
        </div>
  <?php } else { ?>
     <div class="well well-lg">
        <h3 class="heading">Featured Article</h3>
        <h3><a href="lorem.html">Lorem ipsum dolor sit amet, consectetur</a></h3>
        <div class="meta row">
            <div class="col-md-8">POSTED ON AUGUST 29, 2013</div>
            <div class="col-md-4">BY LOREM</div>
        </div>
        <img src="images/image.png" class="img-thumbnail img-responsive pull-right"/>
        <p class="article-content">Nulla aliquet cursus erat, ut tempus nisl molestie ac. In sollicitudin ac urna vitae pretium. Praesent aliquam convallis viverra. Nunc laoreet dui eget leo pharetra tincidunt a et orci. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos. Proin vel tincidunt ligula, ut elementum tellus. </p>
        <a href="lorem.html"><button>Read More</button></a>
    </div>
   <?php } ?>
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
                        </article>
                    <?php get_sidebar(); ?>
                    <?php get_footer(); ?>
