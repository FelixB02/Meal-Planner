<?php

namespace App\Form;

use App\Entity\Meal;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\ChoiceType;
use Symfony\Component\Form\Extension\Core\Type\FileType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;

class MealType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {
        
        $builder
            ->add('name', null, array("attr" => ["class" => "form-control w-25", "placeholder" => "Write the Name of the Meal"]))
            ->add('picture', FileType::class, array("attr" => ["class" => "form-control w-25", "placeholder" => "Write the Name of the Event"]))
            ->add('category', ChoiceType::class, array("attr" => ["class" => "form-control w-25", "placeholder" => "Write the Name of the Event"], 'choices' =>[
                '' => null,
                'Vegie' => "Vegie",
                'Vegan' => "Vegan",
                'Meat' => "Meat",
                'Healthy' => "Healthy"
                ]))
            ->add('calories', null, array("attr" => ["class" => "form-control w-25", "placeholder" => "Write the Name of the Event"]))
            ->add('rating', null, array("attr" => ["class" => "form-control w-25", "placeholder" => "Write the Name of the Event"]))
            ->add('preparation', TextareaType::class, array("attr" => ["class" => "form-control w-25", "placeholder" => "Write the Name of the Event"]))
            ->add('cooking_time', null, array("attr" => ["class" => "form-control w-25", "placeholder" => "Write the Name of the Event"]))
        ;
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            'data_class' => Meal::class,
        ]);
    }
}
