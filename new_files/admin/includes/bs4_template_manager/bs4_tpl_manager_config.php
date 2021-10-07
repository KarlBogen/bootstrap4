<?php
/* ------------------------------------------------------------
	Module "Bootstrap 4 Template-Manager" made by Karl

	modified eCommerce Shopsoftware
	http://www.modified-shop.org

	Released under the GNU General Public License
-------------------------------------------------------------- */

defined( '_VALID_XTC' ) or die( 'Direct Access to this location is not allowed.' );

	// Leafo scssphp
	require_once "scssphp/scss.inc.php";
	require_once "scssphp/server/Server.php";
	use ScssPhp\ScssPhp\Compiler;
    use ScssPhp\ScssPhp\OutputStyle;
	use ScssPhp\Server\Server;

class Bs4TplManager {

	// call compiler
    public function compileTheme($theme) {
		$this->compile($theme);
    }

	// Sass-Compiler create the file includes/bs4_template_manager/css/bootstrap.min.css
    protected function compile($theme) {
		global $messageStack;

		try {
			$scss = new Compiler();
			$scss->setOutputStyle(OutputStyle::COMPRESSED);

			$server = new Server('includes/bs4_template_manager/themes', null, $scss);

			$server->compileFile('includes/bs4_template_manager/themes/' . $theme . '/custom.scss', 'includes/bs4_template_manager/css/bootstrap.min.css');

			$messageStack->add(BOOTSTRAP_CSS_COMPILED, 'success');
		} catch (Exception $e) {
			$messageStack->add(BS4_TPL_MANAGER_THEME_ERROR.$e->getMessage(), 'error');
		}
    }

	// call copy_theme
    public function copy2template($path, $action = 'update')
    {
		$this->copy_theme($path, $action);
    }

	// copy bootstrap.min.css and fonts to template
    protected function copy_theme($path, $action) {
		global $messageStack;

		$tpl_path = DIR_FS_CATALOG.'templates/'.$path.'/';
		$admincss_path = 'css/admindemo/bootstrap.min';
		$css_path = 'css/bootstrap/bootstrap.min';
		$admincss_file = $tpl_path.$admincss_path;
		$css_file = $tpl_path.$css_path;
//		$font_path = 'css/fonts/';

		// if template path exists
		if (!file_exists($tpl_path) || $path == '') {
			$messageStack->add(BS4_TPL_MANAGER_THEME_TPL_PATH_NOT_EXISTS, 'error');
			return false;
		}
		// seit Version 2.0.5.0 Vorschau Datei im Templateordner
		// rename bootstrap.min.css to bootstrap.min.bak
		if (@rename($admincss_file.'.css', $admincss_file.'.bak')) {
			$messageStack->add(sprintf(BS4_TPL_MANAGER_THEME_TPL_CSS_FILE_RENAMED, $admincss_file.'.css', $admincss_file.'.bak'), 'success');
		} else {
            $messageStack->add(sprintf(BS4_TPL_MANAGER_THEME_TPL_CSS_FILE_NOT_RENAMED, $admincss_file.'.css'), 'error');
			return false;
		}
		// copy bootstrap.min.css to template
		if (@copy(dirname(__FILE__).'/css/bootstrap.min.css', $admincss_file.'.css')) {
			$messageStack->add(sprintf(BS4_TPL_MANAGER_THEME_TPL_FILE_COPIED, dirname(__FILE__).'/css/bootstrap.min.css', $admincss_file.'.css'), 'success');
		} else {
			@rename($admincss_file.'bak', $admincss_file.'css');
            $messageStack->add(sprintf(BS4_TPL_MANAGER_THEME_TPL_FILE_NOT_COPIED, dirname(__FILE__).'/css/bootstrap.min.css', $admincss_file.'bak', $admincss_file.'.css'), 'error');
			return false;
		}

		if ($action == 'copy') {
			// if template file bootstrap.min.css exists
			if (!file_exists($css_file.'.css')) {
				$messageStack->add(sprintf(BS4_TPL_MANAGER_THEME_TPL_CSS_FILE_NOT_EXISTS, $css_file.'.css'), 'error');
				return false;
			}
			// rename bootstrap.min.css to bootstrap.min.bak
			$time = date("Y-m-d")."-".time();
			if (@rename($css_file.'.css', $css_file.'_'.$time.'.bak')) {
				$messageStack->add(sprintf(BS4_TPL_MANAGER_THEME_TPL_CSS_FILE_RENAMED, $css_file.'.css', $css_file.'_'.$time.'.bak'), 'success');
			} else {
	            $messageStack->add(sprintf(BS4_TPL_MANAGER_THEME_TPL_CSS_FILE_NOT_RENAMED, $css_file.'.css'), 'error');
				return false;
			}
			// copy bootstrap.min.css to template
			if (@copy($admincss_file.'.css', $css_file.'.css')) {
				$messageStack->add(sprintf(BS4_TPL_MANAGER_THEME_TPL_FILE_COPIED, $admincss_file.'.css', $css_file.'.css'), 'success');
			} else {
				@rename($css_file.'_'.$time.'.bak', $css_file.'css');
	            $messageStack->add(sprintf(BS4_TPL_MANAGER_THEME_TPL_FILE_NOT_COPIED, dirname(__FILE__).'/css/bootstrap.min.css', $css_file.'bak', $css_file.'.css'), 'error');
				return false;
			}
/*			// if template folder fonts exists
			if(!is_dir($tpl_path.$font_path)){
				 mkdir($tpl_path.$font_path);
			}
			// copy font files to template
			$allowed_extensions = array('eot', 'woff2', 'woff', 'ttf', 'svg');
			$files = glob(dirname(__FILE__).'/fonts/' . "*");
			foreach($files as $file){
				$fileinfo = pathinfo($file);
				if(in_array($fileinfo['extension'], $allowed_extensions)) {
					if (@copy($file, $tpl_path.$font_path.$fileinfo['basename'])) {
						$messageStack->add(sprintf(BS4_TPL_MANAGER_THEME_TPL_FILE_COPIED, $file, $tpl_path.$font_path.$fileinfo['basename']), 'success');
					} else {
			            $messageStack->add(sprintf(BS4_TPL_MANAGER_THEME_TPL_FONT_FILE_NOT_COPIED, $file, $tpl_path.$font_path), 'error');
					}
				}
			}
*/
			$messageStack->add(BS4_TPL_MANAGER_THEME_COPY_COMPLIED, 'success');
		}
    }

