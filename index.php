<?php

// Este archivo forma parte de Moodle - https://moodle.org/
//
// Moodle es software libre: puede redistribuirlo y/o modificarlo
// bajo los términos de la Licencia Pública General de GNU publicada por
// la Free Software Foundation, ya sea la versión 3 de la Licencia o
// (a su elección) cualquier versión posterior.
//
// Moodle se distribuye con la esperanza de que sea útil,
// pero SIN NINGUNA GARANTÍA; ni siquiera la garantía implícita de
// COMERCIABILIDAD o IDONEIDAD PARA UN PROPÓSITO PARTICULAR. Consulte la
// Licencia Pública General de GNU para más detalles.
//
// Debería haber recibido una copia de la Licencia Pública General de GNU
// junto con Moodle. De no ser así, consulte < https://www.gnu.org/licenses/> ;.

/**
 * Archivo principal para ver los saludos
 *
 * @package local_greetings
 * @copyright 2025 Jose Antonio Del Rio Malo <jdelrio810@gmail.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 o posterior
 */

 require_once('../../config.php');

$context = context_system::instance();
$PAGE->set_context($context);
$PAGE->set_url(new moodle_url('/local/greetings/index.php'));
$PAGE->set_pagelayout('standard');

$PAGE->set_title(get_string('pluginname', 'local_greetings'));
$PAGE->set_heading(get_string('pluginname', 'local_greetings'));


echo $OUTPUT->header();

if (isloggedin()) {
    $usergreeting = 'Greetings, ' . fullname($USER);
} else {
    $usergreeting = 'Greetings, user';
}


$templatedata = ['usergreeting' => $usergreeting];

echo $OUTPUT->render_from_template('local_greetings/greeting_message', $templatedata);

echo $OUTPUT->footer();