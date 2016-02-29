<?php

namespace AppBundle\DataFixtures\ORM;

use AppBundle\Entity\Comunidad;
use AppBundle\Entity\Equipo;
use AppBundle\Entity\Posicion;
use AppBundle\Entity\Usuario;
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
        $posiciones = $this->loadPosiciones($manager);
        $comunidad = $this->loadComunidades($manager);
        $this->loadUsers($manager, $comunidad, $posiciones);
    }

    /**
     * @param ObjectManager $manager
     *
     * @return Comunidad
     */
    private function loadComunidades(ObjectManager $manager)
    {
        $comunidad = new Comunidad();

        $comunidad
            ->setNombre('EL comuniazo')
            ->setPrivada(false)
            ->setPassword('1234');
        ;

        $manager->persist($comunidad);
        $manager->flush();

        return $comunidad;

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

        return [$delantero, $defensa, $centroCampista, $portero];

    }

    private function loadUsers(ObjectManager $manager, Comunidad $comunidad, $posiciones)
    {
        $encoder = $this
            ->container
            ->get('security.password_encoder');


        $i = 0;
        while($i < 15){
            $user = new Usuario();
            $user
                ->setNombre('usuario'.$i)
                ->setApellido1('apellido_usuario'.$i)
                ->setApellido1('apellido2_usuario'.$i)
                ->setEmail('usuario'.$i.'@futbol.com')

                ->setIsActive(true)
                ->setUsername('usuario'.$i)
                ->setPassword('usuario'.$i)
                ->setCreatedAt(new \DateTime('now'))
                ->setPosicion($posiciones[array_rand($posiciones)])
                ->setRoles(['ROLE_USER'])
            ;

            $hash = $encoder->encodePassword($user, $user->getPassword());

            $user->setPassword($hash);

            $comunidad->addUsuario($user);

            $manager->persist($user);

            $i++;
        }

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