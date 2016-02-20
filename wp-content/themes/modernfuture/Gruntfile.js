module.exports = function(grunt) {

  // Project configuration.
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    sass: {
      dist: {
        files: {
          'build/css/build.css' : 'sass/main.scss',
        },
      },
    },
    concat: {
      options: {
        separator: ';',
      },
      dist: {
        src: ['js/**/*.js'],
        dest: 'build/js/build.js',
      },
    },
    watch: {
      sass: {
        files: ['sass/**/*.scss'],
        tasks: ['sass'],
        options: {
          livereload : 35729
        },
      },
      js: {
        files: ['js/**/*.js'],
        tasks: ['concat'],
        options: {
          livereload : 35729
        },
      },
      php: {
        files: ['**/*.php'],
        options: {
          livereload : 35729
        },
      },
      options: {
        style: 'expanded',
        compass: true,
      },
    },
  });

  
  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-watch');

  grunt.registerTask('default', ['sass', 'concat', 'watch']);
 

};