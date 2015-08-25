<?php /* Smarty version 2.6.19, created on 2008-05-15 13:12:26
         compiled from message.tpl */ ?>
<?php unset($this->_sections['msg1']);
$this->_sections['msg1']['name'] = 'msg1';
$this->_sections['msg1']['loop'] = is_array($_loop=$this->_tpl_vars['messages']) ? count($_loop) : max(0, (int)$_loop); unset($_loop);
$this->_sections['msg1']['show'] = true;
$this->_sections['msg1']['max'] = $this->_sections['msg1']['loop'];
$this->_sections['msg1']['step'] = 1;
$this->_sections['msg1']['start'] = $this->_sections['msg1']['step'] > 0 ? 0 : $this->_sections['msg1']['loop']-1;
if ($this->_sections['msg1']['show']) {
    $this->_sections['msg1']['total'] = $this->_sections['msg1']['loop'];
    if ($this->_sections['msg1']['total'] == 0)
        $this->_sections['msg1']['show'] = false;
} else
    $this->_sections['msg1']['total'] = 0;
if ($this->_sections['msg1']['show']):

            for ($this->_sections['msg1']['index'] = $this->_sections['msg1']['start'], $this->_sections['msg1']['iteration'] = 1;
                 $this->_sections['msg1']['iteration'] <= $this->_sections['msg1']['total'];
                 $this->_sections['msg1']['index'] += $this->_sections['msg1']['step'], $this->_sections['msg1']['iteration']++):
$this->_sections['msg1']['rownum'] = $this->_sections['msg1']['iteration'];
$this->_sections['msg1']['index_prev'] = $this->_sections['msg1']['index'] - $this->_sections['msg1']['step'];
$this->_sections['msg1']['index_next'] = $this->_sections['msg1']['index'] + $this->_sections['msg1']['step'];
$this->_sections['msg1']['first']      = ($this->_sections['msg1']['iteration'] == 1);
$this->_sections['msg1']['last']       = ($this->_sections['msg1']['iteration'] == $this->_sections['msg1']['total']);
?> 
            <center><table width=90% border="0" cellpadding="1" cellspacing="1">
              <tbody>
                <tr align="center">
                  <td colspan="2" rowspan="1" style="border: solid; border-style: dotted; border-width: 1px; font-size: 14px; border-color: rgb(99, 180, 0); font-size: 16px; font-weight: bold; background-color: rgb(240, 256, 240);"><span><?php echo $this->_tpl_vars['messages'][$this->_sections['msg1']['index']]->title; ?>
</span></td>
                </tr>
                <tr>
                  <td colspan="2" rowspan="1" style="border: solid; border-style: dotted; border-width: 1px; font-size: 14px; border-color: rgb(99, 180, 0);"><?php echo $this->_tpl_vars['messages'][$this->_sections['msg1']['index']]->message; ?>
</td>
                </tr>
                <tr>
                  <td style="border: solid; border-style: dotted; border-width: 1px; font-size: 12px; border-color: rgb(99, 180, 0); background-color: rgb(240, 256, 240);">[<?php echo $this->_tpl_vars['messages'][$this->_sections['msg1']['index']]->date; ?>
] - Posted by: <?php echo $this->_tpl_vars['messages'][$this->_sections['msg1']['index']]->userFullName; ?>
</td>
                  <td style="border: solid; border-style: dotted; border-width: 1px; font-size: 12px; border-color: rgb(99, 180, 0); text-align: right; background-color: rgb(240, 256, 240);"><a href="#">Read Morre...</a></td>
                </tr>
              </tbody>
            </table></center>
<?php endfor; endif; ?>