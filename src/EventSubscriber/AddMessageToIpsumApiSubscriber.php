<?php

namespace App\EventSubscriber;

use KnpU\LoremIpsumBundle\Event\FilterApiResponseEvent;
use KnpU\LoremIpsumBundle\Event\KnpULoremIsumEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;

class AddMessageToIpsumApiSubscriber implements EventSubscriberInterface
{

    public static function getSubscribedEvents()
    {
        return [
            KnpULoremIsumEvents::FILTER_API => 'onFilterApi'
        ];
    }

    public function onFilterApi(FilterApiResponseEvent $event)
    {
        $data = $event->getData();
        $data['message'] = 'Have a magical day!';
        $event->setData($data);
    }
}