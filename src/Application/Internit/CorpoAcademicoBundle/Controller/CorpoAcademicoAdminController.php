<?php

namespace App\Application\Internit\CorpoAcademicoBundle\Controller;

use App\Application\Project\ContentBundle\Attributes\Acl as ACL;

use App\Application\Project\ContentBundle\Controller\Base\BaseAdminController;
use Sonata\AdminBundle\Datagrid\ProxyQueryInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

#[ACL\Admin(enable: true, title: 'CorpoAcademico', description: 'Permissões modulo CorpoAcademico')]
class CorpoAcademicoAdminController extends BaseAdminController
{
    #[ACL\Admin(enable: true, title: 'Listar', description: 'Listar CorpoAcademico')]
    public function listAction(Request $request): Response
    {
        $this->validateAccess("listAction");

        return parent::listAction($request);
    }

    #[ACL\Admin(enable: true, title: 'Visualizar', description: 'Visualizar CorpoAcademico')]
    public function showAction(Request $request): Response
    {
        $this->validateAccess("showAction");

        return parent::showAction($request);
    }

    #[ACL\Admin(enable: true, title: 'Criar', description: 'Criar CorpoAcademico')]
    public function createAction(Request $request): Response
    {
        $this->validateAccess("createAction");

        return parent::createAction($request);
    }

    #[ACL\Admin(enable: true, title: 'Editar', description: 'Editar CorpoAcademico')]
    public function editAction(Request $request): Response
    {
        $this->validateAccess("editAction");

        return parent::editAction($request);
    }

    #[ACL\Admin(enable: true, title: 'Excluir', description: 'Excluir CorpoAcademico')]
    public function deleteAction(Request $request): Response
    {
        $this->validateAccess("deleteAction");

        return parent::deleteAction($request);
    }

    #[ACL\Admin(enable: true, title: 'Excluir em Lote', description: 'Excluir CorpoAcademico em lote')]
    public function batchActionDelete(ProxyQueryInterface $query): Response
    {
        $this->validateAccess("batchActionDelete");

        return parent::batchActionDelete($query);
    }

    public function batchAction(Request $request): Response
    {
        $this->validateAccess("batchActionDelete");

        return parent::batchAction($request);
    }

    #[ACL\Admin(enable: true, title: 'Exportar', description: 'Exportar CorpoAcademico')]
    public function exportAction(Request $request): Response
    {
        $this->validateAccess("exportAction");

        return parent::exportAction($request);
    }

    #[ACL\Admin(enable: true, title: 'Auditoria', description: 'Auditar CorpoAcademico')]
    public function historyAction(Request $request): Response
    {
        $this->validateAccess("historyAction");

        return parent::historyAction($request);
    }

    public function historyViewRevisionAction(Request $request, string $revision): Response
    {
        $this->validateAccess("historyAction");

        return parent::historyViewRevisionAction($request, $revision);
    }

    public function historyCompareRevisionsAction(Request $request, string $baseRevision, string $compareRevision): Response
    {
        $this->validateAccess("historyAction");

        return parent::historyCompareRevisionsAction($request, $baseRevision, $compareRevision);
    }

}