	// load configuration
    public function get_conf() {
		$conf_query = xtc_db_query('select config_key, config_value from ' . TABLE_BS4_TPL_MANAGER_CONFIG . '');
		while ($conf = xtc_db_fetch_array($conf_query)) {
			$bs4_conf[$conf['config_key']] = stripslashes($conf['config_value']);
		}
		return $bs4_conf;
    }

	// save configuration
	public function set_conf($config_data) {
		foreach ($config_data as $key => $value) {
			xtc_db_query("UPDATE ".TABLE_BS4_TPL_MANAGER_CONFIG." SET config_value = '".$value."' WHERE config_key = '".$key."'");
		}
		if (COMPRESS_STYLESHEET == 'true' || COMPRESS_JAVASCRIPT == 'true'){
			$this->touch_config_php();
		}
	}

	// touch template config.php, if settings changed and compress is true
	protected function touch_config_php() {
		$tpl_config_file = DIR_FS_CATALOG.'templates/'.BS4_CURRENT_TEMPLATE.'/config/config.php';

		if (file_exists($tpl_config_file)) {
			touch($tpl_config_file);
		}
	}

	// load defaults - custom1 and custom2 together
    public function get_theme_settings() {
		$theme_query = xtc_db_query("select theme_key, defaults from " . TABLE_BS4_TPL_MANAGER_THEME . "");
		while ($defaults = xtc_db_fetch_array($theme_query)) {
			$theme_settings[$defaults['theme_key']] = array	(	'defaults' => json_decode($defaults['defaults'], true),
                                  							);
		}
		return $theme_settings;
    }

	// save defaults - custom1 und custom2 separated
    public function set_theme_settings($theme_key, $theme_defaults) {
        $value = array();
		for($i=0; $i < count($theme_defaults[$theme_key]); $i++){
			foreach ($theme_defaults[$theme_key][$i] as $k => $v){
				$value[] = $v;
			}
		}
		xtc_db_query("UPDATE ".TABLE_BS4_TPL_MANAGER_THEME." SET defaults = '".json_encode($value, true)."' WHERE theme_key = '".$theme_key."'");
    }

