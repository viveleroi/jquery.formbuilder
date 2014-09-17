module.exports = function(grunt) {

  require('load-grunt-tasks')(grunt);

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
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
    clean: {
      dist: ['dist'],
      post: ['dist/js/formbuilder.js','dist/js/formrunner.js']
    },
    useminPrepare: {
      html: ['dist/index.html','dist/form.html']
    },
    usemin: {
      html: ['dist/index.html','dist/form.html']
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
  grunt.registerTask('dist', ['jshint','clean:dist','copy:dist','useminPrepare','concat:generated','uglify:generated','usemin','clean:post']);

};