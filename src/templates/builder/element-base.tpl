<li id="{name}" class="frmb-group">
  <h4>{label}</h4>
  <label for="{name}_label">Field Label:</label>
  <input type="text" value="{model.label}" placeholder="ex: First Name" name="{name}_label" id="{name}_label" required>
  <label for="{name}_required">Required?</label>
  <input type="checkbox" value="1" {?model.required}checked="checked"{/model.required} name="{name}_required" id="{name}_required">
  <a href="#" class="frmb-remove">Remove</a>
</li>