	// execute the copy of _bootswatch.scss folder custom1 or custom2
    public function copyBootswatch($theme_name, $folder_name = '') {
		// copy _bootswatch.scss
		if ($folder_name != ''){
			$this->copyBootswatchFile($theme_name, $folder_name);
		}
		return;
    }

	// copy file
    protected function copyBootswatchFile($theme_name, $folder_name)
    {
		global $messageStack;

		$file = dirname(__FILE__).'/themes/'.$theme_name.'/_bootswatch.scss';
		$copy = dirname(__FILE__).'/themes/'.$folder_name.'/_bootswatch.scss';
        // check if the data is a file
        if (file_exists($file) && is_file($file)) {
			if (@copy($file, $copy)) {
				$messageStack->add(sprintf(BS4_TPL_MANAGER_THEME_TPL_FILE_COPIED, $file, $copy), 'success');
			} else {
	            $messageStack->add(sprintf(BS4_TPL_MANAGER_THEME_TPL_FILE_COPIED, $file, $copy), 'error');
				return false;
			}
        } else {
            $messageStack->add(sprintf(BS4_TPL_MANAGER_THEME_TPL_CSS_FILE_NOT_EXISTS, $file), 'error');
			return false;
		}
    }

	// load colors and variables - custom1 and custom2 separated
    public function get_theme($theme_name, $return_name ='') {
		$bs4_theme = array();
		// load _variables.scss from the corresponding folder
		$var_string = $this->load($theme_name);
		$var_string = str_replace(' !default', '', $var_string);
		// aufbereiten der Daten
		if ($var_string != ''){
			$variables = explode(';', trim(trim($var_string), ';'));
            for($i=0; $i < count($variables); $i++){
				$variable = explode(':', $variables[$i]);
				$bs4_theme[$return_name][$i] = array(trim($variable[0]) => trim($variable[1]));
			}
		}
		return $bs4_theme;
    }

	// load file
    protected function load($theme_name, $file_name = 'variables')
    {
		$file = dirname(__FILE__).'/themes/'.$theme_name.'/_'.$file_name.'.scss';
        // check if the data is a file
        if (file_exists($file) && is_file($file)) {
            if (($data = file_get_contents($file)) !== false) {
				return $data;
            }
        }
		return false;
    }

	// Prepare / save colors and variables - custom1 und custom2 separated
    public function set_theme($theme_data) {
		$data = '';
		foreach ($theme_data as $key => $val){
			$folder = $key;
            for($i=0; $i < count($theme_data[$key]); $i++){
				foreach ($theme_data[$key][$i] as $k => $v){
					$data .= $k.': '.$v.' !default;'."\n";
				}
			}
			$this->write($folder, $data);
			$data = '';
		}
    }

	// write file scss
    protected function write($folder, $data, $file = 'variables')
    {
		$file = dirname(__FILE__).'/themes/'.$folder.'/_'.$file.'.scss';
		if (($data = file_put_contents($file, $data)) !== false) {
				return true;
        }
		return false;
    }

	// load file
    public function get_add($theme_name, $file = 'add')
    {
		$file_name = dirname(__FILE__).'/themes/'.$theme_name.'/_'.$file.'.scss';
		if (filesize($file_name) > 0){
			$data = $this->load($theme_name, $file);
			return $data;
		}
		return false;
    }

	// write file scss
    public function set_add($theme_name, $data, $file = 'add')
    {
		if ($file == 'addfontdef'){
			if ($data != ''){
				$data = sprintf(BS4_DEFAULT_FONT_FAMILY ,$data);
			}
		}
		$this->write($theme_name, stripcslashes($data), $file);
    }

    public function get_yes_no() {
		$yes_no_array = array('true', 'false');
		return $yes_no_array;
    }

    public function get_superfish_level() {
		$superfish_level = array(
			array('id' => 'false', 'text' => TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_ALL),
			array('id' => '1', 'text' => TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_1),
			array('id' => '2', 'text' => TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_2),
			array('id' => '3', 'text' => TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_3),
			array('id' => '4', 'text' => TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_4),
			array('id' => '5', 'text' => TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_5),
			array('id' => '6', 'text' => TEXT_BS4_TPL_MANAGER_CONFIG_SUPERFISH_MAXLEVEL_6),
		);
		return $superfish_level;
    }

