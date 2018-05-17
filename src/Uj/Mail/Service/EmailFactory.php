<?php
/**
 * Unjudder Mail Module on top of Zendframework 2
 *
 * @link http://github.com/unjudder/zf2-mail for the canonical source repository
 * @copyright Copyright (c) 2012 unjudder
 * @license http://unjudder.com/license/new-bsd New BSD License
 * @package Uj\Mail
 */
namespace Uj\Mail\Service;

use Interop\Container\ContainerInterface;
use Zend\ServiceManager\Factory\FactoryInterface;

/**
 * Uj\Mail email service factory.
 *
 * @since 1.0
 * @package Uj\Mail\Service
 */
class EmailFactory implements
    FactoryInterface
{
    public function __invoke(ContainerInterface $container, $requestedName, array $options = null)
    {
        return $this->createService($container);
    }

    /**
     * Create, configure and return the email transport.
     *
     * @see FactoryInterface::createService()
     * @return \Zend\Mail\Transport\TransportInterface
     */
    public function createService(ContainerInterface $container)
    {
        $transport = $container->get('Uj\Mail\Transport');
        $renderer  = $container->get('Uj\Mail\Renderer');

        return new Email($transport, $renderer);
    }
}
