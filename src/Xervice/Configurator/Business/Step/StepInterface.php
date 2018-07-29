<?php


namespace Xervice\Configurator\Business\Step;


use DataProvider\StepDataDataProvider;

interface StepInterface
{
    /**
     * @return bool
     */
    public function ready(): bool;

    /**
     * @return bool
     */
    public function done(): bool;

    /**
     * @return bool
     */
    public function execute(): void;

    /**
     * @param \DataProvider\StepDataDataProvider $dataProvider
     */
    public function setData(StepDataDataProvider $dataProvider): void;

    /**
     * @return \DataProvider\StepDataDataProvider
     */
    public function getData(): StepDataDataProvider;
}