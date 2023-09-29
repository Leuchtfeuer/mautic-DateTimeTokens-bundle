<?php
/**
 * @copyright   2023 Mautic Contributors. All rights reserved
 * @author      Mautic
 *
 * @see        http://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

return [
    'name'          => 'Date & Time Tokens by Leuchtfeuer',
    'description'   => 'Provides various tokens that put the current date or time in your email or landing page (e.g. for the copyright year)',
    'version'       => '1.0',
    'author'        => 'Leuchtfeuer Digital Marketing GmbH',
    'services'      => [
        'events'    => [
            'mautic.custom_email_date_token' => [
                'class' => \MauticPlugin\LeuchtfeuerDateTimeTokensBundle\EventListener\EmailDateToken::class
            ],
            'mautic.custom_page_date_token' => [
                'class' => \MauticPlugin\LeuchtfeuerDateTimeTokensBundle\EventListener\PageDateToken::class
            ],
        ],
        'integrations' => [
            'mautic.integration.triggerdialog' => [
                'class'     => \MauticPlugin\LeuchtfeuerDateTimeTokensBundle\DateTimeTokensIntegration::class,
                'arguments' => [
                    'event_dispatcher',
                    'mautic.helper.cache_storage',
                    'doctrine.orm.entity_manager',
                    'session',
                    'request_stack',
                    'router',
                    'translator',
                    'logger',
                    'mautic.helper.encryption',
                    'mautic.lead.model.lead',
                    'mautic.lead.model.company',
                    'mautic.helper.paths',
                    'mautic.core.model.notification',
                    'mautic.lead.model.field',
                    'mautic.plugin.model.integration_entity',
                    'mautic.lead.model.dnc',
                ],
            ],
        ]
    ],
];