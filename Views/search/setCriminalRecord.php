<style>
    #records label {
        color: white;
    }
</style>
<form action="" method="post" id="criminalRecordForm">
    <div id="records">
        <div class="record">
            <label for="recordReason">Raison:</label>
            <input type="text" name="recordReason"><br>

            <label for="recordDangerousness">Dangerosité:</label>
            <select id="Genre" name="recordDangerousness" required>
                <option value="severe">Severe</option>
                <option value="Medium">Medium</option>
                <option value="Low">Low</option>
            </select><br>
        </div>
    </div>

    <button type="" name="AddBTN">adding</button>
</form>
