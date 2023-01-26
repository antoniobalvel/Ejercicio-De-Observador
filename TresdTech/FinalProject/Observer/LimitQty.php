<?php

namespace TresdTech\FinalProject\Observer;

use Magento\Framework\Event\Observer;
use Magento\Framework\Event\ObserverInterface;
use Magento\Framework\Exception\LocalizedException;
use Psr\Log\LoggerInterface;

class LimitQty implements ObserverInterface
{
    /**
     * @var LoggerInterface
     */
    protected $_logger;

    /**
     * @var \Magento\Checkout\Model\Session
     */
    protected $_session;

    /**
     * LimitQty constructor.
     *
     * @param LoggerInterface $logger
     * @param \Magento\Checkout\Model\Session $session
     */
    public function __construct(
        LoggerInterface $logger,
        \Magento\Checkout\Model\Session $session
    ) {
        $this->_logger = $logger;
        $this->_session = $session;
    }

    /**
     * @param Observer $observer
     * @throws LocalizedException
     */
    public function execute(Observer $observer)
    {
        $quote = $this->_session->getQuote();
        $qty = $quote->getItemsSummaryQty();

        if ($qty >= 6) {
            throw new LocalizedException(__('You can not add more than 6 items'));
        }
    }
}



// CODIGO ORIGINAL

// use Magento\Framework\Event\ObserverInterface;

// class Car implements ObserverInterface{

// protected $_logger;
// protected $_session;


//     public function __construct(
// \Psr\Log\LoggerInterface $_logger,
// \Magento\Checkout\Model\Session $_session)
// {
// $this->_logger = $logger;
// $this->_session = $session;
// }

// public function execute (\Magento\Framework\Event\Observer $observer)
//   {
// $quote = $this->_session->getQuote();
// $qty = $quote->getItemsSummaryQty();

// if($qty >= 6){
// throw new \Magento\Framework\Exception\NoSuchEntityException(__('Ya no puedes agregar mas'));
//             }

//   }

// }