MySQL - backing up or importing
===============================

Back Up
-------

http://codex.wordpress.org/WordPress_Backups

    mysqldump --add-drop-table -u root -h localhost -p kirkwoodcoc | gzip -c > blog.bak.sql.gzip
    mysqldump --add-drop-table -u root -h localhost -p kirkwoodcoc > blog.bak.sql

Export gzipped file from iPower phpmyadmin. Notes: *do* drop tables, *don't* create database

Unzip:

    gunzip __EXPORTED_FILE__.sql.gz

Edit first dozen or so lines:

* comment out `CREATE` statement, if present
* change db name to `kirkwoodcoc2` (or whatever is in `wp-config.php`) - three places I saw, e.g. `CREATE DATABASE ___` to `kirkwoodcoc2`


Restore From Backup
-------------------

Below, `username` should match `DB_USER` from `wp-config.php`. (Also stored in 1Password.)

    mysql -u [username] -h localhost -p kirkwoodcoc < [exported file].sql

when prompted for password

    <%= kirkwoodcoc-mysql-local %>


Misc
----

For ad-hoc CLI usage

    mysql -u root [-p]


Create WP table in new db
-------------------------

In mysql CLI

    mysql -u root -p
    CREATE DATABASE [dbname] DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
    CREATE USER "[username]"@"localhost" IDENTIFIED BY "[username]";
    GRANT ALL PRIVILEGES ON [dbname].* TO "[username]"@"localhost" IDENTIFIED BY "[username]";
    quit
    
then import the .sql file (this takes a while)
