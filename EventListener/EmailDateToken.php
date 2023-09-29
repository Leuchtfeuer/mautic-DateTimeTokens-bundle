<?php

/*
 * @copyright   Mautic, Inc. All rights reserved
 * @author      Mautic, Inc
 *
 * @link        https://mautic.org
 *
 * @license     GNU/GPLv3 http://www.gnu.org/licenses/gpl-3.0.html
 */

namespace MauticPlugin\LeuchtfeuerDateTimeTokensBundle\EventListener;

use Mautic\CoreBundle\Event\TokenReplacementEvent;
use Mautic\EmailBundle\EmailEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class EmailDateToken implements EventSubscriberInterface
{
    private $currentDateTime;

    public function __construct()
    {
        $this->currentDateTime = date("d-m-Y H:i:s");
    }

    public static function getSubscribedEvents()
    {
        return [
            EmailEvents::TOKEN_REPLACEMENT => [
                ['yearTokenPlaceholder', 0],
                ['dateTokenPlaceholder', 0],
                ['timeTokenPlaceholder', 0],
            ]
        ];
    }

    public function yearTokenPlaceholder(TokenReplacementEvent $event)
    {
        $year = date("Y", strtotime($this->currentDateTime));

        $event->addToken('{year}', $year);
    }

    public function dateTokenPlaceholder(TokenReplacementEvent $event)
    {
        $date = date("d-m-Y", strtotime($this->currentDateTime));

        $event->addToken('{date}', $date);
    }

    public function timeTokenPlaceholder(TokenReplacementEvent $event)
    {
        $time = date("H:i:s", strtotime($this->currentDateTime));

        $event->addToken('{time}', $time);
    }
}
