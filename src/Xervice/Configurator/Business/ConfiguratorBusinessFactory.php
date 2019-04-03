<?php declare(strict_types=1);


namespace Xervice\Configurator\Business;



use Xervice\Configurator\Business\Model\Engine\Configurator;
use Xervice\Configurator\Business\Model\Engine\ConfiguratorInterface;
use Xervice\Configurator\Business\Model\Step\StepCollection;
use Xervice\Core\Business\Model\Factory\AbstractBusinessFactory;

class ConfiguratorBusinessFactory extends AbstractBusinessFactory
{
    /**
     * @param \Xervice\Configurator\Business\Model\Step\StepCollection $stepCollection
     *
     * @return \Xervice\Configurator\Business\Model\Engine\ConfiguratorInterface
     */
    public function createConfigurator(StepCollection $stepCollection): ConfiguratorInterface
    {
        return new Configurator($stepCollection);
    }
}