<?php

class Helper {

    // echo Helper::selector($concepts, 'concept_selector', 'concept_id', 'Concept', '0);
    public static function selector ($data, $id, $name, $label_text, $selected_value) {
        ob_start(); ?>

        <label for=<?php echo $name ?>>
            <?php echo $label_text ?>
        </label>
        <select name="<?php echo $name ?>" class="form-select" aria-label="select">
                <option value="0">None</option>
            <?php foreach ($data as $key => $option): ?>
                <option value="<?= $option['id'] ?>" <?= ($selected_value == $option['id'] ? 'selected' : '') ?>><?= $option['title'] ?></option>
            <?php endforeach; ?>
        </select>
        
        <?php return ob_get_clean();
    }

    // echo Helper::input($type, $id, $name, $value);
    public static function input ($type, $id, $name, $value, $label_text) {
        ob_start(); ?>

        <label for="<?php echo $id ?>">
            <?php echo $label_text ?>
        </label>
        <input type="<?php echo $type ?>" id="<?php echo $id ?>" name="<?php echo $name ?>" class="form-control" maxlength="100" value="<?php echo $value ?>"></input>
        
        <?php return ob_get_clean();
    }

}