jQuery.FormBuilder
==================

The jquery.Formbuilder plugin is a jQuery plugin that allows you add a form-creation, display, and basic validation tool into your application.

The API and example code has been left open for you to override, assuming that you want complete control over how the form data is saved and loaded. However we have provided some basic database loading/saving examples using PDO for MySQL.

Please report all issues, bugs, and feature suggestions to: https://snowy-evening.com/botsko/jquery-form-builder/

The tool interface is constructed using form data presented in JSON format by the server. The php class assists you with storing the data, generating the json, generating the html form, and processing the data.

A demo of this version may be found at http://botsko.net/Demos/formbuilder/

Please feel free to fork the project and provide patches back. Please let us know how you're using this product!

### Version 0.4.1 - 20130302

- Fixing required/baseline checked state being read incorrectly
- Adding ability to sort/reorder fields, PR by anjana-somathilake

### Version 0.4 - 20111215
- Removing old XML-based form loading system, moving to pure JSON
- Removing internal serialization system in favor of json formatting
- Adding example mysql storage methods to the load, save process
  (PDO-based so other databases may be used)
- Incorporated a required attribute bug fix:
  https://snowy-evening.com/botsko/jquery-form-builder/8/
- Dumped a ton of unnecessary complexity of encoding/decoding and array
  vars
- Changed process() to return an array of errors, not a string
- Added sample response saves to db, only on good validation

### Version 0.3.1 - 20110722
- Corrected issue with reserved words breaking support for Safari,
  Opera, IE
- Corrected issue with example-save expecting old POST key

### Version 0.3 - 20110619
- Compatible with latest jQuery, jQueryUI and jquery.scrollTo
- CSS moved into a separate file
- Applied jsbeautifier and jshint on code
- Added control box target element option
- Added localization support
- Improved dynamic loading, unique ID handling for multiple
  formbuilder-instances
- Removed scrollTo dependency in favour of jQuery.animate()
- Added json backend, to replace/as alternative to xml
- Example html switched to latest html doctype

### Version 0.2 - 20100806
- Upgraded to scroll.to 1.4.2
- Added ability to sort form fields.
- Added in basic build scripts for easier releases
- Minor code cleanup
- Hash bug fix

### Version 0.1 - 20090922
- Complete initial release using much of the functionality copied from
  AspenMSM, an excellent cms tool from Trellis Development.
