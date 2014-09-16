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
          'dist/js/formbuilder.js': ['src/js/*.js']
        }
      }
    },
    copy: {
      dist: {
        files: [
          {
            expand: true,
            cwd:'src/',
            src: '**',
            dest: 'dist/'
          },
          {
            src: ['LICENSE','README.MD'],
            dest: 'dist/'
          }
        ]
      }
    },
    clean: ['dist'],
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
  grunt.registerTask('dist', ['jshint','clean','copy:dist','uglify']);

};