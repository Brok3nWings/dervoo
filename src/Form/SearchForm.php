<?php
 
namespace App\Form;
 
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SearchType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
 
class SearchForm extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {       
        $builder->add('keyword', SearchType::class, [
            'label' => false,
            'required' => false,
            'attr' => [
                'autofocus' => 'autofocus',
                'placeholder' => 'Une recette, un magasin...'
               ]
            ],
        )
        ->add('city', SearchType::class, [
            'label' => false,
            'required' => false,
            'attr' => [
                'placeholder' => 'Dans quelle ville ?'
               ]
            ],
        );
    }
     
    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([]);
    }
}