<?php
namespace Solusoft\Pricing\Pluging;

use Magento\Directory\Model\Currency;
use Magento\Directory\Model\PriceCurrency;
use Magento\Framework\Locale\Format;
use Magento\Framework\Pricing\PriceCurrencyInterface;

class PlugingCurrency
{
    public function aroundFormatPrecision(
        Currency $subject,
        callable $proceed,
        $price,
        $precision,
        $options = [],
        $includeContainer = true,
        $addBrackets = false
    ) {
        $precision = $this->normalizePrecision($precision);

        if (isset($options['precision'])) {
            $options['precision'] = $this->normalizePrecision((int) $options['precision']);
        }

        return $proceed($price, $precision, $options, $includeContainer, $addBrackets);
    }

    private function normalizePrecision($precision)
    {
        return (int) $precision === PriceCurrencyInterface::DEFAULT_PRECISION ? 0 : $precision;
    }
}
