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

use Mautic\PageBundle\Event\PageDisplayEvent;
use Mautic\PageBundle\PageEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class PageDateToken implements EventSubscriberInterface
{
    private $currentDateTime;

    public function __construct()
    {
        $this->currentDateTime = date("d-m-Y H:i:s");
    }

    public static function getSubscribedEvents()
    {
        return [
            PageEvents::PAGE_ON_DISPLAY => [
                ['yearLpTokenPlaceholder', 0],
                ['dateLpTokenPlaceholder', 0],
                ['timeLpTokenPlaceholder', 0],
            ]
        ];
    }

    public function yearLpTokenPlaceholder(PageDisplayEvent $event)
    {
        $content = $event->getContent();
        $year = date("Y", strtotime($this->currentDateTime));
        $content = preg_replace('/\{year\}/i', $year, $content);
        $event->setContent($content);
    }

    public function dateLpTokenPlaceholder(PageDisplayEvent $event)
    {
        $date = date("d-m-Y", strtotime($this->currentDateTime));

        $content = $event->getContent();
        $content = preg_replace('/\{date\}/i', $date, $content);
        $event->setContent($content);
    }

    public function timeLpTokenPlaceholder(PageDisplayEvent $event)
    {
        $time = date("H:i:s", strtotime($this->currentDateTime));

        $content = $event->getContent();
        $content = preg_replace('/\{time\}/i', $time, $content);
        $event->setContent($content);
    }
}
