<?php

$setting = array_merge_recursive(
include "controller.config.php",
include "route.config.php"
);

return $setting;
