<?php

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

class ClienteType extends AbstractType
{
    /**
     * {@inheritdoc}
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('dni', TextType::class, array(
            'attr' => array(
                'placeholder' => 'dni',
                'class' => 'col-lg-6 form-group'
            )
        ))->add('nombre', TextType::class, array(
            'attr' => array(
                'placeholder' => 'Nombre',
                'class' => 'col-lg-6 form-group'
            )
        ))->add('primerApellido', TextType::class, array(
            'attr' => array(
                'placeholder' => 'Primer Apellido',
                'class' => 'col-lg-6 form-group'
            )
        ))->add('segundoApellido', TextType::class, array(
            'attr' => array(
                'placeholder' => 'Segundo Apellido',
                'class' => 'col-lg-6 form-group'
            )
        ))->add('telefono', NumberType::class, array(
            'attr' => array(
                'placeholder' => 'Teléfono',
                'class' => 'col-lg-6 form-group'
            )
        ))->add('calle', TextType::class, array(
            'attr' => array(
                'placeholder' => 'C/ Calle',
                'class' => 'col-lg-6 form-group'
            )
        ))->add('numero', NumberType::class, array(
            'attr' => array(
                'placeholder' => 'Nº',
                'class' => 'col-lg-6 form-group'
            )
        ))->add('piso', TextType::class, array(
            'attr' => array(
                'placeholder' => 'piso',
                'class' => 'col-lg-6 form-group'
            )
        ))->add('email', EmailType::class, array(
            'attr' => array(
                'placeholder' => 'email',
                'class' => 'col-lg-6 form-group'
            )
        ))->add('password', PasswordType::class, array(
            'attr' => array(
                'placeholder' => 'password',
                'class' => 'col-lg-6 form-group'
            )
        ))->add('poblacionpoblacion')
        ->add('Registrate', SubmitType::class, array( 'attr' => array(
            'label' => 'Registrate',
            'class' => 'btn update-btn form-control btn-login')
        ));
    }
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $collectionConstraint = new Collection(array(
            'dni' => array(
                new NotBlank(array('message' => 'El nombre no puede estar vacío.')),
                new Length(array('min' => 9))
            ),
            'nombre' => array(
                new NotBlank(array('message' => 'El nombre no puede estar vacío.')),
                new Length(array('min' => 3))
            ),
            'primerApellido' => array(
                new NotBlank(array('message' => 'El email no puede estar vacío.')),
                new Length(array('min' => 3))
            ),
            'segundoApellido' => array(
                new NotBlank(array('message' => 'El motivo no puede estar vacío.')),
                new Length(array('min' => 3))
            ),
            'telefono' => array(
                new NotBlank(array('message' => 'El mensaje no puede estar vacío.')),
                new Length(array('min' => 5))
            ),
            'calle' => array(
                new NotBlank(array('message' => 'El mensaje no puede estar vacío.')),
                new Length(array('min' => 5))
            ),
            'numero' => array(
                new NotBlank(array('message' => 'El mensaje no puede estar vacío.')),
                new Length(array('min' => 5))
            ),
            'piso' => array(
                new NotBlank(array('message' => 'El mensaje no puede estar vacío.')),
                new Length(array('min' => 5))
            ),
            'puerta' => array(
                new NotBlank(array('message' => 'El mensaje no puede estar vacío.')),
                new Length(array('min' => 5))
            ),
            'password' => array(
                new NotBlank(array('message' => 'El mensaje no puede estar vacío.')),
                new Length(array('min' => 5))
            )
        ));

        $resolver->setDefaults(array(
            'constraints' => $collectionConstraint
        ));
    }

    

    /**
     * {@inheritdoc}
     */
    public function getBlockPrefix()
    {
        return 'appbundle_cliente';
    }


}
