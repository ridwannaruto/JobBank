<?php

namespace Bundle\ProjectBundle\Controller;

use Bundle\CoreBundle\Values\RouteName;
use Bundle\VacancyBundle\Controller\BaseVacancyController;
use Symfony\Component\HttpFoundation\Request;

class VacancyDeleteController extends BaseVacancyController
{


    public function deleteProjectAction(Request $request, $projectId)
    {
        return $this->redirect($this->generateUrl(RouteName::$ROUTE_LOGIN));
    }


}