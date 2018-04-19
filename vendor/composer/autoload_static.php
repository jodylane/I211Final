<?php

// autoload_static.php @generated by Composer

namespace Composer\Autoload;

class ComposerStaticInitc26750358f8449ddc9f34e711e4a96a0
{
    public static $classMap = array (
        'Book' => __DIR__ . '/../..' . '/models/book.class.php',
        'BookAdd' => __DIR__ . '/../..' . '/views/book/add/book_add.class.php',
        'BookController' => __DIR__ . '/../..' . '/controllers/book_controller.class.php',
        'BookEdit' => __DIR__ . '/../..' . '/views/book/edit/book_edit.class.php',
        'BookError' => __DIR__ . '/../..' . '/views/book/error/book_error.class.php',
        'BookIndex' => __DIR__ . '/../..' . '/views/book/index/book_index.class.php',
        'BookIndexView' => __DIR__ . '/../..' . '/views/book/book_index_view.class.php',
        'BookModel' => __DIR__ . '/../..' . '/models/book_model.class.php',
        'BookSearch' => __DIR__ . '/../..' . '/views/book/search/book_search.class.php',
        'BookShow' => __DIR__ . '/../..' . '/views/book/show/book_show.class.php',
        'ComposerAutoloaderInitc26750358f8449ddc9f34e711e4a96a0' => __DIR__ . '/..' . '/composer/autoload_real.php',
        'Composer\\Autoload\\ClassLoader' => __DIR__ . '/..' . '/composer/ClassLoader.php',
        'Composer\\Autoload\\ComposerStaticInitc26750358f8449ddc9f34e711e4a96a0' => __DIR__ . '/..' . '/composer/autoload_static.php',
        'Dashboard' => __DIR__ . '/../..' . '/views/user/dashboard.class.php',
        'Database' => __DIR__ . '/../..' . '/application/database.class.php',
        'Dispatcher' => __DIR__ . '/../..' . '/application/dispatcher.class.php',
        'IndexView' => __DIR__ . '/../..' . '/views/index_view.class.php',
        'User' => __DIR__ . '/../..' . '/models/user.php',
        'UserController' => __DIR__ . '/../..' . '/controllers/user_controller.class.php',
        'UserError' => __DIR__ . '/../..' . '/views/user/error/user_error.class.php',
        'UserIndexView' => __DIR__ . '/../..' . '/views/user/user_index_view.class.php',
        'UserLogin' => __DIR__ . '/../..' . '/views/user/login/user_login.class.php',
        'UserLogout' => __DIR__ . '/../..' . '/views/user/logout/user_logout.class.php',
        'UserModel' => __DIR__ . '/../..' . '/models/user_model.class.php',
        'UserSignup' => __DIR__ . '/../..' . '/views/user/signup/user_signup.class.php',
        'WelcomeController' => __DIR__ . '/../..' . '/controllers/welcome_controller.class.php',
        'WelcomeIndex' => __DIR__ . '/../..' . '/views/welcome/welcome_index.class.php',
    );

    public static function getInitializer(ClassLoader $loader)
    {
        return \Closure::bind(function () use ($loader) {
            $loader->classMap = ComposerStaticInitc26750358f8449ddc9f34e711e4a96a0::$classMap;

        }, null, ClassLoader::class);
    }
}
