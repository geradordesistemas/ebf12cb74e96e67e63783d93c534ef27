<?php
namespace App\Application\Internit\DocumentoAcademicoBundle\Admin;

use App\Application\Internit\DocumentoAcademicoBundle\Entity\DocumentoAcademico;
use App\Application\Internit\CursoBundle\Entity\Curso;
use App\Application\Internit\AlunoBundle\Entity\Aluno;
use App\Application\Internit\PalavraChaveBundle\Entity\PalavraChave;
use App\Application\Internit\TipoTrabalhoBundle\Entity\TipoTrabalho;
use App\Application\Internit\CorpoAcademicoBundle\Entity\CorpoAcademico;

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
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\DateType;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;
use Sonata\AdminBundle\Form\Type\ModelAutocompleteType;

final class DocumentoAcademicoAdmin extends BaseAdmin
{

    public function toString(object $object): string
    {
        return $object instanceof DocumentoAcademico ? $object->getId().''
        
        : '';
    }



    protected function configureFormFields(FormMapper $form): void
    {
        $form->tab('Geral');
            $form->with('Informações Gerais');


                $form->add('titulo',  TextType::class, [
                    'label' => 'Titulo',
                    'required' =>  true ,
                    
                ]);

                $form->add('subtitulo',  TextType::class, [
                    'label' => 'Subtitulo',
                    'required' =>  true ,
                    
                ]);

                $form->add('resumo',  TextareaType::class, [
                    'label' => 'Resumo',
                    'required' =>  true ,
                    
                ]);

                $form->add('dataDocumento',  DateType::class, [
                    'label' => 'Datadocumento',
                    'required' =>  true ,
                    'widget' => 'single_text',
                ]);

                $form->add('dataPublicacao',  DateType::class, [
                    'label' => 'Datapublicacao',
                    'required' =>  true ,
                    'widget' => 'single_text',
                ]);

                $form->add('status',  CheckboxType::class, [
                    'label' => 'Status',
                    'required' =>  false ,
                    
                ]);

                $form->add('curso', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o Curso',
                    'help' => 'Filtros para pesquisa: [ id, nome, descricao,  ] - Exemplo de utilização: [ filtro=texto_pesquisa ]',
                    'minimum_input_length' => 0,
                    'items_per_page' => 10,
                    'quiet_millis' => 100,
                    'multiple' =>  false ,
                    'required' =>  false ,
                    'to_string_callback' => function($entity, $property) {
                        return $entity->getId() .' - '.$entity->getNome();
                    },
                    'callback' => static function (AdminInterface $admin, string $property, string $value): void {
                        $property = strtolower($property);
                        $value = strtolower($value);
                        $datagrid = $admin->getDatagrid();
                        $valueParts = explode('=', $value);
                        if (count($valueParts) === 2 && in_array($valueParts[0], [ "id","nome","descricao", ]))
                        [$property, $value] = $valueParts;

                        $datagrid->setValue($datagrid->getFilter($property)->getFormName(), null, $value);
                    },
                ]);

