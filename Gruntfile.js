module.exports = function(grunt) {

  require('load-grunt-tasks')(grunt);

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> */\n'
      },
      dist: {
        files: {
          'src/js/formbuilder.min.js': ['src/js/*.js']
        }
      }
    },
    jshint: {
      options: {
        jshintrc: '.jshintrc',
        reporter: require('jshint-stylish')
      },
      all: ['Gruntfile.js','src/js/*.js']
    }

  });

  // Default task(s).
  grunt.registerTask('default', ['jshint']);

  // @todo add proper dist/uglify build

};