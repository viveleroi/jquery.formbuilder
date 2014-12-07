<li id="{fbid}" class="frmb-choice-group">
  <label for="{fbid}.selected">Selected?</label>
  <input type="checkbox" value="1" {?model.selected}checked="checked"{/model.selected} name="{fbid}.selected" id="{fbid}.selected">
  <label for="{fbid}.label">Choice</label>
  <input type="text" value="{model.label}" placeholder="ex: Red" name="{fbid}.label" id="{fbid}.label">
  <a href="#" class="frmb-choice-remove">Remove</a>
</li>