    public function get_carousel_show() {
		$carousel_show = array(
			array('id' => 'false', 'text' => TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_SHOW_NONE),
			array('id' => 'screen', 'text' => TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_SHOW_SCREEN),
			array('id' => 'shop', 'text' => TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_SHOW_SHOP),
			array('id' => 'column', 'text' => TEXT_BS4_TPL_MANAGER_CONFIG_CAROUSEL_SHOW_COLUMN),
		);
		return $carousel_show;
    }

	public function get_fade_slide() {
		$fade_slide = array(
			array('id' => 'true', 'text' => 'fade'),
			array('id' => 'false', 'text' => 'slide'),
		);
		return $fade_slide;
    }

    public function get_bg_classes() {
		$bg_classes = array(
			array('id' => 'none', 'text' => TEXT_BS4_TPL_MANAGER_CONFIG_NONE),
			array('id' => 'primary', 'text' => 'bg-primary'),
			array('id' => 'secondary', 'text' => 'bg-secondary'),
			array('id' => 'success', 'text' => 'bg-success'),
			array('id' => 'danger', 'text' => 'bg-danger'),
			array('id' => 'warning', 'text' => 'bg-warning'),
			array('id' => 'info', 'text' => 'bg-info'),
			array('id' => 'light', 'text' => 'bg-light'),
			array('id' => 'dark', 'text' => 'bg-dark'),
			array('id' => 'white', 'text' => 'bg-white'),
			array('id' => 'transparent', 'text' => 'bg-transparent'),
			array('id' => 'custom', 'text' => 'bg-custom'),
		);
		return $bg_classes;
    }

    public function get_navbar_classes() {
		$navbar_classes = array(
			array('id' => '', 'text' => TEXT_BS4_TPL_MANAGER_CONFIG_NONE),
			array('id' => 'navbar-dark', 'text' => 'navbar-dark'),
			array('id' => 'navbar-light', 'text' => 'navbar-light'),
		);
		return $navbar_classes;
    }

    public function get_text_classes() {
		$text_classes = array(
			array('id' => '', 'text' => TEXT_BS4_TPL_MANAGER_CONFIG_NONE),
			array('id' => 'text-primary', 'text' => 'text-primary'),
			array('id' => 'text-secondary', 'text' => 'text-secondary'),
			array('id' => 'text-success', 'text' => 'text-success'),
			array('id' => 'text-danger', 'text' => 'text-danger'),
			array('id' => 'text-warning', 'text' => 'text-warning'),
			array('id' => 'text-info', 'text' => 'text-info'),
			array('id' => 'text-light', 'text' => 'text-light'),
			array('id' => 'text-dark', 'text' => 'text-dark'),
			array('id' => 'text-body', 'text' => 'text-body'),
			array('id' => 'text-muted', 'text' => 'text-muted'),
			array('id' => 'text-white', 'text' => 'text-white'),
			array('id' => 'text-black-50', 'text' => 'text-black-50'),
			array('id' => 'text-white-50', 'text' => 'text-white-50'),
			array('id' => 'text-custom', 'text' => 'text-custom'),
		);
		return $text_classes;
    }

	public function get_templates() {
		if ($dir = opendir(DIR_FS_CATALOG.'templates/')) {
			$templates_array[] = array ('id' => '', 'text' => TEXT_BS4_TPL_MANAGER_THEME_CURRENT_TEMPLATE0);
			while (($templates = readdir($dir)) !== false) {
				if (is_dir(DIR_FS_CATALOG.'templates/'.$templates) && ($templates != "CVS") && substr($templates, 0, 1) != ".") {
					$templates_array[] = array ('id' => $templates, 'text' => $templates);
				}
			}
			closedir($dir);
			sort($templates_array);
			return $templates_array;
		}
	}

