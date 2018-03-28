<?php

$setting = array_merge_recursive(
    include "view.config.php",
    include "zfm-datagrid.group.config.php",
    include "zfm-datagrid.role.config.php",
    include "zfm-datagrid.user.config.php"
);

return $setting;
