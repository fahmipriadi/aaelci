@echo off
start firefox http://10.30.1.21/aaelci/curl.php
TIMEOUT 30
taskkill /im firefox.exe /f