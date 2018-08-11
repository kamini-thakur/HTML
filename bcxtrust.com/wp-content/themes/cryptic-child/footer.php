<?php
/**
 * The template for displaying the footer.
 *
*/
?>
	
    <!-- BEGIN: FLOATING SOCIAL BUTTON -->
    <?php if (cryptic_plugin_active('redux-framework/redux-framework.php')){ ?>
        <?php echo cryptic_floating_social_button(); ?>
    <?php } ?>
    <!-- END: FLOATING SOCIAL BUTTON -->

    <?php if (!cryptic_plugin_active('redux-framework/redux-framework.php')){ ?>
        <!-- BACK TO TOP BUTTON -->
        <a class="back-to-top modeltheme-is-visible modeltheme-fade-out" href="<?php echo esc_url('#0'); ?>">
            <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
        </a>
    <?php } else { ?>
        <?php if (cryptic_redux('mt_backtotop_status') == true) { ?>
            <!-- BACK TO TOP BUTTON -->
            <a class="back-to-top modeltheme-is-visible modeltheme-fade-out" href="<?php echo esc_url('#0'); ?>">
                <i class="fa fa-long-arrow-up" aria-hidden="true"></i>
            </a>
        <?php } ?>
    <?php } ?>


    <!-- FOOTER -->
    <footer>
        <!-- FOOTER TOP -->
        <div class="row footer-top">
            <div class="container">
            <?php          
                //FOOTER ROW #1
                echo wp_kses_post(cryptic_footer_row1());
                //FOOTER ROW #2
                echo wp_kses_post(cryptic_footer_row2());
                //FOOTER ROW #3
                echo wp_kses_post(cryptic_footer_row3());
             ?>
            </div>
        </div>

        <!-- FOOTER BOTTOM -->
        <div class="footer-div-parent">
            <div class="container-fluid footer">
                <div class="col-md-12">
                	<p class="copyright text-center">
                        <?php if (cryptic_plugin_active('redux-framework/redux-framework.php')){ ?>
                            <?php echo wp_kses_post(cryptic_redux('mt_footer_text')); ?>
                        <?php }else{ ?>
                           &copy; <?php echo $site_config['website_name']; ?> 2017
                        <?php } ?>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</div>


<?php wp_footer(); ?>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.12.4/js/bootstrap-select.min.js"></script>

</body>
</html>