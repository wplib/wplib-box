# Handling Databases with WPLib Box

The `{project_dir}/sql` directory is used by WPLib Box as the location for importing SQL and for generating backups.

## Backing up your MySQL database to a .SQL file

To backup simply SSH into the box and then run the `box database import` command:

    cd /path/to/your/project/directory
    vagrant ssh
    box database backup

This will create a `backup.sql` file in `/path/to/your/project/sql`.  If one already exists it will append a number to the end, e.g. `backup1.sql`, `backup2.sql`, etc. 

## Importing a .SQL file into your MySQL database

To import you must copy your SQL file into the /sql directory, SSH into the box and then run the `box database import` command:

### Mac/Linux:

    cd /path/to/your/project
    cp /path/to/your/sqldump.sql sql/ 
    vagrant ssh
    box database import mysqldump.sql

### Windows

    cd C:\path\to\your\project
    copy C:\path\to\your\mysqldump.sql sql/ 
    vagrant ssh
    box database import mysqldump.sql

## Autmatically importing `provision.sql` on first run 

If you have a newly cloned/installed WPLib Box it will import a file named `provision.sql` into `/path/to/your/project/sql`.  

This is especially useful if you are working on a team and want to commit a copy of the production database in your Git repository so that everyone who clones the project will start with the same database. 

## Chunking large .SQL dumps  

If a .SQL file gets too large to commit to a GitHub repository you can use _"Chunking"_. 

A chunked file is a directory that is a replacement for the chunked .SQL file and the directory contains 
a `{filename}.chunks.json` with details about the chunks, and two or more files of the form 
`{filename}-???.sql.chunk` containing the MySQL commands.

The following will _"chunk"_ your `provision.sql` into approximately `25mb` chunks so that GitHub will 
happily version control them:  

    vagrant ssh
    box database chunk provision.sql

The WPLib Box `database import` command will recognize chunked MySQL files and import them seamlessly.  

If you want to recover the original files that was chunked just run the `database unchunk` command:

    vagrant ssh
    box database unchunk provision.sql





