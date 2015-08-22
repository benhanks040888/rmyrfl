module.exports = function(grunt) {

  // load all grunt tasks matching the `grunt-*` pattern
  require('load-grunt-tasks')(grunt);

  // var name = '<%= pkg.name %>-v<%= pkg.version %>';
  var assetsDir = 'assets/',
      scriptsDir = assetsDir + 'js/',
      scssDir = assetsDir + 'scss/',
      stylesDir = assetsDir + 'css/';

  var bannerContent = '/*! <%= pkg.title || pkg.name %> - ' +
      '<%= grunt.template.today("yyyy-mm-dd") %>\n' +
      '* Copyright (c) <%= grunt.template.today("yyyy") %> - <%= pkg.author.name %> */\n';

  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),

    jade: {
      compile: {
        options: {
          pretty: true,
        },
        files: [{
          expand: true,
          cwd: "html/jade/components",
          src: ["**/*.jade", "!_includes/*.jade"],
          dest: "html/",
          ext: ".html"
        },
        {
          expand: true,
          cwd: "html/jade/pages",
          src: ["**/*.jade", "!layout.jade", "!_includes/*.jade"],
          dest: "html/",
          ext: ".html"
        }]
      }
    },

    // compass: {
    //   dist: {
    //     options: {
    //       config: 'config.rb',
    //       outputStyle: 'expanded'
    //     }
    //   }
    // },
    
    // sass
    sass: {
      dist: {
        options: {
          style: 'expanded',
        },
        files: [{
          expand: true,
          cwd: scssDir,
          src: ['*.scss'],
          dest: stylesDir,
          ext: '.css'
        }]
      }
    },

    autoprefixer: {
      options: {
        browsers: ['last 2 version']
      },
      single_file: {
        src: stylesDir + 'site.css',
        dest: stylesDir + 'site.prefixed.css'
      }
    },

    csso: {
      compress: {
        options: {
          banner: bannerContent,
          report: 'gzip'
        },
        files: {
          'assets/css/site.min.css': ['<%= autoprefixer.single_file.src %>'],
          'assets/css/site.prefixed.min.css': ['<%= autoprefixer.single_file.dest %>']
        }
      }
    },

    // jshint: {
    //   options: {
    //     jshintrc: '.jshintrc'
    //   },
    //   all: [
    //     'Gruntfile.js',
    //     'assets/js/src/*.js'
    //   ]
    // },

    concat: {
      js: {
        // concatenate all files in js directory
        src: [scriptsDir + 'src/plugins.js', scriptsDir + 'src/main.js'],
        // place the result into the dist directory,
        // name variable contains template prepared in
        // previous section
        dest: scriptsDir + 'site.js'
      }
    },

    uglify: {
      options: {
        banner: bannerContent
      },
      dist: {
        // use all files in js directory
        src: ['<%= concat.js.dest %>'],
        // place the result into the dist directory,
        // name variable contains template prepared in
        // previous section
        dest: scriptsDir + 'site.min.js'
      }
    },

    // uglify: {
    //   files: {
    //     'assets/js/site.min.js': [
    //       scriptsDir + 'src/plugins.js', 
    //       scriptsDir + 'src/main.js'
    //     ]
    //   }
    //   // options: {
    //   //   banner: bannerContent
    //   // },
    //   // dist: {
    //   //   // use all files in js directory
    //   //   src: ['<%= concat.js.dest %>'],
    //   //   // place the result into the dist directory,
    //   //   // name variable contains template prepared in
    //   //   // previous section
    //   //   dest: scriptsDir + 'site.min.js'
    //   // }
    // },

    // image optimization
    imagemin: {
      dist: {
        options: {
          optimizationLevel: 7,
          progressive: true,
          interlaced: true
        },
        files: [{
          expand: true,
          cwd: 'assets/images/',
          src: ['**/*.{png,jpg,gif}'],
          dest: 'assets/images/'
        }]
      }
    },

    watch: {
      options: {
        livereload: true
      },
      gruntfile: {
        files: 'Gruntfile.js',
        task: ["jshint"]
      },
      css: {
        files: [
          scssDir + "**/*.scss"
        ],
        tasks: ["sass", "autoprefixer", "csso:compress"],
        options: {
          nospawn: true
        }
      },
      js: {
        files: [
          scriptsDir + "src/*.js"
        ],
        tasks: ["concat", "uglify"],
        options: {
          nospawn: true
        }
      },
      jade: {
        files: ["**/*.jade", "html/jade/components/modules/*.html"],
        tasks: ["jade"]
      }
    }
  });

  // Default task(s)
  grunt.registerTask('default', ["jade", "sass", "autoprefixer", "csso:compress", "concat", "uglify"]);
  grunt.registerTask('imagemin', ["imagemin"]);

  grunt.registerTask('dev', ["watch"]);

};