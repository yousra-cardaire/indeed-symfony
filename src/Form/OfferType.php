<?php

namespace App\Form;

use App\Entity\Contract;
use App\Entity\ContractType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use App\Entity\Offer;
use Symfony\Component\Form\AbstractType;

use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class OfferType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add("title", TextType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add("description", TextareaType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('address', TextType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('postalCode', TextType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add('city', TextType::class, [
                "attr" => [
                    "class" => "form-control"
                ]
            ])
            ->add("contract", EntityType::class, [
                "class"         => Contract::class,
                "label"         => "Contract",
                "choice_label"  => "name",
                "multiple"      => false,
                "expanded"      => true,
            ])
            ->add("contractType", EntityType::class, [
                "class"         => ContractType::class,
                "label"         => "Contract type",
                "choice_label"  => "name",
                "multiple"      => false,
                "expanded"      => true,
            ])
            ->add("submit", SubmitType::class, [
                "attr" => [
                    "class" => "btn btn-primary"
                ]
            ]);
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Offer::class,
        ]);
    }
}
