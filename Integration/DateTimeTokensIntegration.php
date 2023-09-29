<?php

namespace MauticPlugin\LeuchtfeuerDateTimeTokensBundle\Integration;

use Mautic\PluginBundle\Integration\AbstractIntegration;

class DateTimeTokensIntegration extends AbstractIntegration
{
    public const NAME         = 'DateTimeTokens';
    public const DISPLAY_NAME = 'Date & Time Tokens by Leuchtfeuer';

    public function getName(): string
    {
        return self::NAME;
    }

    public function getDisplayName(): string
    {
        return self::DISPLAY_NAME;
    }

    public function getAuthenticationType(): string
    {
        return 'none';
    }

    public function getIcon(): string
    {
        return 'plugins/LeuchtfeuerDateTimeTokensBundle/Assets/img/date-time-tokens.png';
    }
}
