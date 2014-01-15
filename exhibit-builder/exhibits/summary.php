      <?php echo head(array('title' => metadata('exhibit', 'title'),
			    'bodyclass'=>'exhibits summary')); ?>
      <?php
        // fcd1, 7/25/13: Following was removed from header.php and put here since exhibition specific
        // Following piece of code creates exhibition title block, black background, lhs color rectangle
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

    <?
    // This is a choice of overlay style, modifying the base to set the color scheme
    // The color scheme is set when the theme is configure via the Omeka admin interface
    // The setting is stored in the config.ini file
    // $color_scheme will be used as a class attribute where needed to set the colors and other associated
    // characteristics
    $color_scheme = get_theme_option('Color Scheme');
?>
      <table>
        <tr>
          <?php
            // fcd1, 7/29/13: First table, first row, first cell contains lhs vertical nav bar
          ?>
          <td class="cul-general-exhibit-nav-td">
            <div class="cul-general-exhibit-nav-div">
              <ul class="exhibit-page-nav navigation">
                <li id="cul-general-exhibit-nav-title">
                  <?php
                    $title = exhibit_builder_link_to_exhibit(get_current_record('exhibit'),'Home',
							     array('class' => 'exhibit-title'));
                    echo $title;
                  ?>
                </li>
                <?php set_exhibit_pages_for_loop_by_exhibit(); ?>
                <?php foreach (loop('exhibit_page') as $exhibitPage): ?>
                  <?php 
                    $html = '<li class="cul-general-exhibit-nav-parent">' . '<a href="' . 
                            exhibit_builder_exhibit_uri(get_current_record('exhibit'), 
							$exhibitPage) .
                            '">'. metadata($exhibitPage, 'title') .'</a>';
                    echo $html;
                  ?>
                <?php endforeach; ?>
              </ul>
            </div> <!--end id="cul-general-exhibit-nav-div"-->
          </td>
          <td class="cul-general-content-td">
            <div id="primary">
              <div class="cul-general-solid-block">
                <?php
	      echo cul_theme_logo(metadata('exhibit','title'));
                ?>
              </div>
              <?php if ($exhibitDescription = metadata('exhibit', 'description', array('no_escape' => true))): ?>
                <div class="exhibit-description">
                  <?php echo $exhibitDescription; ?>
                </div>
              <?php endif; ?>
              <?php if (($exhibitCredits = metadata('exhibit', 'credits'))): ?>
                <div class="exhibit-credits">
                  <h3><?php echo 'Exhibit Curator' ?></h3>
                  <p><?php echo $exhibitCredits; ?></p>
                </div>
              <?php endif; ?>
            </div>
            <div class="exhibit-sections">
              <?php if (get_theme_option('Home Sections')): ?>
                <?php set_exhibit_pages_for_loop_by_exhibit(); ?>
                <?php foreach (loop('exhibit_page') as $exhibitPage): ?>
                  <?php 
                    $html = '<h3><a href="' . 
                            exhibit_builder_exhibit_uri(get_current_record('exhibit'), 
							$exhibitPage) . '">' . 
                            cul_insert_angle_brackets(metadata($exhibitPage, 'title')) . '&nbsp;&raquo;</a></h3>';
                    echo $html;
                    $pageText = '<p>' . exhibit_builder_page_text(1) . '</p>';
                    echo $pageText;
                  ?>
                <?php endforeach; ?>
              <?php endif; ?>
            </div>
          </td>
        </tr>
      </table>
      <?php echo foot(); ?>
