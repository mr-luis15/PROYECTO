<?php

function nivelRequerido($nivel) {

    if($_SESSION['usuario']['nivel'] != $nivel) {
        header("Location: ../../views/pages/login.php");
    }
}

function setTitle($titulo) {

    global $title;
    $title = $titulo;

}

?>