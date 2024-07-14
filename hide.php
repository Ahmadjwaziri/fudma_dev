<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
$(document).ready(function() {
    $('#showRecipientFieldsBtn').click(function() {
        var deliveryMode = $('#dmode').val();
        if (deliveryMode === 'electronic') {
            $('#recipientNameRow').show();
            $('#recipientEmailRow').show();
        } else {
            $('#recipientNameRow').hide();
            $('#recipientEmailRow').hide();
        }
    });
});
</script>

<!-- Add id to select element -->
<select class="form-control selectpicker" data-live-search="true" name="dmode" id="dmode">
    <option><?php //echo $app_row['mode_of_delivery'];?></option>
    <option value="electronic">Electronics Delivery</option>
    <option value="paper">Paper</option>
</select>

<!-- Add id to the div elements for recipient name and email -->
<div class="row" id="recipientNameRow" style="display: none;">
    <div class="col-lg-4">
        <div class="form-group">
            <label>Recipient Name</label>
            <input type="text" name="rname" class="form-control" value="<?php //echo $app_row['recipient_name'];?>">
        </div>
    </div>
</div>

<div class="row" id="recipientEmailRow" style="display: none;">
    <div class="col-lg-4">
        <div class="form-group">
            <label>Recipient Email</label>
            <input type="text" name="remail" class="form-control" value="<?php //echo $app_row['recipient_email'];?>" required>
        </div>
    </div>
</div>

<!-- Add a button to trigger the visibility of recipient fields -->
<button id="showRecipientFieldsBtn" class="btn btn-primary">Show Recipient Fields</button>
