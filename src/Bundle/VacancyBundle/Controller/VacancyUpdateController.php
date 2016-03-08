<?php

namespace Bundle\VacancyBundle\Controller;

use Bundle\CoreBundle\Values\GenericMessage;
use Bundle\CoreBundle\Values\RouteName;
use Symfony\Component\HttpFoundation\Request;

class VacancyUpdateController extends BaseVacancyController {

    public function editProjectAction(Request $request, $projectId) {
        return $this->redirect($this->generateUrl(RouteName::$ROUTE_LOGIN));
    }
}