<?php
/**
 * Template Name: Custom Home Page
 */

get_header(); ?>

<section id="serv-section">
  <div class="container">
    <div class="heading-box">
      <div class="row">
        <?php if( get_theme_mod( 'educational_zone_section_title') != '') { ?>
          <div class="col-lg-12 col-md-12">        
            <h3><?php echo esc_html(get_theme_mod('educational_zone_section_title','')); ?></h3>        
          </div>
        <?php } ?>
        <?php if( get_theme_mod( 'educational_zone_section_text') != '') { ?>
          <div class="col-lg-12 col-md-12">
            <p><?php echo esc_html(get_theme_mod('educational_zone_section_text','')); ?></p>        
          </div>
        <?php } ?>
      </div>
    </div>
    <div class="row">
      <div class="col-lg-12 col-md-12">
        <div class="row">
          <?php
            $catData = get_theme_mod('educational_zone_our_services','');
            if($catData){

              $page_query = new WP_Query(array( 'category_name' => esc_html($catData,'educational-zone')));
              while( $page_query->have_posts() ) : $page_query->the_post(); ?>
              
                <div class="col-lg-4 col-md-4">
                  <div class="serv-box">
                    <?php the_post_thumbnail(); ?>
                    <h4><a href="<?php the_permalink(); ?>" alt="<?php the_title(); ?>"><?php the_title(); ?></a></h4>
                    <p><?php the_excerpt(); ?></p>
                  </div>
                </div>
              
              <?php endwhile;
              wp_reset_postdata();
            } ?>
        </div>
      </div>
    </div>
  </div>
</section>

<?php get_footer(); ?>