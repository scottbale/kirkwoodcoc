## 7/7/14 Wordpress

'home' and 'site' urls can be stored either in `wp-config.php`
(`WP_HOME`, `WP_SITEURL`) or in mysql `kwcoc_options` table with
`option_name` column of `home` and `siteurl`.


## 2/14/15

setting up new ec2 instance for development, quick checklist

1. launch instance (Amazon linux)
1. ssh `ec2-user`
1. create `scott` user (see above)
1. scp `authorized_keys` file to `/home/scott/.ssh/`
1. add `scott` to `/etc/sudoers.d/` somewhere

        echo "scott ALL=(ALL) ALL" >> /etc/sudoers.d/00_foo

1. ssh `scott`
1. `yum install tmux git`
1. generate new key for github
1. git clone stuff (dotfiles, website)
1. build emacs from src (see above or `emacs.md`)
    a. `yum install gcc autoconf automake texinfo ncurses-devel
    pkgconfig`
1. apache2 `yum install httpd mod_ssl`
1. `yum install links`
1. make user dir readable, executable `chmod`
1. mod_php
1. mysql


## 3/16/15

emacs tramp mode: using su to edit stuff as root

    C-x C-f /su::/etc/hosts RET

get fingerprint of httpd cert (see `ssl.conf`)

    sudo openssl x509 -fingerprint -in foo.crt

or

    sudo openssl x509 -fingerprint -in foo.crt -sha256


## 4/18/15
    
ec2 instance updates - wrong httpd package

http://serverfault.com/questions/570821/amazon-linux-lamp-with-php-5-5

    repoquery --requires php55
    yum list installed http*
    sudo yum remove httpd.x86_64 httpd-tools-2.2.29-1.4.amzn1.x86_64
    sudo yum install php55 httpd24 


## 5/24/15

more on kirkwoodcoc ec2 instance...

install: `php55`, `httpd24`, `mod24_ssl`, `mysql55`, `mysql55-server`, `php55-mysqlnd`

    sudo service mysqld start|status|stop


output from starting:

> PLEASE REMEMBER TO SET A PASSWORD FOR THE MySQL root USER !
> To do so, start the server, then issue the following commands:
>
> /usr/bin/mysqladmin -u root password 'new-password'
> /usr/bin/mysqladmin -u root -h ip-172-30-0-142 password 'new-password'
> 
> Alternatively you can run:
> /usr/bin/mysql_secure_installation
> 
> You can start the MySQL daemon with:
> cd /usr ; /usr/bin/mysqld_safe &
> 
> You can test the MySQL daemon with mysql-test-run.pl
> cd /usr/mysql-test ; perl mysql-test-run.pl

### install php mysql extension

"Your PHP installation appears to be missing the MySQL extension which is required by WordPress."

Find extensions dir:

    sudo php -i | grep extension

found

    extension_dir => /usr/lib64/php/5.5/modules => /usr/lib64/php/5.5/modules

install `php55-mysqlnd`

apache logs: `/var/log/httpd/`

## 5/25/15

Back to php 5.3, httpd 2.2

    sudo yum remove httpd24 mod24_ssl php55-mysqlnd
    sudo yum install httpd httpd-tools-2.2.29-1.4 mod_ssl php php-mysqlnd

## 5/30/15

more on kirkwoodcoc on ec2...

* done migrating back to Apache 2.2, php 3
* permalinks broken (404), had to change `AllowOverride None` to `AllowOverride All` in

        /etc/httpd/conf/httpd.conf

  Under `Directory` for kirkwoodcoc


## 9/5/13

more kirkwoodcoc ec2

startup checklist:

* if necessary update `wp-config.php` from `.secret/dev/`
* if necessary update `wp-config.php` HOME and SITE_URL
* start services

        sudo service mysqld start
        sudo service httpd start

* if necessary, mysql shell

        mysql -u root
        use <dbname>
        show tables;
        quit

* urls:

  http://<ec2IPadress>:8080/
  https://<ec2IPaddress>:8443/

## 9/6/13

Configured for only https, for now.

Naresh A: 777 and 775 permission are not supported. It should be 750 or 755 for the folders and 755 and 644 folder files.

"real" wp-config.php file(s) stored in .gitignore'd directory

## 9/7/13

Kirkwood church facebook group id: `124981047575767`
my FB user id: `1288611289`
my FB app id: `153693303582`
Kirkwood new Page ID: `1482642945369437`
kirkwoodcoc app ID: `947516055286760`

## 9/12/15

    mysql -u root
    use >dbname<;
    show tables;
    
## 3/27/16

WIP, used `wp-add-custom-css` plugin v 0.9.7

## 9/17/16

public DNS 54.162.165.169

1. Created `bin/` directory. Writing python script to export Wordpress database from mysql.
1. Created `doc/dev/` directory, moved docs around.

## 9/18/16

* upgrade to Wordpress 4.3.1
* upgrade plugins

## 12/2/17

* upgrade from 4.6.9 to 4.9.1. (Dev is 4.6.1.)

Why does prod `wp-config.php` contain these 2 lines, and dev does not?

    define( 'FS_CHMOD_FILE' , 0755 );
    define( 'FS_CHMOD_DIR' , 0755 );

### startup

1st attempt:

    Error establishing a database connection

Duh. Forgot to `cp .secret/dev/wp-config.php wordpress/`. Is there a less lame workflow?

### latest db

bunch of WIP stuff in `bin/`

worked on `export-db.py` script
* data-driven from `export-db.json` file
* but, script is not working - `export_url` no longer works (returns `401`). Chrome dev tools no help

gave up, manually exported using web interface, `scp`'ed exported db file instead. 
* exported file was _not_ gzipped *shrug* - looks like https://github.com/phpmyadmin/phpmyadmin/issues/11283
* phpmyadmin v 2.8.0.1
* mysql 5.6.37
* php 4.4.9

https://stackoverflow.com/questions/42385099/1273-unknown-collation-utf8mb4-unicode-520-ci

    Unknown collation: 'utf8mb4_unicode_520_ci'
    
replace `utf8mb4_unicode_520_ci` with `utf8mb4_unicode_ci`

Okay, what's the local version of mysql, php?

    yum --showduplicates list mysql
    5.5-1.6.amzn1

no update available :(

### upgrade to 4.9.1

* see `upgrade.md`
* looks like no changes to stock `wp-config.php` file this time
* looked into upgrading jetpack plugin from 4.3.1 to 5.5.x; looks like they require a Wordpress
  account which we don't have. They no longer offer a way to just download the php files for manual
  installation. (Looks like time to look for a new way to publish to FB and Twitter.)
* audio player plugin is ancient, abandoned, and specific to Flash. Need an HTML 5 audio player
  replacement.

Going with "wpfront notifaction bar" plugin

## 12/9/17

composer - PHP package manager
packagist - composer's PHP package repository
Wordpress doesn't have a `composer.json` file - https://github.com/johnpbloch/wordpress is a fork that has one
http://composer.rarst.net/

hacked the `audio-player` plugin to output HTML5 player element instead of Flash plugin player
