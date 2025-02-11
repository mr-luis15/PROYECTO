<?php

function isNull($dato, $mensaje) {

    if ($dato == "") {
        return $mensaje;
    }

    return $dato;
}

?>