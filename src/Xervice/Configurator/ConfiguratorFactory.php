<?php


namespace Xervice\Configurator;


use Xervice\Configurator\Business\Engine\Configurator;
use Xervice\Configurator\Business\Step\StepCollection;
use Xervice\Core\Factory\AbstractFactory;

class ConfiguratorFactory extends AbstractFactory
{
    /**
     * @param \Xervice\Configurator\Business\Step\StepCollection $stepCollection
     *
     * @return \Xervice\Configurator\Business\Engine\Configurator
     */
    public function createConfigurator(StepCollection $stepCollection): Configurator
    {
        return new Configurator($stepCollection);
    }
}