<?php
namespace MapaInovacaoES;

use MapasCulturais\i;
use MapasCulturais\app;

class Theme extends \MapasCulturais\Themes\BaseV2\Theme {

    // public $mode = 'light';
    
    static function getThemeFolder() {
        return __DIR__;
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

        $app->hook('template(<<*>>.main-header):after', function () {
            // if(true){    // Mostra barra de treinamento sempre
            if(getenv('APPMODE_TRAINING') === 'true'){
                echo '
                    <div class="modo-treinamento">
                        <h3>
                            TREINAMENTO
                        </h3>
                    </div>
                ';
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
