{section name=msg1 loop=$messages} 
            <center><table width=90% border="0" cellpadding="1" cellspacing="1">
              <tbody>
                <tr align="center">
                  <td colspan="2" rowspan="1" style="border: solid; border-style: dotted; border-width: 1px; font-size: 14px; border-color: rgb(99, 180, 0); font-size: 16px; font-weight: bold; background-color: rgb(240, 256, 240);"><span>{$messages[msg1]->title}</span></td>
                </tr>
                <tr>
                  <td colspan="2" rowspan="1" style="border: solid; border-style: dotted; border-width: 1px; font-size: 14px; border-color: rgb(99, 180, 0);">{$messages[msg1]->message}</td>
                </tr>
                <tr>
                  <td style="border: solid; border-style: dotted; border-width: 1px; font-size: 12px; border-color: rgb(99, 180, 0); background-color: rgb(240, 256, 240);">[{$messages[msg1]->date}] - Posted by: {$messages[msg1]->userFullName}</td>
                  <td style="border: solid; border-style: dotted; border-width: 1px; font-size: 12px; border-color: rgb(99, 180, 0); text-align: right; background-color: rgb(240, 256, 240);"><a href="#">Read Morre...</a></td>
                </tr>
              </tbody>
            </table></center>
{/section}