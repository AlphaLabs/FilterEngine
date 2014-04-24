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

use AlphaLabs\FilterEngine\FilterBag\FilterBagInterface;

/**
 * The FilterBag factory interface describe the method to implement in order to build FilterBag objects.
 *
 * @package AlphaLabs\FilterEngine\FilterBag\Factory
 *
 * @author  Sylvain Mauduit <swop@swop.io>
 */
interface FilterBagFactoryInterface
{
    /**
     * Build an instance of FilterBag.
     *
     * Returns null if the current context does not contain any information about filters to apply.
     *
     * @return FilterBagInterface|null
     */
    public function build();
}
