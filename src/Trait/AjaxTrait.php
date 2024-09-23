<?php

namespace App\Trait;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Trait AjaxTrait
 *
 * @var $this AbstractController
 */
trait AjaxTrait
{
    public bool $ajax = false;

    protected function customRender(string $view, array $parameters = [], ?Response $response = null): Response
    {
        $parameters['layout'] = 'base.html.twig';

        if ($this->ajax) {
            $parameters['layout'] = 'ajax.html.twig';
            $parameters['domajax'] = true;
        }

        return $this->render($view, $parameters, $response);
    }

    public function initializeDomAjax(Request $request): void
    {
        if ($request->headers->get('X-Requested-With') === 'domajax') {
            $this->ajax = true;
        }
    }
}