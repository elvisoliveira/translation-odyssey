module.exports = function(grunt) {
    grunt.initConfig({
        copy: [{
                files: [
                    {
                        expand: true,
                        cwd: 'bower_components/font-awesome/',
                        src: ['**/*.css', '**/*.otf', '**/*.eot', '**/*.svg', '**/*.ttf', '**/*.woff', '**/*.woff2'],
                        dest: 'files/font-awesome/'
                    },
                    {
                        expand: true,
                        cwd: 'node_modules/jquery/dist/',
                        src: ['jquery.js'],
                        dest: 'files/jquery/'
                    }
                ]
            }]
    });
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.registerTask('default', ['copy']);
};