    public function get_themes($plus = false) {
		$themes_array = array(
			array('id' => 'default', 'text' => 'Bootstrap Default'),
			array('id' => 'cerulean', 'text' => 'Cerulean'),
			array('id' => 'cosmo', 'text' => 'Cosmo'),
			array('id' => 'cyborg', 'text' => 'Cyborg'),
			array('id' => 'darkly', 'text' => 'Darkly'),
			array('id' => 'flatly', 'text' => 'Flatly'),
			array('id' => 'journal', 'text' => 'Journal'),
			array('id' => 'litera', 'text' => 'Litera'),
			array('id' => 'lumen', 'text' => 'Lumen'),
			array('id' => 'lux', 'text' => 'Lux'),
			array('id' => 'materia', 'text' => 'Materia'),
			array('id' => 'minty', 'text' => 'Minty'),
			array('id' => 'pulse', 'text' => 'Pulse'),
			array('id' => 'sandstone', 'text' => 'Sandstone'),
			array('id' => 'simplex', 'text' => 'Simplex'),
			array('id' => 'sketchy', 'text' => 'Sketchy'),
			array('id' => 'slate', 'text' => 'Slate'),
			array('id' => 'solar', 'text' => 'Solar'),
			array('id' => 'spacelab', 'text' => 'Spacelab'),
			array('id' => 'superhero', 'text' => 'Superhero'),
			array('id' => 'united', 'text' => 'United'),
			array('id' => 'yeti', 'text' => 'Yeti'),
		);
		if ($plus != false) {
			$themes_array[] = array('id' => 'custom1', 'text' => TEXT_BS4_TPL_MANAGER_THEME_CUSTOM1);
			$themes_array[] = array('id' => 'custom2', 'text' => TEXT_BS4_TPL_MANAGER_THEME_CUSTOM2);
		}
		return $themes_array;
    }

	public function get_color_vars($plus = false) {
		$color_vars = array(
			array('id' => '$white', 'text' => '$white '.COLOR_0),
			array('id' => '$gray-100', 'text' => '$gray-100 '.COLOR_1),
			array('id' => '$gray-200', 'text' => '$gray-200 '.COLOR_2),
			array('id' => '$gray-300', 'text' => '$gray-300 '.COLOR_3),
			array('id' => '$gray-400', 'text' => '$gray-400 '.COLOR_4),
			array('id' => '$gray-500', 'text' => '$gray-500 '.COLOR_5),
			array('id' => '$gray-600', 'text' => '$gray-600 '.COLOR_6),
			array('id' => '$gray-700', 'text' => '$gray-700 '.COLOR_7),
			array('id' => '$gray-800', 'text' => '$gray-800 '.COLOR_8),
			array('id' => '$gray-900', 'text' => '$gray-900 '.COLOR_9),
			array('id' => '$black', 'text' => '$black '.COLOR_10),
			array('id' => '$blue', 'text' => '$blue '.COLOR_11),
			array('id' => '$indigo', 'text' => '$indigo '.COLOR_12),
			array('id' => '$purple', 'text' => '$purple '.COLOR_13),
			array('id' => '$pink', 'text' => '$pink '.COLOR_14),
			array('id' => '$red', 'text' => '$red '.COLOR_15),
			array('id' => '$orange', 'text' => '$orange '.COLOR_16),
			array('id' => '$yellow', 'text' => '$yellow '.COLOR_17),
			array('id' => '$green', 'text' => '$green '.COLOR_18),
			array('id' => '$teal', 'text' => '$teal '.COLOR_19),
			array('id' => '$cyan', 'text' => '$cyan '.COLOR_20),
		);
		if ($plus != false) {
			$color_vars[] = array('id' => 'inherit', 'text' => 'inherit '.INHERIT);
		}
		return $color_vars;
	}

    public function get_color_classes() {
		$color_classes = array(
			array('id' => '$primary', 'text' => '$primary'),
			array('id' => '$secondary', 'text' => '$secondary'),
			array('id' => '$success', 'text' => '$success'),
			array('id' => '$danger', 'text' => '$danger'),
			array('id' => '$warning', 'text' => '$warning'),
			array('id' => '$info', 'text' => '$info'),
			array('id' => '$light', 'text' => '$light'),
			array('id' => '$dark', 'text' => '$dark'),
		);
		$color_vars = $this->get_color_vars();
		$color_classes = array_merge($color_classes, $color_vars);
		return $color_classes;
    }

}
?>