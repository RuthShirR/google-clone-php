<!DOCTYPE html>
<html lang="he">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Google Search</title>
    <style>
        body {
            text-align: center;
            direction: rtl;
            font-family: Arial, sans-serif;
            background-color: #f2f2f2;
            padding: 20px;
        }

        h1 {
            margin-top: 50px;
            font-size: xx-large;
            color: #4285f4;
        }

        form {
            margin-top: 30px;
            display: inline-block;
            text-align: left;
        }

        label {
            display: block;
            margin-top: 20px;
            font-size: 18px;
            color: #555555;
            text-align: center;
        }

        input[type="text"] {
            padding: 10px;
            font-size: 16px;
            width: 300px;
            max-width: 100%;
            margin-right: 10px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            font-size: 16px;
            background-color: #4285f4;
            color: white;
            border: none;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #1a73e8;
        }

        .search-results {
            text-align: left;
            margin-top: 50px;
        }
    </style>
</head>
<body>
    <h1>Google Search</h1>
    <label>“I think you travel to search and you come back home to find yourself there”</label>
    <form method="get" action="">
        <input type="text" name="results" placeholder="Type what you are searching for"/>
        <input type="submit" value="Search"/>
    </form>

    <?php
    if (isset($_GET['results'])) {
        echo "<div class='search-results'>";
        echo "<br/>  <label>So I say to you, Ask and it will be given to you, search, and you will find, knock, and the door will be opened for you</label> <hr/><br/>";
        $url = "https://www.google.com/search?q=" . str_replace(' ', '%20', $_GET['results']);

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_REFERER, 'https://www.google.com');
        $body = curl_exec($ch);
        curl_close($ch);

        $myResult = mb_convert_encoding($body, 'UTF-8');

        echo $myResult;
        
        echo "</div>";
    }
    ?>
</body>
</html>





