=== Podcasting ===
Contributors: cavemonkey50
Tags: podcast, itunes, podcasting, rss, feed, enclosure
Requires at least: 2.6
Tested up to: 2.7
Stable tag: 2.0b20

Adds full podcasting support to WordPress.

== Description ==

Originally created for the Google Summer of Code 2007, Podcasting brings complete podcasting support to WordPress. Taking advantage of the latest and greatest in WordPress 2.6/2.7, WordPress podcasting has never been so easy.

= Features =

- Full iTunes support (both feed and item tags).
- A dedicated podcasting feed that can stand alone or be applied to any archive, category, or tag page.
- Support for multiple formats (or podcasts) with each format receiving their own dedicated feed.
- Offers a podcast player (audio and video) that can be included in any post.
- A simple, easy to use interface.
- Fully integrates with WordPress' existing enclosure support.

= Usage =

Feed, iTunes, and format options can be configured in WordPress' Settings > Podcasting page.

Episodes can be added, edited, and deleted via the Podcasting options box displayed on posts' edit screen. The box appears below the image uploading section and can be rearranged with the other options boxes.

== Installation ==

1. Upload the `podcasting` folder to your `/wp-content/plugins/` directory.
1. Activate the plugin through the 'Plugins' menu in WordPress.
1. Configure your podcasting feed through the 'Settings' > 'Podcasting' menu in WordPress.
1. Begin adding new episodes to posts!

== Frequently Asked Questions ==

= Help, the podcasting feed is resulting in a 404! =

