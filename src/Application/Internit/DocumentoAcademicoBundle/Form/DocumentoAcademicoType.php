<?php

namespace App\Application\Internit\DocumentoAcademicoBundle\Form;

use App\Application\Internit\DocumentoAcademicoBundle\Entity\DocumentoAcademico;
use App\Application\Internit\CursoBundle\Entity\Curso;
use App\Application\Internit\AlunoBundle\Entity\Aluno;
use App\Application\Internit\PalavraChaveBundle\Entity\PalavraChave;
use App\Application\Internit\TipoTrabalhoBundle\Entity\TipoTrabalho;
use App\Application\Internit\CorpoAcademicoBundle\Entity\CorpoAcademico;

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
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;


class DocumentoAcademicoType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options): void
    {


        $builder->add('titulo', TextType::class, [
            'label' => 'Titulo',
            'required' =>  true ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('subtitulo', TextType::class, [
            'label' => 'Subtitulo',
            'required' =>  true ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('resumo', TextareaType::class, [
            'label' => 'Resumo',
            'required' =>  true ,
            'attr' => ['class' => ' form-control mb-2 '],
            
        ]);

        $builder->add('dataDocumento', DateType::class, [
            'label' => 'Datadocumento',
            'required' =>  true ,
            'attr' => ['class' => ' form-control mb-2 '],
            'widget' => 'single_text',
        ]);

        $builder->add('dataPublicacao', DateType::class, [
            'label' => 'Datapublicacao',
            'required' =>  true ,
            'attr' => ['class' => ' form-control mb-2 '],
            'widget' => 'single_text',
        ]);

        $builder->add('status', CheckboxType::class, [
            'label' => 'Status',
            'required' =>  false ,
            'attr' => ['class' => 'form-check-input'],
            
        ]);

        $builder->add('curso', EntityType::class, [
            'class' => Curso::class,
            'choice_label' => function ($data) {
                return $data->getId() .' - '.$data->getNome();
            },
            'label' => 'Curso',
            'required' =>  false ,
            'multiple' =>  false ,
            'attr' => ['class' => 'form-control mb-2 form-select'],
        ]);

        $builder->add('aluno', EntityType::class, [
            'class' => Aluno::class,
            'choice_label' => function ($data) {
                return $data->getId() .' - '.$data->getNome().' - '.$data->getSobrenome();
            },
            'label' => 'Aluno',
            'required' =>  false ,
            'multiple' =>  true ,
            'attr' => ['class' => 'form-control mb-2 form-select'],
        ]);

        $builder->add('palavraChave', EntityType::class, [
            'class' => PalavraChave::class,
            'choice_label' => function ($data) {
                return $data->getId() .' - '.$data->getPalavraChave();
            },
            'label' => 'PalavraChave',
            'required' =>  false ,
            'multiple' =>  true ,
            'attr' => ['class' => 'form-control mb-2 form-select'],
        ]);

        $builder->add('tipo', EntityType::class, [
            'class' => TipoTrabalho::class,
            'choice_label' => function ($data) {
                return $data->getId() .' - '.$data->getTipo();
            },
            'label' => 'Tipo',
            'required' =>  false ,
            'multiple' =>  false ,
            'attr' => ['class' => 'form-control mb-2 form-select'],
        ]);

        $builder->add('orientador', EntityType::class, [
            'class' => CorpoAcademico::class,
            'choice_label' => function ($data) {
                return $data->getId() .' - '.$data->getNome().' - '.$data->getSobrenome();
            },
            'label' => 'Orientador',
            'required' =>  false ,
            'multiple' =>  false ,
            'attr' => ['class' => 'form-control mb-2 form-select'],
        ]);

        $builder->add('bancaExaminadora', EntityType::class, [
            'class' => CorpoAcademico::class,
            'choice_label' => function ($data) {
                return $data->getId() .' - '.$data->getNome().' - '.$data->getSobrenome();
            },
            'label' => 'BancaExaminadora',
            'required' =>  false ,
            'multiple' =>  true ,
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
