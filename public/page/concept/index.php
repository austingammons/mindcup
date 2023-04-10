<?php

include('../src/service/concept.php');

$service = new ConceptService();
$data = $service->get_all_concepts_by_user_guid($_SESSION["user"]["user_guid"]);

?>

<table class="table table-striped table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
        <th scope="col">ID</th>
        <th scope="col">Title</th>
        <th scope="col">Concept</th>
        <th scope="col">Date</th>
        <th scope="col">Options</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $index=>$record): ?>
        <tr>
            <td><?= $record["id"]; ?></td>
            <td>
                <span class="text-overflow-hidden-sm">
                    <?= $record["title"]; ?>
                </span>
            </td>
            <td>
                <span class="text-overflow-hidden">
                    <?= $record["text"]; ?>
                </span>
            </td>
            <td><?= date('F d, Y', strtotime($record["date"])); ?></td>
            <td>
                <a href="edit?&concept_id=<?php echo $record["id"]; ?>" class="btn btn-outline-dark">edit</a>
            </td>
        </tr>
        <?php endforeach; ?>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
            <td>
                <a href="create" class="btn btn-outline-dark">new</a>
            </td>
        </tr>
    </tbody>
</table>