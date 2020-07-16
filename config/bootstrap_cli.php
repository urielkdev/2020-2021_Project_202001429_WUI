<?php
declare(strict_types=1);

/**
 * CakePHP(tm) : Rapid Development Framework (https://cakephp.org)
 * Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 *
 * Licensed under The MIT License
 * For full copyright and license information, please see the LICENSE.txt
 * Redistributions of files must retain the above copyright notice.
 *
 * @copyright     Copyright (c) Cake Software Foundation, Inc. (https://cakefoundation.org)
 * @link          https://cakephp.org CakePHP(tm) Project
 * @since         3.0.0
 * @license       https://opensource.org/licenses/mit-license.php MIT License
 */

use Cake\Core\Configure;

/*
 * Additional bootstrapping and configuration for CLI environments should
 * be put here.
 */

// Set the fullBaseUrl to allow URLs to be generated in shell tasks.
// This is useful when sending email from shells.
//Configure::write('App.fullBaseUrl', php_uname('n'));

// Set logs to different files so they don't have permission conflicts.
Configure::write('Log.debug.file', 'cli-debug');
Configure::write('Log.error.file', 'cli-error');

/**
 * Locale Formats
 */
date_default_timezone_set('America/Sao_Paulo');
ini_set('intl.default_locale', 'pt_BR');
\Cake\I18n\Time::setToStringFormat([IntlDateFormatter::MEDIUM, IntlDateFormatter::SHORT]);
\Cake\I18n\Time::setToStringFormat('dd/MM/YYYY HH:mm');

\Cake\Database\Type::build('date')
    ->useLocaleParser()
    ->setLocaleFormat('dd/MM/yyyy');

\Cake\Database\Type::build('datetime')
    ->useLocaleParser()
    ->setLocaleFormat('dd/MM/yyyy HH:mm');

\Cake\Database\Type::build('timestamp')
    ->useLocaleParser()
    ->setLocaleFormat('dd/MM/yyyy HH:mm');

\Cake\Database\Type::build('decimal')
    ->useLocaleParser();

\Cake\Database\Type::build('float')
    ->useLocaleParser();