<?php

namespace ToolsforeverBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;

class ArtikelType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('productnaam')
            ->add('omschrijving')
            ->add('prijs')
            ->add('image')
//            ->add('klantid')
//            ->add('locatieid')
//            ->add('fabriekid')
            ->add('klant')
            ->add('locatie')
            ->add('fabriek')
            ->add('brochure', FileType::class, array('data_class' => null, 'label' => 'Brochure (PDF file)'));
    }
    
    /**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'ToolsforeverBundle\Entity\Artikel'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'toolsforeverbundle_artikel';
    }


}
