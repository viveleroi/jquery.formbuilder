module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    uglify: {
      options: {
        banner: '/*! <%= pkg.name %> */\n'
      },
      dist: {
        files: {
          'src/js/jquery.formbuilder.min.js': ['src/js/*.js']
        }
      }
    },
    jshint: {
      all: ['Gruntfile.js','src/js/*.js']
    }
  });

  // grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-jshint');

  // Default task(s).
  grunt.registerTask('default', ['uglify']);
  // @todo jshint temp disabled. I'd really like to rewrite this

};