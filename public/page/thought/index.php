<?php

include '../src/vendor/Sentiment/score.php';

$service = new ThoughtService();
$data = $service->get_all_thoughts_by_user_guid($_SESSION["user"]["user_guid"]);

$score = new Score();

?>

<!-- <div class="page-center-full mobile">
    <div class="page-center-contents">
        <p>
            mobile: long-press to edit. desktop: double click to edit
        </p>
        <a href="create" class="btn btn-outline-dark btn-lg w-100">new</a>
        <ul class="dragon-list prevent-text-select">
            <?php foreach($data as $index=>$record): ?>
            <li id="<?= $record['id']; ?>" class="dragon-item">
                <div class="dragon-item-overlay">
                    <a href="edit?&thought_id=<?php echo $record["id"]; ?>" class="btn btn-outline-dark btn-lg w-100">edit</a>
                </div>
                <div class="dragon-item-content">
                    <span class="text-overflow-hidden-sm">
                        <b><?= $record["title"]; ?></b>
                    </span>
                    <span class="float-right">
                        <i><?= $score->single($record["text"]); ?></i>
                    </span>
                    <br />
                    <span class="text-overflow-hidden">
                        <?= $record["text"]; ?>
                    </span>
                </div>
            </li>
            <?php endforeach; ?>
        </ul>
    </div>
</div> -->

<table class="table table-striped table-bordered table-hover">
    <thead class="thead-dark">
        <tr>
        <th scope="col">Title</th>
        <th scope="col">Thought</th>
        <th scope="col">Review</th>
        <th scope="col">Date</th>
        <th scope="col">Options</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach($data as $index=>$record): ?>
        <tr>
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
            <td><?= $score->single($record["text"]); ?></td>
            <td><?= date('F d, Y', strtotime($record["date"])); ?></td>
            <td>
                <a href="edit?&thought_id=<?php echo $record["id"]; ?>" class="btn btn-outline-dark">edit</a>
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

<script>

let items = document.querySelectorAll('.dragon-item');
let overlays = document.querySelectorAll('.dragon-item-overlay');
let timer;
let touchduration = 1700;

document.addEventListener('touchmove', (event) => {



    overlays.forEach(element => {
        element.style.display = 'none';
    });

});

items.forEach(element => {

    element.addEventListener('touchstart', (event) => { touchstart(event); });

    element.addEventListener("touchend", (event) => { touchend(); });

    element.addEventListener("dblclick", (event) => {
        let thought_id = event.srcElement.parentElement.id;
        // window.location.href = "https://mindcup.mopstage.com/page/thought/edit?&thought_id=" + thought_id;
        window.location.href = "edit?&thought_id=" + thought_id;
    });

});

function touchstart (event) {

    timer = setTimeout(function () {
        
        event.target.parentElement.children[0].style.display = 'block';

    }, touchduration, event);
}

function touchend () {
    clearTimeout(timer);
}

</script>