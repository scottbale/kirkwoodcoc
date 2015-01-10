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

Current software stack (6/13/14)
-----------------------------------------------------------------------------------
software            version used   description
------------------- -------------- ------------------------------------------------
wordpress           3.9.1          blogging/website software
mysql               5.5.32         embedded database that WordPress
                                   uses to store content (pages,
                                   posts, accounts, etc.)
php                 5.2            programming language that WordPress
                                   is written in
apache              ?.?            web server                                   
Debian Linux        ?.?            host operating system
-----------------------------------------------------------------------------------

#### Check installed versions at command line

    $ mysql --version
    $ php --version
    $ apache


### WordPress

See

    wp-config.php
    php-test.php

'home' and 'site' urls can be stored either in `wp-config.php` (`WP_HOME`, `WP_SITEURL`) or in mysql `kwcoc_options` table with `option_name` column of `home` and `siteurl`.

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

### Files of interest

Refer to `basic layout of files` in `README.md`

Current Wordpress theme:

    .../wp-content/themes/cleanhome/
    
File that controls the two most recent sermons which appear on the
home page:

    .../wp-content/themes/cleanhome/home.php

\newpage

Advanced - Running a local copy of the website
----------------------------------------------

### Ubuntu Linux

Helpful link: https://help.ubuntu.com/12.04/serverguide/httpd.html

    sudo apt-get install apache2
    sudo apt-get install php5 libapache2-mod-php5sudo apt-get install php5 libapache2-mod-php5sudo apt-get install php5 libapache2-mod-php5    
    sudo apt-get install libapache2-mod-auth-mysql php5-mysql phpmyadmin
    
restart

    sudo /etc/init.d/apache2 [start|stop|...]
    sudo service apache2 [restart|start|stop|...]

restart - doesn't always work: 

    sudo /usr/sbin/apachectl --start

paths of interest

    /etc/php5/apache2/php.ini
    /etc/init.d/apache2
    /etc/apache2/apache2.conf
    /etc/apache2/conf.d/
    /etc/phpmyadmin/apache.conf
    /var/log/apache2/
    
verify php install

    echo "<?php phpinfo(); ?>" >> /var/www/test.php
    http://<localhost>/test.php
    

#### apache2 configuration

created kirkwoodcoc-specific config file

    pushd /etc/apache2/
    sudo cp sites-available/default sites-available/kirkwoodcoc
    
then edit `kirkwoodcoc` file, then
    
    sudo a2ensite kirkwoodcoc
    sudo service apache2 reload

configure phpmyadmin to work with apache, add this line

    Include /etc/phpmyadmin/apache.conf    

installed additional php modules

    sudo apt-get install php5-curl php5-gd php5-intl php-pear php5-imagick php5-imap php5-mcrypt php5-memcache php5-ming php5-ps php5-pspell php5-recode php5-snmp php5-sqlite php5-tidy php5-xmlrpc php5-xsl
    
enable apache2 mod_rewrite (for wp permalinks)

    cat /etc/apache2/mods-available/rewrite.load
    sudo a2enmod rewrite
    ll /etc/apache2/mods-enabled/
    sudo /etc/init.d/apache2 restart
    
edit 

    /etc/hosts
    
file, add `kirkwoodcoc.localhost` to loopback ip address `127.0.0.1`.
    
Configure fully-qualified domain name, gets around warning "apache2:
Could not reliably determine the server's fully qualified domain name,
using 127.0.0.1 for ServerName".

    sudo sh -c "echo ServerName $HOSTNAME > /etc/apache2/conf.d/fqdn"
    
phpMyAdmin found at: http://localhost/phpmyadmin

permalinks broken (404), had to change `AllowOverride None` to `AllowOverride All` in

    /etc/apache2/sites-available/kirkwoodcoc
    
#### mysql

Export gzipped file from iPower phpmyadmin. Unzip:

    gunzip __EXPORTED_FILE__.sql.gz

Edit first dozen or so lines:

* comment out `CREATE` statement, if present
* change db name to `kirkwoodcoc2` (or whatever is in `wp-config.php`) - three places I saw

In mysql CLI

    mysql -u root -p
    CREATE DATABASE kirkwoodcoc2 DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
    CREATE USER "wp"@"localhost" IDENTIFIED BY "wp";
    GRANT ALL PRIVILEGES ON kirkwoodcoc2.* TO "wp"@"localhost" IDENTIFIED BY "wp";
    quit
    
then import the .sql file (this takes a while)

    sudo mysql -u wp -h localhost -p kirkwoodcoc2 < [exported filename].sql

update home and site urls in mysql (via CLI)

    update kwcoc_options set option_value='http://kirkwoodcoc.localhost' where option_name='home';
    update kwcoc_options set option_value='http://kirkwoodcoc.localhost/wordpress' where option_name='siteurl';


### OSX 10.6 - Snow Leopard

These are my notes from running my local copy of the website on my
MacBook Pro running OSX 10.6 (Snow Leopard).

1. start mysql (via System Preferences mysql pane)
1. start apache (use `start.sh` at root of project)
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
    CREATE USER "wp"@"localhost" IDENTIFIED BY "wp";
    GRANT ALL PRIVILEGES ON wordpress.* TO "wp"@"localhost" IDENTIFIED BY OLD_PASSWORD("wp");
    GRANT ALL PRIVILEGES ON kirkwoodcoc2.* TO "wp"@"localhost" IDENTIFIED BY "wp";
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
    
(or use `start.sh` at root of project, works for Mac OS X)
    
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

Permalink Custom Structure:

    /%year%/%monthnum%/%day%/%category%/%postname%
