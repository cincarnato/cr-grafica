<?php

$setting = array_merge_recursive(
include "controller.config.php",
include "doctrine.config.php",
include "navigation.config.php",
include "route.config.php",
include "view.config.php",
include "zfm-datagrid.cantidad-precio.config.php",
include "zfm-datagrid.cliente.config.php",
include "zfm-datagrid.color.config.php",
include "zfm-datagrid.dibujo.config.php",
include "zfm-datagrid.formulario-cinta.config.php",
include "zfm-datagrid.imagen-orden.config.php"
);

return $setting;
