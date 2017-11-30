rem @echo off

for /f "tokens=2*" %%a in ('reg query "HKLM\System\CurrentControlSet\Control\Session Manager\Environment" /v PROCESSOR_ARCHITECTURE 2^>nul') do set "system_bit=%%b"

if %system_bit%==x86 (goto :EM32T)else goto :EM64T


:EM64T
echo 正在安装黑屏驱动
if not exist "%CD%\driver\DpmsMonitor64\devcon.exe" goto break
"%CD%\driver\DpmsMonitor64\devcon.exe" update "%CD%\driver\DpmsMonitor64\oraydpms.inf" *PNP09FF
if ERRORLEVEL 2 goto break

goto end

:EM32T
echo 正在安装黑屏驱动
if not exist "%CD%\driver\DpmsMonitor\devcon.exe" goto break
"%CD%\driver\DpmsMonitor\devcon.exe" update "%CD%\driver\DpmsMonitor\oraydpms.inf" *PNP09FF
if ERRORLEVEL 2 goto break

:end
echo run success
exit 0
:break
exit 1