<?php

namespace AcmeWidgets\ProductPromoter\ViewModel;

use Magento\Framework\View\Element\Block\ArgumentInterface;
use Magento\Framework\Api\FilterBuilder;
use Magento\Framework\Api\SearchCriteriaBuilder;

use Magento\Catalog\Api\Data\ProductInterfaceFactory;
use Magento\Catalog\Api\ProductRepositoryInterface;

use AcmeWidgets\ProductPromoter\Api\Data\ProductPromoterInterfaceFactory;
use AcmeWidgets\ProductPromoter\Api\ProductPromoterRepositoryInterface;

class ProductPromoter implements ArgumentInterface {

  private $_filterBuilder;
  private $_searchCriteriaBuilder;
  private $_productRepository;
  private $_productFactory;
  private $_productPromoterFactory;
  private $_roductPromoterRepository;

  public function __construct(
    FilterBuilder $filterBuilder,
    SearchCriteriaBuilder $searchCriteriaBuilder,
    ProductInterfaceFactory $productFactory,
    ProductRepositoryInterface $productRepository,
    ProductPromoterInterfaceFactory $productPromoterFactory,
    ProductPromoterRepositoryInterface $roductPromoterRepository
  )
  {
    $this->_filterBuilder  = $filterBuilder;
    $this->_searchCriteriaBuilder  = $searchCriteriaBuilder;
    $this->_productRepository = $productRepository;
    $this->_productFactory = $productFactory;
    $this->_productPromoterFactory = $productPromoterFactory;
    $this->_productPromoterRepository = $roductPromoterRepository;
  }

  public function getItems(){
    $searchCriteria = $this->_searchCriteriaBuilder->create();
    $product = $this->_productPromoterRepository->getList($searchCriteria);
    return $product->getItems();
  }

  /**
   * Create my new simple product.
   *
   * @return void
   */
  public function createProduct()
  {
    $product = $this->_productFactory->create();
    $product->setSku('MyNewProduct');
    // Set other product data here
    $this->_productRepository->save($product);
  }


}
