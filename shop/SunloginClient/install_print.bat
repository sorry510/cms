rem @echo off

start /wait SunloginClient.exe -uninstallprint

for /f "tokens=2*" %%a in ('reg query "HKLM\System\CurrentControlSet\Control\Session Manager\Environment" /v PROCESSOR_ARCHITECTURE 2^>nul') do set "system_bit=%%b"

if %system_bit%==x86 (goto :EM32T)else goto :EM64T

:EM64T
echo 正在安装驱动
start /wait SunloginClient.exe -installprint ./driver/print64/OrayPrintProcessor.dll
if ERRORLEVEL 2 goto break

for /f "tokens=4,5 delims=. " %%a in ('ver') do if %%a%%b geq 60 goto vista_install

rundll32 printui.dll,PrintUIEntry /ia /h "x64" /f ./driver/print64/orayprint.inf /m "Oray Print Driver"
if ERRORLEVEL 2 goto break
goto end

:vista_install
rundll32 printui.dll,PrintUIEntry /ia /h "x64" /v "Type 3 - User Mode" /f ./driver/print64/orayprint.inf /m "Oray Print Driver"
if ERRORLEVEL 2 goto break
goto end

:EM32T
echo 正在安装驱动
start /wait SunloginClient.exe -installprint ./driver/print/OrayPrintProcessor.dll
if ERRORLEVEL 2 goto break

rundll32 printui.dll,PrintUIEntry /ia /h "x86" /f ./driver/print/orayprint.inf /m "Oray Print Driver"
if ERRORLEVEL 2 goto break

:end
echo run success
rem exit 0
:break
rem exit 1
