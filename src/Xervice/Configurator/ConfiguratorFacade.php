<?php


namespace Xervice\Configurator;


use DataProvider\StepDataDataProvider;
use Xervice\Configurator\Business\Step\StepCollection;
use Xervice\Core\Facade\AbstractFacade;

/**
 * @method \Xervice\Configurator\ConfiguratorFactory getFactory()
 */
class ConfiguratorFacade extends AbstractFacade
{
    /**
     * @param \Xervice\Configurator\Business\Step\StepCollection $stepCollection
     * @param \DataProvider\StepDataDataProvider $dataProvider
     *
     * @return \DataProvider\StepDataDataProvider
     * @throws \Xervice\Configurator\Business\Exception\ConfiguratorException
     */
    public function runConfigurator(StepCollection $stepCollection, StepDataDataProvider $dataProvider): StepDataDataProvider
    {
        return $this->getFactory()->createConfigurator($stepCollection)->execute($dataProvider);
    }
}