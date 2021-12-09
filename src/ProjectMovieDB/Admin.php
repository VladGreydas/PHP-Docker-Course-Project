<?php

error_reporting(E_ERROR | E_PARSE);

include(__DIR__ . '/config.php');
$path = ROOTS . "/Utilites/DataProcessor.php";
include($path);

$processor = DataProcessor::GetInstance();

if (isset($_GET['del'])) {
    $del = $_GET['del'];
    $processor->DeleteData($del);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta name="vviewport" content="width=device-width, 
            user-scalable=no, 
            initial-scale=1.0, 
            maximum-scale=1.0, 
            minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=7">

    <link rel="stylesheet" href="Styles/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Acme&display=swap" rel="stylesheet">
    <title>Administration Page</title>
</head>

<body>
    <div class="navbar">
        <h2 style="color: #ffffff; position:fixed; left:calc(15% + 10px); top:10px">Administration Page</h2>
    </div>
    <div class="main-container">
        <div class="wrapper">
            <div class="sidebar">
                <div class="profile">
                    <h3>MovieDB</h3>
                    <p>Made by Vlad Greydas</p>
                </div>
                <!--profile image & text-->
                <!--menu item-->
                <ul>
                    <li>
                        <a href="Admin.php">Admin</a>
                    </li>
                    <li>
                        <a href="Feed.php">Feed</a>
                    </li>
                    <li>
                        <a href="AddMovie.php">Add new movie</a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="site-body">
            <table class="admin-table">
                <tr>
                    <th>Title</th>
                    <th>Genre</th>
                    <th>Production date</th>
                    <th>Delete</th>
                    <th>Change</th>
                </tr>
                <?php


                $list = $processor->GetData(2);

                $result = '';
                foreach ($list as $movie) {
                    $result .= '<tr>';
                    $result .= '<td class="title-column">' . $movie['title'] . '</td>';
                    $result .= '<td class="genre-column">' . $movie['genre'] . '</td>';
                    $result .= '<td>' . $movie['date_production'] . '</td>';
                    $result .= '<td><a href="?del=' . $movie['id'] . '">Delete movie</a></td>';
                    $result .= '<td><a href="ChangeInfo.php?id=' . $movie['id'] . '">Change info</a></td>';
                    $result .= '</tr>';
                }
                echo $result;
                ?>
            </table>
        </div>
    </div>
</body>

</html>