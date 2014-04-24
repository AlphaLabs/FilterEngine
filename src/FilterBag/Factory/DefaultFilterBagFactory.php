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

/**
 * The default FilterBag factory provides an empty filter bag
 * (useful to provide a default filter bag if no filter bag is provided elsewhere).
 *
 * @package AlphaLabs\FilterEngine\FilterBag\Factory
 *
 * @author  Sylvain Mauduit <swop@swop.io>
 */
class DefaultFilterBagFactory implements FilterBagFactoryInterface
{
    /**
     * {@inheritDoc}
     */
    public function build()
    {
        return new FilterBag();
    }
}
