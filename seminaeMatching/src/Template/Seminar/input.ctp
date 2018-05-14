<div id="inputdiv">
	<?=$this->Html->image('biglogo.png', array('alt'=>'logo'))?>
	<?=$this->Form->create($entity,['url'=>['action'=>'addRecord']]) ?>
	<table class="inputtable" style="width: 100%" cellspacing="10">
		<tr>
			<td colspan="2">消費登録</td>
		</tr>
		<tr>
			<td style="width: 68px">日付</td>
			<td>	
				<?=$this->Form->text("costdate",['id'=>'textform']) ?>
				
			</td>
		</tr>
		<tr>
			<td style="width: 68px">用途</td>
			<td><?=$this->Form->text("usedetail",['id'=>'textform']) ?></td>
		</tr>
		<tr>
			<td style="width: 68px">金額</td>
			<td><?=$this->Form->text("value",['id'=>'textform']) ?></td>
		</tr>
		<tr>
			<td colspan="2">
					<?=$this->Form->button("登録", ['id'=>'submit']) ?>
					
			</td>
		</tr>
	</table>
	<?=$this->Form->end() ?>
	<div class="addbtndiv">
		<?=$this->Html->image('returnbtn.png', array('alt'=>'戻る', 'url'=>array('action'=>'index')));?>
	</div>
	</div>
