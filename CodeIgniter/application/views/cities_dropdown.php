<select id="city_id" name="city_id" class="form-control">
    <?php
    foreach ($cities as $row) {
        echo '<option value="' . $row->city_id . '"';
        echo '>';
        echo $row->city_name . '</option>';
    }
    ?>
</select>

