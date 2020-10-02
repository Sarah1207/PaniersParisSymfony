<?php

namespace App\Service;

use App\Form\NewsletterFormType;
use Symfony\Component\Form\FormFactoryInterface;

class ServiceNewsletter
{
    /**
     * @var FormFactoryInterface
     */
    private $formFactory;

    /**
     * ServiceNewsletter constructor.
     * @param FormFactoryInterface $formFactory
     */
    public function __construct(FormFactoryInterface $formFactory)
    {
        $this->formFactory = $formFactory;
    }

    public function formNewsletter()
    {
        return $this->formFactory->create(NewsletterFormType::class)->createView();
    }
}