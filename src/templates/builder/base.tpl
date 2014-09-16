<form class="frmb-form" role="form">
  <div>
    <select class="frmb-add-elem" name="frmb-add-elem" id="frmb-add-elem">
      <option value="">Add new field...</option>
      {#field_types}
      <option value="{key}">{label}</option>
      {/field_types}
    </select>
  </div>
  <ul>
  </ul>
  <button type="submit" class="frmb-save">Save</button>
</form>