<form role="form">
  <div class="frmb-group form-group">
    <label for="">Add New Form Element</label>
    <select class="frmb-add-elem form-control" name="frmb-add-elem" id="frmb-add-elem">
      <option value="">Choose type</option>
      {#field_types}
      <option value="{key}">{label}</option>
      {/field_types}
    </select>
  </div>
  <button type="submit" class="frmb-save btn btn-default">Save</button>
</form>