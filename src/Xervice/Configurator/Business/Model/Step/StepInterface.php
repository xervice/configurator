<?php declare(strict_types=1);


namespace Xervice\Configurator\Business\Model\Step;


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
     * @return void
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