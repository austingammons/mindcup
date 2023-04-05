<?php

include '../src/vendor/Sentiment/score.php';
include('../src/service/thought.php');

$service = new ThoughtService();
$thoughts = $service->get_all_thoughts_by_user_id($_SESSION["user"]["id"]);

?>

<h1><?= $_SESSION["user"]["user_name"]; ?>'s Thoughts</h1>

<div class="row">
    <div class="col">
        <!-- <a href="create.php">new</a> -->
        <a href="#" class="btn btn-primary">new</a>
    </div>
</div>

<div class="row">
    <div class="col">
        <table class="table table-striped table-bordered table-hover">
        <caption>List of Thoughts</caption>
            <thead class="thead-dark">
                <tr>
                <th scope="col">ID</th>
                <th scope="col">Thought</th>
                <th scope="col">Review</th>
                <th scope="col">Date</th>
                <th scope="col">Options</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($thoughts as $row=>$data): ?>
                <tr>
                    <td><?= $data["id"]; ?></td>
                    <td>
                        <span class="text-overflow-hidden">
                            <?= $data["thought"]; ?>
                        </span>
                    </td>
                    <td><?= analyze($data["thought"]); ?></td>
                    <td><?= date('F d, Y \a\t H:i A', strtotime($data["date"])); ?></td>
                    <td>
                        <!-- <a href="edit.php?thought_id=<?php // echo $data["id"]; ?>">edit</a> -->
                        <a href="#" class="btn btn-primary">edit</a>
                    </td>
                </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>