      <?php
        echo head(array('title' => metadata('exhibit', 'title'),
			'bodyclass' => 'exhibits show'));
      ?>
      <?
        // fcd1, 8/28/13: following option, set via the Configure panel for the theme, is on if the
        // exhibition was created in the Omeka 1.5.3 production server before the updagrade to 2.0.4.
        $legacy_behavior = get_theme_option('Legacy Behavior');
      ?>
      <?php
        // fcd1, 7/30/13: Following was removed from header.php and put here
        // since exhibition specific. Following piece of code creates 
        //exhibition title block, black background, lhs color rectangle
      ?>
      <h1 class="head">
        <span class="keycolor" style="height:30px;min-width:30px;display:inline">
          &nbsp;
        </span>
        &nbsp;
        <?php
          $title = exhibit_builder_link_to_exhibit();
          echo $title;
        ?>
      </h1>
      <?php
        // fcd1, 9/9/11: In Omeka 1.5.3, exhibitions had sections, with no landing page.
        // When a section was selected, the first page in the section was displayed
        // From Omeka 2.0 on, there are no more sections. Instead, there are top-level
        // pages, which can have content, and these top-level pages can have child pages.
        // To mimic the Omeka 1.5.3 behavior for legacy exhibitions that were ported to
        // Omeka 2.1, we need to check if the current page is a top-level page, and 
        // display the content of the first child, if there is one. We also need this 
        // info so that "Next" links to the correct page
	// Note that this legacy behavior can be turned off, in which case the content of
	// the top level pages will be displayed
        $currentExhibitPage = get_current_record('exhibit_page');
        $exhibitPageParent = $currentExhibitPage->getParent();      
        $firstChild = null;
        if (!($exhibitPageParent)) {
          // this is a top-level page, and we want section-like behavior. First page in "section" will display
          // and the breadcrumb links have to reflect this
          $firstChild = $currentExhibitPage->getFirstChildPage();
        }
      ?>
      <table>
        <tr>
          <td class="cul-general-exhibit-nav-td">
            <div class="cul-general-exhibit-nav-div">
              <?php
                if (get_theme_option('Turn Off Legacy Behavior')) {
                  echo cul_general_legacy_exhibit_builder_page_nav('Home');
		} else {
                  echo cul_general_legacy_exhibit_builder_page_nav('Home',$firstChild);
		}
              ?>
            </div> <!--end class="cul-general-exhibit-nav-div" -->
          </td>
          <td class="cul-general-content-td">
            <div id="content">
              <?php
                if (get_theme_option('Turn Off Legacy Behavior')) {
                  echo culWritePrevNext();
                } else {
                  echo culWritePrevNext($firstChild);
                }
              ?>
              <?php echo flash(); ?>
              <div id="primary">
                <div class="exhibit-content">
                  <?
                    // fcd1, 8/30/13: for legacy exhibitions using cul-general, we will, 
                    // by default, mimic the behavior of Omeka 1.5.3, where sections had no
                    // landing page and displayed the first page in the section. However,
                    // this behavior can be turned off, in which case the content of the top-level
                    // page (there are no more sections in Omeka 2.x) will be displayed.
                    if (get_theme_option('Turn Off Legacy Behavior')) {
                      echo cul_general_breadcrumb(); 
                      cul_legacy_exhibit_builder_render_exhibit_page();
                    } else {
                      echo cul_general_breadcrumb($firstChild); 
                      // cul_legacy_exhibit_builder_render_exhibit_page($firstChild);
		      exhibit_builder_render_exhibit_page($firstChild);
                    }
                  ?>
                </div> <!-- end class="exhibit-content"-->
              </div> <!-- end id="primary" -->
              <?php
                if (get_theme_option('Turn Off Legacy Behavior')) {
                  echo culWritePrevNext();
                } else {
                  echo culWritePrevNext($firstChild);
                }
              ?>
            </div><!-- end id="content" -->
          </td>
        </tr>
      </table>
      <?php echo foot(); ?>
