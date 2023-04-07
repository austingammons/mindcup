<?php

include '../src/vendor/Sentiment/score.php';
include('../src/service/thought.php');

$service = new ThoughtService();
$thoughts = $service->get_all_thoughts_by_user_id($_SESSION["user"]["id"]);

?>

<table class="table table-striped table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
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
                <span class="text-overflow-hidden-sm">
                    <?= $data["title"]; ?>
                </span>
            </td>
            <td>
                <span class="text-overflow-hidden">
                    <?= $data["thought"]; ?>
                </span>
            </td>
            <td><?= analyze($data["thought"]); ?></td>
            <td><?= date('F d, Y \a\t H:i A', strtotime($data["date"])); ?></td>
            <td>
                <a href="edit?&thought_id=<?php echo $data["id"]; ?>" class="btn btn-dark">edit</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td><a href="create" class="btn btn-dark">new</a></td>
        </tr>
    </tbody>
</table>