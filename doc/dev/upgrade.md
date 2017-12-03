Upgrade Wordpress
=================

to version `x.y.z`

1. in-development copy of wordpress is in `wordpress-dev` folder
1. download wordpress `x.y.z` zip or tar.gz - https://wordpress.org/download/

        wget https://wordpress.org/latest.tar.gz
        
1. unzip and extract (extracts to `wordpress` folder)

        gunzip latest.tar.gz
        tar -xvf latest.tar
        
1. manually mv or cp plugins, "cleanhome" theme to new install
1. cp `wordpress-dev/.htaccess` to new install
1. (optional) cp `wordpress-dev/phptest.php` to new install
1. update `index.php` to point to `wordpress-dev` folder; move `index.php` to root folder
1. upgrade any plugins (e.g. audio player, jetpack)
1. hand-upgrade wp-config.php file if necessary (very tedious)
1. `rm -fr wordpress-dev` (or temporarily rename it)
1. `mv wordpress wordpress-dev`
1. refresh admin dashboard - was prompted to upgrade database, which I did

1. sftp updated files (had to use FireFTP to do so recursively)
1. after upgrade, got some 404 errors for about ~30 min, then stopped. Caching?! *shrugs*

Secure File Transfer
--------------------

Transfer the upgraded files to the live website via SFTP.

    sftp -oPort=2222 kirkwoodcoc@ftp.kirkwoodcoc.org

You will be prompted for a password, use `<%= kirkwoodcoc-ipower %>`
Note on recursive sftp: first make the directory, then `put`, e.g.:

    mkdir foo
    put -r foo

Overview
1. upload upgraded files to `wordpress-dev` 
1. Can't recursively delete a directory via `sftp`, have to go thru iPower portal FileManager

SFTP CLI

    cd public_html
    ls -l 
    mkdir wordpress-dev
    put -r wordpress-dev
    rename wordpress wordpressOLD
    rename wordpress-dev wordpress
