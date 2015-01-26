<?php
/**
 * Contao Open Source CMS
 *
 * Copyright (c) 2015 Heimrich & Hannot GmbH
 * @package slick
 * @author Rico Kaltofen <r.kaltofen@heimrich-hannot.de>
 * @license http://www.gnu.org/licences/lgpl-3.0.html LGPL
 */

/**
 * Table tl_slick_config
 */
$GLOBALS['TL_DCA']['tl_slick_config'] = array(

	// Config
	'config'   => array(
		'dataContainer'    => 'Table',
		'enableVersioning' => true,
		'sql'              => array(
			'keys' => array(
				'id' => 'primary',
			)
		),
	),

	// List
	'list'     => array(
		'sorting'           => array
		(
			'mode'        => 1,
			'flag'        => 3,
			'fields'      => array('sorting'),
			'panelLayout' => 'filter;search,limit',
			'fields'      => array('title')
		),
		'label'             => array
		(
			'fields' => array('title'),
			'format' => '%s'
		),
		'global_operations' => array(
			'all' => array(
				'label'      => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'       => 'act=select',
				'class'      => 'header_edit_all',
				'attributes' => 'onclick="Backend.getScrollOffset();" accesskey="e"'
			)
		),
		'operations'        => array(
			'edit'   => array(
				'label' => &$GLOBALS['TL_LANG']['tl_slick_config']['edit'],
				'href'  => 'act=edit',
				'icon'  => 'edit.gif'
			),
			'copy'   => array(
				'label' => &$GLOBALS['TL_LANG']['tl_slick_config']['copy'],
				'href'  => 'act=copy',
				'icon'  => 'copy.gif'
			),
			'delete' => array(
				'label'      => &$GLOBALS['TL_LANG']['tl_slick_config']['delete'],
				'href'       => 'act=delete',
				'icon'       => 'delete.gif',
				'attributes' => 'onclick="if(!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\'))return false;Backend.getScrollOffset()"'
			),
			'show'   => array(
				'label' => &$GLOBALS['TL_LANG']['tl_slick_config']['show'],
				'href'  => 'act=show',
				'icon'  => 'show.gif'
			)
		)
	),

	// Palettes
	'palettes' => array(
		'default' => '{title_legend},title;'
	),

	// Fields
	'fields'   => array(
		'id'      => array(
			'sql' => "int(10) unsigned NOT NULL auto_increment"
		),
		'sorting' => array(
			'sorting' => true,
			'flag'    => 2,
			'sql'     => "int(10) unsigned NOT NULL default '0'"
		),
		'tstamp'  => array(
			'sql' => "int(10) unsigned NOT NULL default '0'"
		),
		'title'   => array(
			'label'     => &$GLOBALS['TL_LANG']['tl_slick_config']['title'],
			'exclude'   => true,
			'search'    => true,
			'sorting'   => true,
			'flag'      => 1,
			'inputType' => 'text',
			'eval'      => array('mandatory' => true, 'maxlength' => 255),
			'sql'       => "varchar(255) NOT NULL default ''"
		)
	)
);

class tl_slick_config extends Backend
{

	public function __construct()
	{
		parent::__construct();
		$this->import('BackendUser', 'User');
	}

}
