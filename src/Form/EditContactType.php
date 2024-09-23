<?php

namespace App\Form;

use App\Entity\Contact;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\EmailType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class EditContactType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        /** @var Contact $entity */
        $entity = $options['data'];

        $builder
            ->add('first_name', TextType::class)
            ->add('last_name', TextType::class)
            ->add('phone', TextType::class)
            ->add('email', EmailType::class)
            // todo: use replace
            ->setAction('/contact/' . $entity->getId() . '/edit')
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Contact::class,
        ]);
    }
}
