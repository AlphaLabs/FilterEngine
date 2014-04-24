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

use AlphaLabs\FilterEngine\FilterBag\FilterBagInterface;

interface FilterBagProviderInterface
{
    /**
     * Provide the current filter bag instance
     *
     * Returns null if the current context does not provide any filter information.
     *
     * @return FilterBagInterface|null
     */
    public function getFilterBag();
}
