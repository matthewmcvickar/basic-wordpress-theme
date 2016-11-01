module.exports = function(grunt) {

  // Variables.
  var srcDir  = '_src';
  var distDir = '_dist';
  var siteURL = 'vagrantpress.dev';

  // Configure.
  grunt.initConfig({

    // Remove the distribution and /.tmp directories so we can start fresh.
    clean: {
      files: [
        distDir,
        '.tmp'
      ]
    },

    // SASS compilation and CSS auto-prefixing.
    sass: {
      theme: {
        files: {
          '.tmp/style.css': srcDir + '/css/style.scss',
          '.tmp/admin.css': srcDir + '/css/admin.scss'
        },
        options: {
          includePaths: [
            'node_modules/',
            'node_modules/bootstrap-sass/assets/stylesheets/',
          ],
          outputStyle: 'compressed'
        }
      }
    },

    autoprefixer: {
      theme: {
        src: '.tmp/style.css',
        dest: 'style.css'
      },
      admin: {
        src: '.tmp/admin.css',
        dest: 'admin/admin.css'
      }
    },

    // JavaScript concatenation and uglification.
    uglify: {
      build: {
        files: {
          'js/script.js': [
            'node_modules/jquery/dist/jquery.min.js',
            'node_modules/sticky-kit/dist/sticky-kit.min.js',
            'node_modules/magnific-popup/dist/jquery.magnific-popup.min.js',
            srcDir + '/js/script.js'
          ]
        }
      }
    },

    // Image optimization.
    imagemin: {
      options: {
        progressive: true
      },
      build: {
        files: [{
          expand: true,
          cwd: srcDir + '/img/',
          src: ['**/*.{png,jpg,gif,ico}'],
          dest: 'img/'
        }]
      }
    },

    // Optimize SVGs and turn them into PHP files we can include in WordPress.
    svgmin: {
      build: {
        files: [{
          expand: true,
          cwd: srcDir + '/img/',
          src: ['**/*.svg'],
          dest: 'img/',
          ext: '.svg.php'
        }]
      }
    },

    // BrowserSync
    browserSync: {
      files: ['**/*.css'],
      options: {
        watchTask: true,
        open: false,
        proxy: siteURL,
        notify: {
          styles: [
            'z-index: 9999',
            'position: fixed',
            'left: 50%',
            'top: 0px',
            'transform: translate(-50%, 0)',
            'margin: 0',
            'padding: 10px 15px',
            'border-bottom-left-radius: 5px',
            'border-bottom-right-radius: 5px',
            'background-color: rgba(0, 0, 0, 0.5)',
            'color: white',
            'font-family: sans-serif',
            'font-size: 12px',
            'font-weight: bold',
            'text-align: center'
          ]
        }
      }
    },

    // Watch and process files.
    watch: {
      sass: {
        files: [srcDir + '/css/*.scss'],
        tasks: ['sass']
      },

      autoprefixer: {
        files: ['.tmp/*.css'],
        tasks: ['autoprefixer']
      },

      uglify: {
        files: [srcDir + '/js/**/*.js'],
        tasks: ['uglify']
      },

      imagemin: {
        files: [srcDir + '/img/**/*'],
        tasks: ['imagemin']
      },

      svgmin: {
        files: [srcDir + '/img/**/*.svg'],
        tasks: ['svgmin']
      },

      reload: {
        files: [
          '**/*.php',
          'img/**/*',
          'js/**/*',
          'admin/**/*'
        ],
        options: {
          livereload: true
        }
      }
    },

    // Copy the files needed for production into the distribution directory so
    // they can be uploaded without the development/source files.
    copy: {
      dist: {
        files: [{
          expand: true,
          src: [
            '**/*',
            '!Gruntfile.js',
            '!package.json',
            '!**/_src/**',
            '!**.tmp/**',
            '!**/node_modules/**'
          ],
          dest: distDir
        }]
      }
    }

  });

  // Plugins.
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-browser-sync');
  grunt.loadNpmTasks('grunt-contrib-clean');
  grunt.loadNpmTasks('grunt-contrib-copy');
  grunt.loadNpmTasks('grunt-contrib-imagemin');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-notify');
  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-svgmin');

  // Tasks.
  grunt.registerTask(
    'setup',
    [
      'clean',
      'sass',
      'autoprefixer',
      'uglify',
      'imagemin',
      'svgmin'
    ]
  );

  grunt.registerTask(
    'default',
    [
      'setup',
      'browserSync',
      'watch'
    ]
  );

  grunt.registerTask(
    'dist',
    [
      'setup',
      'copy:dist'
    ]
  );

};
