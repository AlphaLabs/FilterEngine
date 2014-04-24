<?php
/*
 * This file licensed under the MIT license.
 *
 * (c) Sylvain Mauduit <swop@swop.io>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace AlphaLabs\FilterEngine\Bridge\Doctrine;

use AlphaLabs\FilterEngine\FilterBag\FilterBagInterface;
use Doctrine\ORM\QueryBuilder;
use Swop\FilterExpressionParser\Bridge\Doctrine\QueryBuilderPatcher;
use Swop\FilterExpressionParser\Bridge\Doctrine\QueryExpressionBuilder;
use Swop\FilterExpressionParser\Bridge\Doctrine\QueryContext;
use Swop\FilterExpressionParser\Node\FilterNode;

trait FilteringRepositoryTrait
{
    /**
     * Apply filters from a filter bag on the provided query builder
     *
     * @param QueryBuilder       $queryBuilder QueryBuilder
     * @param string             $alias        QueryBuilder root alias
     * @param FilterBagInterface $filterBag    Filters to apply
     *
     * @return QueryBuilder
     */
    public function applyFilters(QueryBuilder $queryBuilder, $alias, FilterBagInterface $filterBag = null)
    {
        if (is_null($filterBag)) {
            return $queryBuilder;
        }

        foreach ($filterBag->all() as $filter) {
            if ($filter instanceof FilterNode) {
                $this->applyFilter($queryBuilder, $alias, $filter);
            }
        }

        return $queryBuilder;
    }

    /**
     * Apply one filter to the query builder
     *
     * @param QueryBuilder $queryBuilder QueryBuilder
     * @param string       $alias        QueryBuilder root alias
     * @param FilterNode   $filter       Filter to apply
     *
     * @return QueryBuilder
     */
    protected function applyFilter(QueryBuilder $queryBuilder, $alias, FilterNode $filter)
    {
        $queryBuilderPatcher = new QueryBuilderPatcher(new QueryExpressionBuilder());

        return $queryBuilderPatcher->patch($queryBuilder, $filter, new QueryContext($alias));
    }
}
