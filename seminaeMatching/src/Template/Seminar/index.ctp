<div id="headerdiv">
	<?=$this->Html->image('minilogo.png', array('alt'=>'logo','width'=>'132'))?>
</div>
<div id="maincontentdiv">

	<?=$this->Html->image($imageName, array('alt'=>'status'))?>
	<div id="remaindiv">今月の残額　　<span id="remainspan"><?=$remain ?></span> 円</div>
	<p id="logp">今月の履歴</p>

	<?php  foreach($data  as  $obj):  ?>

	<div class="logdiv">
	<?=$obj->costdate ?>
	<div class="logdetaildiv">
		<div class="delbtndiv">
			<?=$this->Html->image('delbtn.png', array('alt'=>'削除', 'url'=>array('controller'=>'Costs', 'action'=>'delRecord/' . $obj->id)));?>




		</div>
		<span class="costnamespan"><?=$obj->usedetail ?></span>
		<span class="costvaluespan">￥<?=$obj->value ?></span>
	</div>
	</div>
	<?php  endforeach;  ?>


	<div class="addbtndiv">
		<?=$this->Html->image('insertbtn.png', array('alt'=>'追加', 'url'=>array('action'=>'input')));?>

	</div>
</div>
