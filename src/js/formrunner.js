/**
 * Dynamically load templates
 * @param  {[type]}   name     [description]
 * @param  {Function} callback [description]
 * @return {[type]}            [description]
 */
dust.onLoad = function(name, callback) {
  $.ajax('templates/runner/' + name + '.tpl', {
    success: function(data) {
      callback(undefined, data);
    },
    error: function(jqXHR, textStatus, errorThrown) {
      callback(textStatus, undefined);
    }
  });
};

/**
 * formrunner
 * Copyright (c) 2009, 2014 (v2) Mike Botsko, Helion3 LLC (http://www.helion3.com)
 * http://www.botsko.net/blog/2009/04/jquery-form-builder-plugin/
 * Originally designed for AspenMSM, a CMS product from Trellis Development
 * Licensed under the MIT (http://www.opensource.org/licenses/mit-license.php)
 */
var formrunner = function(opts){

  if( !_.has(opts,'targets') || !_.isObject(opts.targets) || opts.targets.length === 0 ){
    throw new Error('Invalid or missing target element(s)');
  }

  if( !_.has(opts,'action') || !_.isString(opts.action) || opts.action.trim() === '' ){
    throw new Error('Invalid or missing save url');
  }

  // Define all default options
  var defaultOptions = {

    // Id to refer to this form specifically
    form_id: false,

    // Injected model, allows us to start with an
    // existing form
    model: false,

    // A dom-lib wrapped element
    targets: false,

    // URL to submit form results to
    action: '',

    // Form submission method
    method: 'POST'

  };

  this._opts = _.assign(defaultOptions,opts);

  this.render();

  return this;

};

formrunner.prototype = {

  // store options
  _opts: false,

  /**
   * Render the form editor
   * @return {[type]} [description]
   */
  render: function(){

    var self = this;

    // Pass data to the original rendering
    var frmObj = {
      form_id: self._opts.form_id,
      action: self._opts.action,
      method: self._opts.method
    };

    // Load base form template
    dust.render('base', frmObj, function(err, out) {

      // Append content
      self._opts.targets.append( out );

      // Sort incoming models
      var sorted = _.sortBy(self._opts.model,'sortOrder');

      // Iterate model and render proper editors
      _.each(sorted,function(model,index){
        self.appendElementForModel(model);
      });
      
    });
  },

  /**
   * Append a rendered form element for a model
   * @param object model Form model from the builder
   */
  appendElementForModel: function( model ){

    var self = this;

    // Pass data to the template
    var frmObj = {
      id: self.fieldNameToId(model.label),
      label: model.label,
      required: model.required
    };

    // Load and render the html template for the form
    dust.render(model.type, frmObj, function(err, out){

      // Set base template
      self._opts.targets.find('form>ul').append( out );

      var lastLi = self._opts.targets.find('form>ul>li:last-child');

      // Build choices
      if( _.has(model,'choices') ){
        _.each(model.choices,function(choice,key){

          // Load choice template
          dust.render(model.type+'-choices', choice, function(err, out){

            if( model.type === 'select' ){
              lastLi.find('select').append(out);
            }
          });
        });
      }
    });
  },

  /**
   * Convert a field label to an html/backend-valid ID/name
   * @param  string name Label to convert
   * @return string HTML/backend-safe string
   */
  fieldNameToId: function( name ){
    return name.toLowerCase().replace(/ /g,'-').replace(/[^a-zA-Z0-9_.-]/g, '');;
  }
};