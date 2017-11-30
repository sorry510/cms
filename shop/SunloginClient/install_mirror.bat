rem @echo off

for /f "tokens=4,5 delims=. " %%a in ('ver') do if %%a%%b geq 62 goto end

for /f "tokens=2*" %%a in ('reg query "HKLM\System\CurrentControlSet\Control\Session Manager\Environment" /v PROCESSOR_ARCHITECTURE 2^>nul') do set "system_bit=%%b"

if %system_bit%==x86 (goto :EM32T)else goto :EM64T


:EM64T
echo 正在安装远程桌面镜像驱动
if not exist "%CD%\driver\Mirror64\devcon.exe" goto break
"%CD%\driver\Mirror64\devcon.exe" reinstall "%CD%\driver\Mirror64\OrayMir.inf" C50B00D7-AE62-4936-8BC8-20E0B9F0BEFB
if ERRORLEVEL 2 goto break

goto end

:EM32T
echo 正在安装远程桌面镜像驱动
if not exist "%CD%\driver\Mirror\devcon.exe" goto break
"%CD%\driver\Mirror\devcon.exe" reinstall "%CD%\driver\Mirror\OrayMir.inf" C50B00D7-AE62-4936-8BC8-20E0B9F0BEFB
if ERRORLEVEL 2 goto break

:end
echo run success
exit 0
:break
exit 1
