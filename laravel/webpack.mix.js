const mix = require('laravel-mix');

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css');

mix.js('resources/backend/main.js', 'public/js');

mix.webpackConfig({
  resolve: {
    alias: {
      '@': path.resolve(__dirname, 'resources/backend'),
    },
  },
});

// 此处新增
.babelConfig({
  plugins: ['dynamic-import-node']
});
