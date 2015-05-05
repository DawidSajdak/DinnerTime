<?php

namespace DinnerTime\UserInterface\RestBundle\Controller;

use DinnerTime\Application\Command\CreateRestaurantCommand;
use DinnerTime\Application\UseCase\CreateRestaurantCommandHandler;
use DinnerTime\Infrastructure\DoctrineBridgeBundle\Entity\Restaurant;
use DinnerTime\Infrastructure\DoctrineBridgeBundle\Repository\RestaurantRepository;
use DinnerTime\UserInterface\RestBundle\Form\RestaurantType;
use FOS\RestBundle\Util\Codes;
use FOS\RestBundle\View\View;
use Symfony\Component\Form\FormFactoryInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Class RestaurantsController
 *
 * @package DinnerTime\RestBundle\Controller
 */
class RestaurantsController
{
    /**
     * @var CreateRestaurantCommandHandler
     */
    private $useCase;

    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * @var RestaurantRepository
     */
    private $repository;

    /**
     * @param CreateRestaurantCommandHandler $useCase
     * @param FormFactoryInterface           $formFactory
     * @param RestaurantRepository           $repository
     */
    public function __construct(
        CreateRestaurantCommandHandler $useCase,
        FormFactoryInterface $formFactory,
        RestaurantRepository $repository
    ) {
        $this->useCase = $useCase;
        $this->formFactory = $formFactory;
        $this->repository = $repository;
    }

    /**
     * @return Restaurant[]
     */
    public function getRestaurantsAction()
    {
        return $this->repository->findAll();
    }

    /**
     * @param Restaurant $restaurant
     *
     * @return Restaurant|null
     *
     */
    public function getRestaurantAction(Restaurant $restaurant)
    {
        return $restaurant;
    }

    /**
     * @param Request $request
     *
     * @return View
     */
    public function postRestaurantsAction(Request $request)
    {
        $form = $this->formFactory->create(new RestaurantType(), new CreateRestaurantCommand());

        $form->submit($request->request->all());

        if ($form->isValid()) {
            $this->useCase->handle($form->getData());
            return View::create($form->getData(), Codes::HTTP_CREATED);
        }

        return View::create($form);
    }
}
