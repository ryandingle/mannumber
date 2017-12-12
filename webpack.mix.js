let mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.js('resources/assets/js/app.js', 'public/js')
	mix.js('resources/assets/js/common.js', 'public/js')

	/*modules js*/
	mix.js('resources/assets/js/modules/account/account.js', 'public/js/module/account')
	mix.js('resources/assets/js/modules/dashboard/dashboard.js', 'public/js/module//dashboard')
	mix.js('resources/assets/js/modules/module/module.js', 'public/js/module/module')
	mix.js('resources/assets/js/modules/permission/permission.js', 'public/js/module/permission')
	mix.js('resources/assets/js/modules/request/request.js', 'public/js/module/request')
	mix.js('resources/assets/js/modules/request/employee.js', 'public/js/module/request')
	mix.js('resources/assets/js/modules/role/role.js', 'public/js/module/role')
	mix.js('resources/assets/js/modules/user/user.js', 'public/js/module/user')

   .sass('resources/assets/sass/app.scss', 'public/css');
