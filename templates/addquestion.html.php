<form action="" method="post" class="add-question-form">
    <div class="form-row">
        <div class="form-field question-field">
            <label for="questiontext">Type your question here:</label>
            <textarea name="questiontext" id="questiontext" rows="3" cols="40" required></textarea>
        </div>

        <div class="form-field">
            <label for="questiondate">Choose a date:</label>
            <input type="date" name="questiondate" id="questiondate" value="<?= date('Y-m-d') ?>" required>
        </div>

        <div class="form-field">
            <label for="questionimage">Type image file name:</label>
            <input type="text" name="questionimage" id="questionimage" required>
        </div>

        <div class="form-field">
            <label for="questiondocument">Type document file name:</label>
            <input type="text" name="questiondocument" id="questiondocument">
        </div>
    </div>

    <div class="form-row">
        <div class="form-field">
            <label for="userid">Choose a user:</label>
            <select name="userid" id="userid" required>
                <option value="" disabled selected hidden>Select a user</option>
                <?php foreach ($users as $user): ?>
                    <option value="<?= htmlspecialchars($user['id'], ENT_QUOTES, 'UTF-8') ?>">
                        <?= htmlspecialchars($user['name'], ENT_QUOTES, 'UTF-8') ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <div class="form-field">
            <label for="moduleid">Choose a module:</label>
            <select name="moduleid" id="moduleid" required>
                <option value="" disabled selected hidden>Select a module</option>
                <?php foreach ($modules as $module): ?>
                    <option value="<?= htmlspecialchars($module['id'], ENT_QUOTES, 'UTF-8') ?>">
                        <?= htmlspecialchars($module['name'], ENT_QUOTES, 'UTF-8') ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>

        <input type="submit" name="submit" value="Add">
    </div>
</form>
