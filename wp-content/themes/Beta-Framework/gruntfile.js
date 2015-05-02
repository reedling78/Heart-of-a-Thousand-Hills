module.exports = function(grunt) {

    grunt.initConfig({

        compass: {
            dev: {
                options: {
                    sassDir: 'scss/',
                    cssDir: 'css/',
                    fontsDir: 'font/',
                    imagesDir: 'img/',
                    relativeAssets: true
                }
            },
        },

        watch: {
            dev: {
                files: ['**/*.scss'],
                tasks: ['compass:dev'],
                options: {
                    spawn: false,
                },
            },
        },

    });

    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-compass');

    grunt.registerTask('default', ['compass:dev']);
    grunt.registerTask('watcher', ['watch:dev']);

};