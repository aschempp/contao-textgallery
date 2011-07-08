<?php if (!defined('TL_ROOT')) die('You cannot access this file directly!');

/**
 * Contao Open Source CMS
 * Copyright (C) 2005-2011 Leo Feyer
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
 * @copyright  Andreas Schempp 2011
 * @author     Andreas Schempp <andreas@schempp.ch>
 * @license    http://opensource.org/licenses/lgpl-3.0.html
 * @version    $Id$
 */


class ContentTextGallery extends ContentGallery
{
	
	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_textgallery';
	
	
	protected function compile()
	{
		// Compile image gallery based on gallery content element
		parent::compile();
		
		$this->import('String');
		
		// Support for Contao 2.10
		if (version_compare(VERSION, '2.9', '>'))
		{
			global $objPage;
		
			// Clean the RTE output
			if ($objPage->outputFormat == 'xhtml')
			{
				$this->text = $this->String->toXhtml($this->text);
			}
			else
			{
				$this->text = $this->String->toHtml5($this->text);
			}
	
			$this->Template->text = $this->String->encodeEmail($this->text);
		}
		else
		{
			// Clean RTE output
			$this->Template->text = str_ireplace
			(
				array('<u>', '</u>', '</p>', '<br /><br />', ' target="_self"'),
				array('<span style="text-decoration:underline;">', '</span>', "</p>\n", "<br /><br />\n", ''),
				$this->String->encodeEmail($this->text)
			);
		}
		
		// Float image
		if (in_array($this->floating, array('left', 'right')))
		{
			$this->Template->floatClass = ' float_' . $this->floating;
			$this->Template->float = ' float:' . $this->floating . ';';
		}
		
		$this->Template->margin = $this->generateMargin(deserialize($this->imagemargin), 'padding');
		$this->Template->addBefore = ($this->floating != 'below');
	}
}

