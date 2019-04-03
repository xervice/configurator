<?php


namespace XerviceTest\Configurator\Steps;


use DataProvider\TestSchemaDataProvider;
use Xervice\Configurator\Business\Step\AbstractStep;

class StepTwo extends \Xervice\Configurator\Business\Model\Step\AbstractStep
{
    /**
     * @return bool
     */
    public function ready(): bool
    {
        return $this->getTestData()->getStepOne();
    }

    /**
     * @return bool
     */
    public function done(): bool
    {
        return $this->getTestData()->getStepTwo();
    }

    public function execute(): void
    {
        $this->getTestData()->setStepTwo(true);
    }

    /**
     * @return \DataProvider\TestSchemaDataProvider
     */
    private function getTestData(): TestSchemaDataProvider
    {
        return $this->getData()->getData();
    }
}