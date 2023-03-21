<?php

/**
 * Purpose:         Parameterizes a database query
 *
 * Description:     Parameterizes an SQL query given a database connection, a query string, a data
 *                  types string, and a variable number of parameters to be used in the query. If
 *                  the query is successful, the database results object will be returned (or TRUE
 *                  if no results set and the query was successful), otherwise FALSE will be returned
 *                  and the connection will have to be queried for the last error.
 *
 * @param           $dbc database connection
 * 
 * @param           $sql_query SQL statement
 * 
 * @param           $data_types string containing a single character representing the data type for each parameter
 * 
 * @param           $query_parameters a variable list of parameters representing each query parameter
 * 
 * @return string   Database results set, otherwise false if there is a database error, or true if successful.
 */
function parameterizedQuery($dbc, $sql_query, $data_types, ...$query_parameters)
{
}