                $form->add('aluno', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o Aluno',
                    'help' => 'Filtros para pesquisa: [ id, nome, sobrenome, email,  ] - Exemplo de utilização: [ filtro=texto_pesquisa ]',
                    'minimum_input_length' => 0,
                    'items_per_page' => 10,
                    'quiet_millis' => 100,
                    'multiple' =>  true ,
                    'required' =>  false ,
                    'to_string_callback' => function($entity, $property) {
                        return $entity->getId() .' - '.$entity->getNome().' - '.$entity->getSobrenome();
                    },
                    'callback' => static function (AdminInterface $admin, string $property, string $value): void {
                        $property = strtolower($property);
                        $value = strtolower($value);
                        $datagrid = $admin->getDatagrid();
                        $valueParts = explode('=', $value);
                        if (count($valueParts) === 2 && in_array($valueParts[0], [ "id","nome","sobrenome","email", ]))
                        [$property, $value] = $valueParts;

                        $datagrid->setValue($datagrid->getFilter($property)->getFormName(), null, $value);
                    },
                ]);

                $form->add('palavraChave', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o PalavraChave',
                    'help' => 'Filtros para pesquisa: [ id, palavraChave, descricao,  ] - Exemplo de utilização: [ filtro=texto_pesquisa ]',
                    'minimum_input_length' => 0,
                    'items_per_page' => 10,
                    'quiet_millis' => 100,
                    'multiple' =>  true ,
                    'required' =>  false ,
                    'to_string_callback' => function($entity, $property) {
                        return $entity->getId() .' - '.$entity->getPalavraChave();
                    },
                    'callback' => static function (AdminInterface $admin, string $property, string $value): void {
                        $property = strtolower($property);
                        $value = strtolower($value);
                        $datagrid = $admin->getDatagrid();
                        $valueParts = explode('=', $value);
                        if (count($valueParts) === 2 && in_array($valueParts[0], [ "id","palavraChave","descricao", ]))
                        [$property, $value] = $valueParts;

                        $datagrid->setValue($datagrid->getFilter($property)->getFormName(), null, $value);
                    },
                ]);

                $form->add('tipo', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o Tipo',
                    'help' => 'Filtros para pesquisa: [ id, tipo, descricao,  ] - Exemplo de utilização: [ filtro=texto_pesquisa ]',
                    'minimum_input_length' => 0,
                    'items_per_page' => 10,
                    'quiet_millis' => 100,
                    'multiple' =>  false ,
                    'required' =>  false ,
                    'to_string_callback' => function($entity, $property) {
                        return $entity->getId() .' - '.$entity->getTipo();
                    },
                    'callback' => static function (AdminInterface $admin, string $property, string $value): void {
                        $property = strtolower($property);
                        $value = strtolower($value);
                        $datagrid = $admin->getDatagrid();
                        $valueParts = explode('=', $value);
                        if (count($valueParts) === 2 && in_array($valueParts[0], [ "id","tipo","descricao", ]))
                        [$property, $value] = $valueParts;

                        $datagrid->setValue($datagrid->getFilter($property)->getFormName(), null, $value);
                    },
                ]);

                $form->add('orientador', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o Orientador',
                    'help' => 'Filtros para pesquisa: [ id, nome, sobrenome, email,  ] - Exemplo de utilização: [ filtro=texto_pesquisa ]',
                    'minimum_input_length' => 0,
                    'items_per_page' => 10,
                    'quiet_millis' => 100,
                    'multiple' =>  false ,
                    'required' =>  false ,
                    'to_string_callback' => function($entity, $property) {
                        return $entity->getId() .' - '.$entity->getNome().' - '.$entity->getSobrenome();
                    },
                    'callback' => static function (AdminInterface $admin, string $property, string $value): void {
                        $property = strtolower($property);
                        $value = strtolower($value);
                        $datagrid = $admin->getDatagrid();
                        $valueParts = explode('=', $value);
                        if (count($valueParts) === 2 && in_array($valueParts[0], [ "id","nome","sobrenome","email", ]))
                        [$property, $value] = $valueParts;

                        $datagrid->setValue($datagrid->getFilter($property)->getFormName(), null, $value);
                    },
                ]);

                $form->add('bancaExaminadora', ModelAutocompleteType::class, [
                    'property' => 'id',
                    'placeholder' => 'Escolha o BancaExaminadora',
                    'help' => 'Filtros para pesquisa: [ id, nome, sobrenome, email,  ] - Exemplo de utilização: [ filtro=texto_pesquisa ]',
                    'minimum_input_length' => 0,
                    'items_per_page' => 10,
                    'quiet_millis' => 100,
                    'multiple' =>  true ,
                    'required' =>  false ,
                    'to_string_callback' => function($entity, $property) {
                        return $entity->getId() .' - '.$entity->getNome().' - '.$entity->getSobrenome();
                    },
                    'callback' => static function (AdminInterface $admin, string $property, string $value): void {
                        $property = strtolower($property);
                        $value = strtolower($value);
                        $datagrid = $admin->getDatagrid();
                        $valueParts = explode('=', $value);
                        if (count($valueParts) === 2 && in_array($valueParts[0], [ "id","nome","sobrenome","email", ]))
                        [$property, $value] = $valueParts;

                        $datagrid->setValue($datagrid->getFilter($property)->getFormName(), null, $value);
                    },
                ]);

            $form->end();
        $form->end();
    }

    protected function configureDatagridFilters(DatagridMapper $datagrid): void
    {
        $datagrid->add('id', null, [
            'label' => 'Id',
        ]);

        $datagrid->add('titulo', null, [
            'label' => 'Titulo',
        ]);

        $datagrid->add('subtitulo', null, [
            'label' => 'Subtitulo',
        ]);

        $datagrid->add('resumo', null, [
            'label' => 'Resumo',
        ]);

        $datagrid->add('dataDocumento', null, [
            'label' => 'Datadocumento',
            'field_options' => [
                'widget' => 'single_text',
            ],
        ]);

        $datagrid->add('dataPublicacao', null, [
            'label' => 'Datapublicacao',
            'field_options' => [
                'widget' => 'single_text',
            ],
        ]);

        $datagrid->add('status', null, [
            'label' => 'Status',
        ]);

        $datagrid->add('curso', ModelFilter::class, [
            'label' => 'Curso',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (Curso $curso) {
                    return $curso->getId()
                    .' - '.$curso->getNome()
                    ;
                },
            ],
        ]);

        $datagrid->add('aluno', ModelFilter::class, [
            'label' => 'Aluno',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (Aluno $aluno) {
                    return $aluno->getId()
                    .' - '.$aluno->getNome()
                    .' - '.$aluno->getSobrenome()
                    ;
                },
            ],
        ]);

        $datagrid->add('palavraChave', ModelFilter::class, [
            'label' => 'PalavraChave',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (PalavraChave $palavraChave) {
                    return $palavraChave->getId()
                    .' - '.$palavraChave->getPalavraChave()
                    ;
                },
            ],
        ]);

        $datagrid->add('tipo', ModelFilter::class, [
            'label' => 'Tipo',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (TipoTrabalho $tipo) {
                    return $tipo->getId()
                    .' - '.$tipo->getTipo()
                    ;
                },
            ],
        ]);

        $datagrid->add('orientador', ModelFilter::class, [
            'label' => 'Orientador',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (CorpoAcademico $orientador) {
                    return $orientador->getId()
                    .' - '.$orientador->getNome()
                    .' - '.$orientador->getSobrenome()
                    ;
                },
            ],
        ]);

        $datagrid->add('bancaExaminadora', ModelFilter::class, [
            'label' => 'BancaExaminadora',
            'field_options' => [
                'multiple' => true,
                'choice_label'=> function (CorpoAcademico $bancaExaminadora) {
                    return $bancaExaminadora->getId()
                    .' - '.$bancaExaminadora->getNome()
                    .' - '.$bancaExaminadora->getSobrenome()
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


        $list->addIdentifier('titulo', null, [
            'label' => 'Titulo',
                                                            
        ]);


        $list->addIdentifier('subtitulo', null, [
            'label' => 'Subtitulo',
                                                            
        ]);


        $list->addIdentifier('resumo', null, [
            'label' => 'Resumo',
                                                            
        ]);


        $list->addIdentifier('dataDocumento', null, [
            'label' => 'Datadocumento',
            'format'=> 'd/m/Y',                                                
        ]);


        $list->addIdentifier('dataPublicacao', null, [
            'label' => 'Datapublicacao',
            'format'=> 'd/m/Y',                                                
        ]);


        $list->add('status', null, [
            'label' => 'Status',
                                                'editable' => true,            'inverse' => false,
        ]);


        $list->add('curso', null, [
            'label' => 'Curso',
            'associated_property' => function (Curso $curso) {
                return $curso->getId()
                .' - '.$curso->getNome()
                ;
            },
        ]);


        $list->add('aluno', null, [
            'label' => 'Aluno',
            'associated_property' => function (Aluno $aluno) {
                return $aluno->getId()
                .' - '.$aluno->getNome()
                .' - '.$aluno->getSobrenome()
                ;
            },
        ]);


        $list->add('palavraChave', null, [
            'label' => 'PalavraChave',
            'associated_property' => function (PalavraChave $palavraChave) {
                return $palavraChave->getId()
                .' - '.$palavraChave->getPalavraChave()
                ;
            },
        ]);


        $list->add('tipo', null, [
            'label' => 'Tipo',
            'associated_property' => function (TipoTrabalho $tipo) {
                return $tipo->getId()
                .' - '.$tipo->getTipo()
                ;
            },
        ]);


        $list->add('orientador', null, [
            'label' => 'Orientador',
            'associated_property' => function (CorpoAcademico $orientador) {
                return $orientador->getId()
                .' - '.$orientador->getNome()
                .' - '.$orientador->getSobrenome()
                ;
            },
        ]);


        $list->add('bancaExaminadora', null, [
            'label' => 'BancaExaminadora',
            'associated_property' => function (CorpoAcademico $bancaExaminadora) {
                return $bancaExaminadora->getId()
                .' - '.$bancaExaminadora->getNome()
                .' - '.$bancaExaminadora->getSobrenome()
                ;
            },
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

                $show->add('titulo', null, [
                    'label' => 'Titulo',
                                                            
                ]);

                $show->add('subtitulo', null, [
                    'label' => 'Subtitulo',
                                                            
                ]);

                $show->add('resumo', null, [
                    'label' => 'Resumo',
                                                            
                ]);

                $show->add('dataDocumento', null, [
                    'label' => 'Datadocumento',
                    'format'=> 'd/m/Y',                                        
                ]);

                $show->add('dataPublicacao', null, [
                    'label' => 'Datapublicacao',
                    'format'=> 'd/m/Y',                                        
                ]);

                $show->add('status', null, [
                    'label' => 'Status',
                                                            
                ]);

                $show->add('curso', null, [
                    'label' => 'Curso',
                    'associated_property' => function (Curso $curso) {
                        return $curso->getId()
                        .' - '.$curso->getNome()
                        ;
                    },
                ]);

                $show->add('aluno', null, [
                    'label' => 'Aluno',
                    'associated_property' => function (Aluno $aluno) {
                        return $aluno->getId()
                        .' - '.$aluno->getNome()
                        .' - '.$aluno->getSobrenome()
                        ;
                    },
                ]);

                $show->add('palavraChave', null, [
                    'label' => 'PalavraChave',
                    'associated_property' => function (PalavraChave $palavraChave) {
                        return $palavraChave->getId()
                        .' - '.$palavraChave->getPalavraChave()
                        ;
                    },
                ]);

                $show->add('tipo', null, [
                    'label' => 'Tipo',
                    'associated_property' => function (TipoTrabalho $tipo) {
                        return $tipo->getId()
                        .' - '.$tipo->getTipo()
                        ;
                    },
                ]);

                $show->add('orientador', null, [
                    'label' => 'Orientador',
                    'associated_property' => function (CorpoAcademico $orientador) {
                        return $orientador->getId()
                        .' - '.$orientador->getNome()
                        .' - '.$orientador->getSobrenome()
                        ;
                    },
                ]);

                $show->add('bancaExaminadora', null, [
                    'label' => 'BancaExaminadora',
                    'associated_property' => function (CorpoAcademico $bancaExaminadora) {
                        return $bancaExaminadora->getId()
                        .' - '.$bancaExaminadora->getNome()
                        .' - '.$bancaExaminadora->getSobrenome()
                        ;
                    },
                ]);


            $show->end();
        $show->end();
    }


}