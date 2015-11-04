    </div><!--end wrap-->
    <p class="footer11px">
    <?php
      $unit_contact = cul_general_get_unit_contact();
      if ($unit_contact != "") {
        echo $unit_contact;
      }
    ?>
    </p>
    <p class="copyright-footer"> 
      <?php echo cul_copyright_information();?>
    </p>

    <?php
      // Set variable used in CUL widget below                                                                                                             
      switch ( get_theme_option('Color Scheme') ) {

      case "brown":

	$cul_widget_foreground_color = "#222";
	$cul_widget_background_color = "#86868C";
	break;

      case "blue":

	$cul_widget_foreground_color = "";
	$cul_widget_background_color = "";
	break;

      case "burgundy":
      
	$cul_widget_foreground_color = "#222";
	$cul_widget_background_color = "#661E19";
	break;

      }
    ?>

    <!-- CULTNBW START -->
    <script type="text/javascript">
    <!-- 
 	CULh_style = 'staticlink'; // staticlink, static, search, standard (default)
//CULh_width = ''; // fixed, fluid (default)
CULh_colorfg = <?php echo "'" . $cul_widget_foreground_color . "'"?>;
CULh_colorbg = <?php echo "'" . $cul_widget_background_color . "'"?>;
//CULh_colorfg = '#333333'; // topnavbar foreground color. hex value. ex: #002B7F
//CULh_colorbg = '#666666'; // topnavbar background color. hex value. ex: #779BC3
//CULh_nobs = 1; // uncomment to NOT load our bootstrap javascript file and or use your own (v2.3.x required)
//CULh_notk = 1; // uncomment to NOT load our ldpd-toolkit.js and or use your own.
//-->
    </script>
    <script src="//ldpd.cul.columbia.edu/ldpd-toolkit/build/js/jquery-1.7.2.min.js"></script>
    <script src="//ldpd.cul.columbia.edu/ldpd-toolkit/widgets/cultnbw.min.js"></script>
    <!-- /CULTNBW END -->

  </body>
</html>
