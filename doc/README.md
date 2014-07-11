% Kirkwood Church of Christ website
% Scott Bale
% December 2013

Kirkwood Church of Christ website (WordPress) 
=============================================

http://www.kirkwoodcoc.org/

Overview
--------------

This is a manual for basic maintance of, and adding content to, the
website for the Church of Christ in Kirkwood, MO.

Website Info
--------------

### service provider

iPower is our current service provider. They host a copy of our
website and make it accessible on the internet.
http://www.ipower.com

Log into the secure
[control panel dashboard](https://secure.ipower.com/controlpanel/)

    username: kirkwoodcoc
    password: <%= kirkwoodcoc-ipower %>

### billing

Scott's credit card is currently used for annual, automatic billing.
Access via the [Control Panel](https://secure.ipower.com/controlpanel/).

### domain renewal

Our domain `www.kirkwoodcoc.org` is currently renewed automatically as
part of the annual billing.

### History

* 2005 It was Joe Johnsey (former member and deacon) who suggested the
  website. He set up the account with iPower and the initial website.
  He worked with the elders to have them write content. Scott Bale did
  the technical work of putting together a simple initial site.
* 2008 Scott Bale converted the website to its current WordPress form.
  He also hosted the source code on GitHub.
* 2013 Micah Wilcox began co-maintaining the website along with Scott.


adding content
--------------

Adding content is usually comprised of two steps:

1. uploading (via SFTP) the actual (non-WordPress) files (sermon
   audio, class handouts, or whatever)
1. logging into WordPress and creating a new Post or Page for the new
   content

### passwords

Obviously passwords are secret and frequently changing so they are not
stored in any public documents. I will refer to them with placeholders
like, for example, this:

    <%= kirkwoodcoc.wordpress.stof %>
    
This means, the password for the WordPress account with username
'stof'. (This is also the way that I store passwords in
[1Password](https://agilebits.com/onepassword), so it is easy for me
to look up their values.)

### basic layout of files

The website files are organized in the following manner.

    .
    └── root
        └── public_html
            ├── index.php           
            └── web
                ├── audio
                ├── classHandouts
                └── img
            └── wordpress
                ├── index.php
                ├── wp-config.php         
                ├── wp-admin
                ├── wp-content
                    ├── plugins
                    └── themes
                └── wp-includes
            
A few notes:

* `web` - the root diretory of all content _not_ stored in WordPress. Currently:
    * the actual sermon audio `.mp3` files
    * the class handouts (usually `.pdf` files)
    * image files
* `wordpress` - directory containing the actual WordPress files. For
  the most part they are `.php` files, which are text files written in
  the PHP programming language. Whenever Wordpress is upgraded, this
  is the folder whose contents need to be replaced.
    * `wp-config.php` - various site-wide configuration
    * `index.php` - loads the home page. (There are two files with
      this name; one redirects to the other.)
    * `wp-content` - folder containing `plugins` and `themes`, which
      are configurable. This is where plugins and/or themes need to be
      installed (unzipped) to.


#### secure ftp

Open a secure FTP (sftp) session using this command:

    sftp -oPort=2222 kirkwoodcoc@ftp.kirkwoodcoc.org
    
You will be prompted for a password, use `<%= kirkwoodcoc-ipower %>`

### WordPress account

### posting sermon audio

### posting class handouts

### headline

### gospel meetings

### news

Appendix A: Audacity
--------------------

Audacity is free software to edit audio files. I use it to clean up
sermon audio files before FTP'ing them up to the website.

    http://audacity.sourceforge.net/

### Basic workflow

1. import audio (select sermon .mp3 file)
1. edit out songs, gaps, etc.
1. apply noise removal, compression (optional)
1. export as .mp3

### shortcut keys (Linux)

* ⌃-e - zoom to selection
* ⌃-f - zoom fit in window
* ⌃-1 - zoom in
* ⌃-3 - zoom out
* ⇧-⌃-f - zoom fit vertically
* ⇧-j - select beginning to cursor
* ⇧-k - select cursor to end
* ⇧-⌃-i - import audio
* home - skip to start
* end - skip to end
* space - play
* ⌃-w - close track (don't save)
* ⌃-q - exit
* ⌃-u, ⇧-⌃-u mute, unmute all

### shortcut keys (Mac OS)

* ⌘-e - zoom to selection
* ⌘-f - zoom fit in window
* ⌘-1 - zoom in
* ⌘-3 - zoom out
* ⇧-⌘-f - zoom fit vertically
* ⇧-j - select beginning to cursor
* ⇧-k - select cursor to end
* ⇧-⌘-i - import audio
* home - skip to start
* end - skip to end
* space - play
* ⌘-w - close track (don't save)
* ⌘-q - exit
* ⌘-u, ⇧-⌘-u mute, unmute all

### noise removal

    http://wiki.audacityteam.org/wiki/Noise_Removal
    http://manual.audacityteam.org/man/Noise_Removal
    
Suggested settings:

* Noise reduction (dB): 24
* Sensitivity (dB): 0.00
* Frequency Smoothing (Hz): 150
* Attack/decay time (secs): 0.05

### compression

    http://wiki.audacityteam.org/wiki/Compressor
    http://manual.audacityteam.org/man/Compressor    

Suggested settings:

* Threshold: -12 dB
* Noise Floor: -25 dB
* Radio: 2:1
* Attack Time: 0.2 secs
* Decay Time: 2.0 secs
