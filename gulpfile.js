var elixir = require('laravel-elixir');

elixir(function(mix) {
    mix.sass('app/global.scss', 'public/css/app');
    mix.sass('app/web/home.scss', 'public/css/app/web');
    mix.sass('app/admin/masterpage.scss', 'public/css/app/admin');

    mix.sass('app/user/masterpage.scss', 'public/css/app/user');
    mix.sass('app/user/job_list.scss', 'public/css/app/user');
    mix.sass('app/user/acct_settings.scss', 'public/css/app/user');
    mix.sass('app/user/edit_profile.scss', 'public/css/app/user');
    mix.sass('app/user/calendar.scss', 'public/css/app/user');
    mix.sass('app/user/year_calendar.scss', 'public/css/app/user');
});

elixir(function(mix) {
    mix.webpack('app/global.js', 'public/js/app');
    mix.webpack('app/home.js', 'public/app/web');

    // USER
    mix.webpack('app/user.js', 'public/app');
    mix.webpack('app/user/edit_profile.js', 'public/app/user');
    mix.webpack('app/user/job_list.js', 'public/app/user');
    mix.webpack('app/user/usr_calendar.js', 'public/app/user');
});