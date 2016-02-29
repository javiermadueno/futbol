<?php

namespace AppBundle\Form;

use AppBundle\Repository\UsuarioRepository;
use AppBundle\Services\ComunidadProvider;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use AppBundle\Entity\Usuario;

class JugadorType extends AbstractType
{
    /**
     * @param ComunidadProvider $comunidadProvider
     */
    public function __construct(ComunidadProvider $comunidadProvider)
    {
        $this->comunidadProvider = $comunidadProvider;
    }

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $comunidad = $this->comunidadProvider->get();

        $builder
            ->add('usuario', EntityType::class, [
                'class' => Usuario::class,
                'choice_label' => 'username',
                'query_builder' => function(UsuarioRepository $er) use ($comunidad) {
                    return $er
                        ->createQueryBuilder('u')
                        ->join('u.comunidades', 'comunidad')
                        ->where('comunidad.id = :comunidad')
                        ->setParameter('comunidad', $comunidad->getId())
                        ;
                }
            ])
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Jugador'
        ));
    }

    public function getName()
    {
        return 'jugador';
    }

}
