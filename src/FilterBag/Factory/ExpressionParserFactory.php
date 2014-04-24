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
use Swop\FilterExpressionParser\Parser\Parser;

abstract class ExpressionParserFactory implements FilterBagFactoryInterface
{
    /**
     * Build a FilterBag object by parsing the given filters expression
     *
     * @param $filtersExpression
     *
     * @return FilterBagInterface
     */
    public function getFilterBagFromExpression($filtersExpression)
    {
        $parser = new Parser($filtersExpression);
        $filtersAST = $parser->getAST();

        $filterBag = new FilterBag();
        $filterBag->set('filter_' . md5($filtersExpression), $filtersAST);

        return $filterBag;
    }
}
