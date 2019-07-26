<?php

namespace AcmeWidgets\ProductPromoter\Controller\Extension;

use Magento\Framework\Api\SearchCriteriaBuilder;

use AcmeWidgets\ProductPromoter\Api\ProductPromoterRepositoryInterface;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;

/** This class is not required for use Extension Attributes and created only for sample */
class GetAttributes extends Action
{

    private $searchCriteria;

    /**
     * @var ProductPromoterRepositoryInterface
     */
    private $productPromoterRepository;

    /**
     * @param Context $context
     * @param ProductPromoterRepositoryInterface $customerRepository
     */
    public function __construct(
        Context $context,
        SearchCriteriaBuilder $searchCriteria,
        ProductPromoterRepositoryInterface $productPromoterRepository
    ) {
        parent::__construct($context);
        $this->searchCriteria = $searchCriteria;
        $this->productPromoterRepository = $productPromoterRepository;
    }

    /**
     * URL: .../index.php/ExtensionAttribute/hello/index
     */
    public function execute()
    {
    

        try {
            echo '<pre>';
            // $search = $this->searchCriteria->create();
            // $customer = $this->customerRepository->getList($search)->getItems();
            //
            // print_r($customer->getData());


            $productPromoter = $this->productPromoterRepository->getById(97);

            var_dump($productPromoter->getExtensionAttributes());
            print_r($productPromoter->getExtensionAttributes());
        } catch (\Throwable $throwable) {
            echo $throwable->getMessage();
        }

        die;
    }
}
