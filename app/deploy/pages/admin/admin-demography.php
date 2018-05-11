<?php
$demographyFile = file_get_contents('../../json/demography.json');
$decodedData = json_decode($demographyFile, true);
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
                                        <b><a data-toggle="collapse" data-target=".collapse-<?= $x ?>" aria-expanded="false" aria-controls="<?= "parliament" . $x ?>"><?= $decodedData[$x]['state_name'] ?></a></b>
                                    </h2>
                                    <?php for($y=0 ; $y<sizeof($decodedData[$x]['demography']) ; $y++) { ?>
                                        <div class="row collapse collapse-<?= $x ?>">
                                            <div class="col-md-offset-1 col-md-10">
                                                <h3><b>[<?= $decodedData[$x]['demography'][$y]['parliament_code'] ?>]</b> *parliament name*</h3>
                                                <div class="row">
                                                    <div class="col-md-6">
                                                        <u>Malay Percentage (%)</u>
                                                        <div class="form-group">
                                                            <input class="form-control"
                                                                type="number"
                                                                step="0.01"
                                                                name="<?= $decodedData[$x]['demography'][$y]['parliament_code'] ?>-malay"
                                                                placeholder="Malay Percentage (%)"
                                                                value="<?= $decodedData[$x]['demography'][$y]['race']['malay'] ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <u>Chinese Percentage (%)</u>
                                                            <input class="form-control"
                                                                type="number"
                                                                step="0.01"
                                                                name="<?= $decodedData[$x]['demography'][$y]['parliament_code'] ?>-chinese"
                                                                placeholder="Chinese Percentage (%)"
                                                                value="<?= $decodedData[$x]['demography'][$y]['race']['chinese'] ?>" />
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
                                                                name="<?= $decodedData[$x]['demography'][$y]['parliament_code'] ?>-indian"
                                                                placeholder="Indian Percentage (%)"
                                                                value="<?= $decodedData[$x]['demography'][$y]['race']['indian'] ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <u>Sabah Percentage (%)</u>
                                                            <input class="form-control"
                                                                type="number"
                                                                step="0.01"
                                                                name="<?= $decodedData[$x]['demography'][$y]['parliament_code'] ?>-sabah"
                                                                placeholder="Sabah Percentage (%)"
                                                                value="<?= $decodedData[$x]['demography'][$y]['race']['sabah'] ?>" />
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
                                                                name="<?= $decodedData[$x]['demography'][$y]['parliament_code'] ?>-sarawak"
                                                                placeholder="Sarawak Percentage (%)"
                                                                value="<?= $decodedData[$x]['demography'][$y]['race']['sarawak'] ?>" />
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <div class="form-group">
                                                            <u>Others Percentage (%)</u>
                                                            <input class="form-control"
                                                                type="number"
                                                                step="0.01"
                                                                name="<?= $decodedData[$x]['demography'][$y]['parliament_code'] ?>-others"
                                                                placeholder="Others Percentage (%)"
                                                                value="<?= $decodedData[$x]['demography'][$y]['race']['others'] ?>" />
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
        for($y=0 ; $y<sizeof($decodedData[$x]['demography']) ; $y++) {
            $decodedData[$x]['demography'][$y]['race']['malay'] = floatval($_POST[$decodedData[$x]['demography'][$y]['parliament_code'] . '-malay']);
            $decodedData[$x]['demography'][$y]['race']['chinese'] = floatval($_POST[$decodedData[$x]['demography'][$y]['parliament_code'] . '-chinese']);
            $decodedData[$x]['demography'][$y]['race']['indian'] = floatval($_POST[$decodedData[$x]['demography'][$y]['parliament_code'] . '-indian']);
            $decodedData[$x]['demography'][$y]['race']['sabah'] = floatval($_POST[$decodedData[$x]['demography'][$y]['parliament_code'] . '-sabah']);
            $decodedData[$x]['demography'][$y]['race']['sarawak'] = floatval($_POST[$decodedData[$x]['demography'][$y]['parliament_code'] . '-sarawak']);
            $decodedData[$x]['demography'][$y]['race']['others'] = floatval($_POST[$decodedData[$x]['demography'][$y]['parliament_code'] . '-others']);
        }
    }
    
    $encodedData = json_encode($decodedData);
    file_put_contents('../../json/demography.json', $encodedData);
    
    echo '<meta http-equiv="refresh" content="0">';
}
?>
