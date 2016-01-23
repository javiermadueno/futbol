<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Equipo;
use AppBundle\Entity\Posicion;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Doctrine\Common\DataFixtures\FixtureInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

class LoadFixtures implements FixtureInterface, ContainerAwareInterface
{
    /**
     * @var ContainerInterface
     */
    private $container;

    public function load(ObjectManager $manager)
    {
        $this->loadPosiciones($manager);
        $this->loadEquipos($manager);
    }

    private function loadPosiciones(ObjectManager $manager)
    {
        $posiciones = [];

        $delantero =  new Posicion();
        $delantero
            ->setNombre("Delantero")
            ->setSiglas('DL')
            ->setPrioridad(1);

        $centroCampista = new Posicion();
        $centroCampista
            ->setNombre('MedioCampo')
            ->setSiglas('MC')
            ->setPrioridad(2);

        $defensa = new Posicion();
        $defensa
            ->setNombre('Defensa')
            ->setSiglas('DF')
            ->setPrioridad(3);

        $portero = new Posicion();
        $portero
            ->setNombre('Portero')
            ->setSiglas('PT')
            ->setPrioridad(4);


        $manager->persist($delantero);
        $manager->persist($defensa);
        $manager->persist($centroCampista);
        $manager->persist($portero);
        $manager->flush();

    }

    private function loadEquipos(ObjectManager $manager)
    {
        $equipo1 = new Equipo();
        $equipo1->setNombre('Equipo Rojo');
        $equipo1->setIsActive(true);
        $equipo1->setCreatedAt(new \DateTime('now'));

        $equipo2 = new Equipo();
        $equipo2->setNombre('Equipo Blanco');
        $equipo2->setIsActive(true);
        $equipo2->setCreatedAt(new \DateTime('now'));

        $manager->persist($equipo1);
        $manager->persist($equipo2);
        $manager->flush();
    }

    public function setContainer(ContainerInterface $container = null)
    {
        $this->container = $container;
    }
}