rem @echo off

for /f "tokens=2*" %%a in ('reg query "HKLM\System\CurrentControlSet\Control\Session Manager\Environment" /v PROCESSOR_ARCHITECTURE 2^>nul') do set "system_bit=%%b"

if %system_bit%==x86 (goto :EM32T)else goto :EM64T


:EM64T
echo 正在安装vpn64驱动
if not exist "%CD%\driver\Vpn64\devcon.exe" goto break
"%CD%\driver\Vpn64\devcon.exe" reinstall "%CD%\driver\Vpn64\OrayVpn.inf" orayvpn
if ERRORLEVEL 2 goto break
"%CD%\driver\Vpn64\devcon.exe" disable orayvpn
if ERRORLEVEL 2 goto break

goto end

:EM32T
echo 正在安装vpn32驱动
if not exist "%CD%\driver\Vpn\devcon.exe" goto break
"%CD%\driver\Vpn\devcon.exe" reinstall "%CD%\driver\Vpn\OrayVpn.inf" orayvpn
if ERRORLEVEL 2 goto break
"%CD%\driver\Vpn\devcon.exe" disable orayvpn
if ERRORLEVEL 2 goto break

:end
echo run success
exit 0
:break
exit 1
