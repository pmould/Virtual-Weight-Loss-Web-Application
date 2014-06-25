<div class="content">
    <h1>Log a workout</h1>
    <h3>Enter your workout data here</h3>

    <!-- echo out the system feedback (error and success messages) -->
    <?php $this->renderFeedbackMessages(); ?>

    <form method="post" action="<?php echo URL;?>note/create">
        <label>Text of new note: </label><input type="text" name="note_text" />
		<label>Text of new note2: </label><input type="text" name="note_text2" />
		<label>Text of new note3: </label><input type="text" name="note_text3" />
        <input type="submit" value='Create this note' autocomplete="off" />
    </form>

    <h1 style="margin-top: 50px;">List of your workouts</h1>

    <table>
    <?php
        if ($this->notes) {
            foreach($this->notes as $key => $value) {
                echo '<tr>';
                echo '<td>' . htmlentities($value->note_text) . '</td>';
				 echo '<td>' . htmlentities($value->note_text2) . '</td>';
				  echo '<td>' . htmlentities($value->note_text3) . '</td>';
                echo '<td><a href="'. URL . 'note/edit/' . $value->note_id.'">Edit</a></td>';
                echo '<td><a href="'. URL . 'note/delete/' . $value->note_id.'">Delete</a></td>';
                echo '</tr>';
            }
        } else {
            echo 'No notes yet. Create some !';
        }
    ?>
    </table>
</div>
