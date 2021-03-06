-- **********************************************************
-- *                                                        *
-- * IMPORTANT NOTE                                         *
-- *                                                        *
-- * Do not import this file manually but use the TYPOlight *
-- * install tool to create and maintain database tables!   *
-- *                                                        *
-- **********************************************************

--
-- Table `tl_iso_payment_modules`
--

CREATE TABLE `tl_iso_payment_modules` (
  `payment_saferpay_httpclient` varchar(16) NOT NULL default '',
  `payment_saferpay_disable_ssl_verification` char(1) NOT NULL default '',
  `payment_saferpay_timeout` int(10) unsigned NOT NULL DEFAULT '30000',
  `payment_saferpay_accountid` varchar(16) NOT NULL default '',
  `payment_saferpay_password` varchar(16) NOT NULL default '',
  `payment_saferpay_description` varchar(255) NOT NULL default '',
  `payment_saferpay_paymentmethods` blob NULL,
  `payment_saferpay_providerset_billpay` blob NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


--
-- Table `tl_iso_orders`
--

CREATE TABLE `tl_iso_orders` (
  `pob_accountholder` varchar(50) NOT NULL default '',
  `pob_accountnumber` varchar(50) NOT NULL default '',
  `pob_bankcode` varchar(50) NOT NULL default '',
  `pob_bankname` varchar(50) NOT NULL default '',
  `pob_payernote` varchar(80) NOT NULL default '',
  `pob_duedate` varchar(8) NOT NULL default ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
