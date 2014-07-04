% Kirkwood Church of Christ website - Developers' Manual
% Scott Bale
% December 2013

Kirkwood Church of Christ website (WordPress) 
=============================================

Developers' manual
------------------

http://www.kirkwoodcoc.org/

Overview
--------------

This manual, coupled with the more basic `README.md` manual, should
provide all information necessary to take care of all aspects of the
website: changes, upgrades, billing, etc.

For Developers/Maintainers
--------------------------

### software

For must up-to-date host provider settings see
[settings](http://www.ipower.com/controlpanel/settings.bml).

Current software stack (5/24/14)
-----------------------------------------------------------------------------------
software            version used   description
------------------- -------------- ------------------------------------------------
wordpress           2.9.1          blogging/website software
mysql               5.5.32         embedded database that WordPress
                                   uses to store content (pages,
                                   posts, accounts, etc.)
php                 5.2            programming language that WordPress
                                   is written in
apache              ?.?            web server                                   
Debian Linux        ?.?            host operating system
-----------------------------------------------------------------------------------


### WordPress

### upgrading

to 3.9.1

1. download 3.9.1 zip
1. copy files over current 
    1. don't overwrite wp-includes themes or plugins
1. refresh admin dashboard - was prompted to upgrade database, which I did
1. upgrade any plugins (e.g. audio player)
1. sftp updated files (had to use FireFTP to do so recursively)
1. after upgrade, got some 404 errors for about ~30 min, then stopped. Caching?! *shrugs*

### Git version control

#### tags

    git tag -a -m "blah blah" 2.0.x
    git push --tags origin master

\newpage

Advanced - Running a local copy of the website
----------------------------------------------

### OSX 10.6 - Snow Leopard

These are my notes from running my local copy of the website on my
MacBook Pro running OSX 10.6 (Snow Leopard).

1. start mysql (via System Preferences mysql pane)
1. start apache
1. export mysql db from live website, import to local copy

### php

quick test

    http://kirkwoodcoc.localhost/phptest.php
    
see
    
    /etc/php.ini[.default]
    
for verbose mysql errors, add the following to
`wp-includes\wp-db.php`, function `__construct`, after `if (!$this->dbh) {`

    echo(mysql_error());
    
upgrading:

see

    /usr/local/lib/php.ini
    
(mostly copied from my Mac OSX terminal window)

    cd work/components/php-4.4.9/
    ./configure --with-apxs2=/usr/local/apache2/bin/apxs --with-mysql
    make
    sudo make install
    [edit php.ini-recommended]
    [edit php.ini-dist]
    sudo cp php.ini-dist /usr/local/lib/php.ini


#### wp-config.php

This is the PHP configuration file for the WordPress site

mySQL

    db name: <%= kirkwoodcoc-mysql-local %>
    user: <%= kirkwoodcoc-mysql-local %>
    pwd: <%= kirkwoodcoc-mysql-local %>

WordPress

    wordpress admin: <%= kirkwoodcoc-wordpress-admin-local %>

(These values should differ from the ones used in the real site's wp-config.php.)


#### phpMyAdmin (mySQL admin)


Backing up db:

    http://codex.wordpress.org/WordPress_Backups

installation: 

    

unzip to apache2 htdocs:

    /usr/local/apache2/htdocs/phpMyAdmin-2.11.10-english
    
or newer location... (had to tweak authentication section)
    
    /usr/local/Cellar/httpd/2.2.27/share/apache2/htdocs/phpMyAdmin-2.11.10-english
    
edit config.inc.php

    http://localhost/phpMyAdmin-2.11.10-english/Documentation.html
    http://localhost/phpMyAdmin-2.11.10-english/scripts/setup.php
    http://localhost/phpMyAdmin-2.11.10-english/
    
upgrading



### mySQL

see (for mysql socket file)

    /etc/my.cnf

no root password

misc commands: 

    mysql --version
    mysqlshow -u root
    mysqlshow -u root wordpress
    mysqladmin
    SELECT user,  Length(`Password`) FROM `mysql`.`user`;    

OS X (Snow Leopard) specific:

    sudo /usr/local/mysql/support-files/mysql.server start

    sudo /usr/local/mysql/support-files/mysql.server stop
    
#### procedure for updating local db from dump of live db

   
backup
    
    mysqldump --add-drop-table -u root -h localhost -p kirkwoodcoc | gzip -c > blog.bak.sql.gzip
    mysqldump --add-drop-table -u root -h localhost -p kirkwoodcoc > blog.bak.sql
    
notes: *do* drop tables, *don't* create database

hand-edit exported file, change `CREATE DATABASE ___` to `kirkwoodcoc2`

restore from backup

    mysql -u wp -h localhost -p kirkwoodcoc < ~/sandbox/church/kirkwoodcoc_2010-02-13.sql

when prompted for password

    wp

AFTER copying database (from remote to local):
http://codex.wordpress.org/Changing_The_Site_URL

    select concat('[audio:', post_content,']') from kwcoc_posts where substring(post_content, 1, 7) = 'http://'

    update kwcoc_posts set post_content=concat('[audio:', post_content,']') where substring(post_content, 1, 7) = 'http://'

example 

    mysql -u root -p
    use kirkwoodcoc;
    show tables;
    select count(*) from kwcoc_posts;


#### update wordpress admin pwd:

login to mysql 

    mysql -u root 
    
then at prompt:

    update wordpress.kirkwoodcoc set user_pass = MD5('admin') where ID=1;

#### misc

some old commands I made note of:

    mysql -u root
    CREATE DATABASE wordpress;
    GRANT ALL PRIVILEGES ON wordpress.* TO "wp"@"localhost" IDENTIFIED BY OLD_PASSWORD("wp");
    GRANT ALL PRIVILEGES ON kirkwoodcoc2.* TO "wp"@"localhost" IDENTIFIED BY PASSWORD("wp");
    FLUSH PRIVILEGES;
    SET PASSWORD FOR 'wp'@'localhost' = OLD_PASSWORD('wp');
    SHOW COLUMNS FROM mydb.mytable;
    
    rename table kirkwoodcoc.kwcoc_links to kirkwoodcoc.wp_links,
    kirkwoodcoc.kwcoc_options to kirkwoodcoc.wp_options,
    kirkwoodcoc.kwcoc_postmeta to kirkwoodcoc.wp_postmeta,
    kirkwoodcoc.kwcoc_posts to kirkwoodcoc.wp_posts,
    kirkwoodcoc.kwcoc_term_relationships to
    kirkwoodcoc.wp_term_relationships, kirkwoodcoc.kwcoc_term_taxonomy
    to kirkwoodcoc.wp_term_taxonomy, kirkwoodcoc.kwcoc_terms to
    kirkwoodcoc.wp_terms, kirkwoodcoc.kwcoc_usermeta to
    kirkwoodcoc.wp_usermeta, kirkwoodcoc.kwcoc_users to
    kirkwoodcoc.wp_users;

### apache

#### quickstart

* start

    sudo /usr/local/apache2/bin/apachectl -k start
    
* browse to

    http://kirkwoodcoc.localhost/    

* configure

    /usr/local/apache2/conf/httpd.conf


#### Apache 2.2.7 homebrew

[sbale ~ (mac-os-x)]$brew install httpd
==> Downloading http://www.apache.org/dist/httpd/httpd-2.2.27.tar.bz2
######################################################################## 100.0%
==> ./configure --prefix=/usr/local/Cellar/httpd/2.2.27 --mandir=/usr/local/Cellar/httpd/2.2.27/share/man --localstatedir=/usr/local/var/apache2 --sysconfdir=/usr/local/etc/a
==> make
==> make install
==> Caveats
To have launchd start httpd at login:
    ln -sfv /usr/local/opt/httpd/*.plist ~/Library/LaunchAgents
Then to load httpd now:
    launchctl load ~/Library/LaunchAgents/homebrew.mxcl.httpd.plist
==> Summary
/usr/local/Cellar/httpd/2.2.27: 1319 files, 22M, built in 5.6 minutes

#### Apache 2.2.7

See

    /usr/local/Cellar/httpd/2.2.27
    start.sh
    local.http.conf
    http://[localhost]/phpMyAdmin-2.11.10-english/index.php
    http://kirkwoodcoc.localhost/
    /usr/local/Cellar/httpd/2.2.27/share/apache2/htdocs/phpMyAdmin-2.11.10-english

#### (OLD) Apache 2.0.63 install

use "sudo" to install and start

    cd work/components/apache/httpd-2.0.63/
    ./configure --prefix=/usr/local/apache2 --enable-rewrite=shared
    
make error:
change `APR_HAS_SENDFILE` in `apr.h` to 0

    find . -name "apr.h"

    make
    sudo make install
    [edit /usr/local/apache2/conf/httpd.conf]
    sudo /usr/local/apache2/bin/apachectl -k start
    sudo /usr/local/apache2/bin/apachectl -k graceful
    /private/etc/hosts
    /usr/local/apache2/conf/httpd.conf

PERMALINKS

`apache mod_rewrite`

* `LoadModule` directive
* in `httpd.conf`: 

    LoadModule rewrite_module modules/mod_rewrite.so

** add `index.php` to `DirectoryIndex`

DirectoryIndex index.html index.html.var index.php

