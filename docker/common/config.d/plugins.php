<?php

return [
    'plugins' => [
        'MultipleLocalAuth',
        'AdminLoginAsUser',
        'Analytics',
        'Accessibility',
        'SpamDetector',
        'ValuersManagement',
        'AccountConsolidator',

        'Metabase' => [
            'namespace' => 'Metabase',
            'config' => [
                'links' => [
                    'opportunities' => [
                        'title' => 'Painel sobre oportunidades',
                        'link' => 'http://localhost:3000/public/dashboard/0861199b-d48c-4715-b763-4ebc911668ba',
                        'text' => 'Tenha acesso ao número de oportunidades e  editais cadastrados, a quantidade de pessoas participantes inscritas, o perfil demográfico e mais informações.',
                    ],
                    'users' => [
                        'title' => 'Painel sobre usuários',
                        'link' => '',
                        'text' => 'Acesse e confira os dados gerais dos usuários da plataforma, como o total de pessoas cadastradas, atividades dos usuários e outras informações. ',

                    ],
                    'entities' => [
                        'title' => 'Painel geral das entidades ',
                        'link' => '',
                        'text' => 'Confira dados relacionados às entidades cadastradas na plataforma, como pessoas físicas e coletivos, oportunidades, espaços, eventos e projetos.',
                    ],
                    'agent1' => [
                        'title' => 'Painel sobre pessoas físicas',
                        'link' => '',
                        'text' => 'Saiba os números de pessoas físicas cadastrados, quantos são criados mensalmente, por onde estão distribuídos no território e outras informações.',
                    ],
                    'agent2' => [
                        'title' => 'Painel sobre pessoas jurídicas',
                        'link' => '',
                        'text' => 'Dados sobre a quantidade de  coletivos e instituições (com ou sem CNPJ) cadastrados, por onde se distribuem pelo estado e outras informações.',
                    ],

                    'spaces' => [
                        'title' => 'Painel sobre espaços',
                        'link' => '',
                        'text' => 'Conheça, entre outras informações, por onde os espaços estão distribuídos, a quantidade de espaços cadastros na plataforma, os tipos e as áreas de atuação.',
                    ],
                    'events' => [
                        'title' => 'Painel sobre eventos',
                        'link' => '',
                        'text' => 'Indicadores relacionados a quantidade de eventos cadastrados, às linguagens culturais e características, as datas de criação e também eventos agendados. ',
                    ],
                    'projects' => [
                        'title' => 'Painel sobre projetos',
                        'link' => '',
                        'text' => 'Tenha acesso ao número total de projetos cadastrados, projetos certificados, quantidade de projetos com subprojetos, os tipos e outros dados. ',
                    ],
                ],
                'cards' => [
                    [
                        'label' => 'Oportunidade',
                        'icon' => 'opportunity',
                        'iconClass' => 'opportunity__color',
                        'panelLink' => 'opportunities',
                        'data' => [
                            [
                                'label' => 'oportunidades criadas',
                                'entity' => 'MapasCulturais\\Entities\\Opportunity',
                                'query' => [],
                            ],
                            [
                                'label' => 'oportunidades certificadas',
                                'entity' => 'MapasCulturais\\Entities\\Opportunity',
                                'query' => [
                                    '@verified' => 1,
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => 'pessoas jurídicas',
                        'icon' => 'agent-2',
                        'iconClass' => 'agent__color',
                        'panelLink' => 'agent2',
                        'data' => [
                            [
                                'label' => 'coletivos cadastrados',
                                'entity' => 'MapasCulturais\\Entities\\Agent',
                                'query' => [
                                    'type' => 'EQ(2)',
                                ],
                            ],
                            [
                                'label' => 'coletivos certificados',
                                'entity' => 'MapasCulturais\\Entities\\Agent',
                                'query' => [
                                    'type' => 'EQ(2)',
                                    '@verified' => 1,
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => 'pessoas físicas',
                        'icon' => 'agent-1',
                        'iconClass' => 'agent__color',
                        'panelLink' => 'agent1',
                        'data' => [
                            [
                                'label' => 'pessoas físicas cadastrados',
                                'entity' => 'MapasCulturais\\Entities\\Agent',
                                'query' => [
                                    'type' => 'EQ(1)'
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => 'Espaços',
                        'icon' => 'space',
                        'iconClass' => 'space__color',
                        'panelLink' => 'spaces',
                        'data' => [
                            [
                                'label' => 'espaços cadastrados',
                                'entity' => 'MapasCulturais\\Entities\\Space',
                                'query' => [],
                            ],
                            [
                                'label' => 'espaços certificados',
                                'entity' => 'MapasCulturais\\Entities\\Space',
                                'query' => [
                                    '@verified' => 1
                                ],
                            ],
                        ],
                    ],
                    [
                        'label' => 'Projetos',
                        'icon' => 'project',
                        'iconClass' => 'project__color',
                        'panelLink' => 'projects',
                        'data' => [
                            [
                                'label' => 'projetos cadastrados',
                                'entity' => 'MapasCulturais\\Entities\\Project',
                                'query' => [],
                            ],
                        ],
                    ],
                    [
                        'label' => 'Eventos',
                        'icon' => 'event',
                        'iconClass' => 'event__color',
                        'panelLink' => 'events',
                        'data' => [
                            [
                                'label' => 'eventos cadastrados',
                                'entity' => 'MapasCulturais\\Entities\\Event',
                                'query' => [],
                            ],
                        ],
                    ],
                ],
            ]
        ],

        'SettingsES' => ['namespace' => 'SettingsES'],
        'Zammad' => [
           'namespace' => 'Zammad',
           'config' => [
               'enabled' => true,
	       'url' => env('ZAMMAD_URL', 'https://suporte.es.mapasculturais.com.br/assets/chat/chat.min.js'),
               'background' => '#8338EC'
            ]
        ],
        'MapasBlame' => [
            'namespace' => 'MapasBlame',
            'config' => [
                'request.logData.PATCH' => function ($data) {
                    return $data;
                },
            ]
        ],
    ]
];
