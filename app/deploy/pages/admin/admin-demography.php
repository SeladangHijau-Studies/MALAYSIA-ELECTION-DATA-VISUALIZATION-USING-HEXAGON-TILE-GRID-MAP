<?php
$demographyFile = file_get_contents('../../json/demography.json');
$parliamentFile = file_get_contents('../../json/parliament.json');
$decodedData = json_decode($demographyFile, true);
$decodedParliamentData = json_decode($parliamentFile, true);
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
        <title>Admin - Demography</title>

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
                                        <b><?= $decodedData[$x]['state_name'] ?></b>
                                    </h2>
                                    <div class="row">
                                        <div class="col-md-offset-1 col-md-4">
                                            <b>State Demographics</b><br />
                                            <b><u>Gender:</u></b>
                                            <div class="form-group">
                                                <u>Male Totals</u>
                                                <input class="form-control"
                                                    type="number"
                                                    name="<?= $x ?>-state-gender-male"
                                                    value="<?= $decodedData[$x]['demography']['state']['gender']['male'] ?>" />
                                            </div>
                                            <div class="form-group">
                                                <u>Female Totals</u>
                                                <input class="form-control"
                                                    type="number"
                                                    name="<?= $x ?>-state-gender-female"
                                                    value="<?= $decodedData[$x]['demography']['state']['gender']['female'] ?>" />
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-md-offset-4 col-md-4">
                                            <a class="btn btn-primary"
                                                data-toggle="collapse"
                                                data-target=".collapse-<?= $x ?>"
                                                aria-expanded="false"
                                                aria-controls="<?= "parliament" . $x ?>">
                                                Parliaments
                                            </a>
                                        </div>
                                    </div>
                                    <?php for($y=0 ; $y<sizeof($decodedData[$x]['demography']['parliament']) ; $y++) { ?>
                                        <div class="row collapse collapse-<?= $x ?>">
                                            <div class="col-md-offset-1 col-md-10">
                                                <h3>
                                                    <b>[<?= $decodedData[$x]['demography']['parliament'][$y]['parliament_code'] ?>] </b>
                                                    <?= $decodedParliamentData[$x]['parliament'][$y]['parliament_name'] ?>
                                                </h3>
                                                <b>Parliament Demographics</b><br />
                                                <b><u>Ethnics / Races:</u></b>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <u>Malay Percentage (%)</u>
                                                        <div class="form-group">
                                                            <input class="form-control"
                                                                type="number"
                                                                step="0.01"
                                                                name="<?= $decodedData[$x]['demography']['parliament'][$y]['parliament_code'] ?>-malay"
                                                                placeholder="Malay Percentage (%)"
                                                                value="<?= $decodedData[$x]['demography']['parliament'][$y]['race']['malay'] ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <u>Chinese Percentage (%)</u>
                                                            <input class="form-control"
                                                                type="number"
                                                                step="0.01"
                                                                name="<?= $decodedData[$x]['demography']['parliament'][$y]['parliament_code'] ?>-chinese"
                                                                placeholder="Chinese Percentage (%)"
                                                                value="<?= $decodedData[$x]['demography']['parliament'][$y]['race']['chinese'] ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <u>Indian Percentage (%)</u>
                                                            <input class="form-control"
                                                                type="number"
                                                                step="0.01"
                                                                name="<?= $decodedData[$x]['demography']['parliament'][$y]['parliament_code'] ?>-indian"
                                                                placeholder="Indian Percentage (%)"
                                                                value="<?= $decodedData[$x]['demography']['parliament'][$y]['race']['indian'] ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <u>Sabah Percentage (%)</u>
                                                            <input class="form-control"
                                                                type="number"
                                                                step="0.01"
                                                                name="<?= $decodedData[$x]['demography']['parliament'][$y]['parliament_code'] ?>-sabah"
                                                                placeholder="Sabah Percentage (%)"
                                                                value="<?= $decodedData[$x]['demography']['parliament'][$y]['race']['sabah'] ?>" />
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <u>Sarawak Percentage (%)</u>
                                                            <input class="form-control"
                                                                type="number"
                                                                step="0.01"
                                                                name="<?= $decodedData[$x]['demography']['parliament'][$y]['parliament_code'] ?>-sarawak"
                                                                placeholder="Sarawak Percentage (%)"
                                                                value="<?= $decodedData[$x]['demography']['parliament'][$y]['race']['sarawak'] ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <u>Others Percentage (%)</u>
                                                            <input class="form-control"
                                                                type="number"
                                                                step="0.01"
                                                                name="<?= $decodedData[$x]['demography']['parliament'][$y]['parliament_code'] ?>-others"
                                                                placeholder="Others Percentage (%)"
                                                                value="<?= $decodedData[$x]['demography']['parliament'][$y]['race']['others'] ?>" />
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
    $jsonFile = file_get_contents('../../json/demography.json');
    $decodedData = json_decode($jsonFile, true);
    
    for($x=0 ; $x<sizeof($decodedData) ; $x++) {
        $decodedData[$x]['demography']['state']['gender']['male'] = $_POST[$x . '-state-gender-male'];
        $decodedData[$x]['demography']['state']['gender']['female'] = $_POST[$x . '-state-gender-female'];
        
        for($y=0 ; $y<sizeof($decodedData[$x]['demography']) ; $y++) {
            $decodedData[$x]['demography']['parliament'][$y]['race']['malay'] = floatval($_POST[$decodedData[$x]['demography']['parliament'][$y]['parliament_code'] . '-malay']);
            $decodedData[$x]['demography']['parliament'][$y]['race']['chinese'] = floatval($_POST[$decodedData[$x]['demography']['parliament'][$y]['parliament_code'] . '-chinese']);
            $decodedData[$x]['demography']['parliament'][$y]['race']['indian'] = floatval($_POST[$decodedData[$x]['demography']['parliament'][$y]['parliament_code'] . '-indian']);
            $decodedData[$x]['demography']['parliament'][$y]['race']['sabah'] = floatval($_POST[$decodedData[$x]['demography']['parliament'][$y]['parliament_code'] . '-sabah']);
            $decodedData[$x]['demography']['parliament'][$y]['race']['sarawak'] = floatval($_POST[$decodedData[$x]['demography']['parliament'][$y]['parliament_code'] . '-sarawak']);
            $decodedData[$x]['demography']['parliament'][$y]['race']['others'] = floatval($_POST[$decodedData[$x]['demography']['parliament'][$y]['parliament_code'] . '-others']);
        }
    }
    
    $encodedData = json_encode($decodedData);
    file_put_contents('../../json/demography.json', $encodedData);
    
    echo '<meta http-equiv="refresh" content="0">';
}
?>
