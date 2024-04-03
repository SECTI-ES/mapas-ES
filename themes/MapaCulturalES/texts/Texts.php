<?php

namespace MapasDaInovacao\Texts;

use MapasCulturais\App;

class Texts
{   
    function set($file, $type, $name){
        $app = App::i();
        $text = include ($file);

        if($type === 'components')
            $file_id = $name;
        else 
            $file_id = substr($type, 0, -1) . "($name)";

        foreach ($text as $key => $value){
            $complet_key = "text:$file_id.$key";
            $app->_config[$complet_key] = $value;
        }
    }

    function setTexts(){

        $files = glob(__DIR__ . '/*' . '/*.php');
        foreach($files as $file) {

            if (preg_match("#texts/([^/]+)/([^/]+).php#", $file, $matches)) {
                $this->set($file, $matches[1], $matches[2]);
            }
        }
    }
}