<?php

namespace Ecedi\Donate\PaymentBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Cache;
use Symfony\Component\HttpFoundation\Response;

class CheckPromiseController extends Controller
{
    /**
     * @Route("/check/completed", name="donate_payment_check_promise_completed")
     * @Template()
     */
    public function payAction()
    {
        //cette route est cache-control: private car elle peut contenir des info sur la transaction
        $session = $this->getRequest()->getSession();
        $ir = $this->getDoctrine()->getRepository('DonateCoreBundle:Intent');

        if ($session->has('intentId')) {
            $intentId = $session->get('intentId');

            return ['intent' => $ir->find($intentId)];
        }

        //en env de dev on peut afficher la page avec un payment OK
        if ($this->container->getParameter('kernel.environment') === 'dev') {

           $i = $ir->findOneBy(array('status' => Intent::STATUS_DONE));
           if ($i) {
            return ['intent' => $i->getIntent()];
           }

        }

        //gerer par une 404 l'accès à la page sans sessions
        //else this Intent is already managed, or not in session
        $response = new Response();
        $response->setStatusCode(417);

        return $response;
    }
}
