<?php

// include project configuration
include(SF_ROOT_DIR.DIRECTORY_SEPARATOR.'config'.DIRECTORY_SEPARATOR.'config.php');

// symfony bootstraping
require_once($sf_symfony_lib_dir.'/util/sfCore.class.php');
sfCore::bootstrap($sf_symfony_lib_dir, $sf_symfony_data_dir);

//sfPropelParanoidBehaviorPluginライブラリのための設定
sfPropelBehavior::registerHooks('paranoid', array(
  'Peer:addDoSelectRS' => array('sfPropelParanoidBehavior', 'doSelectRS'),
));


sfPropelBehavior::add('Cyber', array('paranoid'));
sfPropelBehavior::add('Film', array('paranoid'));
sfPropelBehavior::add('Press', array('paranoid'));
