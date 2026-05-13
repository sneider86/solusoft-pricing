<?php
namespace Solusoft\Pricing\Pluging;

use Magento\Directory\Model\Currency;
use Magento\Directory\Model\PriceCurrency;
use Magento\Framework\Locale\Format;
use Magento\Framework\Pricing\PriceCurrencyInterface;

class PlugingFormat
{
    public function afterGetPriceFormat(Format $subject, $result, $localeCode = null, $currencyCode = null)
    {
        $result['precision'] = 0;
        $result['requiredPrecision'] = 0;

        return $result;
    }

    public function aroundFormat(
        PriceCurrency $subject,
        callable $proceed,
        $amount,
        $includeContainer = true,
        $precision = PriceCurrencyInterface::DEFAULT_PRECISION,
        $scope = null,
        $currency = null
    ) {
        return $proceed(
            $amount,
            $includeContainer,
            $this->normalizePrecision($precision),
            $scope,
            $currency
        );
    }

    public function aroundConvertAndFormat(
        PriceCurrency $subject,
        callable $proceed,
        $amount,
        $includeContainer = true,
        $precision = PriceCurrencyInterface::DEFAULT_PRECISION,
        $scope = null,
        $currency = null
    ) {
        return $proceed(
            $amount,
            $includeContainer,
            $this->normalizePrecision($precision),
            $scope,
            $currency
        );
    }

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
