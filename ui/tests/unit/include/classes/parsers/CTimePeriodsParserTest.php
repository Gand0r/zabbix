﻿<?php
/*
** Copyright (C) 2001-2025 Zabbix SIA
**
** This program is free software: you can redistribute it and/or modify it under the terms of
** the GNU Affero General Public License as published by the Free Software Foundation, version 3.
**
** This program is distributed in the hope that it will be useful, but WITHOUT ANY WARRANTY;
** without even the implied warranty of MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
** See the GNU Affero General Public License for more details.
**
** You should have received a copy of the GNU Affero General Public License along with this program.
** If not, see <https://www.gnu.org/licenses/>.
**/


use PHPUnit\Framework\TestCase;

class CTimePeriodsParserTest extends TestCase {

	/**
	 * An array of time periods and parsed results.
	 */
	public static function dataProvider() {
		return [
			// success
			[
				'1-3,00:01-00:02', 0, [],
				[
					'rc' => CParser::PARSE_SUCCESS,
					'match' => '1-3,00:01-00:02',
					'periods' => ['1-3,00:01-00:02']
				]
			],
			[
				'3-4,00:05-00:06;4-5,00:07-00:08', 0, [],
				[
					'rc' => CParser::PARSE_SUCCESS,
					'match' => '3-4,00:05-00:06;4-5,00:07-00:08',
					'periods' => ['3-4,00:05-00:06', '4-5,00:07-00:08']
				]
			],
			[
				'1-7,00:00-24:00;{$MACRO}', 0, ['usermacros' => true],
				[
					'rc' => CParser::PARSE_SUCCESS,
					'match' => '1-7,00:00-24:00;{$MACRO}',
					'periods' => ['1-7,00:00-24:00', '{$MACRO}']
				]
			],
			[
				'{$MACRO1};{$MACRO2}', 0, ['usermacros' => true],
				[
					'rc' => CParser::PARSE_SUCCESS,
					'match' => '{$MACRO1};{$MACRO2}',
					'periods' => ['{$MACRO1}', '{$MACRO2}']
				]
			],
			[
				'{$MACRO1: ";"};{$MACRO2: ";"}', 0, ['usermacros' => true],
				[
					'rc' => CParser::PARSE_SUCCESS,
					'match' => '{$MACRO1: ";"};{$MACRO2: ";"}',
					'periods' => ['{$MACRO1: ";"}', '{$MACRO2: ";"}']
				]
			],
			// fail
			[
				'', 0, [],
				[
					'rc' => CParser::PARSE_FAIL,
					'match' => '',
					'periods' => []
				]
			],
			[
				';', 0, [],
				[
					'rc' => CParser::PARSE_FAIL,
					'match' => '',
					'periods' => []
				]
			],
			[
				';;', 0, [],
				[
					'rc' => CParser::PARSE_FAIL,
					'match' => '',
					'periods' => []
				]
			],
			[
				';;1-7,00:00-24:00', 0, [],
				[
					'rc' => CParser::PARSE_FAIL,
					'match' => '',
					'periods' => []
				]
			],
			[
				'1-7,00:00-24:00;;', 0, [],
				[
					'rc' => CParser::PARSE_FAIL,
					'match' => '',
					'periods' => []
				]
			],
			[
				'1-7,00:00-24:00;{$MACRO}', 0, ['user_macros' => false],
				[
					'rc' => CParser::PARSE_FAIL,
					'match' => '',
					'periods' => []
				]
			],
			[
				'1-3,00:01-00:02;', 0, [],
				[
					'rc' => CParser::PARSE_FAIL,
					'match' => '',
					'periods' => []
				]
			],
			[
				'{$MACRO};1-7,00:00-24:00;', 0, ['usermacros' => true],
				[
					'rc' => CParser::PARSE_FAIL,
					'match' => '',
					'periods' => []
				]
			],
			[
				'5-6,00:09-00:10;6-7,00:11-00:12a', 0, [],
				[
					'rc' => CParser::PARSE_FAIL,
					'match' => '',
					'periods' => []
				]
			]
		];
	}

	/**
	 * @dataProvider dataProvider
	 *
	 * @param string $source
	 * @param int    $pos
	 * @param array  $expected
	*/
	public function testParse($source, $pos, $options, $expected) {
		$parser = new CTimePeriodsParser($options);

		$this->assertSame($expected, [
			'rc' => $parser->parse($source, $pos),
			'match' => $parser->getMatch(),
			'periods' => $parser->getPeriods()
		]);
		$this->assertSame(strlen($expected['match']), $parser->getLength());
	}
}
