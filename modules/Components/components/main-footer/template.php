<?php
/**
 * @var MapasCulturais\App $app
 * @var MapasCulturais\Themes\BaseV2\Theme $this
 */
use MapasCulturais\i;

$this->import('
    theme-logo
');
$config = $app->config['social-media'];
?>
<?php $this->applyTemplateHook("main-footer", "before")?>
<div v-if="globalState.visibleFooter" class="main-footer">
    <?php $this->applyTemplateHook("main-footer", "begin")?>
    <div class="main-footer__content">
        <?php $this->applyTemplateHook("main-footer-links", "before")?>
        <div class="main-footer__content--links">
            <?php $this->applyTemplateHook("main-footer-links", "begin")?>
    
            <ul class="main-footer__content--links-group">
                <li>
                    <a><?php i::_e("Acesse"); ?></a>
                </li>
                <li v-if="global.enabledEntities.opportunities">
                    <a href="<?= $app->createUrl('search', 'opportunities') ?>">
                        <mc-icon name="opportunity"></mc-icon> <?php i::_e('Editais e oportunidades'); ?>
                    </a>
                </li>
                <li v-if="global.enabledEntities.events">
                    <a href="<?= $app->createUrl('search', 'events') ?>">
                        <mc-icon name="event"></mc-icon> <?php i::_e('Eventos'); ?>
                    </a>
                </li>
                <li v-if="global.enabledEntities.agents">
                    <a href="<?= $app->createUrl('search', 'agents') ?>">
                        <mc-icon name="agent"></mc-icon> <?php i::_e('Agentes'); ?>
                    </a>
                </li>
                <li v-if="global.enabledEntities.spaces">
                    <a href="<?= $app->createUrl('search', 'spaces') ?>">
                        <mc-icon name="space"></mc-icon> <?php i::_e('Espaços'); ?>
                    </a>
                </li>
                <li v-if="global.enabledEntities.projects">
                    <a href="<?= $app->createUrl('search', 'projects') ?>">
                        <mc-icon name="project"></mc-icon> <?php i::_e('Projetos'); ?>
                    </a>
                </li>
            </ul>
    
            <ul class="main-footer__content--links-group">
                <li>
                    <a href="<?= $app->createUrl('panel', 'index') ?>"><?php i::_e('Painel'); ?></a>
                </li>
                <li v-if="global.enabledEntities.opportunities">
                    <a href="<?= $app->createUrl('panel', 'opportunities') ?>"><?php i::_e('Editais e oportunidades'); ?></a>
                </li>
                <li v-if="global.enabledEntities.events">
                    <a href="<?= $app->createUrl('panel', 'events') ?>"><?php i::_e('Meus eventos'); ?></a>
                </li>
                <li v-if="global.enabledEntities.agents">
                    <a href="<?= $app->createUrl('panel', 'agents') ?>"><?php i::_e('Meus agentes'); ?></a>
                </li>
                <li v-if="global.enabledEntities.spaces">
                    <a href="<?= $app->createUrl('panel', 'spaces') ?>"><?php i::_e('Meus espaços'); ?></a>
                </li>
                <?php if (!($app->user->is('guest'))) : ?>
                    <li>
                        <a href="<?= $app->createUrl('auth', 'logout') ?>"><?php i::_e('Sair')?></a>
                    </li>
                <?php endif; ?>
            </ul>
    
                <ul class="main-footer__content--links-group">
                    <li>
                        <a><?php i::_e('Ajuda e privacidade'); ?></a>
                    </li>
                    
                    <li>
                        <a href="<?= $app->createUrl('faq') ?>"><?php i::_e('Dúvidas frequentes'); ?></a>
                    </li>
                    
                <?php if (count($app->config['module.LGPD']) > 0): ?>
                    <?php foreach ($app->config['module.LGPD'] as $slug => $cfg) : ?>
                        <li>
                            <a href="<?= $app->createUrl('lgpd', 'view', [$slug]) ?>"><?= $cfg['title'] ?></a>
                        </li>
                    <?php endforeach ?>
                <?php endif; ?>
                </ul>
            <?php $this->applyTemplateHook("main-footer-links", "end")?>
        </div>
        <?php $this->applyTemplateHook("main-footer-links", "after")?>     

        <?php $this->applyTemplateHook("main-footer-logo", "before")?>
        <div class="main-footer__support">
            <?php $this->part('footer-support-message') ?>
        </div>
        <div class="main-footer__content--logos">
            <img class="site" src="<?php $this->asset($app->config['module.home']['home-footer-logo']) ?>" />

            <img class="mci" src="<?php $this->asset($app->config['module.home']['home-footer-mci']) ?>" />

            <img class="fapes" src="<?php $this->asset($app->config['module.home']['home-footer-fapes']) ?>" />

            <img class="secti" src="<?php $this->asset($app->config['module.home']['home-footer-secti']) ?>" />
        </div>
        <?php $this->applyTemplateHook("main-footer-logo", "after")?> 
    </div>
    <?php $this->applyTemplateHook("main-footer-reg", "before")?>
    <div class="main-footer__reg">
        <?php $this->applyTemplateHook("main-footer-reg", "begin")?>
        <div class="main-footer__reg-content">
            <p>
                <?php i::_e("plataforma criada pela comunidade") ?> 
                <span class="mapas"> <mc-icon name="map"></mc-icon><?php i::_e("mapas culturais"); ?> </span> 
                <?php i::_e("e desenvolvida por "); ?><strong>hacklab<span style="color: red">/</span></strong>
            </p>

            <a class="link" href="https://github.com/mapasculturais">
                <?php i::_e("Conheça o repositório") ?>
                <mc-icon name="github"></mc-icon>
            </a>
        </div>
        <?php $this->applyTemplateHook("main-footer-reg", "end")?>
    </div>
    <?php $this->applyTemplateHook("main-footer-reg", "after")?>  
    <?php $this->applyTemplateHook("main-footer", "end")?>
</div>
<?php $this->applyTemplateHook("main-footer", "after")?>