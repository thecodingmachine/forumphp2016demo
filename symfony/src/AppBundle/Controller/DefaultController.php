<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;
use TheCodingMachine\WeatherApi\WeatherApi;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        $weather = $this->get(WeatherApi::class)->getWeather('fr', 'Paris');
        /* @var $weather Weather */

        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.root_dir').'/..').DIRECTORY_SEPARATOR,
            'weather' => $weather->getMainWeather(),
            'temperature' => $weather->getTemperatureInCelsius(),
        ]);
    }
}
