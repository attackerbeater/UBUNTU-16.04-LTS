<?php 
namespace AcmeWidgets\ProductPromoter\Model;

use Magento\Catalog\Api\Data\ProductInterface;
use Magento\Bundle\Model\Product\Type;

class ProductLoader{

	private $productRepository;
	private $searchCriteriaBuilder;

	public function __construct(
		\Magento\Framework\Api\SearchCriteriaBuilder $productRepository,
		\Magento\Catalog\Api\ProductRepositoryInterface $searchCriteriaBuilder
	){
		$this->productRepository = $productRepository;
		$this->searchCriteriaBuilder = $searchCriteriaBuilder;
	}
	
	public function getBundleProducts(){
		$searchCriteria = $this->searchCriteriaBuilder
			->addFilter(ProductInterface::TYPE_ID, Type::TYPE_CODE)
			->create();
		return $this->productRepository->getList($searchCriteria)->getItems();
	}
}