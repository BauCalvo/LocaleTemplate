<?php
// This file is part of Moodle - https://moodle.org/
//
// Moodle is free software: you can redistribute it and/or modify
// it under the terms of the GNU General Public License as published by
// the Free Software Foundation, either version 3 of the License, or
// (at your option) any later version.
//
// Moodle is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
//
// You should have received a copy of the GNU General Public License
// along with Moodle.  If not, see <https://www.gnu.org/licenses/>.

/**
 * Plugin version and other meta-data are defined here.
 *
 * @package     local_test
 * @copyright   2024 admin <admin@example.com>
 * @license     https://www.gnu.org/copyleft/gpl.html GNU GPL v3 or later
 */
 require_once(__DIR__ . '/../../config.php');
 $PAGE->set_url(new moodle_url('/local/test/insert.php'));

 global $DB;

 $PAGE->set_context(\context_system::instance());
 $PAGE->set_title("Insert test");

 //creo el record
$recordToInsert = new stdClass();
//lo populo con sus columnas
$recordToInsert->sessionid = 1;
$recordToInsert->studentid = 3;
$recordToInsert->statusid = 5;
$recordToInsert->statusset = "5,7,8,6";
$recordToInsert->timetaken = 123123;
$recordToInsert->takenby = 3;
$recordToInsert->remarks = "happy pepo";
$recordToInsert->ipaddress = "";
// lo inserto y guardo el resultado que puede ser un bool o un entero(el id del nuevo record)
$insertResult = $DB->insert_record('attendance_log', $recordToInsert);

//aca es donde esta nuestro tamplate
 $templatecontext = (object)[
   'insertResult'=> "id of the new log $insertResult"
];

echo $OUTPUT->header();
//aca seteo que renderice nuestro template
echo $OUTPUT->render_from_template('local_test/insert',$templatecontext);
echo $OUTPUT->footer();
