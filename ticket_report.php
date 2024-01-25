<!DOCTYPE html> 
<html lang="en"> 
<head> 
    <meta charset="UTF-8"> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>.</title> 
    <style>
        /* Styling for the HTML document */
        body {
            margin: 0;
            padding: 0;
        }

        .container {
            margin: 20px auto;
            max-width: 800px;
            font-family: Arial, Helvetica, sans-serif;
        }

        .head {
            text-align: center;
            margin-bottom: 20px;
        }

        .head h1,
        .head h2,
        .head p {
            margin: 0;
        }

        .Logo {
            width: 180px;
            margin-right: 50px;
            margin-top: 20px;
        }

        .title2 {
            font-size: 24px;
            font-weight: bold;
        }

        hr {
            margin-bottom: 20px;
            border: none;
            border-top: 1px solid #ddd;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            text-align: center;
        }

        td,
        th {
            padding: 12px;
            text-align: center;
        }

        th {
            background-color: #34418E;
            font-weight: bold;
            color: black;
        }

        td {
            color: black; /* Set text color to white for table cells */
        }
    </style>
</head> 

<body onload="print()"> 
    <!-- NUFV Watermark Image -->
    <img src="NUFV Watermark.png" class="Logo">

    <!-- Main content container -->
    <div class="container"> 
        <!-- Header section -->
        <div class="head"> 
            <h1><strong>Team Report Data</strong></h1><br>
            <p>AY 2023-2024</p>
            <p>1st Semester</p><br>
            <h2>Ticket List Data Sheet</h2>
        </div> 

        <!-- Horizontal line for separation -->
        <hr> 

        <!-- Table for displaying ticket data -->
        <table> 
            <!-- Table header -->
            <thead> 
                <tr> 
                    <th>ID</th> 
                    <th>Date Created</th> 
                    <th>Tickets</th> 
                    <th>Subject</th> 
                    <th>Description</th>
                    <th>Status</th>
                </tr> 
            </thead> 
            <!-- Table body (populated using PHP) -->
            <tbody> 
                <?php 
                // Include the database connection file
                include 'dbcon.php'; 

                // Query to fetch ticket data with user information
                $get_alldata_list = mysqli_query($connection, "SELECT t.id, t.date_created, s.lastname, s.firstname, s.middlename, t.subject, t.description, t.status
                FROM tickets t
                JOIN customers s ON t.customer_id = s.id");



                // Loop through each row in the result set
                while($row = mysqli_fetch_array($get_alldata_list)){ 
                ?> 
                    <!-- Table row for each ticket -->
                    <tr> 
                        <td><?php echo $row['id']; ?></td> 
                        <td><?php echo $row['date_created']; ?></td> 
                        <!-- Displaying concatenated last name, first name, and middle name -->
                        <td><?php echo $row['lastname'] . ', ' . $row['firstname'] . ' ' . $row['middlename']; ?></td>  
                        <td><?php echo $row['subject']; ?></td> 
                        <td><?php echo $row['description']; ?></td> 
                        <td><?php echo $row['status']; ?></td> 
                    </tr> 
                <?php } ?> 
            </tbody> 
        </table> 
    </div> 
</body> 
</html> 
<?php
// Function to get status label based on status code
function getStatusLabel($status) {
    switch ($status) {
        case 0:
            return 'Pending';
        case 1:
            return 'On Process';
        case 2:
            return 'Closed';
        default:
            return 'Unknown Status';
    }
}
?>
