<?php


namespace Xervice\Configurator\Business\Step;


use DataProvider\StepDataDataProvider;
use Xervice\Core\Locator\AbstractWithLocator;

abstract class AbstractStep extends AbstractWithLocator implements StepInterface
{
    /**
     * @var \DataProvider\StepDataDataProvider
     */
    protected $dataProvider;

    /**
     * @param \DataProvider\StepDataDataProvider $dataProvider
     */
    public function setData(StepDataDataProvider $dataProvider): void
    {
        $this->dataProvider = $dataProvider;
    }

    /**
     * @return \DataProvider\StepDataDataProvider
     */
    public function getData(): StepDataDataProvider
    {
        return $this->dataProvider;
    }

    /**
     * @return bool
     */
    public function ready(): bool
    {
        return true;
    }
}