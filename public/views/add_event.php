<?php
session_start();
if(!isset($_SESSION["useremail"]) || !isset($_SESSION["userid"])){
    header("location: ../login");
}
$currentpage = "add_event";
include(__DIR__.'/../inc/header.php')
?>
    <div class="upper_panel">
        <h1>Create your own event</h1>
        <div class="bottom_line"></div>
    </div>
    <div class="content">
        <form action="addEvent" method="POST" ENCTYPE="multipart/form-data">
            <?php if(isset ($messages)){
                foreach ($messages as $message) {
                    echo $message;
                }
            }
            ?>
            <input name="title" type="text" placeholder="Event Name">
            <textarea name="description" rows="5" placeholder="Description"></textarea>
            <input type="file" name="file">
            <input type="date" name="date" min="2022-01-01" id="dateField">
            <label for="locationsselect">Choose a location:</label>
            <select id="locationsselect" name="location" required>
                <?php foreach($locations as $location):?>
                    <option value=<?=serialize($location)?>><?=$location?></option>
                <?php endforeach; ?>
            </select>
            <button type="submit">Create</button>
        </form>
    </div>
</div>
</body>
</html>