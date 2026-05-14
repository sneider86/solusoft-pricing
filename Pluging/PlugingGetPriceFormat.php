<?php
namespace Solusoft\Pricing\Pluging;

use Magento\Framework\Locale\Format;

class PlugingGetPriceFormat
{
    public function afterGetPriceFormat(
        Format $subject, 
        $result, 
        $localeCode = null, 
        $currencyCode = null
    ) {
        $result['precision'] = 0;
        $result['requiredPrecision'] = 0;

        return $result;
    }
}
