<?php


namespace AppBundle\Listener;


use AppBundle\Entity\Comunidad;
use AppBundle\Entity\Usuario;
use AppBundle\Services\ComunidadProvider;
use Symfony\Component\HttpKernel\Controller\ControllerResolverInterface;
use Symfony\Component\HttpKernel\Event\FilterControllerEvent;
use Symfony\Component\HttpKernel\Event\GetResponseEvent;
use Symfony\Component\HttpKernel\Log\LoggerInterface;
use Symfony\Component\Routing\RouterInterface;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\TokenInterface;

class ComunidadListener
{
    /**
     * @var TokenInterface
     */
    private $token;

    /**
     * @var ComunidadProvider
     */
    private $comunidadProvider;

    /**
     * @var ControllerResolverInterface
     */
    private $resolver;

    public function __construct(
        TokenStorageInterface $token,
        ComunidadProvider $comunidadProvider,
        ControllerResolverInterface $resolver,
        LoggerInterface $logger
    ) {
        $this->token = $token->getToken();
        $this->comunidadProvider = $comunidadProvider;
        $this->resolver = $resolver;
        $this->logger = $logger;
    }


    public function onKernelController(FilterControllerEvent $event)
    {
        if (!$event->isMasterRequest() || $event->getRequest()->attributes->get('_route') == 'comunidad_select') {
            return;
        }

        $user = $this->token ? $this->token->getUser() : null;

        if (!$user instanceof Usuario) {
            return;
        }

        $comunidad = $this->comunidadProvider->get();

        if (!$comunidad instanceof Comunidad) {
            $fakeRequest = $event->getRequest()->duplicate(null, null, array('_controller' => 'AppBundle:Comunidad:index'));
            $controller = $this->resolver->getController($fakeRequest);
            $event->setController($controller);
        }
    }

}