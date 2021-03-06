<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2013 Leo Feyer
 *
 * Formerly known as TYPOlight Open Source CMS.
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 3 of the License, or (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 *
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at <http://www.gnu.org/licenses/>.
 *
 * PHP version 5
 * @copyright  IMS Internet Marketing Solutions Ltd. 2013
 * @author	 Dominik Zogg <dz@erfolgreiche-internetseiten.ch>
 * @package	isotope_payment_saferpay
 * @license	LGPLv3
 */

use Payment\Saferpay\Data\PayInitParameterInterface;
use Payment\Saferpay\Data\Billpay\BillpayPayInitParameterInterface;

/**
 * Palettes
 */
$GLOBALS['TL_DCA']['tl_iso_payment_modules']['palettes']['payment_saferpay'] = '{type_legend},type,name,label;{note_legend:hide},note;{config_legend},new_order_status,minimum_total,maximum_total,countries,shipping_modules,product_types;{gateway_legend},payment_saferpay_httpclient,payment_saferpay_disable_ssl_verification,payment_saferpay_timeout,payment_saferpay_accountid,payment_saferpay_password,payment_saferpay_description,payment_saferpay_paymentmethods;{price_legend:hide},price,tax_class;{enabled_legend},enabled';
$GLOBALS['TL_DCA']['tl_iso_payment_modules']['palettes']['payment_saferpay_billpay'] = '{type_legend},type,name,label;{note_legend:hide},note;{config_legend},new_order_status,minimum_total,maximum_total,countries,shipping_modules,product_types;{gateway_legend},payment_saferpay_httpclient,payment_saferpay_disable_ssl_verification,payment_saferpay_timeout,payment_saferpay_accountid,payment_saferpay_password,payment_saferpay_description,payment_saferpay_providerset_billpay;{price_legend:hide},price,tax_class;{enabled_legend},enabled';

/**
 * Fields
 */
$GLOBALS['TL_DCA']['tl_iso_payment_modules']['fields']['payment_saferpay_httpclient'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_iso_payment_modules']['payment_saferpay_httpclient'],
	'inputType'		=> 'radio',
	'options'		=> array
	(
		AbstractIsotopePaymentSaferpay::CLIENT_CURL,
		AbstractIsotopePaymentSaferpay::CLIENT_FOPEN,
	),
	'reference'		=> &$GLOBALS['TL_LANG']['MSC'],
	'eval'			=> array('mandatory'=>true, 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_iso_payment_modules']['fields']['payment_saferpay_disable_ssl_verification'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_iso_payment_modules']['payment_saferpay_disable_ssl_verification'],
	'inputType'		=> 'checkbox',
	'eval'			=> array('tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_iso_payment_modules']['fields']['payment_saferpay_timeout'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_iso_payment_modules']['payment_saferpay_timeout'],
	'inputType'		=> 'text',
	'eval'			=> array('tl_class'=>'w50', 'rgxp'=>'digit')
);

$GLOBALS['TL_DCA']['tl_iso_payment_modules']['fields']['payment_saferpay_accountid'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_iso_payment_modules']['payment_saferpay_accountid'],
	'inputType'		=> 'text',
	'eval'			=> array('mandatory'=>true, 'maxlength'=>16, 'tl_class'=>'w50'),
);

$GLOBALS['TL_DCA']['tl_iso_payment_modules']['fields']['payment_saferpay_password'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_iso_payment_modules']['payment_saferpay_password'],
	'inputType'		=> 'text',
	'eval'			=> array('mandatory'=>true, 'maxlength'=>16, 'tl_class'=>'w50'),
);

$GLOBALS['TL_DCA']['tl_iso_payment_modules']['fields']['payment_saferpay_description'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_iso_payment_modules']['payment_saferpay_description'],
	'inputType'		=> 'text',
	'eval'			=> array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'clr long'),
);

$GLOBALS['TL_DCA']['tl_iso_payment_modules']['fields']['payment_saferpay_paymentmethods'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_iso_payment_modules']['payment_saferpay_paymentmethods'],
	'inputType'		=> 'checkbox',
	'options'		=> array
	(
		PayInitParameterInterface::PAYMENTMETHOD_MASTERCARD,
		PayInitParameterInterface::PAYMENTMETHOD_VISA,
		PayInitParameterInterface::PAYMENTMETHOD_AMERICAN_EXPRESS,
		PayInitParameterInterface::PAYMENTMETHOD_DINERSCLUB,
		PayInitParameterInterface::PAYMENTMETHOD_JCB,
		PayInitParameterInterface::PAYMENTMETHOD_SAFERPAY_TESTCARD,
		PayInitParameterInterface::PAYMENTMETHOD_LASER_CARD,
		PayInitParameterInterface::PAYMENTMETHOD_BONUS_CARD,
		PayInitParameterInterface::PAYMENTMETHOD_POSTFINANCE_E_FINANCE,
		PayInitParameterInterface::PAYMENTMETHOD_POSTFINANCE_CARD,
		PayInitParameterInterface::PAYMENTMETHOD_MAESTRO_INTERNATIONAL,
		PayInitParameterInterface::PAYMENTMETHOD_MYONE,
		PayInitParameterInterface::PAYMENTMETHOD_DIRECTDEBIT,
		PayInitParameterInterface::PAYMENTMETHOD_INVOICE,
		PayInitParameterInterface::PAYMENTMETHOD_IMMEDIATE_TRANSFER,
		PayInitParameterInterface::PAYMENTMETHOD_PAYPAL,
		PayInitParameterInterface::PAYMENTMETHOD_GIROPAY,
		PayInitParameterInterface::PAYMENTMETHOD_IDEAL,
		PayInitParameterInterface::PAYMENTMETHOD_CLICK_N_BUY,
		PayInitParameterInterface::PAYMENTMETHOD_HOMEBANKING_AT,
		PayInitParameterInterface::PAYMENTMETHOD_MPASS,
	),
	'reference'		=> &$GLOBALS['TL_LANG']['MSC'],
	'eval'			=> array('mandatory'=>true, 'multiple'=>true, 'tl_class'=>'w50')
);

$GLOBALS['TL_DCA']['tl_iso_payment_modules']['fields']['payment_saferpay_providerset_billpay'] = array
(
	'label'			=> &$GLOBALS['TL_LANG']['tl_iso_payment_modules']['payment_saferpay_providerset_billpay'],
	'inputType'		=> 'checkbox',
	'options'		=> array
	(
		BillpayPayInitParameterInterface::PROVIDERSET_BILLPAY_LSV,
		BillpayPayInitParameterInterface::PROVIDERSET_BILLPAY_INVOICE,
	),
	'reference'		=> &$GLOBALS['TL_LANG']['MSC'],
	'eval'			=> array('mandatory'=>true, 'multiple'=>true, 'tl_class'=>'w50')
);
