<?php declare(strict_types = 1);
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

class CItemTypeCalculated extends CItemType {

	/**
	 * @inheritDoc
	 */
	const TYPE = ITEM_TYPE_CALCULATED;

	/**
	 * @inheritDoc
	 */
	const FIELD_NAMES = ['params', 'delay'];

	/**
	 * @inheritDoc
	 */
	public static function getCreateValidationRules(array $item): array {
		return [
			'params' =>	self::getCreateFieldRule('params', $item),
			'delay' =>	self::getCreateFieldRule('delay', $item)
		];
	}

	/**
	 * @inheritDoc
	 */
	public static function getUpdateValidationRules(array $db_item): array {
		return [
			'params' =>	self::getUpdateFieldRule('params', $db_item),
			'delay' =>	self::getUpdateFieldRule('delay', $db_item)
		];
	}

	/**
	 * @inheritDoc
	 */
	public static function getUpdateValidationRulesInherited(array $db_item): array {
		return [
			'params' =>	self::getUpdateFieldRuleInherited('params', $db_item),
			'delay' =>	self::getUpdateFieldRuleInherited('delay', $db_item)
		];
	}

	/**
	 * @inheritDoc
	 */
	public static function getUpdateValidationRulesDiscovered(): array {
		return [
			'params' =>	self::getUpdateFieldRuleDiscovered('params'),
			'delay' =>	self::getUpdateFieldRuleDiscovered('delay')
		];
	}
}
