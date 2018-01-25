<?php

use OxidEsales\Eshop\Core\DatabaseProvider;
use OxidEsales\Eshop\Core\Registry;

/**
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 *
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 *
 * http://www.shopmodule.com
 *
 * @copyright � D� Data Development, Thomas Dartsch
 * @author    D� Data Development - Daniel Seifert <ds@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

class d3_dev_oxorder extends d3_dev_oxorder_parent
{
    /**
     * @return d3_dev_oxbasket
     */
    public function d3DevGetOrderBasket()
    {
        /** @var d3_dev_oxbasket $oBasket */
        $oBasket = $this->_getOrderBasket();

        // unsetting bundles
        /** @var \OxidEsales\Eshop\Core\Model\ListModel $oOrderArticles */
        $oOrderArticles = $this->getOrderArticles();
        foreach ($oOrderArticles as $sItemId => $oItem) {
            /** @var $oItem \OxidEsales\Eshop\Application\Model\OrderArticle */
            if ($oItem->isBundle()) {
                $oOrderArticles->offsetUnset($sItemId);
            }
        }

        // add this order articles to basket and recalculate basket
        $this->_addOrderArticlesToBasket($oBasket, $oOrderArticles);
        // recalculating basket
        $oBasket->calculateBasket(true);
        $oBasket->d3ClearBasketItemArticles();

        $this->_oPayment = $this->_setPayment($oBasket->getPaymentId());

        return $oBasket;
    }

    /**
     * @return string
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseConnectionException
     */
    public function d3getLastOrderId()
    {
        $orderNr = (int) oxNew(\OxidEsales\Eshop\Core\Request::class)->getRequestParameter('d3ordernr');
        $sWhere = 1;
        if ($orderNr) {
            $sWhere = ' oxordernr = ' . $orderNr;
        }

        $sSelect = "SELECT oxid FROM ".getViewName('oxorder')." WHERE ".$sWhere." ORDER BY oxorderdate DESC LIMIT 1";

        return DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getOne($sSelect);
    }

    /**
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseConnectionException
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseErrorException
     */
    public function d3getLastOrder()
    {
        $this->load($this->d3getLastOrderId());
        $this->_d3AddVouchers();
    }

    /**
     * @return d3_dev_oxbasket|\OxidEsales\Eshop\Application\Model\Basket
     */
    public function getBasket()
    {
        $oBasket = parent::getBasket();

        if (false == $oBasket && Registry::getConfig()->getActiveView()->getClassKey() == 'd3dev') {
            $oBasket = $this->d3DevGetOrderBasket();
        }

        return $oBasket;
    }

    /**
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseConnectionException
     * @throws \OxidEsales\Eshop\Core\Exception\DatabaseErrorException
     */
    protected function _d3AddVouchers()
    {
        $sSelect = "SELECT oxid FROM oxvouchers WHERE oxorderid = ".DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->quote($this->getId()).";";

        $aResult = DatabaseProvider::getDb(DatabaseProvider::FETCH_MODE_ASSOC)->getAll($sSelect);

        foreach ($aResult as $aFields) {
            $oVoucher = oxNew(\OxidEsales\Eshop\Application\Model\Voucher::class);
            $oVoucher->load($aFields['oxid']);
            $this->_aVoucherList[$oVoucher->getId()] = $oVoucher;
        }
    }
}
