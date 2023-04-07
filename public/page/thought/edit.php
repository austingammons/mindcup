<?php

include('../src/service/thought.php');
$service = new ThoughtService();

$thought_id = $_GET['thought_id'];

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $result = $service->update_thought_by_thought_id($thought_id, $_POST['title'], $_POST['thought']);
    header("Location:index");
}

$thought = $service->get_thought_by_thought_id($thought_id);

?>


<div class="row">
    <div class="col-lg-12">
        <div class="page-center">
            <div class="page-center-contents">
            <h1>Edit</h1>
            <p>Change your mind.</p>
            <form class="form-inline" method="post">
                <div class="form-group mb-2">
                    <label for="title">Title</label>
                    <input type="text" id="title" name="title" class="form-control" value="<?= htmlspecialchars(trim($thought["title"]) ?? "")?>">
                </div>
                <div class="form-group mb-2">
                    <label for="thought">Thought</label><span id="counter"></span>
                    <textarea id="thought" name="thought" class="form-control mindcup-textarea" maxlength="2000"><?= htmlspecialchars($thought["thought"] ?? "")?></textarea>
                </div>
                <div class="form-group mb-2">
                    <button type="submit" class="btn btn-dark">save</button>
                </div>
            </form>
        </div>
    </div>
</div>

<a href="delete.php?thought_id=<?php echo $thought['id']; ?>">delete</a>

<script src="../../js/textcounter.js"></script>