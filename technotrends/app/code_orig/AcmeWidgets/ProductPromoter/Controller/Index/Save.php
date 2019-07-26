<?php
namespace AcmeWidgets\ProductPromoter\Controller\Index;

use \Magento\Framework\Controller\Result\RawFactory;
use Magento\Framework\Controller\Result\JsonFactory;
use Magento\Contact\Model\MailInterface;
use Magento\Framework\Message\ManagerInterface;
use Magento\Framework\Filesystem;
use Magento\MediaStorage\Model\File\UploaderFactory;
use Magento\Framework\Exception\LocalizedException;
use Magento\Framework\Exception\InputException;
use Magento\Framework\UrlFactory;
class Save extends \Magento\Framework\App\Action\Action
{
  /**
   * @var Context
   */
  private $context;

  /**
   * Index resultPageFactory
   * @var PageFactory
   */
  private $resultPageFactory;

  /**
   * @var
   */
  private $modelFactory;

  /**
   * @var
   */
  private $_productPromoterFactory;

  /**
   * @var
   */
  private $_productPromoterRepository;

  /**
   * @var
   */
  protected $resultJsonFactory;

  /**
   * @var \Magento\Framework\Controller\Result\RawFactory
   */
  protected $resultRawFactory;

  /**
   * @var \Magento\Framework\Message\ManagerInterface
   */
  protected $messageManager;

  /**
   * @var \Magento\Framework\Filesystem $filesystem
   */
  protected $filesystem;

  /**
   * @var \Magento\MediaStorage\Model\File\UploaderFactory $fileUploader
   */
  protected $fileUploader;

  protected $escaper;

  protected $urlModel;

  /**
   * Index constructor.
   * @param \Magento\Framework\App\Action\Context $context
   * @param \Magento\Framework\View\Result\PageFactory $resultPageFactory
   */
  public function __construct(
    \Magento\Framework\App\Action\Context $context,
    \Magento\Framework\View\Result\PageFactory $resultPageFactory,
    JsonFactory $resultJsonFactory,
    RawFactory $resultRawFactory,
    \AcmeWidgets\ProductPromoter\Api\Data\ProductPromoterInterfaceFactory $productPromoterFactory,
    \AcmeWidgets\ProductPromoter\Api\ProductPromoterRepositoryInterface $productPromoterRepository,
    MailInterface $mail,
    ManagerInterface $messageManager,
    Filesystem $filesystem,
    UploaderFactory $fileUploader,
    \Magento\Framework\Escaper $escaper,
    UrlFactory $urlFactory
  ) {
    $this->context = $context;
    $this->resultPageFactory = $resultPageFactory;
    $this->resultJsonFactory = $resultJsonFactory;
    $this->resultRawFactory = $resultRawFactory;
    $this->_productPromoterFactory = $productPromoterFactory;
    $this->_productPromoterRepository = $productPromoterRepository;
    $this->mail = $mail;
    $this->messageManager       = $messageManager;
    $this->filesystem           = $filesystem;
    $this->fileUploader         = $fileUploader;
    $this->mediaDirectory = $filesystem->getDirectoryWrite(\Magento\Framework\App\Filesystem\DirectoryList::MEDIA);
    $this->escaper = $escaper;
    $this->urlModel = $urlFactory->create();
    return parent::__construct($context);
  }

  public function execute()
  {
    $userData = null;
    $httpBadRequestCode = 400;

    $credentials = $this->getRequest()->getParams();
    $credentials['upload_files_image'] = $this->getRequest()->getFiles('upload_files_image');
    $response = [
       'errors' => false,
       'message' => __('registration_successful')
    ];

    /** @var \Magento\Framework\Controller\Result\Raw $resultRaw */
    $resultRaw = $this->resultRawFactory->create();
    try {
      $userData = $credentials;
    } catch (\Exception $e) {
      return $resultRaw->setHttpResponseCode($httpBadRequestCode);
    }

    if (!$userData || $this->getRequest()->getMethod() !== 'POST' || !$this->getRequest()->isXmlHttpRequest()) {
      return $resultRaw->setHttpResponseCode($httpBadRequestCode);
    }

    try {

      $productPromoter = $this->_productPromoterFactory->create();
      $this->_productPromoterRepository->save($productPromoter->addData($userData));
      if($productPromoter) {
        $this->uploadFile($userData);
        $response['redirectUrl'] = $this->urlModel->getUrl('*/results/page');
      }

    } catch (InputException $e) {
      $response = [
        'errors' => true,
        'message' => $this->escaper->escapeHtml($e->getMessage())
      ];
    } catch (LocalizedException $e) {

     $response = [
        'errors' => true,
        'message' => $this->escaper->escapeHtml($e->getMessage())
      ];
    } catch (\Exception $e) {

      $response = [
        'errors' => true,
        'message' => $this->escaper->escapeHtml($e->getMessage())
      ];
    }

    /** @var \Magento\Framework\Controller\Result\Json $resultJson */
    $resultJson = $this->resultJsonFactory->create();
    return $resultJson->setData($response);
  }

  public function uploadFile($userData)
  {
      try{
          $file = $userData['upload_files_image'];
          $fileName = ($file && array_key_exists('name', $file)) ? $file['name'] : null;

          if ($file && $fileName) {
              $target = $this->mediaDirectory->getAbsolutePath('product-promoter/');

              /** @var $uploader \Magento\MediaStorage\Model\File\Uploader */
              $uploader = $this->fileUploader->create(['fileId' => 'upload_files']);

              // set allowed file extensions
              $uploader->setAllowedExtensions(['jpg', 'pdf', 'doc', 'png', 'zip']);

              // allow folder creation
              $uploader->setAllowCreateFolders(true);

              // rename file name if already exists
              $uploader->setAllowRenameFiles(true);

              // rename the file name into lowercase
              // but this one is not working
              // we can simply use strtolower() function to rename filename to lowercase
              // $uploader->setFilenamesCaseSensitivity(true);

              // enabling file dispersion will
              // rename the file name into lowercase
              // and create nested folders inside the upload directory based on the file name
              // for example, if uploaded file name is IMG_123.jpg then file will be uploaded in
              // pub/media/your-upload-directory/i/m/img_123.jpg
              // $uploader->setFilesDispersion(true);

              // upload file in the specified folder
              $result = $uploader->save($target);

              //echo '<pre>'; print_r($result); exit;

              if ($result['file']) {
                  $this->messageManager->addSuccess(__('File has been successfully uploaded.'));
              }

              return $target . $uploader->getUploadedFileName();
          }
      } catch (\Exception $e) {
          $this->messageManager->addError($e->getMessage());
      }

      return false;
  }
}
