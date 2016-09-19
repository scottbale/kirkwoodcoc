Upgrade Wordpress
=================

to version `x.y.z`

1. download wordpress `x.y.z` zip or tar.gz - https://wordpress.org/download/

        wget https://wordpress.org/latest.tar.gz

1. copy files over current 
    1. don't overwrite `wp-includes`, themes or plugins
1. refresh admin dashboard - was prompted to upgrade database, which I did
1. upgrade any plugins (e.g. audio player, jetpack)
1. hand-upgrade wp-config.php file (very tedious)
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
1. upload upgraded files to `wordpressNEW` (couldn't find a less lame way to do this than to temporarily rename local dir)
1. Can't recursively delete a directory via `sftp`, have to go thru iPower portal FileManager

SFTP CLI

    cd public_html
    ls -l 
    mkdir wordpressNEW
    put -r wordpressNEW
    rename wordpress wordpressOLD
    rename wordpressNEW wordpress
