<?php declare(strict_types=1);


namespace Xervice\Configurator\Business;


use DataProvider\StepDataDataProvider;
use Xervice\Configurator\Business\Model\Step\StepCollection;
use Xervice\Core\Business\Model\Facade\AbstractFacade;

/**
 * @method \Xervice\Configurator\Business\ConfiguratorBusinessFactory getFactory()
 */
class ConfiguratorFacade extends AbstractFacade
{
    /**
     * @param \Xervice\Configurator\Business\Model\Step\StepCollection $stepCollection
     * @param \DataProvider\StepDataDataProvider $dataProvider
     *
     * @return \DataProvider\StepDataDataProvider
     * @throws \Xervice\Configurator\Business\Model\Exception\ConfiguratorException
     */
    public function runConfigurator(
        StepCollection $stepCollection,
        StepDataDataProvider $dataProvider
    ): StepDataDataProvider {
        return $this->getFactory()->createConfigurator($stepCollection)->execute($dataProvider);
    }
}