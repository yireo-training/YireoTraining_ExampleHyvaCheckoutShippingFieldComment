<?php declare(strict_types=1);

namespace YireoTraining\ExampleHyvaCheckoutShippingFieldComment\Test\Functional\Plugin;

use Magento\Framework\App\Area;
use Magento\Framework\App\ObjectManager;
use Magento\Framework\App\State;
use Magento\Framework\Interception\PluginList\PluginList;
use Magento\Quote\Model\Quote\Address as QuoteAddress;
use PHPUnit\Framework\TestCase;
use YireoTraining\ExampleHyvaCheckoutShippingFieldComment\Plugin\AddCommentFieldToCustomerAddressExport;

class AddFieldsToCustomerAddressExportTest extends TestCase
{
    public function testIfPluginIsRegistered()
    {
        ObjectManager::getInstance()->get(State::class)->setAreaCode(Area::AREA_FRONTEND);

        $pluginList = ObjectManager::getInstance()->get(PluginList::class);
        $pluginInfo = $pluginList->get(QuoteAddress::class);
        $pluginName = 'YireoTraining_ExampleHyvaCheckoutShippingFieldComment::addCommentFieldToCustomerAddressExport';
        $this->assertArrayHasKey($pluginName, $pluginInfo, var_export(array_keys($pluginInfo), true));
        $this->assertSame(AddCommentFieldToCustomerAddressExport::class, $pluginInfo[$pluginName]['instance']);
    }
}
