<?php if (isset($error)): ?>

        <p><?= $error ?></p>

<?php else: ?>
        <p><?= $totalQuestions?> questions have been submitted to the Greenwich Student Forum.</p>
        <table border="2px">
            <thead>
                <tr>
                    <th>Question</th>
                    <th>Question Date</th>
                    <th>Image</th>
                    <th>Document</th>
                    <th>Module</th>
                    <th>User</th>
                    <th>Action</th>
                </tr>
            </thead>
            
            <?php foreach ($questions as $question): ?>
                <tr>
                    <td width="300px">
                        <?= htmlspecialchars($question['questiontext'], ENT_QUOTES, 'UTF-8') ?>
                    </td>

                    <td width="150px">
                        <?php
                            $display_date = date('D d M Y', strtotime($question['questiondate']));
                        ?>
                        <?= htmlspecialchars($display_date, ENT_QUOTES, 'UTF-8') ?>
                    </td>

                    <td width="150px">
                        <img height="100px" src="images/<?= htmlspecialchars($question['questionimage'], ENT_QUOTES, 'UTF-8') ?>" />
                    </td>

                    <td width="150px">
                        <?php if ($question['questiondocument']): ?>
                            <a href="documents/<?= htmlspecialchars($question['questiondocument'], ENT_QUOTES, 'UTF-8') ?>">
                                <?= htmlspecialchars($question['questiondocument'], ENT_QUOTES, 'UTF-8') ?>
                            </a>
                        <?php endif; ?>
                    </td>

                    <td width="150px">
                        <?= htmlspecialchars($question['module_name'], ENT_QUOTES, 'UTF-8') ?>
                    </td>

                    
                    <td width="50px">
                        by <a href="mailto:<?= htmlspecialchars($question['email'], ENT_QUOTES, 'UTF-8') ?>">
                            <?= htmlspecialchars($question['user_name'], ENT_QUOTES, 'UTF-8') ?>
                        </a>
                    </td>

                    <td width="50px">
                        <div class="actions">
                            <form action="editquestion.php">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($question['id'], ENT_QUOTES, 'UTF-8')?>">
                                <input type="submit" value="Edit">
                            </form>

                            <form action="deletequestion.php" method="post">
                                <input type="hidden" name="id" value="<?= htmlspecialchars($question['id'], ENT_QUOTES, 'UTF-8')?>">
                                <input type="submit" value="Delete">
                            </form>
                        </div>
                    </td>

                </tr>
            <?php endforeach; ?>
        </table>

<?php endif; ?>
                
