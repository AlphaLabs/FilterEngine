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

use AlphaLabs\FilterEngine\FilterBag\FilterBag;
use AlphaLabs\FilterEngine\FilterBag\FilterBagInterface;

/**
 * Class FilterBagFactory
 *
 * @package AlphaLabs\FilterEngine\FilterBag\Factory
 *
 * @author  Sylvain Mauduit <swop@swop.io>
 */
class FilterBagFactory
{
    /** @var  array */
    protected $defaultFilters;

    /**
     * Constructor
     *
     * @param array $defaultFilters
     */
    public function __construct(array $defaultFilters = array())
    {
        $this->defaultFilters = $defaultFilters;
    }

    /**
     * Gets a new instance of FilterBag
     *
     * @param array $filters
     *
     * @return FilterBagInterface
     */
    public function get(array $filters = array())
    {
        $filters = array_merge($this->defaultFilters, $filters);

        //Clean filters
        $filters = array_filter($filters, function ($value) {
            return !empty($value);
        });

        $filterBag = new FilterBag();
        $filterBag->initialize($filters);

        return $filterBag;
    }
}

