<?php

include('../src/service/thought.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $result = $service->update_thought_by_thought_id($_POST['thought_id'], $_POST['thought']);
    header("Location:thought/index");
}

$thought = $service->get_thought_by_thought_id($_GET['thought_id']);

?>

<form method="post">
    <div class="form-group">
        <label for="thought">Thought</label>
        <input type="text" id="thought" name="thought" class="form-control" value="<?= htmlspecialchars($thought["thought"] ?? "")?>">
    </div>
    <input type="text" id="thought_id" name="thought_id" value="<?php echo $thought["id"]; ?>" hidden></input>
    <button type="submit" class="btn-primary">save</button>
</form>

<a href="delete.php?thought_id=<?php echo $thought['id']; ?>">delete</a>