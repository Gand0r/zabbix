include ../Makefile.include

BINARIES_tests = \
	zbx_str_extract \
	convert_to_utf8 \
	zbx_truncate_itemkey \
	zbx_truncate_value \
	zbx_dyn_escape_string \
	zbx_ltrim_utf8 \
	zbx_rtrim_utf8

noinst_PROGRAMS = $(BINARIES_tests)

COMMON_SRC_FILES = \
	../../zbxmocktest.h

STR_LIBS = \
	$(top_srcdir)/src/libs/zbxstr/libzbxstr.a \
	$(top_srcdir)/src/libs/zbxcommon/libzbxcommon.a \
	$(MOCK_DATA_DEPS) \
	$(MOCK_TEST_DEPS)

STR_COMPILER_FLAGS = \
	-I@top_srcdir@/tests \
	$(CMOCKA_CFLAGS)

zbx_str_extract_SOURCES = \
	zbx_str_extract.c \
	$(COMMON_SRC_FILES)

zbx_str_extract_LDADD = \
	$(STR_LIBS)

zbx_str_extract_LDADD += @SERVER_LIBS@

zbx_str_extract_LDFLAGS = @SERVER_LDFLAGS@ $(CMOCKA_LDFLAGS)

zbx_str_extract_CFLAGS = $(STR_COMPILER_FLAGS)

convert_to_utf8_SOURCES = \
	convert_to_utf8.c \
	$(COMMON_SRC_FILES)

convert_to_utf8_LDADD = \
	$(STR_LIBS)

convert_to_utf8_LDADD += @SERVER_LIBS@

convert_to_utf8_LDFLAGS = @SERVER_LDFLAGS@ $(CMOCKA_LDFLAGS)

convert_to_utf8_CFLAGS = $(STR_COMPILER_FLAGS)


zbx_truncate_itemkey_SOURCES = \
	zbx_truncate_itemkey.c \
	$(COMMON_SRC_FILES)

zbx_truncate_itemkey_LDADD = \
	$(STR_LIBS)

zbx_truncate_itemkey_LDADD += @SERVER_LIBS@

zbx_truncate_itemkey_LDFLAGS = @SERVER_LDFLAGS@ $(CMOCKA_LDFLAGS)

zbx_truncate_itemkey_CFLAGS = $(STR_COMPILER_FLAGS)


zbx_truncate_value_SOURCES = \
	zbx_truncate_value.c \
	$(COMMON_SRC_FILES)

zbx_truncate_value_LDADD = \
	$(STR_LIBS)

zbx_truncate_value_LDADD += @SERVER_LIBS@

zbx_truncate_value_LDFLAGS = @SERVER_LDFLAGS@ $(CMOCKA_LDFLAGS)

zbx_truncate_value_CFLAGS = $(STR_COMPILER_FLAGS)


zbx_dyn_escape_string_SOURCES = \
	zbx_dyn_escape_string.c \
	$(COMMON_SRC_FILES)

zbx_dyn_escape_string_LDADD = \
	$(STR_LIBS)

zbx_dyn_escape_string_LDADD += @SERVER_LIBS@

zbx_dyn_escape_string_LDFLAGS = @SERVER_LDFLAGS@ $(CMOCKA_LDFLAGS)

zbx_dyn_escape_string_CFLAGS = $(STR_COMPILER_FLAGS)

# zbx_ltrim_utf8

zbx_ltrim_utf8_SOURCES = \
	zbx_common_trim_utf8.c \
	zbx_ltrim_utf8.c \
	$(COMMON_SRC_FILES)

zbx_ltrim_utf8_LDADD = \
	$(STR_LIBS)

zbx_ltrim_utf8_LDADD += @SERVER_LIBS@

zbx_ltrim_utf8_LDFLAGS = @SERVER_LDFLAGS@ $(CMOCKA_LDFLAGS)

zbx_ltrim_utf8_CFLAGS = $(STR_COMPILER_FLAGS)

# zbx_ltrim_utf8

zbx_rtrim_utf8_SOURCES = \
	zbx_common_trim_utf8.c \
	zbx_rtrim_utf8.c \
	$(COMMON_SRC_FILES)

zbx_rtrim_utf8_LDADD = \
	$(STR_LIBS)

zbx_rtrim_utf8_LDADD += @SERVER_LIBS@

zbx_rtrim_utf8_LDFLAGS = @SERVER_LDFLAGS@ $(CMOCKA_LDFLAGS)

zbx_rtrim_utf8_CFLAGS = $(STR_COMPILER_FLAGS)

#endif
