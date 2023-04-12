<?php

$service = new ConceptService();

$concept_id = $_GET['concept_id'];
$data = $service->get_concept_by_concept_id($concept_id);

?>

<div class="row">
    <div class="col-lg-12">
        <div class="page-center">
            <div class="page-center-contents">
            <h1>Read Concept</h1>
            <p>Reflect on yourself.</p>
            <hr />
            <div class="form-group mb-2">
                <label for="title">Title</label>
                <div><?= htmlspecialchars(trim($data["title"]) ?? "")?></div>
            </div>
            <div class="form-group mb-2">
                <label for="concept">Concept</label><span class="float-right" id="counter"></span>
                <div>
                    <?= htmlspecialchars($data["concept"] ?? "")?>
                </div>
            </div>
            <hr />
            <div class="form-group mb-2">
                <a href="edit?&concept_id=<?php echo $data["id"]; ?>" class="btn btn-outline-dark">edit</a>
                <a href="delete?concept_id=<?php echo $data['id']; ?>" class="btn btn-outline-danger float-right">delete</a>
            </div>
        </div>
    </div>
</div>

<script src="../../js/textcounter.js"></script>