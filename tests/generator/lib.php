<?php
// mod_learningmap - A moodle plugin for easy visualization of learning paths
//
// This program is free software: you can redistribute it and/or modify
// it under the terms of the GNU Affero General Public License as
// published by the Free Software Foundation, either version 3 of the
// License, or (at your option) any later version.
//
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU Affero General Public License for more details.
//
// You should have received a copy of the GNU Affero General Public License
// along with this program.  If not, see <https://www.gnu.org/licenses/>.

defined('MOODLE_INTERNAL') || die();

/**
 * mod_learningmap data generator
 *
 * @package     mod_learningmap
 * @copyright   2021-2022, ISB Bayern
 * @author      Stefan Hanauska <stefan.hanauska@csg-in.de>
 * @license     https://www.gnu.org/licenses/agpl-3.0.html GNU AGPL v3 or later
 */
class mod_learningmap_generator extends testing_module_generator {

    /**
     * Creates an instance of a learningmap. As unit tests do not support JS,
     * the SVG test data is static.
     *
     * @param array $record
     * @param array|null $options
     * @return stdClass learningmap instance
     */
    public function create_instance($record = null, array $options = null) : stdClass {
        global $CFG;

        $record = (array)$record + [
            'name' => 'test map',
            'intro' => file_get_contents($CFG->dirroot . '/mod/learningmap/tests/generator/test.svg'),
            'introformat' => 1,
            'placestore' => file_get_contents($CFG->dirroot . '/mod/learningmap/tests/generator/test.json'),
            'completiontype' => 2
        ];

        return parent::create_instance($record, (array)$options);
    }
}
