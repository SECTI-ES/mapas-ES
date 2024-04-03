<?php
use \MapasCulturais\i;

return [
    'app.siteName' => env('SITE_NAME', i::__('Mapas da Inovação')),
    'app.siteDescription' => env('SITE_DESCRIPTION', i::__('O Mapas de Inovações é uma plataforma livre para mapeamento de inovações e oportunidades.')),
    'logo.title' => env('TITLE', i::__('Mapas')),
    'logo.subtitle' => env('SUBTITLE', i::__('da Inovação'))
];