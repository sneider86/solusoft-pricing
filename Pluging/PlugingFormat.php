<?php
namespace Solusoft\Pricing\Pluging;

use Magento\Directory\Model\Currency;
use Magento\Directory\Model\PriceCurrency;
use Magento\Framework\Locale\Format;
use Magento\Framework\Pricing\PriceCurrencyInterface;

class PlugingFormat
{
    
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

    private function normalizePrecision($precision)
    {
        return (int) $precision === PriceCurrencyInterface::DEFAULT_PRECISION ? 0 : $precision;
    }
}
