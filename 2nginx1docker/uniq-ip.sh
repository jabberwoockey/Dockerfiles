#!/usr/bin/env bash

tmpfile=$(mktemp /tmp/tmpuniq.XXXXXX)
script=$0

grep -o -P '^([\d]{1,3}\.){3}([\d]{1,3})' ./logs/access.log > "$tmpfile"
grep -o -P '^([\d]{1,3}\.){3}([\d]{1,3})' ./logs/error.log  >> "$tmpfile"

sort "$tmpfile" | uniq  > "${script%.*}.txt"
rm "$tmpfile"

exit 0
