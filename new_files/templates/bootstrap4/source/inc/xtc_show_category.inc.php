<?php
  /* -----------------------------------------------------------------------------------------
   $Id: xtc_show_category.inc.php 12822 2020-07-09 06:24:46Z GTB $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]
   -----------------------------------------------------------------------------------------
   based on: 
   (c) 2000-2001 The Exchange Project  (earlier name of osCommerce)
   (c) 2002-2003 osCommerce(categories.php,v 1.23 2002/11/12); www.oscommerce.com
   (c) 2003   nextcommerce (xtc_show_category.inc.php,v 1.4 2003/08/13); www.nextcommerce.org 
   (c) 2010  web28 (xtc_show_category.inc.php, v 2.1 2010/11/12); www.rpa-com.de

   Released under the GNU General Public License 
   ---------------------------------------------------------------------------------------*/   

  function xtc_show_category($counter, $oldlevel=1) {
    global $foo, $categories_string, $categories_string2, $id, $cPath;
    $level = $foo[$counter]['level']+1;


    if ($categories_string == '') { //Level 1 Start-UL
		$categories_string .= '<ul id="categorymenu" class="nav nav-pills flex-column">'."\n";
    }
    if ($categories_string2 == '') { //Level 1 Start-UL
		$categories_string2 .= '<ul id="main" class="' . $foo[$counter]['id'] . '">'."\n";
		if (BS4_SHOW_HOMEBUTTON_IN_TOPCATMENU == 'true'){
			$categories_string2 .= '<li class="nav-item home"><a class="nav-link" href="' . xtc_href_link(FILENAME_DEFAULT) . '" aria-label="home"><span class="fa fa-home fa-lg"></span></a></li>'."\n";
		}
    }

    //BOF +++ UL LI Verschachtelung  mit Quelltext Tab Einzügen +++
    $ul = $ul2 = $tab = '';
    for ($i = 1; $i <= $level; $i++) {
      $tab .= "\t";
    }

    if ($level > $oldlevel) { //neue Unterebene
      $ul = "\n" . $tab. '<ul id="'.$foo[$counter]['id'].'" class="nav flex-column card border-0 m-1" data-level="'.$level.'">'. "\n";
      $ul2 = "\n" . $tab. '<ul class="'.$foo[$counter]['id'].'" data-level="'.$level.'">'. "\n";
      $categories_string = rtrim($categories_string, "\n"); //Zeilenumbruch entfernen
      $categories_string2 = rtrim($categories_string2, "\n"); //Zeilenumbruch entfernen
      $categories_string = substr($categories_string, 0, -5);  //letztes  </li>  entfernen
      $categories_string2 = substr($categories_string2, 0, -5);  //letztes  </li>  entfernen
    } elseif ($level < $oldlevel) { //zurück zur höheren Ebene
      $ul = close_ul_tags($level,$oldlevel);
      $ul2 = close_ul_tags($level,$oldlevel);
    }
    //EOF +++ UL LI Verschachtelung  mit Quelltext Tab Einzügen +++

    //BOF +++ Kategorien markieren +++
    $category_path = explode('_',$cPath); //Kategoriepfad in Array einlesen

    //Aktive Kategorie markieren
    $cat_active = '';

    //Elternkategorie markieren
    $in_path = in_array($counter, $category_path); //Testen, ob aktuelle Kategorie ID im Kategoriepfad enthalten ist
    $this_category = array_pop($category_path); //Letzter Eintrag im Array ist die aktuelle Kategorie

	if($this_category == $counter) {
		$cat_active = ' active Selected';
	} elseif($in_path) {
		$cat_active = ' active parent';
	}
    //EOF +++ Kategorien markieren +++

	if (SHOW_COUNTS == 'true' || BS4_HIDE_EMPTY_CATEGORIES == 'true') {
		$products_in_category = xtc_count_products_in_category($counter);
	}

    // Meine Änderung Zeichen für Kategorie mit Unterkategorie einfügen
    $subcategories_class = $subcategories_class2 = '';
    $subcategories_button = '';
	if ($foo[$counter]['hassubcat'] == true) {
		if (BS4_HIDE_EMPTY_CATEGORIES != 'true' || (bs4_count_products_in_category($counter) != $products_in_category)) {
			if (BS4_CATEGORIESMENU_AJAX == 'true') {
				if (($level < BS4_CATEGORIESMENU_MAXLEVEL || BS4_CATEGORIESMENU_MAXLEVEL == 'false')) {
				   	$subcategories_class = ' category_li';
			    	$subcategories_button = '<div class="category_button fa fa-sm fa-' . ($in_path ? 'chevron-up' : 'chevron-right') . '" data-value="'.($foo[$counter]['path']).'"></div>';
				}
			}
			$subcategories_class2 = ' hassub';
		}
	}

    //BOF +++ Kategorie Linkerstellung +++
    if (trim($categories_string == '')) $categories_string = "\n"; //Zeilenschaltung Codedarstellung
    if (trim($categories_string2 == '')) $categories_string2 = "\n"; //Zeilenschaltung Codedarstellung
    $categories_string .= $ul; //UL LI Versschachtelung
    $categories_string2 .= $ul2; //UL LI Versschachtelung
	if ((BS4_HIDE_EMPTY_CATEGORIES == 'true' && $products_in_category > 0) || BS4_HIDE_EMPTY_CATEGORIES != 'true') {
	    $categories_string .= $tab; //Tabulator Codedarstellung
	    $categories_string2 .= $tab; //Tabulator Codedarstellung
	    $categories_string .= '<li class="nav-item level'.$level.$cat_active.$subcategories_class.'">';
	    $categories_string2 .= '<li id="li'.$foo[$counter]['id'].'" class="level'.$level.$cat_active.$subcategories_class2.'">';
	    $categories_string .= '<a class="nav-link'.$cat_active.'" href="'.$foo[$counter]['link'].'" title="'. $foo[$counter]['name'] . '">';
	    $categories_string2 .= '<a id="a'.$foo[$counter]['id'].'" class="'.$cat_active.'" href="'.$foo[$counter]['link'].'" title="'. $foo[$counter]['name'] . '" data-value="'.$foo[$counter]['id'].'">';
	    $sign = '';
		for ($i = 2; $i <= $level; $i++) {
		    $sign .= '&rsaquo;';
		}
	    if ($sign != '') $categories_string .= $sign.' ';
	    $categories_string .= $foo[$counter]['name'];
	    $categories_string2 .= $foo[$counter]['name'];
	    //Anzeige Anzahl der Produkte in Kategorie, für bessere Performance im Admin deaktivieren
	    if (SHOW_COUNTS == 'true') {
	      if ($products_in_category > 0) {
	        $categories_string .= '<span class="badge badge-secondary float-right">' . $products_in_category . '</span>';
	        $categories_string2 .= '&nbsp;<div class="badge badge-secondary">' . $products_in_category . '</div>';
	      }
	    }
	    $categories_string .= '</a>'.$subcategories_button.'</li>';
	    $categories_string2 .= '</a></li>';
	    $categories_string .= "\n"; //Zeilenschaltung Codedarstellung
	    $categories_string2 .= "\n"; //Zeilenschaltung Codedarstellung
	}
    //EOF  +++ Kategorie Linkerstellung +++

    //Nächste Kategorie
    if ($foo[$counter]['next_id']) {
      xtc_show_category($foo[$counter]['next_id'], $level);
    } else {
	     if ($level > 1) $categories_string .= close_ul_tags(1,$level);
	     if ($level > 1) $categories_string2 .= close_ul_tags(1,$level);
		// Replace empty UL-Tag
		$categories_string = preg_replace("/<ul[^>]*>([\n\t]?)*<\\/ul[^>]*>/",'',$categories_string);
		$categories_string2 = preg_replace("/<ul[^>]*>([\n\t]?)*<\\/ul[^>]*>/",'',$categories_string2);
		return;
    }
  }

  function bs4_count_products_in_category($category_id, $include_inactive = false) {
    static $products_count_array, $products_in_category_array;

    $active = (($include_inactive === false) ? 0 : 1);

    if (!is_array($products_count_array)) {
      $products_count_array = array();
    }

    if (!is_array($products_in_category_array)) {
      $products_in_category_array = array();
    }

    if (!isset($products_in_category_array[$active])) {
      $categories_query = xtDBquery("SELECT count(*) as total,
                                            p2c.categories_id
                                       FROM ".TABLE_PRODUCTS." p
                                       JOIN ".TABLE_PRODUCTS_DESCRIPTION." pd
                                            ON p.products_id = pd.products_id
                                               AND pd.language_id = '".(int)$_SESSION['languages_id']."'
                                               AND trim(pd.products_name) != ''
                                       JOIN ".TABLE_PRODUCTS_TO_CATEGORIES." p2c
                                            ON p2c.products_id = p.products_id
                                      WHERE (p.products_status = '1'".(($include_inactive === true) ? " OR p.products_status = '0'" : '').")
                                            ".PRODUCTS_CONDITIONS_P."
                                   GROUP BY p2c.categories_id");
      if (xtc_db_num_rows($categories_query, true)) {
        while ($categories = xtc_db_fetch_array($categories_query, true)) {
          $products_in_category_array[$active][$categories['categories_id']] = $categories['total'];
        }
      }
    }

    if (!isset($products_count_array[$active][$category_id])) {
      $products_count_array[$active][$category_id] = 0;
      $products_count_array[$active][$category_id] += ((isset($products_in_category_array[$active][$category_id])) ? $products_in_category_array[$active][$category_id] : 0);
    }

    return $products_count_array[$active][$category_id];
  }
?>