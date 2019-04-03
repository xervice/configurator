<?php declare(strict_types=1);

namespace Xervice\Configurator\Business\Model\Engine;

use DataProvider\StepDataDataProvider;

interface ConfiguratorInterface
{
    /**
     * @param \DataProvider\StepDataDataProvider $dataProvider
     *
     * @return \DataProvider\StepDataDataProvider
     * @throws \Xervice\Configurator\Business\Model\Exception\ConfiguratorException
     */
    public function execute(StepDataDataProvider $dataProvider): StepDataDataProvider;
}