<?php

namespace App\Form;

use App\Entity\User;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\PasswordType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Validator\Constraints\IsTrue;
use Symfony\Component\Validator\Constraints\Length;
use Symfony\Component\Validator\Constraints\NotBlank;

class RegistrationFormType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('pseudo',TextType::class,[
                'label' => 'Pseudo : ',
            ])
            ->add('prenom',TextType::class,[
            'label' => 'Prenom : ',
            ])
            ->add('nom',TextType::class, [
                'label' => 'Nom : ',
            ])
            ->add('tel',TextType::class, [
                'label' => 'Téléphone : ',
            ])
            ->add('dob',TextType::class, [
                'label' => 'Date de naissance : ',
            ])
            ->add('adresse',TextType::class, [
                'label' => 'Adresse :',
            ])
            ->add('ville',TextType::class, [
                'label' => 'Ville : ',
            ])
            ->add('cp',IntegerType::class, [
                'label' => 'Code postal : ',
            ])
            ->add('email',EmailType::class, [
                'label' => 'Adresse email : ',
            ])

            ->add('agreeTerms', CheckboxType::class, [
                'mapped' => false,
                'constraints' => [
                    new IsTrue([
                        'message' => 'Veuillez accepter les conditions générales.',
                    ]),
                ],
            ])
            ->add('plainPassword', PasswordType::class, [
                // instead of being set onto the object directly,
                // this is read and encoded in the controller
                'mapped' => false,
                'constraints' => [
                    new NotBlank([
                        'message' => 'Saisissez un mot de passe',
                    ]),
                    new Length([
                        'min' => 8,
                        'minMessage' => 'Votre mot de passe doit faire au minimum 8 caractères',
                        // max length allowed by Symfony for security reasons
                        'max' => 4096,
                    ]),
                ],
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => User::class,
        ]);
    }
}
