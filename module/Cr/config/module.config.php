<?php

$setting = array_merge_recursive(
include "controller.config.php",
include "route.config.php",
include "zfm-datagrid.imagen-orden.config.php"
);

return $setting;
