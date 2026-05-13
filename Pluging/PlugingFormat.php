<?php
namespace Solusoft\Pricing\Pluging;

use Magento\Framework\Locale\Format;

class PlugingFormat
{
    private $logger;

    public function __construct(LoggerInterface $logger)
    {
        $this->logger = $logger;
    }

    public function afterGetPriceFormat(PriceCurrency $subject, $result, $localeCode = null, $currencyCode = null)
    {
        $i=0;
        $this->logger->log('Updated websites: ' . implode(', ',  $websiteIds));
    }
}