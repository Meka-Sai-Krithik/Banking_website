<!DOCTYPE html>

<html lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" contents="IE=edge">
    <meta name="viewport" content="width=device-width,intial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
     
     
</head>
<body >
  <h1> List Of Customers</h1>
  <br>
     <table class="table">
      <thead>
      
          <tr>
            <th>ID</th>
            <th>First Name</th>
            <th>Last Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Balance</th>
            <th>Address</th>
            <th>Action</th>
         </tr>
     
      </thead>

      <tbody>
       <?php
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "customersinfo";

                $connection = new mysqli($servername, $username, $password, $database);

                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                }

                $sql = "SELECT * FROM customers";
                $result = $connection->query($sql);

                if (!$result) {
                    die("Invalid query: " . $connection->error);
                }

                while ($row = $result->fetch_assoc()) {
                    echo "
                <tr>
                    <td>" . $row["id"] . "</td>
                    <td>" . $row["first_name"] . "</td>
                    <td>" . $row["last_name"] . "</td>
                    <td>" . $row["email"] . "</td>
                    <td>" . $row["phone"] . "</td>
                    <td>" . $row["balance"] . "</td>
                    <td>" . $row["address"] . "</td>
                    <td>
 
                        

                        <a class='btn btn-primary btn-sm' href=\"view.php?id=" . $row["id"] . "\">View</a>
                        <a class='btn btn-primary btn-sm'href=\"transfer.php?sender_id=" . $row["id"] . "\">Transfer</a>
                    </td>
                </tr>";
                }
                ?>
            </tbody>



     </table>
     <div class="nav">
            <a class="transaction" href="index.php ">Go to Home</a>

            <a class ="transaction" href="transact.php" target="_blank">Transactions History</a>
        </div>

</body>
</html>