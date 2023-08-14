<?php declare(strict_types=1);

namespace YireoTraining\ExampleHyvaCheckoutShippingFieldComment\Plugin;

use Magento\Customer\Api\Data\AddressInterface;

class AddCommentFieldToCustomerAddressExport
{
    public function afterExportCustomerAddress($subject, AddressInterface $addressDataObject)
    {
        $addressDataObject->setCustomAttribute('comment', $subject->getData('comment'));
        return $addressDataObject;
    }
}
