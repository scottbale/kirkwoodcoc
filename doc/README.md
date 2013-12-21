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
* Directories named `wp-*` contain the actual WordPress files. For the
  most part they are `.php` files, which are text files written in the
  PHP programming language.


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

