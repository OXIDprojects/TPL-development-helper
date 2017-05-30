<?php

/**
 * TPL Development Tool
 * This Software is the property of Data Development and is protected
 * by copyright law - it is NOT Freeware.
 * Any unauthorized use of this software without a valid license
 * is a violation of the license agreement and will be prosecuted by
 * civil and criminal law.
 * http://www.shopmodule.com
 *
 * @copyright � D� Data Development, Thomas Dartsch
 * @package   OrderManager
 * @author    D� Data Development - Daniel Seifert <support@shopmodule.com>
 * @link      http://www.oxidmodule.com
 */

$sLangName = "Deutsch";

// -------------------------------
// RESOURCE IDENTITFIER = STRING
// -------------------------------
$aLang = array(
    //Navigation
    'charset'                                                   => 'ISO-8859-15',

    'SHOP_MODULE_GROUP_d3dev_order'                             => 'Bestellungsablauf manipulieren',
    'SHOP_MODULE_blD3DevAvoidDelBasket'                         => 'Warenkorb wird nach Bestellabschluss nicht geleert',
    'HELP_SHOP_MODULE_blD3DevAvoidDelBasket'                    => 'Damit kann auf der Bestellbest�tigungsseite '.
        '(Thankyou) durch den "zur�ck"-Button in den Warenkorb Schritt 4 gewechselt werden und die Bestellung erneut '.
        'abgeschickt werden. Eine erneute Best�ckung des Warenkorbs ist nicht n�tig. Beim erneuten Absenden wird '.
        'jeweils eine weitere Bestellung angelegt werden. Eventuell verwendete Gutscheine m�ssen so eingestellt '.
        'werden, dass diese mehrfach verwendet werden k�nnen.',
    'SHOP_MODULE_blD3DevShowThankyou'                           => 'Thankyou-Seite kann auch ohne Bestellung '.
        'aufgerufen werden',
    'HELP_SHOP_MODULE_blD3DevShowThankyou'                      => 'Ohne abgesendete Bestellung l��t sich die '.
        'Thankyou-Seite im Standardshop nicht aufrufen. Diese Option stellt dies f�r Entwicklungszwecke zur '.
        'Verf�gung. <br>Den Link zum Seitenaufruf haben wir hier im Stamm-Tab hinterlegt. Die Seite �ffnet sich in '.
        'einem neuen Browserfenster. <br>F�r die Anzeige wird die letzte vorliegende Bestellung geladen. �ber den '.
        'Parameter "d3ordernr=X" kann eine bestimmten Bestellung vorgegeben werden.',

    'SHOP_MODULE_GROUP_d3dev_mail'                              => 'Mailanzeige',
    'SHOP_MODULE_blD3DevShowOrderMailsInBrowser'                => 'Bestellbest�tigungsmails k�nnen im Browser '.
        'angezeigt werden',
    'HELP_SHOP_MODULE_blD3DevShowOrderMailsInBrowser'           => 'Die Links zu den '.
        'jeweiligen Mails sind im Stamm-Tab aufgelistet.<br>F�r die Anzeige wird ohne Angabe der Bestellnummer die '.
        'letzte vorliegende Bestellung geladen. �ber den Parameter "d3ordernr=X" kann eine bestimmten Bestellung '.
        'vorgegeben werden.',

    'SHOP_MODULE_GROUP_d3dev_mailblock'                         => 'Mailversand',
    'SHOP_MODULE_blD3DevBlockMails'                             => 'Mails an beliebige Mailadressen werden nicht '.
        'versandt',
    'HELP_SHOP_MODULE_blD3DevBlockMails'                        => 'Der Mailversand wird komplett geblockt.',
    'SHOP_MODULE_sD3DevRedirectMail'                            => 'versendete Mails an diese Adresse umleiten',
    'HELP_SHOP_MODULE_sD3DevRedirectMail'                       => 'Wenn leer, erfolgt keine Umleitung. Ohne '.
        'zus�tzliche Blockieroption werden die Mails dann an den original Empf�nger gesendet.',
);
