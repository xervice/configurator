<?php declare(strict_types=1);


namespace Xervice\Configurator\Business\Model\Step;


use DataProvider\StepDataDataProvider;
use Xervice\Core\Plugin\AbstractBusinessPlugin;

abstract class AbstractStep extends AbstractBusinessPlugin implements StepInterface
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