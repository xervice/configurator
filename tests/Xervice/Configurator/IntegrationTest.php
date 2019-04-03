<?php

namespace XerviceTest\Configurator;

use DataProvider\StepDataDataProvider;
use DataProvider\TestSchemaDataProvider;
use Xervice\Config\Business\XerviceConfig;
use Xervice\Configurator\Business\Model\Step\StepCollection;
use Xervice\Core\Business\Model\Locator\Dynamic\Business\DynamicBusinessLocator;
use Xervice\Core\Business\Model\Locator\Locator;
use Xervice\DataProvider\Business\DataProviderFacade;
use Xervice\DataProvider\DataProviderConfig;
use XerviceTest\Configurator\Steps\StepOne;
use XerviceTest\Configurator\Steps\StepTwo;

/**
 * @method \Xervice\Configurator\Business\ConfiguratorFacade getFacade()
 */
class IntegrationTest extends \Codeception\Test\Unit
{
    use DynamicBusinessLocator;

    protected function _before()
    {
        XerviceConfig::set(DataProviderConfig::FILE_PATTERN, '*.dataprovider.xml');
        $this->getDataProviderFacade()->generateDataProvider();
        XerviceConfig::set(DataProviderConfig::FILE_PATTERN, '*.testprovider.xml');
        $this->getDataProviderFacade()->generateDataProvider();
    }

    protected function _after()
    {
        $this->getDataProviderFacade()->cleanDataProvider();
    }

    /**
     * @group Xervice
     * @group Configurator
     * @group Integration
     *
     * @throws \Xervice\Configurator\Business\Model\Exception\ConfiguratorException
     */
    public function testHappyWay()
    {
        $stepCollection = new StepCollection(
            [
                new StepOne(),
                new StepTwo()
            ]
        );

        $myData = new TestSchemaDataProvider();

        $stepData = new StepDataDataProvider();
        $stepData->setData($myData);

        $this->assertFalse($stepData->getData()->getStepOne());
        $this->assertFalse($stepData->getData()->getStepTwo());

        $stepData = $this->getFacade()->runConfigurator($stepCollection, $stepData);

        $this->assertTrue($stepData->getData()->getStepOne());
        $this->assertTrue($stepData->getData()->getStepTwo());
    }

    /**
     * @group Xervice
     * @group Configurator
     * @group Integration
     *
     * @expectedException \Xervice\Configurator\Business\Model\Exception\ConfiguratorException
     * @expectedExceptionMessage Step XerviceTest\Configurator\Steps\StepTwo is not ready, but all previous steps are done
     *
     * @throws \Xervice\Configurator\Business\Model\Exception\ConfiguratorException
     */
    public function testNotReady()
    {
        $stepCollection = new StepCollection(
            [
                new StepTwo()
            ]
        );

        $myData = new TestSchemaDataProvider();

        $stepData = new StepDataDataProvider();
        $stepData->setData($myData);

        $this->getFacade()->runConfigurator($stepCollection, $stepData);
    }

    /**
     * @return \Xervice\DataProvider\DataProviderFacade
     */
    private function getDataProviderFacade(): DataProviderFacade
    {
        return Locator::getInstance()->dataProvider()->facade();
    }
}