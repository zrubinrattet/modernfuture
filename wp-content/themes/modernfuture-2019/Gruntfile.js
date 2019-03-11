// get the grunt class
const grunt = require('grunt');
// get the node sass implementation (cuz the ruby one is SLOW AF)
const sass = require('node-sass');
// auto-load all the grunt tasks passed into the initConfig func
require('load-grunt-tasks')(grunt);

// pass settings into grunt
grunt.initConfig({
    sass: {
        options: {
            implementation: sass,
            sourceMap: true,
        },
        dist: {
            files: {
                'build/css/build.css': 'scss/main.scss',
            },
        }
    },
    autoprefixer: {
        options: {
            browsers: [
                "> 1%",
            ],
        },
        build: {
            src: 'build/css/build.css',
            dest: 'build/css/build.css',
        }
    },
    watch: {
        sass: {
            files: ['scss/**/*.scss'],
            tasks: ['sass'],
            options: {
                livereload: 35729
            },
        },
        js: {
            files: ['js/**/*.js'],
            tasks: ['browserify'],
            options: {
                livereload: 35729
            },
        },
        php: {
            files: ['**/*.php'],
            options: {
                livereload: 35729
            },
        },
        options: {
            style: 'expanded',
            compass: true,
        },
    },
    browserify: {
        dist: {
            files: {
                'build/js/build.js': ['js/index.js']
            },
            options: {
                transform: [
                    [
                        "babelify", {
                            presets: ["@babel/env"]
                        }
                    ]
                ],
                browserifyOptions : {
                    // Embed source map for tests
                    debug : true
                },
                sourceMaps: true
            }
        }
    },
    exorcise: {
        bundle: {
            options: {},
            files: {
                'build/js/build.js.map': ['build/js/build.js'],
            }
        }
    }
});
// register the default task
grunt.registerTask('default', ['sass', 'autoprefixer', 'browserify', 'exorcise', 'watch']);