<?php declare(strict_types=1);


namespace Xervice\Configurator\Business\Model\Step;


class StepCollection implements \Iterator, \Countable
{
    /**
     * @var \Xervice\Configurator\Business\Model\Step\StepInterface[]
     */
    private $collection;

    /**
     * @var int
     */
    private $position;

    /**
     * Collection constructor.
     *
     * @param \Xervice\Configurator\Business\Model\Step\StepInterface[] $collection
     */
    public function __construct(array $collection)
    {
        foreach ($collection as $validator) {
            $this->add($validator);
        }
    }

    /**
     * @param \Xervice\Configurator\Business\Model\Step\StepInterface $validator
     */
    public function add(StepInterface $validator): void
    {
        $this->collection[] = $validator;
    }

    /**
     * @return \Xervice\Configurator\Business\Model\Step\StepInterface
     */
    public function current(): StepInterface
    {
        return $this->collection[$this->position];
    }

    public function next(): void
    {
        $this->position++;
    }

    /**
     * @return int
     */
    public function key(): int
    {
        return $this->position;
    }

    /**
     * @return bool
     */
    public function valid(): bool
    {
        return isset($this->collection[$this->position]);
    }

    public function rewind(): void
    {
        $this->position = 0;
    }

    /**
     * @return int
     */
    public function count(): int
    {
        return \count($this->collection);
    }
}