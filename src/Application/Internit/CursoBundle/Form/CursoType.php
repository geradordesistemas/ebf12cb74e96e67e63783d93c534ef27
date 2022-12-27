<?php

namespace App\Application\Internit\CursoBundle\Form;

use App\Application\Internit\CursoBundle\Entity\Curso;
use App\Application\Internit\TipoCursoBundle\Entity\TipoCurso;
use App\Application\Internit\RegimeBundle\Entity\Regime;
use App\Application\Internit\DocumentoAcademicoBundle\Entity\DocumentoAcademico;

use Sonata\AdminBundle\Form\Type\ModelType;
use Symfony\Bridge\Doctrine\Form\Type\EntityType;
use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\SubmitButton;
use Symfony\Component\OptionsResolver\OptionsResolver;

/** Components Form */
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;


class CursoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {


        $builder->add('nome', TextType::class, [
            'label' => 'Nome',
            'required' =>  true ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('descricao', TextareaType::class, [
            'label' => 'Descricao',
            'required' =>  false ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('tipoCurso', EntityType::class, [
            'class' => TipoCurso::class,
            'choice_label' => function ($data) {
                return $data->getId() .' - '.$data->getTipo();
            },
            'label' => 'TipoCurso',
            'required' =>  false ,
            'multiple' =>  false ,
            'attr' => ['class' => 'form-control mb-2 form-select'],
        ]);

        $builder->add('regime', EntityType::class, [
            'class' => Regime::class,
            'choice_label' => function ($data) {
                return $data->getId() .' - '.$data->getRegime();
            },
            'label' => 'Regime',
            'required' =>  false ,
            'multiple' =>  false ,
            'attr' => ['class' => 'form-control mb-2 form-select'],
        ]);



         $builder->add('enviar', SubmitType::class, [
            'attr' => ['type' => 'submit', 'class' => 'save btn btn-primary' ],
        ]);
    }

    public function configureOptions(OptionsResolver $resolver): void
    {
        $resolver->setDefaults([
            // Configure your form options here
        ]);
    }
}
