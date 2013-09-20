  <div class="well well-lg">
        <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
        <div class="meta row">
            <div class="col-md-8">POSTED ON <?php the_time('F jS, Y') ?></div>
            <div class="col-md-4">BY <?php the_author() ?></div>
        </div>
        <p class="article-content"><?php the_excerpt(); ?></p>
    </div>