WordPress 2.5 slightly changed the upgrade procedure. Stored rewrite rules (such as Podcasting's) are dumped after an upgrade to prevent issues. From now on, [rewrite rules must be refreshed](http://codex.wordpress.org/Upgrading_WordPress_Extended#Step_10:_Update_Permalinks_and_.htaccess) as part of the upgrade procedure.

Alternatively, if the pretty feed URLs aren't working period, you can also use the following URL structure:

`http://example.com/?feed=podcast`
`http://example.com/?feed=podcast&format=x`

= I'm seeing a warning that an incorrect mime type was detected. =

Your web server is not reporting file types correctly. This may cause problems with certain podcatchers, namely iTunes. If you're familiar with editing the .htaccess file, look up the correct the mime type for the file type, and add the correction to your .htaccess file in this format:

`AddType [mime type] .[file extension]`

== Upcoming Features ==

The following features have been suggested for a future version of Podcasting and are being considered:

* Improve the interface in WordPress 2.7, allowing the Podcasting UI to be placed in the sidebar.
* Add localization support.
* Automatically detect the length of audio (and possible video) files.
* Add an option to allow the player in feeds.
* Add better support for Feedburner, allowing users to redirect their podcasting feed there.
* Add an alternative player view for iPhone/iPod touch users.
* Add more configurable options for formats, allowing every feed option to be overwritten.
* Allow users to set the itunes:subtitle and itunes:description fields manually, ignoring the contents of the post.

== Known Issues ==

* Having a category called 'podcast' can cause some unexpected issues. This will be addressed shortly.
* Automatically adding the podcasting player will include every podcast on that post and does not play well with formats. An upcoming release will allow users to specify what format to use for the automatic player addition.
* The user interface under 2.7 works but may not look great. This will be redesigned soon.
* The user interface looks terrible under Internet Explorer 6 and may not function correctly. At the moment this browser is not support for managing Podcasting.

== Changelog ==

**2.0 Beta 20** - Bug Fix

* Corrects broken format feeds.
* Adds several better methods for enclosing a feed (mainly fixing redirects not working). Since messing with the enclosing methods have caused recent trouble, if anything breaks, please let me know!
* Fixes all known feed validation issues as well as a few that would prevent iTunes clients from reading the feed.

**2.0 Beta 19** - Bug Fix

* Fixes an error that could occur if cURL is missing from PHP.

**2.0 Beta 18** - Bug Fix

* Corrects encoding issues with video file download links.

**2.0 Beta 17** - Critical Bug Fix

* Resolves an issue where enclosures could disappear from the main feed when Podcasting is activated.
* Resolves an issue where a local enclosure was not working for some users do to a missing magic_mime on their server.

**2.0 Beta 16** - Bug Fix

* Corrects a PHP warning that could occur prevent an enclosure from occurring.

**2.0 Beta 15** - Critical Bug Fix

* Corrects a bug in remote file retrieval present since beta 13.

**2.0 Beta 14** - Bug Fix

* Applies the fixes in beta 13 to the podPress importer.
* Fixes a rare PHP error related to the local enclosure attempt.
* Corrects a potential XHTML error with certain themes.

**2.0 Beta 13** - Bug Fix

* Greatly improves enclosure retrieval. If the file can't be accessed via the internet, a local attempt will be made. Anyone experiencing the missing enclosures bug should upgrade to this version.
* Adds a notification if there are issues connecting to the file.
* Corrects some plugin conflicts.
* Fixes issues with foreign characters in the blog title.

**2.0 Beta 12** - Bug Fix

* Corrects an XML warning and error in the podcast feed related to the iTunes image.
* Removes a warning that could display during a podPress import.

**2.0 Beta 11** - Bug Fix

* Adds support for importing via WPMU.
* Fixes a bug where the podPress importer would not handle relative URLs correctly.

**2.0 Beta 10** - Bug Fix

* Improves file type detection for the Send to Editor button.
* Corrects an XML warning in the podcast feed related to the iTunes image.
* Improves robustness of script additions, possibly fixing some IE scripting errors.
* Fixes some errors where importing from podPress would fail.

**2.0 Beta 9** - Minor Update

* Now alerts the user if the file they enter does not exist (404). This should help weed out the mysterious disappearing enclosures.
* Fixes a conflict with some of WordPress 2.7's admin jQuery (namely the show button in the media gallery).
* Corrects an XML warning in the podcast feed related to the iTunes image.

**2.0 Beta 8** - Bug Fix

* Corrects an error message related to the new automatic player addition.

**2.0 Beta 7** - Major Update

* Supports WordPress 2.7 and now requires WordPress 2.6.
* Includes an importer for migrating from podPress.
* Adds a video player (JW FLV Player) and updates the audio player (WordPress Audio Player 2.0).
* Adds an option to automatically include players above or below the content of a post.
* Adds options to configure player variables on a global or per player basis.
* Adds options for placing text above, before, and below a player, while specifying a field as a "download link".
* Adds a more robust method for enclosing files. This new method adds relative URL support, support for enclosing any type of file, and should alleviate the problems most users were having. If a server issue is detected, a warning is displayed with more information on how to correct the problem.
* Adds an option to configure the language of RSS feeds.
* Adds a standard RSS image tag to the feed when itunes:artwork is used.
* Fixes countless potential feed validation issues.

**1.65** - Bug Fix

* Corrects saved draft issue brought on by WordPress 2.6.

**1.64** - Bug Fix

* Adds missing image showing the audio player's colors.
* Fixes a bug where changing a format's slug would forget the format's explicit setting.

**1.63** - Critical Bug Fix

* Corrects typo preventing 1.62's fix from working.

**1.62** - Critical Bug Fix

* Resolves an issue where an episode would not be saved once navigating away from the page.

**1.61** - Bug Fix

* Resolves an issue where certain URL characters such as spaces would cause a failure creating an enclosure.
* Resolves validation issues with the RSS feed.

**1.6** - Minor Update

* Adds options to configure the audio player's colors.

**1.52** - Minor Update

* The player is no longer replaced with the text "Download Podcast" in feeds to prevent that text from showing up in iTunes descriptions when the player is inserted first in a post.

**1.51** - Bug Fix

* Fixes the Send to Editor button when the visual editor is disabled.

**1.5** - Major Update

* Fixes compatibility issues with WordPress 2.5.
* Updates to the user interface to reflect the changes in 2.5.
* Episode addition interface is now fully AJAX. Add and delete episodes without having to refresh the page.
* Converts [podcast] tag to new shortcode API.
* Fixes Send to Editor button not working on the visual editor.
* **Note**: Version 1.5 requires WordPress 2.5.

**1.02** - Critical Bug Fix

* Fixes a critical Javascript error affecting Internet Explorer and possibly other browsers.
* It is recommended to install this update as soon as possible.

**1.01** - Bug Fix

* Fixes a conflict with the Feedburner Feedsmith plugin.
Resolves AJAX errors when managing formats.

**1.0** - Initial Release