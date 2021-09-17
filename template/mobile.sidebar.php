<div class="fishing_mobile_sidebar_container d-none" style="border-color: <?php echo get_option( 'body_color', '#069CFF' ) ?>;" >

    <div class="mobile_sidebar_inner_constainer">
        <span class="js-mobileSidebarToggler inner_close_icon fishing-icon3 fishing-icon3-cross"></span>

        <div class="searchform-contaier">
            <div class="d-flex icon-container"><span class="js-moblieSideSearchToggler fishing-icon2 fishing-icon2-search"></span></div>
            <div class="search-container-div display-none">
                <?php get_search_form() ?>
            </div>
        </div>
        

        <ul class="nav social_contaier">
        <?php 
            echo fishing_socalmedia_icon_foreach();
        ?>
        </ul>

    </div>    

</div>  
<div class="overlay js-mobileSidebarToggler"></div>