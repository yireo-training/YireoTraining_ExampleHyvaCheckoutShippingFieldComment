<?php declare(strict_types=1);

namespace YireoTraining\ExampleHyvaCheckoutShippingFieldComment\Form;

use Hyva\Checkout\Magewire\Checkout\AddressView\MagewireAddressFormInterface;
use Hyva\Checkout\Model\Form\EntityFormInterface;
use Hyva\Checkout\Model\Form\EntityFormModifierInterface;

class ShippingAddressFormModifier implements EntityFormModifierInterface
{
    public function apply(EntityFormInterface $form): EntityFormInterface
    {
        $form->registerModificationListener(
            'YireoTraining_ExampleHyvaCheckoutShippingFieldComment::formShippingUpdated',
            'form:shipping:updated',
            function(EntityFormInterface $form, MagewireAddressFormInterface $addressComponent) {
                $field = $form->getField('comment');
                if (!$field) {
                    return $form;
                }

                $value = $field->getValue();
                $addressComponent->getAddressType()->getQuoteAddress()->setData('comment', $value);
                return $form;
            }
        );

        return $form;
    }
}
