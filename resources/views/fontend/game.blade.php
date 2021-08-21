!DOCTYPE html>
<html lang="en">
    <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Quản lý game thủ giải AOE Việt Trung 2017</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    </head>
    <body>
        <div class="container">
            <h2><span class="glyphicon glyphicon-user"></span>Danh sách game thủ</h2>
            <div class="row">
                <div class="col-md-3">
                <ul>
                    <?php
                    foreach ($gamers as $g) {
                        echo '<li>';
                        echo '<a href="', $_SERVER['SCRIPT_NAME'], '/PageController/getGamerByName/', $g['name'], '">', $g['name'], '</a><br>';
                        echo $g['adress'], '<br>';
                        echo '--<a href="', $_SERVER['SCRIPT_NAME'], '/PageController/getGamersByCity/', $g['city'], '">', $g['city'], '</a>';
                        echo '</li>';
                    }
                    ?>
                </ul>
                </div><!--end col-->
                <div class="col-md-5">
                <ul>
                    <?php
                    if (isset($gamer)) {
                        echo 'Thông tin chi tiết về game thủ:';
                        echo '<li>';
                        echo '<a href="', $_SERVER['SCRIPT_NAME'], '/PageController/getGamerByName/', $gamer['name'], '">', $gamer['name'], '</a><br></li>';
                        echo '<li>', $gamer['adress'], '</li>';
                        echo '<li>', $gamer['city'], '</li>';
                    }
                    if (isset($gamersInCities)) {
                        echo 'Các game thủ ở: <b>', $gamersInCities[0]['city'], '</b>';
                        foreach ($gamersInCities as $g) {
                            echo '<li>';
                            echo '<a href="', $_SERVER['SCRIPT_NAME'], '/PageController/getGamersByCity/', $g['name'], '">', $g['name'], ' </a>';
                            echo $g['adress'], ' ';
                            echo $g['city'];
                            echo '</li>';
                        }
                    }
                    ?>
                </ul>
                </div><!--end col-->
            </div><!--end row-->
        </div>
    </body>
</html>
