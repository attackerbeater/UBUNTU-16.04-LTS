<?php
namespace Ewave\ServiceContract\Model;
/**
 *
 */
class ServiceContractObserver {

  private $eventManager;

  function __construct(\Magento\Framework\Event\Manager $eventManager)
  {
    $this->eventManager = $eventManager;
  }

  private function dispatch()
  {
    $eventData = null;
    // Code...
    $this->eventManager->dispatch('ewave_service_contract_module_event_before');
    // More code that sets $eventData...
    $this->eventManager->dispatch('ewave_service_contract_module_event_after', ['data' => $eventData]);
  }


}
