<?php
/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link      https://cakephp.org CakePHP(tm) Project
 * @since     3.0.0
 * @license   https://opensource.org/licenses/mit-license.php MIT License
 */
namespace App\Console;

if (!defined('STDIN')) {
    define('STDIN', fopen('php://stdin', 'r'));
}

use Cake\Utility\Security;
use Composer\Script\Event;
use Exception;

/**
 * Provides installation hooks for when this application is installed via
 * composer. Customize this class to suit your needs.
 */
class Installer
{

    /**
     * An array of directories to be made writable
     */
    const WRITABLE_DIRS = [
        'logs',
        'tmp',
        'tmp/cache',
        'tmp/cache/models',
        'tmp/cache/persistent',
        'tmp/cache/views',
        'tmp/sessions',
        'tmp/tests'
    ];

    /**
     * Does some routine installation tasks so people don't have to.
     *
     * @param \Composer\Script\Event $event The composer event object.
     * @throws \Exception Exception raised by validator.
     * @return void
     */
    public static function postInstall(Event $event)
    {
        $io = $event->getIO();

        $rootDir = dirname(dirname(__DIR__));

        static::createAppConfig($rootDir, $io);
        static::createWritableDirectories($rootDir, $io);

        // ask if the permissions should be changed
        if ($io->isInteractive()) {
            $validator = function ($arg) {
                if (in_array($arg, ['Y', 'y', 'N', 'n'])) {
                    return $arg;
                }
                throw new Exception('This is not a valid answer. Please choose Y or n.');
            };
            $setFolderPermissions = $io->askAndValidate(
                '<info>Set Folder Permissions ? (Default to Y)</info> [<comment>Y,n</comment>]? ',
                $validator,
                10,
                'Y'
            );

            if (in_array($setFolderPermissions, ['Y', 'y'])) {
                static::setFolderPermissions($rootDir, $io);
            }
        } else {
            static::setFolderPermissions($rootDir, $io);
        }

        static::setSecuritySalt($rootDir, $io);

        $class = 'Cake\Codeception\Console\Installer';
        if (class_exists($class)) {
            $class::customizeCodeceptionBinary($event);
        }

        ///vendor/almasaeed2010/adminlte/dist/css/AdminLTE.css
        static::copyVendorFiles([
            ['src'=>'almasaeed2010/adminlte/dist/css/AdminLTE.css'],
            ['src'=>'almasaeed2010/adminlte/dist/js/adminlte.js'],
            ['src'=>'almasaeed2010/adminlte/dist/js/pages/dashboard.js'],
            ['src'=>'almasaeed2010/adminlte/dist/js/demo.js'],
            ['src'=>'almasaeed2010/adminlte/dist/css/skins/_all-skins.css'],

            ['src'=>'almasaeed2010/adminlte/bower_components/morris.js/morris.css'],
            ['src'=>'almasaeed2010/adminlte/bower_components/jvectormap/jquery-jvectormap.css'],
            ['src'=>'almasaeed2010/adminlte/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css'],
            ['src'=>'almasaeed2010/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.css'],
            ['src'=>'almasaeed2010/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css'],

            ['src'=>'almasaeed2010/adminlte/bower_components/bootstrap/dist/css/bootstrap.min.css'],
            ['src'=>'almasaeed2010/adminlte/bower_components/font-awesome/css/font-awesome.min.css'],
            ['src'=>'almasaeed2010/adminlte/bower_components/Ionicons/css/ionicons.min.css'],

            ['src'=>'almasaeed2010/adminlte/bower_components/bootstrap/dist/fonts/glyphicons-halflings-regular.ttf'],
            ['src'=>'almasaeed2010/adminlte/bower_components/bootstrap/dist/fonts/glyphicons-halflings-regular.woff'],
            ['src'=>'almasaeed2010/adminlte/bower_components/bootstrap/dist/fonts/glyphicons-halflings-regular.woff2'],
            ['src'=>'almasaeed2010/adminlte/bower_components/font-awesome/fonts/fontawesome-webfont.ttf'],
            ['src'=>'almasaeed2010/adminlte/bower_components/font-awesome/fonts/fontawesome-webfont.woff'],
            ['src'=>'almasaeed2010/adminlte/bower_components/font-awesome/fonts/fontawesome-webfont.woff2'],
            ['src'=>'almasaeed2010/adminlte/bower_components/Ionicons/fonts/ionicons.woff'],
            ['src'=>'almasaeed2010/adminlte/bower_components/Ionicons/fonts/ionicons.ttf'],

            ['src'=>'almasaeed2010/adminlte/bower_components/jquery/dist/jquery.min.js'],
            ['src'=>'almasaeed2010/adminlte/bower_components/jquery-ui/jquery-ui.min.js'],
            ['src'=>'almasaeed2010/adminlte/bower_components/bootstrap/dist/js/bootstrap.min.js'],
            
            ['src'=>'almasaeed2010/adminlte/bower_components/raphael/raphael.min.js'],
            ['src'=>'almasaeed2010/adminlte/bower_components/morris.js/morris.min.js'],
            ['src'=>'almasaeed2010/adminlte/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js'],
            ['src'=>'almasaeed2010/adminlte/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js'],
            ['src'=>'almasaeed2010/adminlte/plugins/jvectormap/jquery-jvectormap-world-mill-en.js'],
            ['src'=>'almasaeed2010/adminlte/bower_components/jquery-knob/dist/jquery.knob.min.js'],
            ['src'=>'almasaeed2010/adminlte/bower_components/moment/min/moment.min.js'],
            ['src'=>'almasaeed2010/adminlte/bower_components/bootstrap-daterangepicker/daterangepicker.js'],
            ['src'=>'almasaeed2010/adminlte/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js'],
            ['src'=>'almasaeed2010/adminlte/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js'],
            ['src'=>'almasaeed2010/adminlte/bower_components/jquery-slimscroll/jquery.slimscroll.min.js'],
            ['src'=>'almasaeed2010/adminlte/bower_components/fastclick/lib/fastclick.js']

        ]);
    }

