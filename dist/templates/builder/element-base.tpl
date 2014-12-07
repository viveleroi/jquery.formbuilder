<li id="{fbid}" class="frmb-group">
  <h4>{label}</h4>
  <label for="{fbid}_label">Field Label:</label>
  <input type="text" value="{model.label}" placeholder="ex: First Name" name="{fbid}_label" id="{fbid}_label" required>
  <label for="{fbid}_required">Required?</label>
  <input type="checkbox" value="1" {?model.required}checked="checked"{/model.required} name="{fbid}_required" id="{fbid}_required">
  <a href="#" class="frmb-remove">Remove</a>
  {?allowsChoices}
  <a href="#" class="frmb-add-choice">Add Choice</a>
  <ul class="frmb-choices">
  </ul>
  {/allowsChoices}
</li>