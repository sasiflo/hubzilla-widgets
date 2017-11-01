<?php

namespace Zotlabs\Widget;

/**
 * The netselect widget may be used on the network or pubstream modules to filter conversations 
 * by network. There are no configuration variables.
 */


class Netselect {
	
	function widget($args) {
		$current = (($_GET['net']) ? $_GET['net'] : '');
		$module = \App::$cmd;

		$diaspora    = in_array('diaspora',\App::$plugins);
		$ostatus     = in_array('gnusoc',\App::$plugins);
		$activitypub = in_array('pubcrawl',\App::$plugins);
 
		if(! ($diaspora || $ostatus || $activitypub))
			return '';

		$o .= '<div class="widget saved-search-widget clearfix"><h3 id="netselect">' . t('Network/Protocol') . '</h3><ul id="netselect-list" class="nav nav-pills flex-column">';
	
		$o .= '<li class="nav-item nav-item-hack" id="netselect-default"><a href="' . $module . '" class="nav-link' . (($current === '') ? ' active ' : '') . '" >' . t('Everything') . '</a></li>';

		$o .= '<li class="nav-item nav-item-hack" id="netselect-zot"><a href="' . $module . '?f=&net=zot" class="nav-link' . (($current === 'zot') ? ' active ' : '') . '" >' . t('Zot') . '</a></li>';

		if($diaspora) {
			$o .= '<li class="nav-item nav-item-hack" id="netselect-diaspora"><a href="' . $module . '?f=&net=diaspora" class="nav-link' . (($current === 'diaspora') ? ' active ' : '') . '" >' . t('Diaspora') . '</a></li>';

			$o .= '<li class="nav-item nav-item-hack" id="netselect-friendica"><a href="' . $module . '?f=&net=friendica-over-diaspora" class="nav-link' . (($current === 'friendica-over-diaspora') ? ' active ' : '') . '" >' . t('Friendica') . '</a></li>';

		}

		if($ostatus) {
			$o .= '<li class="nav-item nav-item-hack" id="netselect-gnusoc"><a href="' . $module . '?f=&net=gnusoc" class="nav-link' . (($current === 'gnusoc') ? ' active ' : '') . '" >' . t('OStatus') . '</a></li>';
		}

		if($activitypub) {
			$o .= '<li class="nav-item nav-item-hack" id="netselect-activitypub"><a href="' . $module . '?f=&net=activitypub" class="nav-link' . (($current === 'activitypub') ? ' active ' : '') . '" >' . t('ActivityPub') . '</a></li>';
		}

		$o .= '</ul></div>';

		return $o;

	}

}