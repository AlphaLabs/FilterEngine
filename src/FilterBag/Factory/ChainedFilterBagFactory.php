<?php
/*
 * This file licensed under the MIT license.
 *
 * (c) Sylvain Mauduit <swop@swop.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AlphaLabs\FilterEngine\FilterBag\Factory;

/**
 * This factory can delegate the build operation to a chain of other factories.
 * The first factory capable to build a filter bag object is used.
 *
 * @package AlphaLabs\FilterEngine\FilterBag\Factory
 *
 * @author  Sylvain Mauduit <swop@swop.io>
 */
class ChainedFilterBagFactory implements FilterBagFactoryInterface
{
    /** @var array */
    private $factories = [];
    /** @var array */
    private $sorted = [];

    /**
     * {@inheritDoc}
     */
    public function build()
    {
        $filterBag = null;

        /** @var FilterBagFactoryInterface $factory */
        foreach ($this->getFactories() as $factory) {
            $filterBag = $factory->build();

            if (!is_null($filterBag)) {
                break;
            }
        }

        return $filterBag;
    }

    /**
     * Adds a factory in the factory chain
     *
     * @param FilterBagFactoryInterface $factory
     * @param int                       $priority
     */
    public function addFactory(FilterBagFactoryInterface $factory, $priority = 0)
    {
        $this->factories[$priority][] = $factory;

        unset($this->sorted);
    }

    /**
     * Gets the sorted factories
     *
     * @return array
     */
    public function getFactories()
    {
        if (!isset($this->sorted)) {
            $this->sortFactories();
        }

        return $this->sorted;
    }

    /**
     * Sorts the internal list of factories by priority.
     */
    private function sortFactories()
    {
        $this->sorted = [];

        krsort($this->factories);
        $this->sorted = call_user_func_array('array_merge', $this->factories);
    }
}
