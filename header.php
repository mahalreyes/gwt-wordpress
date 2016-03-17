<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package gwt_wp
 */
?>

<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <title><?php wp_title( '|', true, 'right' ); ?></title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link rel="icon" href="<?php echo get_template_directory_uri() ?>/favicon.ico">

  <?php wp_head(); ?>
  
  <style <?php the_tags(); ?>>
    .container-main a {
      <?php govph_displayoptions( 'govph_anchorcolor' ); ?>
    }
    
    div.container-masthead {
      <?php govph_displayoptions( 'govph_headercolor' ); ?>
      <?php govph_displayoptions( 'govph_headerimage' ); ?>
    }
    
    h1.logo a {
      <?php govph_displayoptions( 'govph_header_font_color' ); ?>
      <?php govph_displayoptions( 'govph_logo_position' ); ?>
    }
    
    div.container-banner {
      <?php govph_displayoptions( 'govph_slidercolor' ); ?>
      <?php govph_displayoptions( 'govph_sliderimage' ); ?>
    }

    #sidebar-left .widget, #sidebar-right .widget, .panel {
      <?php govph_displayoptions( 'govph_custom_border_width' ); ?>
      <?php govph_displayoptions( 'govph_custom_border_radius' ); ?>
      <?php govph_displayoptions( 'govph_custom_border_color' ); ?>
      <?php govph_displayoptions( 'govph_custom_background_color' ); ?>
    }

    .container-main .entry-title a {
      <?php govph_displayoptions( 'govph_custom_headings_text' ); ?>
      <?php govph_displayoptions( 'govph_custom_headings_size' ); ?>
    }

    .container-banner .entry-title {
      <?php govph_displayoptions( 'govph_custom_headings_text' ); ?>
      <?php govph_displayoptions( 'govph_custom_headings_inner_page_size' ); ?>
    }

    #footer {
      <?php govph_displayoptions( 'govph_custom_footer_background_color' ); ?>
    }
  </style>
  <script type="text/javascript" language="javascript">
    var template_directory = '<?php echo get_template_directory_uri() ?>';
  </script>
</head>

<body <?php body_class(); ?>>

<!-- #accessibiility-links -->
<div id="accessibility-links">
  <ul>
    <li><a href="<?php echo govph_displayoptions('govph_acc_link_main_content'); ?>" accesskey="R">Skip to Main Content</a></li>
    <li><a href="<?php echo govph_displayoptions('govph_acc_link_sitemap'); ?>" accesskey="M">Sitemap</a></li>
  </ul>
</div>

<div id="accessibility-shortcuts">
  <ul>
    <li><a href="#" class="skips toggle-statement" title="Toggle Accessibility Statement" accesskey="0">Toggle Accessibility Statement</a></li>
    <?php if($govph_acc_link_home = govph_displayoptions('govph_acc_link_home')): ?>
    <li><a href="<?php echo $govph_acc_link_home; ?>" accesskey="1">Home</a></li>
    <?php endif; ?>
    <?php if($govph_acc_link_contact = govph_displayoptions('govph_acc_link_contact')): ?>
    <li><a href="<?php echo $govph_acc_link_contact; ?>" accesskey="c">Contacts</a></li>
    <?php endif; ?>
    <?php if($govph_acc_link_feedback = govph_displayoptions('govph_acc_link_feedback')): ?>
    <li><a href="<?php echo $govph_acc_link_feedback; ?>" accesskey="k">Feedback</a></li>
    <?php endif; ?>
    <?php if($govph_acc_link_search = govph_displayoptions('govph_acc_link_search')): ?>
    <li><a href="<?php echo $govph_acc_link_search; ?>" accesskey="s">Search</a></li>
    <?php endif; ?>
  </ul>
</div>

<!--
<span id="accessibility-widget">
  <ul>
    <li><a href="#" id="accessibility-mode" title="Accessibility Menu"><span class="offscreen">Toggle Accessibility Menu</span></a></li>
    <li><a href="#" id="accessibility-statement" title="Accessibility Statement" class="toggle-statement"><span class="offscreen">Toggle Accessibility Statement</span></a></li>
    <li><a href="#" id="accessibility-contrast" class="toggle-contrast" title="Toggle High Contrast"><span class="offscreen">Toggle High Contrast</span></a></li>
    <li><a href="#" id="accessibility-grayscale" class="toggle-grayscale" title="Toggle Grey Scale"><span class="offscreen">Toggle Grayscale</span></a></li>
  </ul>
</span>

<div id="accessibility-statement-content" title="Accessibility Statement" role="dialog">
  <textarea class="statement-textarea" readonly>
Shortcut Keys Combination Activation

Combination keys used for each browser.

Chrome for Linux press (Alt+Shift+shortcut_key) 
Chrome for Windows press (Alt+shortcut_key) 
For Firefox press (Alt+Shift+shortcut_key) 
For Internet Explorer press (Alt+Shift+shortcut_key) then press (enter) 

Accessibility Statement (Combination + 0): Statement page that will show the available accessibility keys. 
Home Page (Combination + 1): Accessibility key for redirecting to homepage. 
Main Content (Combination + R): Shortcut for viewing the content section of the current page. 
FAQ (Combination + 5): Shortcut for FAQ page. 
Contact (Combination + C): Shortcut for contact page or form inquiries. 
Feedback (Combination + K): Shortcut for feedback page. 
Site Map (Combination + M): Shortcut for site map (footer agency) section of the page. 
Search (Combination + S): Shortcut for search page. 

