<?php

include('../src/service/thought.php');

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $result = $service->create_thought($_SESSION['user']['id'], $_POST['thought']);
    header("Location:thought/index");
}

?>

<form method="post">
    <div class="form-group">
        <label for="thought">Thought</label>
        <input type="text" id="thought" name="thought" class="form-control">
    </div>
    <button type="submit" class="btn-primary">create</button>
</form>