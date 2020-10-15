<header class="header1">
  <div class="container logo-infos">
    <div class="row">
      
    </div>
  </div>


  <!-- BOTTOM BAR -->
  <nav class="navbar navbar-default" id="modeltheme-main-head">
    <div class="container">
        <div class="row">

          <!-- LOGO -->
          <div class="navbar-header col-md-3">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>

            <?php if(xgymwp_redux('mt_logo','url')){ ?>
              <h1 class="logo">
                  <a href="<?php echo get_site_url(); ?>">
                      <img src="<?php echo esc_url(xgymwp_redux('mt_logo','url')); ?>" alt="<?php echo esc_attr(get_bloginfo()); ?>" />
                  </a>
              </h1>
            <?php }else{ ?>
              <h1 class="logo no-logo">
                  <a href="<?php echo esc_url(get_site_url()); ?>">
                    <?php echo esc_html(get_bloginfo()); ?>
                  </a>
              </h1>
            <?php } ?>
          </div>

          <!-- NAV MENU -->
          <div id="navbar" class="navbar-collapse collapse col-md-9">
            <?php echo xgymwp_get_nav_menu(); ?>

            <div class="header-nav-actions">

              <?php if(xgymwp_redux('mt_header_fixed_sidebar_menu_status') == true){ ?>
                <!-- MT BURGER -->
                <div id="mt-nav-burger">
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                  <span></span>
                </div>
              <?php } ?>

              <?php if(xgymwp_redux('mt_header_is_search') == true){ ?>
                <a href="#" class="mt-search-icon">
                  <i class="fa fa-search" aria-hidden="true"></i>
                </a>
              <?php } ?>
              
            </div>

          </div>


        </div>
    </div>
  </nav>
</header>
