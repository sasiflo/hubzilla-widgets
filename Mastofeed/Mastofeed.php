<?php

namespace Zotlabs\Widget;

/**
 * Mastofeed widget
 * Displays an embedded mastodon feed using mostofeed.com service
 * args:
 *   'url' (required)
 *       fully qualified URL to your mastodon homepage, e.g. 'https://foobar.com/users/yourname'
 *
 */


class Mastofeed {

	function widget($args) {
		if(! $args['url'])
			return '';

		$o = '<iframe allowfullscreen sandbox="allow-top-navigation allow-scripts" width="270" height="9000" frameBorder="0" scrolling="no" src="https://www.mastofeed.com/api/feed?url=' . urlencode($args['url']) . '.atom&theme=light&size=80&header=false"></iframe>';

		return $o;

	}

}