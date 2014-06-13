FormBuilder v2
==================

Formbuilder is a component for your web-application that allows users to build web forms. We provide
basic logic for rendering the resulting form, and processing/validating the input. 

Think of it like a CMS for forms.


### Requirements

Formbuilder 2 requires a few tools, but we include them in the `dist` package for your convenience.

- `lodash` - An excellent (fast/light-weight) javascript utility library
- `jQuery` *or* `simpleDOM` - A DOM library is required. If it matches the jQuery DOM api, it'll work.

**Optional:**

Formbuilder works well with popular frameworks like Bootstrap, so we've added them here. However, you do not
need these for Formbuilder to work.

### Issues/Feedback

Please report all issues, bugs, and feature suggestions to our [issue tracker](https://snowy-evening.com/botsko/jquery-form-builder/)

Frombuilder is open source, we encourage you to submit improvements!

### Development

We use [Grunt](http://gruntjs.com/ ) for packaging and testing. After cloning the repo, run `npm install` once, and then
`grunt` to check the source code and prepare the distribution copy.