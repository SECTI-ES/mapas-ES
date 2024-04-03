<?php
use MapasCulturais\i;

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
        'restricted_terms' => array(
            i::__('1'),
           i::__('Outros')
        )
    ),

    3 => array(
        'slug' => 'linguagem',
        'description' => i::__('Linguagem'),
        'required' => i::__("Você deve informar ao menos uma linguagem"),
        'entities' => array(
            'MapasCulturais\Entities\Event'
        ),

        'restricted_terms' => array(
            i::__('2'),
            i::__('Outros')
        )
    ),
    4 => array(
        'slug' => 'funcao',
        'description' => i::__('Função'),
        'entities' => array(
            'MapasCulturais\Entities\Agent'
        ),
        'restricted_terms' => array(
            i::__("3")
        )
    )
);
