<li id="{name}" class="frmb-choice-group">
  <label for="{name}.selected">Selected?</label>
  <input type="checkbox" value="1" {?model.selected}checked="checked"{/model.selected} name="{name}.selected" id="{name}.selected">
  <label for="{name}.label">Choice</label>
  <input type="text" value="{model.label}" placeholder="ex: Red" name="{name}.label" id="{name}.label">
  <a href="#" class="frmb-remove">Remove</a>
</li>