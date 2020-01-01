/* jshint node: true */
module.exports = function(grunt) {

    grunt.initConfig({

        pkg: grunt.file.readJSON('package.json'),

        uglify: {
            min: {
                files: [{
                    expand: true,
                    cwd: 'src',
                    src: '**/*.js',
                    dest: 'dist',
                    ext: '.min.js'
                }],
                options: {

                }
            }
        },

        copy: {
            jsFiles: {
                files: [{
                    expand: true,
                    cwd: 'src',
                    src: ['**/*.js'],
                    dest: 'dist'
                }]
            }
        },

        concat: {
            standalone: {
                src: ['bower_components/fastsearch/dist/fastsearch.js', 'dist/fastselect.js'],
                dest: 'dist/fastselect.standalone.js'
            },
            standaloneMin: {
                src: ['bower_components/fastsearch/dist/fastsearch.min.js', 'dist/fastselect.min.js'],
                dest: 'dist/fastselect.standalone.min.js'
            }
        },

        jshint: {
            options: {
                'jshintrc': '.jshintrc'
            },
            all: ['src','Gruntfile.js']
        },

        jscs: {
            options: {
                config: '.jscsrc'
            },
            scripts: {
                files: {
                    src: [
                        'src/**/*.js'
                    ]
                }
            }
        },

        sass: {
            options: {
                sourcemap: 'none'
            },
            min: {
                options: {
                    style: 'compressed'
                },
                files: {
                    'dist/fastselect.min.css': 'src/fastselect.scss'
                }
            },
            expanded: {
                options: {
                    style: 'expanded'
                },
                files: {
                    'dist/fastselect.css': 'src/fastselect.scss'
                }
            },
            demo: {
                options: {
                    style: 'expanded'
                },
                files: {
                    'demo/css/main.css': 'demo/scss/main.scss'
                }
            }
        },

        watch: {
            jsFiles: {
                expand: true,
                files: ['src/**/*.js'],
                tasks: ['jshint', 'jscs', 'uglify', 'copy', 'concat'],
                options: {
                    spawn: false
                }
            },
            cssFiles: {
                expand: true,
                files: ['src/**/*.scss', 'demo/scss/**/*.scss'],
                tasks: ['sass'],
                options: {
                    spawn: false
                }
            },
            demoFiles: {
              expand: true,
              files: ['demo/**/*.html'],
              tasks: ['includereplace'],
              options: {
                  spawn: false
              }
            }
        },

        includereplace: {
            dist: {
                options: {
                    globals: {
                        repositoryUrl: '<%= pkg.repository.url %>',
                    },
                    prefix: '{{ ',
                    suffix: ' }}'
                },
                src: 'demo/index.html',
                dest: 'index.html'
            }
        }

    });

    require('load-grunt-tasks')(grunt);

    grunt.registerTask('default', ['watch']);
    grunt.registerTask('build', ['jshint',  'jscs', 'uglify', 'copy', 'concat', 'sass', 'includereplace']);

};
