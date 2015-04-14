/**
 * Formbuilder
 * Copyright (c) 2009, 2014 (v2) Mike Botsko, Helion3 LLC (http://www.helion3.com)
 * http://www.botsko.net/blog/2009/04/jquery-form-builder-plugin/
 * Originally designed for AspenMSM, a CMS product from Trellis Development
 * Licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 */
(function (window,undefined){

  var Formbuilder = function(opts){

    if( !(this instanceof Formbuilder) ){
      throw new Error('Must instantiate using the `new` keyword');
    }

    if( typeof opts.targets !== 'object' || opts.targets.length === 0 ){
      throw new Error('Invalid or missing target element(s)');
    }

    if( typeof opts.save !== 'function' ){
      throw new Error('Invalid or missing save callback');
    }

    // Define all default options
    var defaultOptions = {

      // A unique ID shared with the server-side code
      form_id: 'frmb-'+Date.now(),

      // Injected model, allows us to start with an
      // existing form
      startingModel: false,

      // A dom-lib wrapped element
      targets: false,

      // We'll call this function on form save with the proper objects
      save: false,

      // Whether to allow sorting of list items
      sortable: true,

      // Customizable base for templates
      templateBasePath: 'templates/builder',

      // Description of allowed field types
      field_types: [
        {
          key: 'text',
          label: 'Text',
          schema: {
            name: false,
            fbid: false,
            label: '',
            required: false
          }
        },{
          key: 'textarea',
          label: 'Textarea',
          schema: {
            name: false,
            fbid: false,
            label: '',
            required: false
          }
        },{
          key: 'select',
          label: 'Select',
          template: 'choices',
          schema: {
            name: false,
            fbid: false,
            label: '',
            required: false,
            choices: []
          },
          choiceSchema: {
            selected: false,
            label: ''
          }
        },{
          key: 'radio',
          label: 'Radio',
          template: 'choices',
          schema: {
            name: false,
            fbid: false,
            label: '',
            required: false,
            choices: []
          },
          choiceSchema: {
            selected: false,
            label: ''
          }
        },{
          key: 'checkbox',
          label: 'Checkbox',
          template: 'choices',
          schema: {
            name: false,
            fbid: false,
            label: '',
            required: false,
            choices: []
          },
          choiceSchema: {
            selected: false,
            label: ''
          }
        }
      ]
    };

    var _privateSelf = this;
    this._opts = $.extend(true, {}, defaultOptions,opts);

    // Dynamically load templates
    if( dust.onLoad === undefined ){
      dust.onLoad = function(name, callback) {
        $.ajax(_privateSelf._opts.templateBasePath + '/' + name + '.tpl', {
          success: function(data) {
            callback(undefined, data);
          },
          error: function(jqXHR, textStatus, errorThrown) {
            callback(textStatus, undefined);
          }
        });
      };
    }

    // Sort field models by sortOrder
    var sortObject = function(obj){
      var arr = [];
      for (var prop in obj){
        if (obj.hasOwnProperty(prop)){
          arr.push({
            'key': prop,
            'value': obj[prop].sortOrder
          });
        }
      }
      arr.sort(function(a, b){ return a.value - b.value; });

      var result = [];
      for( var i = 0, l = arr.length; i < l; i++ ){
        var key = arr[i].key;
        result.push(obj[key]);
      }

      return result;
    };

    (function(engine){

      var targets = engine._opts.targets;

      engine.render();

      // Load the starting model
      if( typeof engine._opts.startingModel === 'object' ){

        engine._model = engine._opts.startingModel;
        // @todo validate against the field schema

        var sorted = sortObject(engine._model);

        // Iterate model and render proper editors
        $.each(sorted,function(index,model){
          var field = engine.getFieldTypeByName( model.type );
          engine.addFormElementEditor( field, model );
        });
      }

      /**
       * Event listeners
       */

      // New form element editor
      targets.on('change', '.frmb-add-elem', function(){
        var val = $(this).val();
        engine.addFormElementEditor( engine.getFieldTypeByName(val) );
        $(this).val('');
      });

      // Add a choice entry
      targets.on('click', '.frmb-add-choice', function(e){
        e.preventDefault();
        var elem = $(this);
        var parent = elem.parents('.frmb-group').last();
        var id = parent.attr('id');

        var fieldType = engine.getFieldTypeByName( engine._model[id].type );

        engine.appendFieldToFormElementEditor( parent, fieldType, engine._model[id] );

        return false;
      });

      // Remove a form element editor
      targets.on('click', '.frmb-remove', function(e){
        e.preventDefault();
        var elem = $(this);
        var parent = elem.parents('.frmb-group:eq(0)');
        var id = parent.attr('id');
        engine.removeModel( id );
        parent.remove();
        return false;
      });

      // Remove a form element choice
      targets.on('click', '.frmb-choice-remove', function(e){
        e.preventDefault();
        var elem = $(this);
        var parent = elem.parents('.frmb-choice-group:eq(0)');
        var id = parent.attr('id');
        engine.removeModel( id );
        parent.remove();
        return false;
      });

      // Update model with keyboard entries
      targets.on('keyup', 'input[type=text]', function(e){

        // specific field editor container
        var elem = $(this);
        var parent = elem.parents('.frmb-group').last();
        var id = parent.attr('id');
        var type = elem.attr('name').replace(id+'_', '');

        engine.setModelValue( id, type, elem.val() );

      });

      // Update model with checkbox entries
      targets.on('change', 'input[type=checkbox]', function(e){

        // specific field editor container
        var elem = $(this);
        var parent = elem.parents('.frmb-group').last();
        var id = parent.attr('id');
        var type = elem.attr('name').replace(id+'_', '');

        engine.setModelValue( id, type, elem.is(':checked') );

      });

      // Save
      targets.on('click', '.frmb-save', function(e){
        e.preventDefault();
        engine.save();
        return false;
      });

    })(this);

    return this;

  };

  Formbuilder.prototype = {

    // store options
    _opts: false,

    // current object representing the form
    _model: {},

    /**
     * Render the form editor
     * @return {[type]} [description]
     */
    render: function(){

      var self = this;

      // Pass data to the original rendering
      var frmObj = {
        field_types: this._opts.field_types
      };

      dust.render('base', frmObj, function(err, out) {

        // Append final content
        self._opts.targets.append( out );

      });
    },

    /**
     * Returns the field type object by given name
     * @param  {string} field_type_name Field type name
     * @return {object}
     */
    getFieldTypeByName: function( field_type_name ){
      var field = null;
      for( var i = 0, l = this._opts.field_types.length; i < l; i++ ){
        var fieldType = this._opts.field_types[i];
        if( fieldType.key === field_type_name ){
          field = fieldType;
          break;
        }
      }
      return field;
    },

    /**
     * Add a new form element editing box
     */
    addFormElementEditor: function( field, existingModel ){

      var self = this;

      if( typeof field !== 'object' ){
        throw new Error('Failed to add form element editor: Invalid field object');
      }

      // Determine field name
      var fbid = field.key + '_' + Date.now();
      if( existingModel !== undefined && typeof existingModel.fbid === 'string' ){
        fbid = existingModel.fbid;
      }
      else if( typeof field.fbid === 'string' ){
        fbid = field.fbid;
      }

      // Create a new model entry
      if( typeof existingModel !== 'object' ){
        self._model[fbid] = $.extend(true, {}, field.schema, {
          fbid: fbid,
          type: field.key
        });
        existingModel = self._model[fbid];
      }

      // Prep data for template
      var bodyObj = {
        fbid: fbid,
        model: existingModel,
        allowsChoices: (existingModel.choices !== undefined)
      };
      bodyObj = $.extend(true, {}, bodyObj,field);

      // Render base element (all fields need these base values)
      dust.render('element-base', bodyObj, function(err, out){

        var elem = $(out);

        var parent = self._opts.targets.find('ul');

        // append base
        var last_li = parent.find('.frmb-group:last');
        if( last_li.length !== 0 ){
          last_li.after( elem );
        } else {
          parent.append( elem );
        }

        if( self._opts.sortable ){
          self._opts.targets.find('ul').sortable();
        }

        // Load choices already present
        if( existingModel.choices !== undefined ){
          $.each(existingModel.choices,function(key,choice){
            self.appendFieldToFormElementEditor( elem, field, existingModel, choice, key );
          });
          return;
        }

        // Add a default/empty one
        self.appendFieldToFormElementEditor( elem, field, existingModel );

      });
    },

    /**
     * Update the internal model with the sorted list items
     */
    updateModelWithSort: function(){

      var self = this;

      var groups = self._opts.targets.find('.frmb-group');

      var i = 1;
      $.each(groups,function(key,elem){
        var id = $(elem).attr('id');
        if( self._model[id] !== undefined ){
          self._model[id].sortOrder = i;
        }
        i++;
      });
    },

    /**
     * Appends secondary details to an existing form editor
     * @param  {element} frmb_group Form group description to append to
     * @param  {object} field      Field type schema to use
     */
    appendFieldToFormElementEditor: function( frmb_group, field, parentModel, existingModel, index ){

      // load additional details template
      if( field.template !== undefined ){

        // choices
        if( parentModel.choices !== undefined ){

          // Create a new model
          if( typeof existingModel !== 'object' ){
            existingModel = $.extend(true,{},field.choiceSchema);
            parentModel.choices.push( existingModel);
          }

          var bodyObj = {
            fbid: parentModel.fbid,
            model: existingModel
          };

          // new index
          index = (typeof index === 'number') ? index : parentModel.choices.length;
          bodyObj.fbid += '_choices.'+index;

          dust.render(field.template, bodyObj, function(err, out){
            frmb_group.find('.frmb-choices').append( out );
          });
        }
      }
    },

    /**
     * Sets a new value for a field's model
     * @param {string} id   Model ID
     * @param {string} type Schema field value belongs to
     * @param {string} val
     */
    setModelValue: function( id, type, val ){

      // Some paths are namespaced
      var path = false;
      if( type.indexOf('.') > -1 ){
        path = type.split('.');
        type = path[0];
      }

      if( this._model[id] === undefined ){
        throw new Error('Model has no entry for ' + id);
      }

      if( this._model[id].type === undefined ){
        throw new Error('Invalid schema field ' + type + ' for model ' + id);
      }

      var fieldType = this.getFieldTypeByName( this._model[id].type );

      // Special handling for choice
      if( type === 'choices' ){

        var index = parseInt(path[1],10) - 1;

        // verify field is in schema
        if( this._model[id][type][index][path[2]] === undefined  ){
          throw new Error('Invalid choice schema field ' + path[2] + ' for model ' + id);
        }

        // set value
        this._model[id][type][index][path[2]] = val;

        return;

      }

      this._model[id][type] = val;

    },

    /**
     * Removes a field model
     * @param  {string} id
     */
    removeModel: function( id ){

      if( id.indexOf('.') > -1 ){

        // we're deleting a sub model
        var _tmp = id.replace(/.*_/,'');
        var path = _tmp.split('.');
        var index = parseInt(path[1],10);
        id = id.replace('_'+_tmp,'');

        delete this._model[id][path[0]][index];
        return;

      }

      delete this._model[id];

    },

    /**
     * Determines a good form field "name" attribute based on the label
     * and updates each model, unless a name exists
     */
    setFieldNames: function(){

      var self = this;

      for( var k in self._model ){
        var field = self._model[k];
        if( typeof field.name !== 'string' || field.name.trim().length === 0 ){
          self._model[k].name = field.label.toLowerCase().replace(/([^a-zA-Z0-9\._-]+)/g,'-');
        }
      }
    },

    /**
     * Passes a JSON model of the resulting form to the server-side
     * code.
     */
    save: function(){

      this.updateModelWithSort();

      this.setFieldNames();

      var save = {
        form_id: this._opts.form_id,
        model: this._model
      };

      this._opts.save({
        form_id: this._opts.form_id,
        model: this._model
      });
    }
  };

  // map!
  window.Formbuilder = Formbuilder;

})(this);