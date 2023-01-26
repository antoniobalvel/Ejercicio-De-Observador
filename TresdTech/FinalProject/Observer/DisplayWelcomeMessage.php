<?php
namespace TresdTech\FinalProject\Observer;

use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Message\ManagerInterface;

class DisplayWelcomeMessage implements ObserverInterface
{
    protected $messageManager;


    public function __construct(ManagerInterface $messageManager)
    {
        $this->messageManager = $messageManager;
    }



    public function execute(\Magento\Framework\Event\Observer $observer)
    {
        $customer = $observer->getEvent()->getCustomer();
        $name = $customer->getName();
        $this->messageManager->addSuccess(__('Welcome, %1', $name));
    }
}


