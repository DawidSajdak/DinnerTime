<?php

namespace DinnerTime\Infrastructure\RestBundle\Controller;

use DinnerTime\Application\Command\AddNewMenuCardToRestaurantCommand;
use DinnerTime\Application\UseCase\AddNewMenuCardToRestaurantCommandHandler;
use DinnerTime\Infrastructure\DoctrineBridgeBundle\Entity\Restaurant;
use DinnerTime\Infrastructure\RestBundle\Form\MenuCardType;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\View\View;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class MenuCardsController
 *
 * @package DinnerTime\Infrastructure\RestBundle\Controller
 */
class MenuCardsController extends Controller
{
    /**
     * @var AddNewMenuCardToRestaurantCommandHandler
     */
    private $useCase;

    /**
     * @var FormFactory
     */
    private $formFactory;

    /**
     * @param AddNewMenuCardToRestaurantCommandHandler $useCase
     * @param FormFactory                              $formFactory
     */
    public function __construct(AddNewMenuCardToRestaurantCommandHandler $useCase, FormFactory $formFactory)
    {
        $this->useCase = $useCase;
        $this->formFactory = $formFactory;
    }

    /**
     * @param Request    $request
     * @param Restaurant $restaurant
     *
     * @return Restaurant
     */
    public function postMenucardsAction(Request $request, Restaurant $restaurant)
    {

        $form = $this->formFactory->create(new MenuCardType(), new AddNewMenuCardToRestaurantCommand($restaurant));
        $form->submit($request->request->all());

        if ($form->isValid()) {
            $this->useCase->handle($form->getData());
            return View::create($form->getData(), Codes::HTTP_CREATED);
        }

        return View::create($form);
    }
}
