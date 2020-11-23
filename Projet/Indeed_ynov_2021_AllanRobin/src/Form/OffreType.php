<?php

namespace App\Form;


use App\Entity\Offres;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolver;
use Symfony\Component\Form\FormEvents;
use Symfony\Component\Form\FormEvent;

class OffreType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('Title')
            ->add('Description')
            ->add('Adresse')
            ->add('CodePostal')
            ->add('Ville')
            ->add('finDeLaMission')
            ->add('typeContrat')
            ->add('contrat')
        ;
        $builder->get('contrat')->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event){
            $data = $event->getData();
            dump($data);
            });
        $builder->addEventListener(FormEvents::PRE_SET_DATA, function (FormEvent $event) {
            $form = $event->getForm();
            
            //dd($data->getContrat());
            // if($data->getContrat()->getName() != null){
            //       dd($data); 
            // }
            
         
            //if(strcmp($data->contrat, 'CDI') != 0){
             

            //}
        });
    }

    public function configureOptions(OptionsResolver $resolver)
    {
        $resolver->setDefaults([
            'data_class' => Offres::class,
        ]);
    }
}
