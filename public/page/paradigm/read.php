<?php

include('../src/service/paradigm.php');
$service = new ParadigmService();

$paradigm_id = $_GET['paradigm_id'];
$data = $service->get_paradigm_by_paradigm_id($paradigm_id);

?>

<div class="row">
    <div class="col-lg-12">
        <div class="page-center">
            <div class="page-center-contents">
            <h1>Read Paradigm</h1>
            <p>Recognize your patterns and learn.</p>
            <hr />
            <div class="form-group mb-2">
                <label for="title">Title</label>
                <div><?= htmlspecialchars(trim($data["title"]) ?? "")?></div>
            </div>
            <div class="form-group mb-2">
                <label for="paradigm">paradigm</label><span class="float-right" id="counter"></span>
                <div>
                    <?= htmlspecialchars($data["paradigm"] ?? "")?>
                </div>
            </div>
            <hr />
            <div class="form-group mb-2">
                <a href="edit?&paradigm_id=<?php echo $data["id"]; ?>" class="btn btn-outline-dark">edit</a>
                <a href="delete?paradigm_id=<?php echo $data['id']; ?>" class="btn btn-outline-danger float-right">delete</a>
            </div>
        </div>
    </div>
</div>

<script src="../../js/textcounter.js"></script>