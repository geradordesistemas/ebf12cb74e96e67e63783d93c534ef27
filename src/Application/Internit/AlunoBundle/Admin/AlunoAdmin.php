<?php
namespace App\Application\Internit\AlunoBundle\Admin;

use App\Application\Internit\AlunoBundle\Entity\Aluno;
use App\Application\Internit\DocumentoAcademicoBundle\Entity\DocumentoAcademico;

use App\Application\Project\ContentBundle\Admin\Base\BaseAdmin;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Admin\AdminInterface;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Show\ShowMapper;

/** Components Form */
use Sonata\DoctrineORMAdminBundle\Filter\ModelFilter;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Symfony\Component\Form\Extension\Core\Type\IntegerType;
use Symfony\Component\Form\Extension\Core\Type\TextType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;

final class AlunoAdmin extends BaseAdmin
{

    public function toString(object $object): string
    {
        return $object instanceof Aluno ? $object->getId().''
        
        : '';
    }



    protected function configureFormFields(FormMapper $form): void
    {
        $form->tab('Geral');
            $form->with('Informações Gerais');


                $form->add('nome',  TextType::class, [
                    'label' => 'Nome',
                    'required' =>  true ,
                    
                ]);

                $form->add('sobrenome',  TextType::class, [
                    'label' => 'Sobrenome',
                    'required' =>  true ,
                    
                ]);

                $form->add('email',  TextType::class, [
                    'label' => 'Email',
                    'required' =>  true ,
                    
                ]);


            $form->end();
        $form->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {
        $datagrid->add('id', null, [
            'label' => 'Id',
        ]);

        $datagrid->add('nome', null, [
            'label' => 'Nome',
        ]);

        $datagrid->add('sobrenome', null, [
            'label' => 'Sobrenome',
        ]);

        $datagrid->add('email', null, [
            'label' => 'Email',
        ]);

    $datagrid->add('documentoAcademicos', ModelFilter::class, [
        'label' => 'DocumentoAcademicos',
        'field_options' => [
            'multiple' => true,
            'choice_label'=> function (DocumentoAcademico $documentoAcademicos) {
                return $documentoAcademicos->getId()
                .' - '.$documentoAcademicos->getTitulo()
                ;
            },
        ],
    ]);

    }

    protected function configureListFields(ListMapper $list): void
    {

        $list->addIdentifier('id', null, [
            'label' => 'Id',
                                                            
        ]);


        $list->addIdentifier('nome', null, [
            'label' => 'Nome',
                                                            
        ]);


        $list->addIdentifier('sobrenome', null, [
            'label' => 'Sobrenome',
                                                            
        ]);


        $list->addIdentifier('email', null, [
            'label' => 'Email',
                                                            
        ]);




        $list->add(ListMapper::NAME_ACTIONS, ListMapper::TYPE_ACTIONS, [
            'actions' => [
                'show'   => [],
                'edit'   => [],
                'delete' => [],
            ]
        ]);

    }

    protected function configureShowFields(ShowMapper $show): void
    {
        $show->tab('Geral');
            $show->with('Informações Gerais', [
                'class'       => 'col-md-12',
                'box_class'   => 'box box-solid box-primary',
                'description' => 'Informações Gerais',
            ]);

                $show->add('id', null, [
                    'label' => 'Id',
                                                            
                ]);

                $show->add('nome', null, [
                    'label' => 'Nome',
                                                            
                ]);

                $show->add('sobrenome', null, [
                    'label' => 'Sobrenome',
                                                            
                ]);

                $show->add('email', null, [
                    'label' => 'Email',
                                                            
                ]);



            $show->end();
        $show->end();
    }


}