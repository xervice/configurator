<?php


namespace XerviceTest\Configurator\Steps;


use DataProvider\TestSchemaDataProvider;
use Xervice\Configurator\Business\Model\Step\AbstractStep;

class StepOne extends AbstractStep
{
    /**
     * @return bool
     */
    public function done(): bool
    {
        return $this->getTestData()->getStepOne();
    }

    public function execute(): void
    {
        $this->getTestData()->setStepOne(true);
    }

    /**
     * @return \DataProvider\TestSchemaDataProvider
     */
    private function getTestData(): TestSchemaDataProvider
    {
        return $this->getData()->getData();
    }
}