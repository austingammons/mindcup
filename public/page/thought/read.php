<?php

$service = new ThoughtService();

$thought_id = $_GET['thought_id'];
$data = $service->get_thought_by_thought_id($thought_id);

?>

<div class="row">
    <div class="col-lg-12">
        <div class="page-center">
            <div class="page-center-contents">
            <h1>Read Thought</h1>
            <p>Reflect on yourself.</p>
            <hr />
            <div class="form-group mb-2">
                <label for="title">Title</label>
                <div><?= htmlspecialchars(trim($data["title"]) ?? "")?></div>
            </div>
            <div class="form-group mb-2">
                <label for="thought">Thought</label><span class="float-right" id="counter"></span>
                <div>
                    <?= htmlspecialchars($data["thought"] ?? "")?>
                </div>
            </div>
            <hr />
            <div class="form-group mb-2">
                <a href="edit?&thought_id=<?php echo $data["id"]; ?>" class="btn btn-outline-dark">edit</a>
                <a href="delete?thought_id=<?php echo $data['id']; ?>" class="btn btn-outline-danger float-right">delete</a>
            </div>
        </div>
    </div>
</div>

<script src="../../js/textcounter.js"></script>