<?php

namespace AN\NewOrderAttribute\Plugin;

/**
 * Class ShippingInformationManagementPlugin
 * @package AN\NewOrderAttribute\Plugin
 */
class ShippingInformationManagementPlugin
{

    protected $quoteRepository;

    /**
     * @param \Magento\Quote\Model\QuoteRepository $quoteRepository
     */
    public function __construct(
        \Magento\Quote\Model\QuoteRepository $quoteRepository
    ) {
        $this->quoteRepository = $quoteRepository;
    }

    /**
     * @param \Magento\Checkout\Model\ShippingInformationManagement $subject
     * @param $cartId
     * @param \Magento\Checkout\Api\Data\ShippingInformationInterface $addressInformation
     */
    public function beforeSaveAddressInformation(
        \Magento\Checkout\Model\ShippingInformationManagement $subject,
        $cartId,
        \Magento\Checkout\Api\Data\ShippingInformationInterface $addressInformation
    ) {
        $extAttributes = $addressInformation->getExtensionAttributes();
        $orderBy = $extAttributes->getOrderBy();
        $quote = $this->quoteRepository->getActive($cartId);
        $quote->setOrderBy($orderBy);
    }
}