    /**
     * Create the config/app.php file if it does not exist.
     *
     * @param string $dir The application's root directory.
     * @param \Composer\IO\IOInterface $io IO interface to write to console.
     * @return void
     */
    public static function createAppConfig($dir, $io)
    {
        $appConfig = $dir . '/config/app.php';
        $defaultConfig = $dir . '/config/app.default.php';
        if (!file_exists($appConfig)) {
            copy($defaultConfig, $appConfig);
            $io->write('Created `config/app.php` file');
        }
    }

    /**
     * Create the `logs` and `tmp` directories.
     *
     * @param string $dir The application's root directory.
     * @param \Composer\IO\IOInterface $io IO interface to write to console.
     * @return void
     */
    public static function createWritableDirectories($dir, $io)
    {
        foreach (static::WRITABLE_DIRS as $path) {
            $path = $dir . '/' . $path;
            if (!file_exists($path)) {
                mkdir($path);
                $io->write('Created `' . $path . '` directory');
            }
        }
    }

    /**
     * Set globally writable permissions on the "tmp" and "logs" directory.
     *
     * This is not the most secure default, but it gets people up and running quickly.
     *
     * @param string $dir The application's root directory.
     * @param \Composer\IO\IOInterface $io IO interface to write to console.
     * @return void
     */
    public static function setFolderPermissions($dir, $io)
    {
        // Change the permissions on a path and output the results.
        $changePerms = function ($path) use ($io) {
            $currentPerms = fileperms($path) & 0777;
            $worldWritable = $currentPerms | 0007;
            if ($worldWritable == $currentPerms) {
                return;
            }

            $res = chmod($path, $worldWritable);
            if ($res) {
                $io->write('Permissions set on ' . $path);
            } else {
                $io->write('Failed to set permissions on ' . $path);
            }
        };

        $walker = function ($dir) use (&$walker, $changePerms) {
            $files = array_diff(scandir($dir), ['.', '..']);
            foreach ($files as $file) {
                $path = $dir . '/' . $file;

                if (!is_dir($path)) {
                    continue;
                }

                $changePerms($path);
                $walker($path);
            }
        };

        $walker($dir . '/tmp');
        $changePerms($dir . '/tmp');
        $changePerms($dir . '/logs');
    }

    /**
     * Set the security.salt value in the application's config file.
     *
     * @param string $dir The application's root directory.
     * @param \Composer\IO\IOInterface $io IO interface to write to console.
     * @return void
     */
    public static function setSecuritySalt($dir, $io)
    {
        $newKey = hash('sha256', Security::randomBytes(64));
        static::setSecuritySaltInFile($dir, $io, $newKey, 'app.php');
    }

    /**
     * Set the security.salt value in a given file
     *
     * @param string $dir The application's root directory.
     * @param \Composer\IO\IOInterface $io IO interface to write to console.
     * @param string $newKey key to set in the file
     * @param string $file A path to a file relative to the application's root
     * @return void
     */
    public static function setSecuritySaltInFile($dir, $io, $newKey, $file)
    {
        $config = $dir . '/config/' . $file;
        $content = file_get_contents($config);

        $content = str_replace('__SALT__', $newKey, $content, $count);

        if ($count == 0) {
            $io->write('No Security.salt placeholder to replace.');

            return;
        }

        $result = file_put_contents($config, $content);
        if ($result) {
            $io->write('Updated Security.salt value in config/' . $file);

            return;
        }
        $io->write('Unable to update Security.salt value.');
    }

    /**
     * Set the APP_NAME value in a given file
     *
     * @param string $dir The application's root directory.
     * @param \Composer\IO\IOInterface $io IO interface to write to console.
     * @param string $appName app name to set in the file
     * @param string $file A path to a file relative to the application's root
     * @return void
     */
    public static function setAppNameInFile($dir, $io, $appName, $file)
    {
        $config = $dir . '/config/' . $file;
        $content = file_get_contents($config);
        $content = str_replace('__APP_NAME__', $appName, $content, $count);

        if ($count == 0) {
            $io->write('No __APP_NAME__ placeholder to replace.');

            return;
        }

        $result = file_put_contents($config, $content);
        if ($result) {
            $io->write('Updated __APP_NAME__ value in config/' . $file);

            return;
        }
        $io->write('Unable to update __APP_NAME__ value.');
    }

    public static function copyVendorFiles($sources)
    {
        $rootDir = dirname(dirname(__DIR__));

        foreach($sources as $source)
        {
            $file = substr($source['src'], strrpos($source['src'], "/")+1);

            $path = '/vendor/' . substr($source['src'], 0, strrpos($source['src'], "/")+1);

            $_source = $rootDir . $path . $file;

            $dest = $rootDir . "/webroot/" . $path;

            if(file_exists($_source))
            {
                if (!file_exists($dest))
                {
                    mkdir($dest, 0775, true);
                }

                copy($_source, $dest . $file);
            }
        }
    }
}
