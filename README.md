WP Update Prevent DB Changes
============================

This is a fork of https://github.com/Hube2/wp-update-prevent-db-changes

Prevent WP from reseting db schema changes

Have you had to modify one of the standard WordPress DB columns?

Like for example changing option_name from varchar(64) to varchar(191) so that you can use a plugin that may
create long option_name values?

Then you updated WP to a new version only to find that your site has crahsed and burned becuase the column was reset
to what WP thinks it should be?

Add this file to the mu-plugins (wp-content/mu-plugins) folder on your site and modify the dbdelta_queries 
method to change the default WP DB schema so that your changes are not reset to the WP defaults.

The current method includes the alteration I mentioned above for the option_name column.
