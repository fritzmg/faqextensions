<?php

/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2005-2015 Leo Feyer
 *
 * @license LGPL-3.0+
 */


/**
 * Add palettes to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['palettes']['faqtoplist']   = '{title_legend},name,headline,type;{config_legend},faq_limit,faq_readerModule;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['faqrecommendedlist']   = '{title_legend},name,headline,type;{config_legend},faq_limit,faq_sortorder,faq_readerModule;{template_legend:hide},customTpl;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';

/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['faq_limit'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['faq_limit'],
	'default'                 => '10',
	'search'                  => true,
	'inputType'               => 'text',
	'eval'                    => array('maxlength'=>32, 'style' => 'width: 5em;', 'rgxp' => 'digit', 'tl_class'=>'w50', 'decodeEntities' => true),
	'sql'                     => "varchar(32) NOT NULL default '10'"
);

$GLOBALS['TL_DCA']['tl_module']['fields']['faq_sortorder'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['faq_sortorder'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options'                 => array('sort_alpha_asc', 'sort_alpha_desc', 'sort_created_desc', 'sort_created_asc'),
	'reference'               => &$GLOBALS['TL_LANG']['tl_module'],
	'sql'                     => "varchar(20) NOT NULL default 'sort_alpha_asc'"
);

/**
 * Provide miscellaneous methods that are used by the data configuration array.
 *
 * @author Helmut Schottmüller <https://github.com/hschottm>
 */
class tl_module_faq_extensions extends Backend
{

	/**
	 * Get all FAQ sort order values and return them as array
	 *
	 * @return array
	 */
	public function getSortValues()
	{
		$arrSortOrder = array(
			0 => $GLOBALS['TL_LANG']['tl_module']['sort_order_alpha'],
			1 => $GLOBALS['TL_LANG']['tl_module']['sort_order_created']
		);
		return $arrSortOrder;
	}
}
