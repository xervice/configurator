<?php

namespace Xervice\Configurator\Business\Engine;

use DataProvider\StepDataDataProvider;

interface ConfiguratorInterface
{
    /**
     * @param \DataProvider\StepDataDataProvider $dataProvider
     *
     * @return \DataProvider\StepDataDataProvider
     * @throws \Xervice\Configurator\Business\Exception\ConfiguratorException
     */
    public function execute(StepDataDataProvider $dataProvider): StepDataDataProvider;
}