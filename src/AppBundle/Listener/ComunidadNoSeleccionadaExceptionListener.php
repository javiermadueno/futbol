<?php


namespace AppBundle\Listener;


use AppBundle\Exception\ComunidadNoSeleccionadaException;
use Symfony\Component\HttpKernel\Event\GetResponseForExceptionEvent;
use Symfony\Component\HttpKernel\HttpKernel;

class ComunidadNoSeleccionadaExceptionListener
{

    public function onComunidadNoSeleccionadaException(GetResponseForExceptionEvent $event)
    {
        $kernel = $event->getKernel();
        $exception = $event->getException();

        if(!$exception instanceof ComunidadNoSeleccionadaException) {
            return;
        }

        $kernel->handle($event->getRequest(), HttpKernel::SUB_REQUEST);
    }

}