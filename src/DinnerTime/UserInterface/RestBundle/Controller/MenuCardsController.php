<?php

namespace DinnerTime\UserInterface\RestBundle\Controller;

use DinnerTime\Application\Command\AddNewMenuCardToRestaurantCommand;
use DinnerTime\Application\UseCase\AddNewMenuCardToRestaurantCommandHandler;
use DinnerTime\Infrastructure\DoctrineBridgeBundle\Entity\Restaurant;
use DinnerTime\UserInterface\RestBundle\Form\MenuCardType;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\View\View;
use Nelmio\ApiDocBundle\Annotation\ApiDoc;
use Symfony\Component\Form\FormFactory;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class MenuCardsController
 *
 * @package DinnerTime\UserInterface\RestBundle\Controller
 */
class MenuCardsController
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
     * @param Restaurant $restaurant
     *
     * @return \DinnerTime\Domain\MenuCard[]
     */
    public function getMenucardsAction(Restaurant $restaurant)
    {
        return $restaurant->getMenuCardList();
    }

    /**
     * @ApiDoc(
     *  description="Create a new Object",
     *  formType="DinnerTime\UserInterface\RestBundle\Form\MenuCardType"
     * )
     * @param Request    $request
     * @param Restaurant $restaurant
     *
     * @return View
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
