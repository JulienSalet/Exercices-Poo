<?php

namespace Strings;

class Str
{
    private $string;

    //Création d'un nouvel objet Str en static
    public static function on($string)
    {
        return new Str($string);
    }

    //Remplacement d'un mot par un autre
    public function replace ($search, $replace)
    {
        $replaced = str_replace($search, $replace, $this->string);
        return new self($replaced);
    }

    //Met la première lettre des mots en majuscule
    public function ucwords()
    {
        $ucwords = ucwords($this->string);
        return new self($ucwords);
    }

    //Met toutes les lettres en minuscule
    public function lcwords()
    {
        $lcwords = mb_strtolower($this->string);
        return new self($lcwords);
    }

    //Met la première lettre des mots en minuscule
    public function lcfirst()
    {
        $lcfirst = lcfirst($this->string);
        return new self($lcfirst);
    }

    //Creation d'un element defini avant un autre element defini
    public function pregreplace($search, $replace)
    {
        $pregreplace = preg_replace($search, $replace, $this->string);
        return new self($pregreplace);
    }

    //Initiation de l'objet à la variable $string
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

    //Fonction camelCase
    public function camelCase()
    {
        if(strpos($this->string, ' ')==FALSE )
        {
            return $this->replace('_', ' ')->replace('-', ' ')->ucwords()->replace(' ','')->lcfirst();
        }
        return $this->replace('_', ' ')->replace('-', ' ')->lcwords()->ucwords()->replace(' ','')->lcfirst();
    }

    //Fonction snakeCase
    public function snakeCase()
    {
        if(strpos($this->string, ' ')==FALSE && strpos($this->string, '_')==FALSE && strpos($this->string, '-')==FALSE )
        {
            return $this->pregreplace('/(.)(?=[A-Z])/', '$1 ')->replace('_', ' ')->replace('-', ' ')->replace(' ','_')->lcwords();
        }
        return $this->replace('_', ' ')->replace('-', ' ')->replace(' ','_')->lcwords();
    }

    //Fonction slugcase
    public function slugcase()
    {
        if(strpos($this->string, ' ')==FALSE && strpos($this->string, '_')==FALSE && strpos($this->string, '-')==FALSE )
        {
            return $this->pregreplace('/(.)(?=[A-Z])/', '$1 ')->replace('_', ' ')->replace('-', ' ')->replace(' ','-')->lcwords();
        }
        return $this->replace('_', ' ')->replace('-', ' ')->replace(' ','-')->lcwords();
    }

    //Fonction studlycase
    public function studlycase()
    {
        if(strpos($this->string, ' ')==FALSE && strpos($this->string, '_')==FALSE && strpos($this->string, '-')==FALSE )
        {
            return $this->pregreplace('/(.)(?=[A-Z])/', '$1 ')->replace('_', ' ')->replace('-', ' ')->ucwords()->replace(' ','');
        }
        return $this->lcwords()->replace('_', ' ')->replace('-', ' ')->ucwords()->replace(' ','');
    }

    //Second nom de la fonction studlycase
    public function titleCase()
    {
        return $this->studlycase();
    }

    //Second nom de la fonction slugCase
    public function kebabCase()
    {
        return $this->slugcase();
    }

    public function __get($name)
    {
        $str = (string) $this->{$name}();
        return $str;
    }
}