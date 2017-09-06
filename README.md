# OUTDATED!!! PHP Database Class

### Outdated

This class needs serious updates to support PHP7+. Will to in the future :)

### What's that?

This php class is a simple "tool" to manage your mysql queries within your php projects. It's easy to use and you have everything you need. There're also some nice little features like "query count" or "show last query".

### Install

- Copy file on server
- Include class to any other php file
- Change database details on top of the file
- USE <3

### Documentation

You can create a new database object like this:

    $db = new database();

To get the last executed query (helps on trouble shooting):

    $db->getLastQuery();

To execute any query:

    $db->query(SQL_STATEMENT);

To perform a select:

    $db->select(FIELDS, TABLE, [WHERE], [ORDER], [LIMIT]);

To perform an insert:

    $db->insert(TABLE, FIELDS, VALUES);

To perform a delete:

    $db->delete(TABLE, [WHERE]);

To perform an update:

    $db->update(TABLE, FIELDS, [WHERE]);

To get the count of the table rows after your query:

    $db->getTableRows(QUERY_RESULT);

To fetch your result into an array:

    $db->fetch(QUERY_RESULT);

To show the count of all executed queries:

    $db->getQueryCount();

### Have fun to use it :)
