<?php

?>

<ul class="draggable-list" id="dragon-list"></ul>

<script src="../../js/dragon.js"></script>

<!-- this is the html to be used in the thought/index file -->

<ul class="draggable-list" id="dragon-list">
    <?php foreach($thoughts as $row=>$data): ?>
        <li id="<?= $data['id']; ?>">
            <div class="draggable" draggable="true">
                <i><?= date('F d, Y \a\t H:i A', strtotime($data["date"])); ?></i>
                <i class="thought-analysis-score"><?= analyze($data["thought"]); ?></i>
                <b><?= $data["title"]; ?></b> | 
                <p class="person-name">
                    <span class="text-overflow-hidden">
                        <?= $data["thought"]; ?>
                    </span>
                </p>
                <a href="edit?&thought_id=<?php echo $data["id"]; ?>">edit</a>
            </div>
        </li>
    <?php endforeach; ?>
</ul>
<script src="../../js/dragon.js"></script>