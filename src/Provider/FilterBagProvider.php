<?php
/*
 * This file licensed under the MIT license.
 *
 * (c) Sylvain Mauduit <swop@swop.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AlphaLabs\FilterEngine\Provider;

use AlphaLabs\FilterEngine\FilterBag\Factory\FilterBagFactoryInterface;

/**
 * The FilterBag provider is able to provide a valid FilterBagInterface object by delegating the build operation
 * to the injected factory.
 *
 * @package AlphaLabs\FilterEngine\Provider
 *
 * @author  Sylvain Mauduit <swop@swop.io>
 */
class FilterBagProvider implements FilterBagProviderInterface
{
    /** @var FilterBagFactoryInterface Factory used to build filter bag */
    private $factory;

    /**
     * @param FilterBagFactoryInterface $factory Factory used to build pagination request
     */
    public function __construct(FilterBagFactoryInterface $factory)
    {
        $this->factory = $factory;
    }

    /**
     * {@inheritDoc}
     */
    public function getFilterBag()
    {
        return $this->factory->build();
    }
}
