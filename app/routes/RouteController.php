<?php

class Route
{

    //Ruta de vista a controlador
    public static function user($file): String
    {
        return "../../controllers/usuarios/" . $file . ".php";
    }

    //Ruta para ir a autenticar usuairio
    public static function auth($file): String
    {
        return "../../controllers/autenticar/" . $file . ".php";
    }

    //Ruta para ir de los controladores a las vistas
    public static function view($view): void
    {
        header("Location: ../../views/pages/" . $view . ".php");
    }

    //Ruta de archivos publicos a vistas de App
    public static function app($view): String
    {
        return "../../app/views/pages/" . $view . ".php";
    }

    //Ruta de archivos publicos
    public static function url($view): String
    {
        return $view . ".php";
    }

    //Ruta para ir de las vistas de App a los archivos publicos
    public static function public($view): String
    {
        return "../../../public/pages/" . $view . ".php";
    }
}
