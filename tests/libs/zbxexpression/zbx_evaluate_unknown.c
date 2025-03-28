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

#include "zbxmocktest.h"
#include "zbxmockdata.h"
#include "zbxmockutil.h"

#include "zbxexpression.h"
#include "zbxalgo.h"
#include "zbxnum.h"

void	zbx_mock_test_entry(void **state)
{
	double			expected_value = 0.0, actual_value;
	const char		*tmp, *expression;
	char			actual_error[256];
	int			expected_result = FAIL, actual_result = FAIL;

	ZBX_UNUSED(state);

	expression = zbx_mock_get_parameter_string("in.expression");
	expected_result = zbx_mock_str_to_return_code(zbx_mock_get_parameter_string("out.return"));
	tmp = zbx_mock_get_parameter_string("out.value");

	if (SUCCEED != zbx_is_double(tmp, &expected_value))
	{
		if (0 == strcmp(tmp, ZBX_UNKNOWN_STR))
			expected_value = ZBX_UNKNOWN;
		else
			fail_msg("out.value parameter \"%s\" is not double or is out of range.", tmp);
	}

	if (expected_result != (actual_result = zbx_evaluate_unknown(expression, &actual_value, actual_error,
			sizeof(actual_error))))
	{
		fail_msg("Got %s instead of %s as a result. Error: %s", zbx_sysinfo_ret_string(actual_result),
			zbx_sysinfo_ret_string(expected_result), actual_error);
	}

	if (ZBX_UNKNOWN == expected_value)
	{
		if (actual_value != expected_value)
		{
			fail_msg("Value %f not equal expected ZBX_UNKNOWN. Error: %s",
					actual_value, actual_error);
		}
	}
	else if (0 != zbx_double_compare(actual_value, expected_value))
		fail_msg("Value %f not equal expected %f. Error: %s", actual_value, expected_value, actual_error);
}
