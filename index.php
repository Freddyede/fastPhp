<?php

use Core\Abstract\AbstractController;
use Core\Modules\ObjectRelationMappingModules;

include_once __DIR__ . '/bin/init/databases.php';
const INIT_DIRECTORY = __DIR__;
const PATH_AUTOLOADER = INIT_DIRECTORY . '/autoload.php';
const PATH_INIT = INIT_DIRECTORY . '/templates/headers/init/index.php';
const ABSTRACT_CONTROLLER = new AbstractController();

/**
 * MODULES
 */

const OBJECT_RELATION_MAPPING_MODULES = new ObjectRelationMappingModules();