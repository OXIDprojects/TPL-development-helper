<?php
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

class d3_dev_d3inquiry extends d3_dev_d3inquiry_parent
{
    protected $_oOrderBasket = null;

    /**
     * @return d3_dev_oxbasket
     */
    public function d3DevGetOrderBasket()
    {
        /** @var oxbasket $oBasket */
        $oBasket = $this->_getInquiryBasket();

        // unsetting bundles
        $oOrderArticles = $this->getInquiryArticles();
        foreach ($oOrderArticles as $sItemId => $oItem) {
            if ($oItem->isBundle()) {
                $oOrderArticles->offsetUnset($sItemId);
            }
        }

        // add this order articles to basket and recalculate basket
        $oBasket = $this->_addInquiryArticlesToBasket($this->getInquiryUser(), $oOrderArticles);
        // recalculating basket
        $oBasket->calculateBasket(true);
        $oBasket->d3ClearBasketItemArticles();

        return $oBasket;
    }

    /**
     * @return string
     */
    public function d3getLastInquiryId()
    {
        if (oxRegistry::getConfig()->getRequestParameter('d3inquirynr')) {
            $sWhere = ' oxinquirynr = ' . (int) oxRegistry::getConfig()->getRequestParameter('d3inquirynr');
        } else {
            $sWhere = 1;
        }

        $sSelect = "SELECT oxid FROM ".getViewName('d3inquiry')." WHERE ".$sWhere." ORDER BY oxinquirydate DESC LIMIT 1";

        return oxDb::getDb(oxDb::FETCH_MODE_ASSOC)->getOne($sSelect);
    }

    public function d3getLastInquiry()
    {
        $this->load($this->d3getLastInquiryId());
        //$this->_d3AddVouchers();
    }

    /**
     * @return oxBasket
     */
    public function getBasket()
    {
        $oBasket = parent::getBasket();

        if (false == $oBasket && oxRegistry::getConfig()->getActiveView()->getClassName() == 'd3dev') {
            $oBasket = $this->d3DevGetOrderBasket();
        }

        return $oBasket;
    }
    
    protected function _d3AddVouchers()
    {
        $sSelect = "SELECT oxid FROM oxvouchers WHERE oxorderid = ".oxDb::getDb(oxDb::FETCH_MODE_ASSOC)->quote($this->getId()).";";
        
        $aResult = oxDb::getDb(oxDb::FETCH_MODE_ASSOC)->getArray($sSelect);

        foreach ($aResult as $aFields) {
            $oVoucher = oxNew('oxvoucher');
            $oVoucher->load($aFields['oxid']);
            $this->_aVoucherList[$oVoucher->getId()] = $oVoucher;
        }
    }

    /**
     * Returns basket object filled up with discount, delivery, wrapping and all other info
     *
     * @param bool $blStockCheck perform stock check or not (default true)
     *
     * @return oxBasket
     */
    protected function _getInquiryBasket($blStockCheck = true)
    {
        $this->_oOrderBasket = oxNew("oxBasket");
        $this->_oOrderBasket->enableSaveToDataBase(false);

        //setting recalculation mode
        $this->_oOrderBasket->setCalculationModeNetto($this->isNettoMode());

        // setting stock check mode
        $this->_oOrderBasket->setStockCheckMode($blStockCheck);

        // setting virtual basket user
        $this->_oOrderBasket->setBasketUser($this->getInquiryUser());

        // transferring order id
        $this->_oOrderBasket->setInquiryId($this->getId());

        // setting basket currency order uses
        $aCurrencies = $this->getConfig()->getCurrencyArray();
        foreach ($aCurrencies as $oCur) {
            if ($oCur->name == $this->oxorder__oxcurrency->value) {
                $oBasketCur = $oCur;
                break;
            }
        }

        // setting currency
        $this->_oOrderBasket->setBasketCurrency($oBasketCur);

        // set basket card id and message
        $this->_oOrderBasket->setCardId($this->oxorder__oxcardid->value);
        $this->_oOrderBasket->setCardMessage($this->oxorder__oxcardtext->value);

        if ($this->_blReloadDiscount) {
            $oDb = oxDb::getDb(oxDb::FETCH_MODE_ASSOC);
            // disabling availability check
            $this->_oOrderBasket->setSkipVouchersChecking(true);

            // add previously used vouchers
            $sQ = 'select oxid from oxvouchers where oxorderid = ' . $oDb->quote($this->getId());
            $aVouchers = $oDb->getAll($sQ);
            foreach ($aVouchers as $aVoucher) {
                $this->_oOrderBasket->addVoucher($aVoucher['oxid']);
            }
        } else {
            $this->_oOrderBasket->setDiscountCalcMode(false);
            $this->_oOrderBasket->setVoucherDiscount($this->oxorder__oxvoucherdiscount->value);
            $this->_oOrderBasket->setTotalDiscount($this->oxorder__oxdiscount->value);
        }

        return $this->_oOrderBasket;
    }
}