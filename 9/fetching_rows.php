<html>
    <head>
        <title>Fetching Multiple Rows</title>
    </head>
    <body>
        <?php
            $dbc = mysqli_connect('localhost', 'testuser', 'testuser', 'northwind')
                or trigger_error('Error connecting to MySQL server.', E_USER_ERROR);

            $query = "SELECT ProductName, UnitPrice FROM Products";

            $result = mysqli_query($dbc, $query)
                or trigger_error('Error querying database.', E_USER_ERROR);
        ?>
        <table border='1px solid;'>
            <tr><th>Product Name<th>
                <th>Unit Price</th></tr>
        <?php
            while($row = mysqli_fetch_array($result))
            {
                echo '<tr><td>' . $row['ProductName'] . '</td><td>'
                     . $row['UnitPrice'] . '</td></tr>';
            }
            mysqli_close($dbc);
        ?>
        </table>
    </body>
</html>
