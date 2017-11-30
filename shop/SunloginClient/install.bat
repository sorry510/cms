@echo off
cd  "%CD%"
mkdir driver
mkdir driver\DpmsMonitor
mkdir driver\DpmsMonitor64
mkdir driver\Mirror
mkdir driver\Mirror64
mkdir driver\Vpn
mkdir driver\Vpn64
mkdir driver\Print
mkdir driver\Print64

move  DpmsMonitor64_devcon.exe		driver\DpmsMonitor64\devcon.exe
move  DpmsMonitor64_oraydpms.inf	driver\DpmsMonitor64\oraydpms.inf
move  DpmsMonitor64_oraydpms.sys	driver\DpmsMonitor64\oraydpms.sys
move  DpmsMonitor64_oraydpmsx64.cat	driver\DpmsMonitor64\oraydpmsx64.cat


move DpmsMonitor_devcon.exe		driver\DpmsMonitor\devcon.exe
move DpmsMonitor_oraydpms.inf		driver\DpmsMonitor\oraydpms.inf
move DpmsMonitor_oraydpms.sys		driver\DpmsMonitor\oraydpms.sys
move DpmsMonitor_oraydpmsx86.cat	driver\DpmsMonitor\oraydpmsx86.cat


move Mirror64_devcon.exe		driver\Mirror64\devcon.exe
move Mirror64_omirhelp.dll		driver\Mirror64\omirhelp.dll
move Mirror64_OrayMir.dll		driver\Mirror64\OrayMir.dll
move Mirror64_OrayMir.inf		driver\Mirror64\OrayMir.inf
move Mirror64_OrayMir.sys		driver\Mirror64\OrayMir.sys
move Mirror64_oraymirx64.cat		driver\Mirror64\oraymirx64.cat


move Mirror_devcon.exe			driver\Mirror\devcon.exe
move Mirror_omirhelp.dll		driver\Mirror\omirhelp.dll
move Mirror_OrayMir.dll			driver\Mirror\OrayMir.dll
move Mirror_OrayMir.inf			driver\Mirror\OrayMir.inf
move Mirror_OrayMir.sys			driver\Mirror\OrayMir.sys
move Mirror_oraymirx86.cat		driver\Mirror\oraymirx86.cat


move Vpn64_devcon.exe			driver\Vpn64\devcon.exe
move Vpn64_OrayVpn.inf			driver\Vpn64\OrayVpn.inf
move Vpn64_OrayVpn.sys			driver\Vpn64\OrayVpn.sys
move Vpn64_orayvpnx64.cat		driver\Vpn64\orayvpnx64.cat


move Vpn_devcon.exe			driver\Vpn\devcon.exe
move Vpn_OrayVpn.inf			driver\Vpn\OrayVpn.inf
move Vpn_OrayVpn.sys			driver\Vpn\OrayVpn.sys
move Vpn_orayvpnx86.cat			driver\Vpn\orayvpnx86.cat

move print64_oray.gpd				driver\Print64\oray.gpd
move print64_oray.ppd				driver\Print64\oray.ppd
move print64_orayprint.cat			driver\Print64\orayprint.cat
move print64_OrayPrint.inf			driver\Print64\OrayPrint.inf
move print64_OrayPrintProcessor.dll		driver\Print64\OrayPrintProcessor.dll

move print_oray.gpd				driver\Print\oray.gpd
move print_oray.ppd				driver\Print\oray.ppd
move print_orayprint.cat			driver\Print\orayprint.cat
move print_OrayPrint.inf			driver\Print\OrayPrint.inf
move print_OrayPrintProcessor.dll		driver\Print\OrayPrintProcessor.dll

rem cmd /c install_mirror.bat

rem cmd /c install_print.bat

cmd /c netsh firewall delete allowedprogram program=SunloginClient.exe

cmd /c netsh firewall add allowedprogram program=SunloginClient.exe name=SunloginClient ENABLE