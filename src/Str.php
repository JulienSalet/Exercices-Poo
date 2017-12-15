<?php

namespace Strings;

class Str
{
    private $string;

    //Fonction on qui crée un nouvel objet Str en static
    public static function on($string)
    {
        return new Str($string);
    }

    //Fonction qui remplace un mot par un autre
    public function replace ($search, $replace)
    {
        $this->string = str_replace($search, $replace, $this->string);
        return $this;
    }

    //Fonction qui met la première lettre des mots en majuscule
    public function ucwords()
    {
        $this->string = ucwords($this->string);
        return $this;
    }

    //Fonction qui met la première lettre des mots en minuscule
    public function lcwords()
    {
        $this->string = mb_strtolower($this->string);
        return $this;
    }

    //Fonction qui met la première lettre des mots en minuscule
    public function lcfirst()
    {
        $this->string = lcfirst($this->string);
        return $this;
    }

    //Fonction qui crée un espace avant les majuscules
    public function pregreplace()
    {
        $this->string = preg_replace('/(.)(?=[A-Z])/', '$1_', string);
        return $this;
    }

    //Fonction construct qui initie l'objet à la variable $string
    public function __construct($string)
    {
        $this->string = $string;
    }

    //Méthode magique qui transforme l'objet en string.
    public function __toString()
    {
        return $this->toString();
    }
    public function toString()
    {
        return $this->string;
    }

    //Fonction camelCase qui convertie une chaine de caractère en format camelCase
    public function camelCase ()
    {
        return $this->replace('_', ' ')->replace('-', ' ')->ucwords()->replace(' ','')->lcfirst();
    }

    public function snakeCase()
    {
        return $this->replace('_', ' ')->replace('-', ' ')->pregreplace()->replace(' ','_')->lcwords();
    }

}