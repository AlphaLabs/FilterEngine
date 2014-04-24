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

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;

/**
 * Class RequestBasedFilterBagFactory
 *
 * @package AlphaLabs\FilterEngine\FilterBag\Factory
 *
 * @author  Sylvain Mauduit <swop@swop.io>
 */
class RequestBasedFilterBagFactory extends ExpressionParserFactory
{
    /** @var RequestStack */
    protected $requestStack;
    /** @var string */
    protected $filterKey;

    /**
     * @param RequestStack $requestStack
     * @param string       $filterKey
     */
    public function __construct(
        RequestStack $requestStack,
        $filterKey
    ) {
        $this->filterKey    = $filterKey;
        $this->requestStack = $requestStack;
    }

    /**
     * {@inheritDoc}
     */
    public function build(Request $request = null)
    {
        if (null === $request) {
            if (null === $request = $this->requestStack->getCurrentRequest()) {
                return null;
            }
        }

        $filtersExpression = $this->extractValue($request, $this->filterKey);

        if (null === $filtersExpression) {
            return null;
        }

        return $this->getFilterBagFromExpression($filtersExpression);
    }

    /**
     * Extract from the request the value of the given key.
     * This method can be override in order to change the extraction logic.
     *
     * The method should return null if the key isn't found in the request.
     *
     * @param Request $request
     * @param string  $key
     *
     * @return mixed|null
     */
    protected function extractValue(Request $request, $key)
    {
        return $request->get($key);
    }
}
