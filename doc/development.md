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

Current software stack
-----------------------------------------------------------------------------------
software            version used   description
------------------- -------------- ------------------------------------------------
wordpress           2.9.1          blogging/website software
mysql               5.0.91-log     embedded database that WordPress
                                   uses to store content (pages,
                                   posts, accounts, etc.)
php                 4.4.9          programming language that WordPress
                                   is written in
apache              ?.?            web server                                   
Debian Linux        ?.?            host operating system
-----------------------------------------------------------------------------------


### WordPress

### upgrading

### Git version control

#### tags

    git tag -a -m "blah blah" 2.0.x
    git push --tags origin master


# 

\newpage

Advanced - Running a local copy of the website
----------------------------------------------

### OSX 10.6 - Snow Leopard

These are my notes from running my local copy of the website on my
MacBook Pro running OSX 10.6 (Snow Leopard).

### wp-config.php

mySQL

    db name: <%= kirkwoodcoc-mysql-local %>
    user: <%= kirkwoodcoc-mysql-local %>
    pwd: <%= kirkwoodcoc-mysql-local %>

WordPress

    wordpress admin: <%= kirkwoodcoc-wordpress-admin-local %>

(These values should differ from the ones used in the real site's wp-config.php.)

### php

(mostly copied from my Mac OSX terminal window)

    cd work/components/php-4.4.9/
    ./configure --with-apxs2=/usr/local/apache2/bin/apxs --with-mysql
    make
    sudo make install
    [edit php.ini-recommended]
    [edit php.ini-dist]
    sudo cp php.ini-dist /usr/local/lib/php.ini

#### phpMyAdmin (mySQL admin)

Backing up db:

    http://codex.wordpress.org/WordPress_Backups

installation: 

    http://mysql.ty3.net/Documentation.html

unzip to apache2 htdocs:

    /usr/local/apache2/htdocs/phpMyAdmin-2.11.10-english
    
edit config.inc.php

    http://localhost/phpMyAdmin-2.11.10-english/Documentation.html
    http://localhost/phpMyAdmin-2.11.10-english/scripts/setup.php
    http://localhost/phpMyAdmin-2.11.10-english/

### mySQL

no root password

misc commands: 

    mysql --version
    mysqlshow -u root
    mysqlshow -u root wordpress
    mysqladmin
    
backup
    
    mysqldump --add-drop-table -u root -h localhost -p kirkwoodcoc | gzip -c > blog.bak.sql.gzip
    mysqldump --add-drop-table -u root -h localhost -p kirkwoodcoc > blog.bak.sql

restore from backup

    mysql -u root -h localhost -p kirkwoodcoc < ~/play/church/bosco_kirkwoodcoc_2010-02-13.sql

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

#### Apache 2.0.63 install

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


### other

AFTER copying database (from remote to local):
http://codex.wordpress.org/Changing_The_Site_URL

    select concat('[audio:', post_content,']') from kwcoc_posts where substring(post_content, 1, 7) = 'http://'

    update kwcoc_posts set post_content=concat('[audio:', post_content,']') where substring(post_content, 1, 7) = 'http://'
