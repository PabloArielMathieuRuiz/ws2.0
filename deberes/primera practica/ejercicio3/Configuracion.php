<?php

class Configuracion{

    public static $color;
    public static $newsletter;
    public static $entorno;



    /*

    estos getter y setter al estar las caracteristicas estaticas no son correctos
    */

    // getters

    function getColor(){

    return $this->color;
    }

    function getNewsletter(){

    return $this->newsletter;
    }

    function getEntorno(){

    return $this->entorno;
    }


    //setters 

    function setColor($color){

    return $this->color = $color;
    }

    function setNewsletter($newsletter){

    return $this->newsletter = $newsletter;
    }

    function setEntorno($entorno){

    return $this->entorno = $entorno;
    }


    // y estos serian los getter y setter correctos con caracteristicas estaticas

    public static function getColorStatic(){

    return self::$color;
    }

    public static function getNewsletterStatic(){

    return self::$newsletter;
    }

    public static function getEntornoStatic(){

    return self::$entorno;
    }

    public static function setColorStatic($color) {
        self::$color = $color;
    }

    public static function setNewsletterStatic($newsletter) {
        self::$newsletter = $newsletter;
    }

    public static function setEntornoStatic($entorno) {
        self::$entorno = $entorno;
    }


}   




