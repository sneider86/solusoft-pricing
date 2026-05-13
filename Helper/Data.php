<?php

namespace Solusoft\Pricing\Helper;

use Magento\Framework\App\Action\Context;
use Magento\Store\Model\ScopeInterface;
use Magento\Framework\App\Helper\AbstractHelper;

class Data extends AbstractHelper
{

    /**
     * Method get Config
     *
     * @param string $option
     */
    public function getConfig($option)
    {
        return $this->scopeConfig->getValue(
            'solusoft_catalog/solusoft_catalog_group_newproducts/'.$option,
            ScopeInterface::SCOPE_STORE
        );
    }

    /**
     * Method get Active
     *
     * @return boolean
     */
    public function getActive()
    {
        $value = (int)$this->getConfig('enable');
        if (isset($value) && $value==1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Method get AutoPlay
     *
     * @return boolean
     */
    public function getAutoPlay()
    {
        $value = (int)$this->getConfig('autoplay');
        if (isset($value) && $value==1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Method get Loop
     *
     * @return boolean
     */
    public function getLoop()
    {
        $value = (int)$this->getConfig('loop');
        if (isset($value) && $value==1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Method get Navigation
     *
     * @return boolean
     */
    public function getNavigation()
    {
        $value = (int)$this->getConfig('navigation');
        if (isset($value) && $value==1) {
            return true;
        } else {
            return false;
        }
    }

    /**
     * Method get Navigation
     *
     * @return int
     */
    public function getSlidePerView()
    {
        $value = (int)$this->getConfig('slides_per_view');
        if (isset($value) && is_numeric($value)) {
            return $value;
        } else {
            return 1;
        }
    }

    /**
     * Method get Delay
     *
     * @return int
     */
    public function getDelayScroll()
    {
        $value = (int)$this->getConfig('delay_scroll');
        if (isset($value) && is_numeric($value)) {
            return $value;
        } else {
            return 1;
        }
    }


}
