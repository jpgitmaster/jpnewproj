var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass('app/global.scss', 'public/css/app');
    mix.sass('app/web/home.scss', 'public/css/app/web');
    mix.sass('app/admin/masterpage.scss', 'public/css/app/admin');

    mix.sass('app/user/masterpage.scss', 'public/css/app/user');
    mix.sass('app/user/edit_profile.scss', 'public/css/app/user');
});

elixir(function(mix) {
    mix.webpack('app/global.js', 'public/js/app');
    mix.webpack('app/home.js', 'public/app/web');

    // USER
    mix.webpack('app/user.js', 'public/app');
    mix.webpack('app/user/edit_profile.js', 'public/app/user');
});