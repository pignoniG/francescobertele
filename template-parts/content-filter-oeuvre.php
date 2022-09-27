
<?php
/**
 * Template part for displaying page content in page.php
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package francescobertele


 $filter_items = array("project_corpus","project_status","project_object_type","project_specificity","project_body","project_breath","project_imagination","project_identity");

$global_filter_items= array();


 */
?>


<div id="sort-filter">
    <h1 class="title"><?php echo  wpm_translate_string( "[:en]Archive:it]Archivio[:]", $language = '' ); ?>  <span class="section-subtitle">
      <?php echo  wpm_translate_string( "[:en]artist archive[:it]archivio d'artista[:]", $language = '' ); ?>
    </span></h1>
  <!-- Filter Div -->
  <button class="accordion braketed noMedium" id="accordionFilters" >
  <?php echo  wpm_translate_string( "[:en]Filter[:it]Filtri[:]", $language = '' ); ?>
</button>
  <input type="text" id="quicksearch" class="quicksearch noMedium" placeholder="<?php echo  wpm_translate_string( "[:en]Search[:it]Cerca[:]", $language = '' ); ?>
   " disabled>
 
  <div class="panel filter_panel">
      <div class="label-container noMedium">

      <div class="label-filters-container">

        <h1 class="label-filters corpus">Corpus</h1>
        <h1 class="label-filters">
        <?php echo  wpm_translate_string( "[:en]Status[:it]Stato[:]", $language = '' ); ?>
        </h1>
        <h1 class="label-filters">
          <?php echo  wpm_translate_string( "[:en]Object[:it]Oggetto[:]", $language = '' ); ?></h1>
      </div>


      <div class="filters noMedium">





      <!-- BEGIN corpus-->
    <select class="filter-select select-css short" value-group="corpus" id="corpus" disabled>
      <option selected value="">
        <?php echo  wpm_translate_string( "[:en]all[:it]tutti[:]", $language = '' ); ?>
      </option>
      <?php 
           $n=0;
           $f=0;

        array_multisort($global_filter_items_h[$f],$global_filter_items[$f]);

           foreach ($global_filter_items[$f] as $global_filter_item) {
             echo ('<option value=".'.$global_filter_item.'">'.$global_filter_items_h[$f][$n].'</option>');
             $n=$n+1;
           }
       ?>
    </select>

    <span class="checkbox">

      <input type="checkbox" class="filter-select project_corpus_parent" name="project_corpus_parent" value=".project_corpus_parent_1">
        <label for="project_corpus_parent">
        <?php echo  wpm_translate_string( "[:en]Parent Corpuses[:it]Corpus Principali[:]", $language = '' ); ?>
        </label>
      </span>
    <!-- BEGIN status-->
    <select class="filter-select select-css short" value-group="status" id="status" disabled>
      <option selected value="">
        <?php echo  wpm_translate_string( "[:en]all[:it]tutti[:]", $language = '' ); ?>
      </option>
        <?php 
           $n=0;
           $f=1;
           array_multisort($global_filter_items_h[$f],$global_filter_items[$f]);
       
           foreach ($global_filter_items[$f] as $global_filter_item) {
             echo ('<option value=".'.$global_filter_item.'">'.$global_filter_items_h[$f][$n].'</option>');
             $n=$n+1;
           }
       ?>
    </select>
      <!-- BEGIN corpus-->
    <select class="filter-select select-css short" value-group="object" id="object" disabled>
      <option selected value="">
        <?php echo  wpm_translate_string( "[:en]all[:it]tutti[:]", $language = '' ); ?>
      </option>
       <?php 
           $n=0;
           $f=2;
           array_multisort($global_filter_items_h[$f],$global_filter_items[$f]);
       
           foreach ($global_filter_items[$f] as $global_filter_item) {
             echo ('<option value=".'.$global_filter_item.'">'.$global_filter_items_h[$f][$n].'</option>');
             $n=$n+1;
           }
       ?>
    </select>
    </div>
    </div>
        <div class="label-buttons-container">

                    <p class="filter_banner">
                                  <?php echo  wpm_translate_string( "[:en]Some archive features are not available from mobile, visit us from your computer for the full experience![:it]Alcune funzionalità dell'archivio non sono disponibili da mobile, visitaci dal tuo computer per l'esperienza completa![:]", $language = '' ); ?>
                    </p>
        
                  <div class="panelthemes filter_panel noMedium">
                            <div class="label-filtersthemes-container">
                                <h1 class="label-filters">
                                  <?php echo  wpm_translate_string( "[:en]Specificity[:it]Specificità[:]", $language = '' ); ?>
                                </h1>
                                <h1 class="label-filters">
                                  <?php echo  wpm_translate_string( "[:en]Body at the center[:it]Corpo al centro[:]", $language = '' ); ?>
                                </h1>
                                <h1 class="label-filters">
                                  <?php echo  wpm_translate_string( "[:en]Breath[:it]Respiro[:]", $language = '' ); ?>
                                </h1>
                                <h1 class="label-filters">
                                  <?php echo  wpm_translate_string( "[:en]Imagination[:it]Immaginazione[:]", $language = '' ); ?>
                                </h1>
                                <h1 class="label-filters">
                                  <?php echo  wpm_translate_string( "[:en]Identity[:it]Identità[:]", $language = '' ); ?>
                                </h1>
                            
                            </div>
                            <div class="filtersthemes">
                  <!-- BEGIN specificity-->
                    <select class="filter-select select-css short" value-group="specificity" id="specificity" disabled>
                      <option selected value="">
                        <?php echo  wpm_translate_string( "[:en]all[:it]tutti[:]", $language = '' ); ?>
                      </option>
                      <?php 
                          $n=0;
                          $f=3;
                          array_multisort($global_filter_items_h[$f],$global_filter_items[$f]);
                      
                          foreach ($global_filter_items[$f] as $global_filter_item) {
                            echo ('<option value=".'.$global_filter_item.'">'.$global_filter_items_h[$f][$n].'</option>');
                            $n=$n+1;
                          }
                      ?>
                    </select>
                
                <!-- BEGIN body-atc-->
                    <select class="filter-select select-css long" value-group="body-atc" id="body-atc" disabled>
                      <option selected value="">
                        <?php echo  wpm_translate_string( "[:en]all[:it]tutti[:]", $language = '' ); ?>
                      </option>
                       <?php 
                          $n=0;
                          $f=4;
                          array_multisort($global_filter_items_h[$f],$global_filter_items[$f]);
                      
                          foreach ($global_filter_items[$f] as $global_filter_item) {
                            echo ('<option value=".'.$global_filter_item.'">'.$global_filter_items_h[$f][$n].'</option>');
                            $n=$n+1;
                          }
                      ?>
                    </select>
                
                <!-- BEGIN breath-->
                    <select class="filter-select select-css short" value-group="Breath" id="Breath" disabled>
                      <option selected value="">
                        <?php echo  wpm_translate_string( "[:en]all[:it]tutti[:]", $language = '' ); ?>
                      </option>
                      <?php 
                          $n=0;
                          $f=5;
                          array_multisort($global_filter_items_h[$f],$global_filter_items[$f]);
                      
                          foreach ($global_filter_items[$f] as $global_filter_item) {
                            echo ('<option value=".'.$global_filter_item.'">'.$global_filter_items_h[$f][$n].'</option>');
                            $n=$n+1;
                          }
                      ?>
                    </select>
                
                <!-- BEGIN imagination-->
                    <select class="filter-select select-css long" value-group="Imagination" id="Imagination" disabled>
                      <option selected value="">
                        <?php echo  wpm_translate_string( "[:en]all[:it]tutti[:]", $language = '' ); ?>
                      </option>
                      <?php 
                          $n=0;
                          $f=6;
                          array_multisort($global_filter_items_h[$f],$global_filter_items[$f]);
                      
                          foreach ($global_filter_items[$f] as $global_filter_item) {
                            echo ('<option value=".'.$global_filter_item.'">'.$global_filter_items_h[$f][$n].'</option>');
                            $n=$n+1;
                          }
                      ?>
                    </select>
                
                <!-- BEGIN identity-->
                    <select class="filter-select select-css short" value-group="Identity" id="Identity" disabled>
                      <option selected value="">
                        <?php echo  wpm_translate_string( "[:en]all[:it]tutti[:]", $language = '' ); ?>
                      </option>
                       <?php 
                          $n=0;
                          $f=7;
                          array_multisort($global_filter_items_h[$f],$global_filter_items[$f]);
                      
                          foreach ($global_filter_items[$f] as $global_filter_item) {
                            echo ('<option value=".'.$global_filter_item.'">'.$global_filter_items_h[$f][$n].'</option>');
                            $n=$n+1;
                          }
                      ?>
                    </select>
                  </div>
                  </div>
      <button type="button" class="braketed noMedium" id="btn-expt-filter">
        <?php echo  wpm_translate_string( "[:en]Export Selection[:it]Esporta Selezione[:]", $language = '' ); ?>
      </button>
        <button type="button" class="braketed noMedium" id="btn-reset-filter">
        <?php echo  wpm_translate_string( "[:en]Reset Filter[:it]Reset Filtri[:]", $language = '' ); ?>
      </button>
    </div>
    </div>
</div>