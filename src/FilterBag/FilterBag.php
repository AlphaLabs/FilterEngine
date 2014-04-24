<?php
/*
 * This file licensed under the MIT license.
 *
 * (c) Sylvain Mauduit <swop@swop.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AlphaLabs\FilterEngine\FilterBag;

use AlphaLabs\Common\AttributeBag\AttributeBag;

class FilterBag extends AttributeBag implements FilterBagInterface
{
    /**
     * Constructor
     */
    public function __construct()
    {
        $this->setName('filters');
    }
}
