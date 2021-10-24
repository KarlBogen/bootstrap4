<?php
  /* --------------------------------------------------------------
   $Id: combine_files.inc.php 11518 2019-02-05 22:50:14Z GTB $

   modified eCommerce Shopsoftware
   http://www.modified-shop.org

   Copyright (c) 2009 - 2013 [www.modified-shop.org]

   Released under the GNU General Public License
   --------------------------------------------------------------*/

function combine_files($f_array,$f_min,$compress_css = false,$f_time = 0)
{
    $f_min_ts = is_writeable(DIR_FS_CATALOG.$f_min) ? filemtime(DIR_FS_CATALOG.$f_min) : false;
    $compress = false;
    foreach ($f_array as $f_plain) {
      if (filemtime(DIR_FS_CATALOG.$f_plain) > $f_min_ts) {
        $compress = true;
        break;
      }
    }
	// überprüfen, ob die config.php verändert wurde
	if ($compress == false && filemtime(DIR_FS_CATALOG.DIR_TMPL.'config/config.php') > $f_min_ts) $compress = true;;

    if ($f_min_ts && ($compress === true || filesize(DIR_FS_CATALOG.$f_min) == 0 || $f_time > $f_min_ts)) {
      require_once(DIR_TMPL.'source/external/compactor/compactor.php');
      $compactor = new BS4_Compactor(array('strip_php_comments' => true, 'compress_css' => $compress_css));
      foreach ($f_array as $f_plain) {

		// Änderung: der relative Pfad zu zusätzlichen Schriftdateien in bootstrap.min.css muss geändert werden
		// statt '../fonts/' muss es heißen 'fonts/'
		$bootstrap = strpos($f_plain, 'bootstrap.min.css');

        $compactor->add(DIR_FS_CATALOG.$f_plain, $bootstrap);
      }
      if ($compactor->save($f_min) === true) {
        $f_min_ts = is_writeable(DIR_FS_CATALOG.$f_min) ? filemtime(DIR_FS_CATALOG.$f_min) : false;
        $f_array = array($f_min.'?v='.$f_min_ts);
      }
    } elseif ($f_min_ts) {
      $f_array = array($f_min.'?v='.$f_min_ts);
    }
    
    return $f_array;
  
}