=== Already Existing Tags ===

Contributors: digitalemphasis
Donate link: http://www.digitalemphasis.com/donate/
Tags:  admin, administration, automatic, automatic tagging, automatic tags, auto tagger, auto tagging, content, post, posts, tagger, tagging, tags, title
Requires at least: 3.5
Tested up to: 4.7
Stable tag: 1.9
License: GPLv2 or later
License URI: https://www.gnu.org/licenses/gpl-2.0.html

Looks for already existing tags within your posts.


== Description ==

This plugin finds your 'already existing tags' into your post each time you create or edit/save one. The found tags will be automatically assigned.


= Features =

* Easy configuration.
* Allow or block manually added tags; the choice is yours.
* You can choose if the title is examined or not.
* You can select which categories will be affected and which ones will be ignored by the plugin.
* Clean uninstall option: If this option is enabled, the plugin will leave absolutely no traces when uninstalling.
* Visit [www.digitalemphasis.com](http://www.digitalemphasis.com) or follow [@digitalemphasis](https://twitter.com/digitalemphasis) on Twitter for more info.


== Installation ==

1. Upload the 'already-existing-tags' folder to the '/wp-content/plugins/' directory.
2. Activate the plugin through the 'Plugins' menu in WordPress.
3. Configure the plugin through the 'Posts -> Already Existing Tags' administration panel.


== Frequently Asked Questions ==

= Will the automatic tagging funcion works once the plugin is installed and activated? =
No. Firstly you need to select the 'Automatic tagging' checkbox, configure the settings and save the changes.

= Is the post content examined? =
Yes. The post content will always be examined.


== Screenshots ==

1. Already Existing Tags - administration panel


== Changelog ==

= 1.9 =
* Ensure compatibility with WordPress 4.6 and 4.7
* New option: block manually added tags. From now on, manually added tags are allowed by default. Check the new option if you prefer the old behaviour.
* Improved adherence to WordPress Coding Standards.
* Code optimization.

= 1.8 =
* Fixed: moving data from 'aet_automatic_tagging_included_categories' to 'aet_included_categories'.

= 1.7 =
* Ensure compatibility with WordPress 4.5
* New option: examine post title.
* Improved security: data escaping on output.
* Improved the HTML output.
* Code optimization.

= 1.6 =
* Ensure compatibility with WordPress 4.4
* Added Unicode support.

= 1.5 =
* Ensure compatibility with WordPress 4.3
* Improved adherence to WordPress Coding Standards.
* Improved regex performance.

= 1.4 =
* Ensure compatibility with WordPress 4.2
* Added 'check/uncheck' all categories and other slight changes at the administration panel.

= 1.3 =
* Ensure compatibility with WordPress 4.1
* Added support for 'QUICK' and 'BULK' edit modes.
* Slight changes at the administration panel.

= 1.2 =
* Ensure compatibility with WordPress 4.0
* Added 'Do you like this plugin?' section to the administration panel.

= 1.1 =
* From now on, the .php files of the plugin are protected from direct access.
* Fixed a bug with the .css style of the administration panel in some environments.
* Fixed some other small bugs when WP_DEBUG is enabled.

= 1.0 =
* Initial release.