Press esc, or click the close the button to close this dialog box.
  </textarea>
  <input type="button" value="close" class="toggle-statement" />
</div>
-->

<!-- topbar navigation -->  
<div id="main-nav">
  <nav class="container-topbar">
    <div class="row">
      <div class="large-12 columns">
        <nav class="top-bar" data-topbar>
          
          <ul class="title-area">
            <li class="name">
              <h1><a href="http://www.gov.ph">GOVPH</a></h1>
            </li>
            <li class="toggle-topbar menu-icon"><a href="#">Menu</a></li>
          </ul>
          
          <section class="top-bar-section">
            <!-- left navigation -->
            <ul class="left">
              <?php wp_nav_menu( array('theme_location'  => 'topbar_left', 'items_wrap' => '%3$s', 'container' => false, 'walker' => new Topbar_Nav_Menu() )); ?> 
            </ul>
            <!-- right navigation -->
            <ul class="right">
            <?php if(govph_displayoptions( 'govph_disable_search' )): ?>
              <li class="search right"><?php get_search_form(); ?></li>
            <?php endif ?>
            <?php wp_nav_menu( array('theme_location'  => 'topbar_right', 'items_wrap' => '%3$s', 'container' => false, 'walker' => new Topbar_Nav_Menu() )); ?>
            </ul>
          </section>

        </nav>
      </div>
    </div>
  </nav>
</div> 

<div id="nav-mega-menu">
  <?php
  $parent_args = array( 'posts_per_page' => 4, 'post_type' => 'gwt_megamenu', 'post_parent' => 0 );
  $parent_loop = new WP_Query( $parent_args );
  if ( $parent_loop->have_posts() ) :
    while ( $parent_loop->have_posts() ) : $parent_loop->the_post();

      $title_to_id = str_replace(' ', '_', strtolower(get_the_title())); ?>

      <div id="<?php echo $title_to_id; ?>-megamenu" class="megamenu">
      <div id="nav-megamenu" class="row fullwidth collapse">
	    
		    <!-- start of left column mega menu -->
        <div class="large-3 columns nav-sub">
          <div>
            <h3><?php the_title(); ?></h3>
            <p><?php the_content(); ?></p>
            <ul class="tabs vertical">

              <?php $parent_page_id = ( '0' != $post->post_parent ? $post->post_parent : $post->ID );
              $mypages = get_pages( array( 'child_of' => $parent_page_id,  'post_type' => 'gwt_megamenu', 'sort_column' => 'post_date' ) );
              $i = 1;
              $j = 1;
      
              foreach( $mypages as $page ) :
                $content = $page->post_content;
                $content = apply_filters( 'the_content', $content ); ?>
                <li class="tab-title<?php echo $i === 1 ? ' active' : ''; ?>"><a href="#panel<?php echo $i; ?>" data-tab-link><?php echo $page->post_title; ?></a></li>
              <?php $i++; endforeach; ?>
            </ul>
          </div>
        </div> 
		    <!-- end of query -->

		    <!-- start of right column mega menu -->
        <div class="nav-sub-content large-9 columns ">
        <div class="tabs-content vertical">
          
		  <?php foreach( $mypages as $page ) :
          $content = $page->post_content;
          $content = apply_filters( 'the_content', $content ); ?>
          
		  <div class="content<?php echo $j === 1 ? ' active' : ''; ?>" id="panel<?php echo $j; ?>" data-tab-item>

           <!-- custom field columns -->
            <div class="row large-12 medium-12 columns">
             <?php echo do_shortcode($page->post_content); ?>
            </div>
           <!-- end custom field columns -->

          </div>
          <?php $j++; endforeach; ?>
		  
         </div>
        </div>
		<!-- end of right column mega menu -->
       </div>
      </div>
    <?php endwhile; ?>
   <?php endif; //If have post ?>
   <?php wp_reset_query(); ?>
</div>

<?php
  $name_slogan_class = 'large-12 ';
  $ear_content_class = '';
  $ear_content_2_class = '';
  if(is_active_sidebar('ear-content-1') && is_active_sidebar('ear-content-2')){
    $name_slogan_class = 'large-6 ';
    $ear_content_class = 'large-3 ';
    $ear_content_2_class = 'large-3 ';
  }
  elseif(is_active_sidebar('ear-content-1') && !is_active_sidebar('ear-content-2')){
    $name_slogan_class = 'large-9 ';
    $ear_content_class = 'large-3 ';
  }
  elseif(!is_active_sidebar('ear-content-1') && is_active_sidebar('ear-content-2')){
    $name_slogan_class = 'large-9 ';
    $ear_content_2_class = 'large-3 ';
  }
?>

<!-- masthead -->
<div class="container-masthead">
  <div class="row">
    <div class="columns<?php echo $name_slogan_class ?>"> 
      <h1 class="logo"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php govph_displayoptions( 'govph_logo' ); ?></a></h1>
    </div>
    
    <?php if(is_active_sidebar('ear-content-1')): ?>
    <div class="<?php echo $ear_content_class ?> columns">
      <?php do_action( 'before_sidebar' ); ?>
      <?php dynamic_sidebar( 'ear-content-1' ) ?>
    </div>
    <?php endif; ?>
    
    <?php if(is_active_sidebar('ear-content-2')): ?>
    <div class="<?php echo $ear_content_2_class ?> columns">
      <?php do_action( 'before_sidebar' ); ?>
      <?php dynamic_sidebar( 'ear-content-2' ) ?>
    </div>
    <?php endif; ?>
  </div>
</div>