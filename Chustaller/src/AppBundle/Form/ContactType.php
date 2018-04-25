<?php
# AppBundle/Form/ContactType.php

namespace AppBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;
use Symfony\Component\Validator\Constraints\Email;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;
use Symfony\Component\Validator\Constraints\Collection;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\NumberType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('nombre', TextType::class, array(
                'attr' => array(
                    'placeholder' => 'Dime tu nombre',
                    'class' => 'form-control'
                )
            ))
            ->add('email', EmailType::class, array(
                'attr' => array(
                    'placeholder' => 'Email para que pueda responderte',
                    'class' => 'form-control'
                )
            ))
            ->add('motivo', TextType::class, array(
                'attr' => array(
                    'placeholder' => 'El motivo de contactar conmigo',
                    'class' => 'form-control'
                )
            ))
            ->add('mensaje', TextareaType::class, array(
                'attr' => array(
                    'cols' => 100,
                    'rows' => 20,
                    'placeholder' => 'Mensaje que quieres enviarme',
                    'class' => 'form-control'
                )
            ))
            ->add('save', SubmitType::class, array('label' => 'contactar'));
    }

    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $collectionConstraint = new Collection(array(
            'nombre' => array(
                new NotBlank(array('message' => 'El nombre no puede estar vacío.')),
                new Length(array('min' => 3))
            ),
            'email' => array(
                new NotBlank(array('message' => 'El email no puede estar vacío.')),
                new Email(array('message' => 'Email inválido.'))
            ),
            'motivo' => array(
                new NotBlank(array('message' => 'El motivo no puede estar vacío.')),
                new Length(array('min' => 3))
            ),
            'mensaje' => array(
                new NotBlank(array('message' => 'El mensaje no puede estar vacío.')),
                new Length(array('min' => 5))
            )
        ));

        $resolver->setDefaults(array(
            'constraints' => $collectionConstraint
        ));
    }

    public function getName()
    {
        return 'contacto';
    }
}