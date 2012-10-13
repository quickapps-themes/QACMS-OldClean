<?php
class InstallComponent extends Component {
	public $Installer;

	public function beforeInstall() {
		return true;
	}

	function afterInstall() {
		// add slider settings
        ClassRegistry::init('Module')->save(
            array(
                'Module' => array(
                    'name' => 'ThemeOldClean',
                    'settings' => array(
                        'slider_folder' => 'theme_old_clean_slider'
                    )
                )
            )
        );

        // create slider folder
        $this->Installer->rcopy(
            THEMES . 'OldClean' . DS . 'app' . DS . 'ThemeOldClean' . DS . 'webroot' . DS . 'files' . DS . 'theme_old_clean_slider_install', 
            ROOT . DS . 'webroot' . DS . 'files' . DS . 'theme_old_clean_slider' . DS
        );

        /**
		 * Create slider block widget
		 *
		 */
		$this->Installer->createBlock(
			array(
                'module' => 'ThemeOldClean',
                'delta' => 'slider',
                'status' => 1,
                'visibility' => 1,
                'pages' => '/',
                'title' => 'Slider',
                'settings' => array(
                    'slider_order' => "1_[language].jpg\n2_[language].jpg\n3_[language].jpg"
                )
            )
		, 'ThemeOldClean.slider');

        return true;
	}

	public function beforeUninstall() {
		return true;
	}

	public function afterUninstall() {
		return true;
	}
}