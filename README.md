Configurator
=====================

[![Build Status](https://travis-ci.org/xervice/configurator).svg?branch=master)](https://travis-ci.org/xervice/configurator)

Possibility to loop your step classes to complete a DataProvider.


Installation
-----------------
```
composer require xervice/configurator
```


Using
-----------------

To use it, you have to write your Steps by implementing StepInterface or extending AbstractStep. After that you can use the facade:

```php
$stepCollection = new StepCollection(
    [
        new MyStepOne(),
        new MyStepTwo()
    ]
);

$myData = new MyOwnDataProvider();

$stepData = new StepDataDataProvider();
$stepData->setData($myData);

try {
    $completeStepData = $this->getFacade()->runConfigurator($stepCollection, $stepData);
} catch (ConfiguratorException $exception) {
    // Problems
}
```