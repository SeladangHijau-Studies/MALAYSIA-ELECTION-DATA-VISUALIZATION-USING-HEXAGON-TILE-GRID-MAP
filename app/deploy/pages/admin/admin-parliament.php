<?php
$parliamentFile = file_get_contents('../../json/parliament.json');
$decodedData = json_decode($parliamentFile, true);
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
        <title>Admin - Parliament</title>

        <link rel="stylesheet" href="../../lib/css/bootstrap.min.css" />
        <link rel="stylesheet" href="../../lib/css/bootstrap-theme.min.css" />
        <style>
        
        </style>
    </head>

    <body>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-offset-2 col-md-8">
                    <div class="row">
                        <div class="col-md-offset-2 col-md-8">
                            <form action="" method="POST">
                                <?php for($x=0 ; $x<sizeof($decodedData) ; $x++) { ?>
                                    <h2>
                                        <b><a data-toggle="collapse" data-target=".collapse-<?= $x ?>" aria-expanded="false" aria-controls="<?= "parliament" . $x ?>"><?= $decodedData[$x]['state_name'] ?></a></b>
                                    </h2>
                                    <?php for($y=0 ; $y<sizeof($decodedData[$x]['parliament']) ; $y++) { ?>
                                        <div class="row collapse collapse-<?= $x ?>">
                                            <div class="col-md-offset-1 col-md-10">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h3><b>[<?= $decodedData[$x]['parliament'][$y]['parliament_code'] ?>]</b></h3>
                                                        <div class="form-group">
                                                            <b><u>Parliament Name</u></b>
                                                            <input class="form-control"
                                                                type="text"
                                                                name="<?= $decodedData[$x]['parliament'][$y]['parliament_code'] ?>-name"
                                                                value="<?= $decodedData[$x]['parliament'][$y]['parliament_name'] ?>"
                                                                placeholder="Parliament Name" />
                                                            <input type="hidden"
                                                                name="<?= $decodedData[$x]['parliament'][$y]['parliament_code'] ?>-code"
                                                                value="<?= $decodedData[$x]['parliament'][$y]['parliament_code'] ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h3><b>Coordinates:</b></h3>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                            <div class="form-group">
                                                                <b><u>X-Coordinate</u></b>
                                                                <input class="form-control"
                                                                    type="number"
                                                                    name="<?= $decodedData[$x]['parliament'][$y]['parliament_code'] ?>-coordinate-x"
                                                                    value="<?= $decodedData[$x]['parliament'][$y]['coordinate']['x'] ?>"
                                                                    placeholder="X-Coordinate" />
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <b><u>Y-Coordinate</u></b>
                                                                <input class="form-control"
                                                                    type="number"
                                                                    name="<?= $decodedData[$x]['parliament'][$y]['parliament_code'] ?>-coordinate-y"
                                                                    value="<?= $decodedData[$x]['parliament'][$y]['coordinate']['y'] ?>"
                                                                    placeholder="Y-Coordinate" />
                                                            </div>
                                                        </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    <?php } ?>
                                <?php } ?>

                                <div class="row">
                                    <div class="col-md-offset-4 col-md-4">
                                        <div class="form-group">
                                            <input class="form-control btn btn-primary" type="submit" name="submit" value="Submit" />
                                        </div> 
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <script src="../../lib/js/jquery-3.3.1.min.js"></script>
        <script src="../../lib/js/d3.min.js"></script>
        <script src="../../lib/js/d3-hexbin.min.js"></script>
        <script src="../../lib/js/bootstrap.min.js"></script>
    </body>
</html>

<?php
if(isset($_POST['submit'])) {
    $jsonFile = file_get_contents('../../json/parliament.json');
    $decodedData = json_decode($jsonFile, true);
    
    for($x=0 ; $x<sizeof($decodedData) ; $x++) {
        for($y=0 ; $y<sizeof($decodedData[$x]['parliament']) ; $y++) {
            $decodedData[$x]['parliament'][$y]['parliament_code'] = $_POST[$decodedData[$x]['parliament'][$y]['parliament_code'] . '-code'];
            $decodedData[$x]['parliament'][$y]['parliament_name'] = $_POST[$decodedData[$x]['parliament'][$y]['parliament_code'] . '-name'];
            $decodedData[$x]['parliament'][$y]['coordinate']['x'] = $_POST[$decodedData[$x]['parliament'][$y]['parliament_code'] . '-coordinate-x'];
            $decodedData[$x]['parliament'][$y]['coordinate']['y'] = $_POST[$decodedData[$x]['parliament'][$y]['parliament_code'] . '-coordinate-y'];
        }
    }
    
    $encodedData = json_encode($decodedData, JSON_PRETTY_PRINT);
    file_put_contents('../../json/parliament.json', $encodedData);
    
    echo '<meta http-equiv="refresh" content="0">';
}
?>
