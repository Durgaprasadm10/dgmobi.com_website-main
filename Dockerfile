FROM mcr.microsoft.com/windows/servercore/iis:windowsservercore-ltsc2019

COPY my-web-application C:\\inetpub\\wwwroot\\
