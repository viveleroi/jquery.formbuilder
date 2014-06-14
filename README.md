FormBuilder v2
==================

Formbuilder is a component for your web-application that allows users to build web forms. We provide
basic logic for rendering the resulting form, and processing/validating the input. 

Think of it like a CMS for forms.

### Requirements

Formbuilder 2 requires a few tools, but we include them in the `dist` package for your convenience.

- `lodash` - An excellent (fast/light-weight) javascript utility library
- `jQuery` - A DOM manipulation/ajax library
- `dustjs` - A javascript templating engine

### Issues/Feedback

Please report all issues, bugs, and feature suggestions to our [issue tracker](https://snowy-evening.com/botsko/jquery-form-builder/)

Frombuilder is open source, we encourage you to submit improvements!

### Development

After cloning the repo, be sure you've installed the proper node/bower modules:

- `npm install`
- `bower install`

Then, run `grunt` to properly check and package the files.

### What's Different In v2

The web has changed so much in the five years since I wrote v1, so there's a lot of newer technology
we can use - JSON over xml, lodash, templating, MongoDB, etc.

v1 was pretty bulky and poorly coded. It was designed for a specific purpose and wasn't flexible enough
for how people have used formbuilder ever since. 

- JSON all the way around. No serliazing/format conversion.
- More flexible field schema options for future dev
- Form editors built via templating - making it easy to customize HTML
- Better re-use of internal code
- Returns a basic API you can use for custom work
- More flexibility on where existing data is loaded from.
- Much improved support for multiple instances on a single page

v2 uses an internal javascript object that we keep synchronized with the form editor. When you load/save
we're simply passing the object (JSON) around. 

While you can store this data in any database, I've opted for MongoDB as an example because it stores
data as JSON documents. So your data is JSON all the way around. Plus, I absolutely love it.

For those using `node`-based servers, you can use javascript all the way around as well.

### To-Do

- fix json sorting error with jquery/browsers
- validate labels are not empty
- restore sortable elements
- add propert dist grunt methods

- add html rendering for saved form
- add processing/validation for saved form
- save completed form entry

- set maxcharacters/size for fields
- add support for newer/html5 elements