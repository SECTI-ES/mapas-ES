<?php
use MapasCulturais\i;

$csvFileOcupacao = '/var/www/src/themes/MapaInovacaoES/conf/csv/ocupacao.csv'; 
$csvFileAreaDeAtuacao = '/var/www//src/themes/MapaInovacaoES/conf/csv/areadeatuacao.csv'; 
$restrictedTermsOcupacao = array();
$restrictedTermsAreaDeAtuacao = array();

if (($handle = fopen($csvFileOcupacao, "r")) !== false) {
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        $restrictedTermsOcupacao[] = i::__($data[1]);
    }

    fclose($handle);
}

if (($handle = fopen($csvFileAreaDeAtuacao, "r")) !== false) {
    while (($data = fgetcsv($handle, 1000, ",")) !== false) {
        if (i::__($data[2]) !== '') {
            $restrictedTermsAreaDeAtuacao[] = i::__($data[4]);
        }
    }

    fclose($handle);
}

return array(
    1 => array(
        'slug' => 'tag',
        'description' => i::__('Tag'),
        'entities' => array(
            'MapasCulturais\Entities\Space',
            'MapasCulturais\Entities\Agent',
            'MapasCulturais\Entities\Event',
            'MapasCulturais\Entities\Project',
            'MapasCulturais\Entities\Opportunity',
        )
    ),

    2 => array(
        'slug' => 'area',
        'description' => i::__('Área de Atuação'),
        'required' => i::__("Você deve informar ao menos uma área de atuação"),
        'entities' => array(
            'MapasCulturais\Entities\Space',
            'MapasCulturais\Entities\Agent',
            'MapasCulturais\Entities\Opportunity',
        ),
        'restricted_terms' => $restrictedTermsAreaDeAtuacao
    ),

    3 => array(
        // trocar slug por tipo
        'slug' => 'linguagem',
        'description' => i::__('Tipo'),
        'required' => i::__("Você deve informar ao menos um tipo"),
        'entities' => array(
            'MapasCulturais\Entities\Event'
        ),

        'restricted_terms' => array(
            i::__('Palestra, Debate ou Encontro'),
            i::__('Festival'),
            i::__('Encontro'),
            i::__('Reunião'),
            i::__('Convenção'),
            i::__('Exposição'),
            i::__('Exibição'),
            i::__('Feira'),
            i::__('Seminário'),
            i::__('Congresso'),
            i::__('Palestra'),
            i::__('Simpósio'),
            i::__('Fórum'),
            i::__('Jornada')
        )
    ),
    4 => array(
        'slug' => 'funcao',
        'description' => i::__('Função'),
        'entities' => array(
            'MapasCulturais\Entities\Agent'
        ),
        'restricted_terms' => $restrictedTermsOcupacao
    )
);
