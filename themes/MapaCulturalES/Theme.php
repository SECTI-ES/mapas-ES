<?php
namespace MapaCulturalES;

use MapasCulturais\App;

require_once 'texts/Texts.php';
use MapasDaInovacao\Texts\Texts;

class Theme extends \MapasCulturais\Themes\BaseV2\Theme {

    public $mode = 'light';
    
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
        $texts = new Texts();

        // Forma de configurar todos os textos atrelados a função Theme->text();
        $texts->setTexts();

        // Manifest do five icon (NAO ESTA FUNCIONANDO)
        // $app->hook('GET(*.*)', function() use ($app) {
        //     /** @var \MapasCulturais\Controller $this */
        //     $this->json([
        //         'icons' => [
        //             [ 'src' => $app->view->asset('icon/' . $this->mode . '/favicon-180x180.png', false), 'type' => 'image/png', 'sizes' => '180x180' ],
        //             [ 'src' => $app->view->asset('icon/' . $this->mode . '/favicon-192x192.png', false), 'type' => 'image/png', 'sizes' => '192x192' ],
        //             [ 'src' => $app->view->asset('icon/' . $this->mode . '/favicon-512x512.png', false), 'type' => 'image/png', 'sizes' => '512x512' ]
        //         ],
        //     ]);
        // });

        $app->config['logo.image'] = 'icon/' . $this->mode . '/logo.png';
        $app->config['share.image'] = 'icon/' . $this->mode . '/share.png';
        $app->config['share.image_twitter'] = 'icon/' . $this->mode . '/share.png';
        // nao identifiquei a key para o mail-image
        
        $app->config['favicon.180'] = 'icon/' . $this->mode . '/favicon-180x180.png';
        $app->config['favicon.svg'] = 'icon/' . $this->mode . '/favicon.svg';
    }
}
