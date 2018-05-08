<?php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

class ArticulosType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('nombre', TextType::class, array('attr'=>array('class'=>'form-control')))
        ->add('descripcion', TextAreaType::class, array('attr'=>array('class'=>'form-control')))
        ->add('marca', TextType::class, array('attr'=>array('class'=>'form-control')))
        ->add('modelo', TextType::class, array('attr'=>array('class'=>'form-control')))
        ->add('cilindrada', TextType::class, array('attr'=>array('class'=>'form-control')))
        ->add('cantidad', NumberType::class, array('attr'=>array('class'=>'form-control')))
        ->add('imagen', FileType::class, array('data_class'=>null,'required'=>false, 'attr'=> array(
            'class'=>'form-control form-name'
        )))
        ->add('precio', NumberType::class, array('attr'=>array('class'=>'form-control')))
        ->add('categoria')
        ->add('combustibleNombre');
    }/**
     * {@inheritdoc}
     */
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults(array(
            'data_class' => 'AppBundle\Entity\Articulos'
        ));
    }

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_articulos';
    }


}
