<?php
namespace MapaInovacaoES;

use MapasCulturais\i;
use MapasCulturais\app;

class Theme extends \MapasCulturais\Themes\BaseV2\Theme {

    // public $mode = 'light';
    
    static function getThemeFolder() {
        return __DIR__;
    }

    /*
    Esta função sobre-escreve o resovleFilename() da classe Theme para que seja possivel definir os arquivos de configuração das taxonomias em uma pasta dentro da pasta do tema (conf), sem ela, os arquivos precisarão estar 'soltos' dentro da pasta do tema.
    */
    function resolveFilename($folder, $file){
        if(!substr($folder, -1) !== '/') $folder .= '/';

        // arquivos da pasta /conf do tema
        if(file_exists($this->getThemeFolder() . '/conf' . $folder . $file)){
            return $this->getThemeFolder() . '/conf' . $folder . $file;
        }

        $path = $this->path->getArrayCopy();

        foreach($path as $dir){
            if(file_exists($dir . $folder . $file)){
                return $dir . $folder . $file;
            }
        }

        return null;
    }

    function _init() {
        parent::_init();

        $app = App::i();

        $app->hook('app.init:after', function () {
            foreach ($this->config['icons'] as $icon => $path) {
                $this->config['iconsUrl'][$icon] = $this->view->asset($path, false, true);
            //     // print_r($app->getHooks('asset(' . $path . '):url'));
            }
        });

    }
    /*
    Pré função para fazer a troca do modo do site (mode escuro/dark e claro/light), caso seja necessária no futuro.
    */
    // function switchMode($mode){

    //     $app = App::i();
    //     $this->mode = $mode;

    //     $app->config['logo.image'] = 'icon/' . $mode . '/logo.png';
    //     $app->config['share.image'] = 'icon/' . $mode . '/share.png';
    //     $app->config['share.image_twitter'] = 'icon/' . $mode . '/share.png';
    //     // nao identifiquei a key para o mail-image
        
    //     $app->config['favicon.180'] = 'icon/' . $mode . '/favicon-180x180.png';
    //     $app->config['favicon.svg'] = 'icon/' . $mode . '/favicon.svg';
    // }
}
