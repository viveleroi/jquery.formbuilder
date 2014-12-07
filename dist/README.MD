FormBuilder v2 (Beta)
==================

Formbuilder is a component for your web-application that allows users to build web forms. We provide
basic logic for rendering the resulting form. 

Think of it like a CMS for forms.

### Installation with Bower

We support installation via [Bower](http://bower.io/): `bower install jquery.formbuilder`. Requires `jQuery` and `dustjs-linkedin` template library.

### Usage

Take a look at `dist/index.html`. You essentially need to declare a `new formbuilder()` with at least a few options:

- `targets` - A jQuery DOM element to attach instances to, i.e. `$('.formbuilder')`
- `save` - A callback that executes when a form is saved
- `startingModel` - A starting model if one is loaded from a database

### What's Different In v2

The web has changed so much in the five years since I wrote v1, so there's a lot of newer technology
we can use - JSON over xml, lodash, templating, MongoDB, etc.

v1 was pretty bulky and poorly coded. It was designed for a specific purpose and wasn't flexible enough
for how people have used formbuilder ever since. [If you need v1, see here.](https://github.com/viveleroi/jquery.formbuilder/tree/1.0 )

Version 2 offers:

- JSON all the way around. No serliazing/format conversion.
- More flexible field schema options for future expansion work
- Form editor and form rendering use templates, making it easier to customize them
- Better re-use of internal code, much cleaner code
- Returns a basic API you can use for custom work
- PHP/Mongo save/load example code is extremely lightweight, and easily replaced
- Much improved support for multiple instances on a single page

v2 uses an internal javascript object that we keep synchronized with the form editor. When you load/save
we're simply passing the object (JSON) around. 

While you can store this data in any database, I've opted for MongoDB as an example because it stores
data as JSON documents. So your data is JSON all the way around. Plus, I absolutely love it.

However, php/mongo aren't required and can be easily replaced with any back-end storage/language.

### Important Notes

v2 is still in development, we're mainly working on cleanup and making it better.

Unlike v1, we're now leaving validation and processing of actual form submissions up to you. While validation may
be improved, processing and handling form data is something we can't predict for your use case.

### Distribusion Code

We provide a `dist` folder with a complete copy of everything you need to get started. Our build process copies over
and compiles the libraries and source for production-ready environments.

### Issues/Feedback

Please report all issues, bugs, and feature suggestions to our [issue tracker](https://snowy-evening.com/botsko/jquery-form-builder/)

Frombuilder is open source, we encourage you to submit improvements!

### Development

After cloning the repo, be sure you've installed the proper node/bower modules:

- `npm install`
- `bower install`

Then, run `grunt` to properly check and package the files.

### To-Do

*Soon*

- add sorting to choices

*Someday*

- set maxcharacters/size for fields
- allow setting placeholders
- add support for html5 field elements