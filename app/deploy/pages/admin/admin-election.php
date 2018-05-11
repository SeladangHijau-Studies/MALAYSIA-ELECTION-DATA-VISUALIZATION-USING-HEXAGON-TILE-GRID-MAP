<?php
$demographyFile = file_get_contents('../../json/election.json');
$decodedData = json_decode($demographyFile, true);
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="application/xhtml+xml; charset=UTF-8" />
        <title>Admin - Election</title>

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
                                    <?php for($y=0 ; $y<sizeof($decodedData[$x]['result']) ; $y++) { ?>
                                        <div class="row collapse collapse-<?= $x ?>">
                                            <div class="col-md-offset-1 col-md-10">
                                                <h3>
                                                    <b>[<?= $decodedData[$x]['result'][$y]['parliament_code'] ?>]</b>
                                                    *parliament name*
                                                </h3>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4><b>Election Candidate</b></h4>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <u>BN</u>
                                                                <div class="form-group">
                                                                    <input class="form-control"
                                                                        type="text"
                                                                        style="text-transform:uppercase"
                                                                        name="<?= $decodedData[$x]['result'][$y]['parliament_code'] ?>-candidate-BN"
                                                                        placeholder="Candidate Name for BN"
                                                                        value="<?= $decodedData[$x]['result'][$y]['candidate']['BN'] ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <u>PH</u>
                                                                <div class="form-group">
                                                                    <input class="form-control"
                                                                        type="text"
                                                                        style="text-transform:uppercase"
                                                                        name="<?= $decodedData[$x]['result'][$y]['parliament_code'] ?>-candidate-PH"
                                                                        placeholder="Candidate Name for PH"
                                                                        value="<?= $decodedData[$x]['result'][$y]['candidate']['PH'] ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <u>PAS</u>
                                                                <div class="form-group">
                                                                    <input class="form-control"
                                                                        type="text"
                                                                        style="text-transform:uppercase"
                                                                        name="<?= $decodedData[$x]['result'][$y]['parliament_code'] ?>-candidate-PAS"
                                                                        placeholder="Candidate Name for PAS"
                                                                        value="<?= $decodedData[$x]['result'][$y]['candidate']['PAS'] ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <u>OTH</u>
                                                                <div class="form-group">
                                                                    <input class="form-control"
                                                                        type="text"
                                                                        style="text-transform:uppercase"
                                                                        name="<?= $decodedData[$x]['result'][$y]['parliament_code'] ?>-candidate-OTH"
                                                                        placeholder="Candidate Name for Others"
                                                                        value="<?= $decodedData[$x]['result'][$y]['candidate']['OTH'] ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4><b>Total Voters</b></h4>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <u>Registered Voters</u>
                                                                <div class="form-group">
                                                                    <input class="form-control"
                                                                        type="number"
                                                                        name="<?= $decodedData[$x]['result'][$y]['parliament_code'] ?>-voter-registered"
                                                                        placeholder="Total Registered Voters"
                                                                        value="<?= $decodedData[$x]['result'][$y]['voter']['registered'] ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <u>Voters Turnout</u>
                                                                <div class="form-group">
                                                                    <input class="form-control"
                                                                        type="number"
                                                                        name="<?= $decodedData[$x]['result'][$y]['parliament_code'] ?>-voter-turnout"
                                                                        placeholder="Total Voters Turnout"
                                                                        value="<?= $decodedData[$x]['result'][$y]['voter']['turnout'] ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4><b>Total Votes</b></h4>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <u>Spoilt Votes</u>
                                                                <div class="form-group">
                                                                    <input class="form-control"
                                                                        type="number"
                                                                        name="<?= $decodedData[$x]['result'][$y]['parliament_code'] ?>-vote-spoilt"
                                                                        placeholder="Total Spoilt Votes"
                                                                        value="<?= $decodedData[$x]['result'][$y]['vote']['spoilt'] ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <u>Unreturned Votes</u>
                                                                <div class="form-group">
                                                                    <input class="form-control"
                                                                        type="number"
                                                                        name="<?= $decodedData[$x]['result'][$y]['parliament_code'] ?>-vote-unreturned"
                                                                        placeholder="Total Unreturned Votes"
                                                                        value="<?= $decodedData[$x]['result'][$y]['vote']['unreturned'] ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <u>BN Votes</u>
                                                                <div class="form-group">
                                                                    <input class="form-control"
                                                                        type="number"
                                                                        name="<?= $decodedData[$x]['result'][$y]['parliament_code'] ?>-vote-BN"
                                                                        placeholder="Total BN Votes"
                                                                        value="<?= $decodedData[$x]['result'][$y]['vote']['BN'] ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <u>PH Votes</u>
                                                                <div class="form-group">
                                                                    <input class="form-control"
                                                                        type="number"
                                                                        name="<?= $decodedData[$x]['result'][$y]['parliament_code'] ?>-vote-PH"
                                                                        placeholder="Total PH Votes"
                                                                        value="<?= $decodedData[$x]['result'][$y]['vote']['PH'] ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <u>PAS Votes</u>
                                                                <div class="form-group">
                                                                    <input class="form-control"
                                                                        type="number"
                                                                        name="<?= $decodedData[$x]['result'][$y]['parliament_code'] ?>-vote-PAS"
                                                                        placeholder="Total PAS Votes"
                                                                        value="<?= $decodedData[$x]['result'][$y]['vote']['PAS'] ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <u>OTH Votes</u>
                                                                <div class="form-group">
                                                                    <input class="form-control"
                                                                        type="number"
                                                                        name="<?= $decodedData[$x]['result'][$y]['parliament_code'] ?>-vote-OTH"
                                                                        placeholder="Total Other Party Votes"
                                                                        value="<?= $decodedData[$x]['result'][$y]['vote']['OTH'] ?>" />
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <h4><b>Election Winner</b></h4>
                                                        <div class="row">
                                                            <div class="col-md-6">
                                                                <u>Party Name</u>
                                                                <div class="form-group">
                                                                    <input class="form-control"
                                                                        type="text"
                                                                        style="text-transform:uppercase"
                                                                        name="<?= $decodedData[$x]['result'][$y]['parliament_code'] ?>-winner-party"
                                                                        placeholder="Winning Party Name"
                                                                        value="<?= $decodedData[$x]['result'][$y]['winner']['party'] ?>" />
                                                                </div>
                                                            </div>
                                                            <div class="col-md-6">
                                                                <u>Candidate Name</u>
                                                                <div class="form-group">
                                                                    <input class="form-control"
                                                                        type="text"
                                                                        style="text-transform:uppercase"
                                                                        name="<?= $decodedData[$x]['result'][$y]['parliament_code'] ?>-winner-candidate"
                                                                        placeholder="Winning Candidate Name"
                                                                        value="<?= $decodedData[$x]['result'][$y]['winner']['candidate'] ?>" />
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
    $jsonFile = file_get_contents('../../json/election.json');
    $decodedData = json_decode($jsonFile, true);
    
    for($x=0 ; $x<sizeof($decodedData) ; $x++) {
        for($y=0 ; $y<sizeof($decodedData[$x]['result']) ; $y++) {
            // election candidate
            $decodedData[$x]['result'][$y]['candidate']['BN'] = $_POST[$decodedData[$x]['result'][$y]['parliament_code'] . '-candidate-BN'];
            $decodedData[$x]['result'][$y]['candidate']['PH'] = $_POST[$decodedData[$x]['result'][$y]['parliament_code'] . '-candidate-PH'];
            $decodedData[$x]['result'][$y]['candidate']['PAS'] = $_POST[$decodedData[$x]['result'][$y]['parliament_code'] . '-candidate-PAS'];
            $decodedData[$x]['result'][$y]['candidate']['OTH'] = $_POST[$decodedData[$x]['result'][$y]['parliament_code'] . '-candidate-OTH'];
            // voters
            $decodedData[$x]['result'][$y]['voter']['registered'] = $_POST[$decodedData[$x]['result'][$y]['parliament_code'] . '-voter-registered'];
            $decodedData[$x]['result'][$y]['voter']['turnout'] = $_POST[$decodedData[$x]['result'][$y]['parliament_code'] . '-voter-turnout'];
            // votes
            $decodedData[$x]['result'][$y]['vote']['spoilt'] = $_POST[$decodedData[$x]['result'][$y]['parliament_code'] . '-vote-spoilt'];
            $decodedData[$x]['result'][$y]['vote']['unreturned'] = $_POST[$decodedData[$x]['result'][$y]['parliament_code'] . '-vote-unreturned'];
            $decodedData[$x]['result'][$y]['vote']['BN'] = $_POST[$decodedData[$x]['result'][$y]['parliament_code'] . '-vote-BN'];
            $decodedData[$x]['result'][$y]['vote']['PH'] = $_POST[$decodedData[$x]['result'][$y]['parliament_code'] . '-vote-PH'];
            $decodedData[$x]['result'][$y]['vote']['PAS'] = $_POST[$decodedData[$x]['result'][$y]['parliament_code'] . '-vote-PAS'];
            $decodedData[$x]['result'][$y]['vote']['OTH'] = $_POST[$decodedData[$x]['result'][$y]['parliament_code'] . '-vote-OTH'];
            // winner
            $decodedData[$x]['result'][$y]['winner']['party'] = $_POST[$decodedData[$x]['result'][$y]['parliament_code'] . '-winner-party'];
            $decodedData[$x]['result'][$y]['winner']['candidate'] = $_POST[$decodedData[$x]['result'][$y]['parliament_code'] . '-winner-candidate'];
        }
    }
    
    $encodedData = json_encode($decodedData);
    file_put_contents('../../json/election.json', $encodedData);
    
    echo '<meta http-equiv="refresh" content="0">';
}
?>
