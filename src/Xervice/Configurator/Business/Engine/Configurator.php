<?php


namespace Xervice\Configurator\Business\Engine;


use DataProvider\StepDataDataProvider;
use Xervice\Configurator\Business\Exception\ConfiguratorException;
use Xervice\Configurator\Business\Step\StepCollection;

class Configurator implements ConfiguratorInterface
{
    /**
     * @var \Xervice\Configurator\Business\Step\StepCollection
     */
    private $stepCollection;

    /**
     * Configurator constructor.
     *
     * @param \Xervice\Configurator\Business\Step\StepCollection $stepCollection
     */
    public function __construct(StepCollection $stepCollection)
    {
        $this->stepCollection = $stepCollection;
    }

    /**
     * @param \DataProvider\StepDataDataProvider $dataProvider
     *
     * @return \DataProvider\StepDataDataProvider
     * @throws \Xervice\Configurator\Business\Exception\ConfiguratorException
     */
    public function execute(StepDataDataProvider $dataProvider): StepDataDataProvider
    {
        $step = null;

        foreach ($this->stepCollection as $step) {
            $step->setData($dataProvider);

            if (!$step->done()) {
                if (!$step->ready()) {
                    throw new ConfiguratorException(
                        sprintf(
                            'Step %s is not ready, but all previous steps are done',
                            \get_class($step)
                        )
                    );
                }

                $step->execute();
                $this->execute($step->getData());
            }
        }

        return $step ? $step->getData() : $dataProvider;
    }
}