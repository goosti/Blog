<?php

namespace App\Form;

use App\Entity\Product;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\MoneyType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class ProductType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        $builder
            ->add('titre', TextType::class)
            ->add('description', TextareaType::class)
            ->add('prix', MoneyType::class, ['currency' => 'EUR'])
            ->add('stock', IntegerType::class)
            ->add('status', ChoiceType::class,[
                'label'=>'Disponibilité du produit',
                'choices'=> [
                    "Disponible"=>"available",
                    "Indisponible"=>"unavailable",
                    "Précommande"=>"preorder"
                ]
            ])
            ->add('imageName', FileType::class)
            ->add('acceptConditions', CheckboxType::class, [
                'label'=>'Vous acceptez les termes et conditions',
            ])
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Product::class,
        ]);
    }
}
