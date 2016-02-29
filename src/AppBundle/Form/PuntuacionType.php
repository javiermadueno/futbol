<?php

namespace AppBundle\Form;

use AppBundle\Entity\Partido;
use AppBundle\Entity\Usuario;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class PuntuacionType extends AbstractType
{
    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('goles')
            ->add('partidoGanado')
            ->add('partidoPerdido')
            ->add('partidoEmpatado')
            ->add('valoracion')
            ->add('createdAt', 'datetime')
            ->add('updatedAt', 'datetime')
            ->add('usuario', 'entity', [
                'class' => Usuario::class,
                'property' => 'username'
            ])
            ->add('partido', 'entity', [
                'class' => Partido::class,
                'property' => 'id'
            ])
        ;
    }
    
    /**
     * @param OptionsResolver $resolver
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Puntuacion'
        ));
    }
}
