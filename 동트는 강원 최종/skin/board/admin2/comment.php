<?if (!defined('_SHSHOP_')) exit; // ������ ���� ���� �Ұ�?>



<!-- ��� ���� ���� -->

<BODY STYLE="background-color:transparent">
<!-- comment-->
<form id="fregisterform" name="fregisterform" action="./board_proc.php" onsubmit="return fregisterform_submit(this);" method="post" enctype="multipart/form-data" target="ifm_proc">
    <input type="hidden" name="state" value="comment">
    <input type="hidden" name="referer" value="<?=$referer?>">
    <input type="hidden" name="board_id" value="<?=$board_id?>">
    <input type="hidden" name="board_no" value="<?=$no?>">
    <input type="hidden" name="cur_comment" value="<?=$cur_comment?>">
			<div class="comment">
				<fieldset class="write clearfix">

					<?php
					if(!isset($_SESSION['SNS_LOGIN']['name']) || !$_SESSION['SNS_LOGIN']['name']){
						?>
					<!-- �α��� �ϱ��� -->
					<div class="login_inner clearfix">
						<input type="text" name="name" placeholder="�̸�"><input type="password" placeholder="��й�ȣ" name="password">
						<div class="sns_login">
							<div class="alert_sns">�Ҽȷα��� �Ͻø� ���ϰ� ����� ���� �� �ֽ��ϴ�.<span class="triangle"></span></div>
							<a href="#" class="sns_f">���̽���</a>
							<a href="#" class="sns_t">Ʈ����</a>
							<a href="#" class="sns_k">īī����</a>
						</div><!--//sns_login -->
					</div><!--//�α��� �ϱ��� -->
					<?php
						}else{
							if($_SESSION['SNS_LOGIN']['sns'] == 'FACEBOOK') $add_class = 'sns_f';
							else if($_SESSION['SNS_LOGIN']['sns'] == 'TWITTER') $add_class = 'sns_t';
							else if($_SESSION['SNS_LOGIN']['sns'] == 'KAKAOTALK') $add_class = 'sns_k';
					?>
					<!-- �α��� �ϸ� -->
					<div class="login_inner">
					<input type="hidden" name="name" value="<?=$_SESSION['SNS_LOGIN']['name']?>">
					<input type="hidden" name="sns" value="<?=$_SESSION['SNS_LOGIN']['sns']?>">
						<!--
						�̸�,��й�ȣ �־������ : <span class="icon_set sns_c"></span>
						-->
						<span class="icon_set <?=$add_class?>"></span> <span class="name"><?=$_SESSION['SNS_LOGIN']['name']?></span>
						<a href="#" class="sns_off" style="display:block; float:right;">SNS �α׾ƿ�</a>
					</div><!--//�α��� �ϸ� -->
					<?php } ?>


					<textarea id="inquiryText" placeholder="������ �Է��ϼ���" name="content"></textarea>
					<a href="#none" onclick="document.fregisterform.submit();" title="���"class="btn_write">���</a>
				</fieldset>
</form>


<form id="fregisterlist" name="fregisterlist" action="./comment_proc.php" method="post" enctype="multipart/form-data">
    <input type="hidden" name="state" value="comment_edit">
    <input type="hidden" name="referer" value="<?=$referer?>">
    <input type="hidden" name="board_id" value="<?=$board_id?>">
    <input type="hidden" name="board_no" value="<?=$no?>">
    <input type="hidden" name="cur_comment" >
				<div class="comment_list">
					<p>�� <span class="comment_num"><?=$tot?>��</span>�� ����� �ֽ��ϴ�.</p>
					<ul>
		<!-- ����Ʈ ���� ���� -->
		<?
		for($i=0;$i<sizeof($comment);$i++){
			$comments			= $comment[$i];
			$comments[idx]		= $idx;
			$bg				= 'bg'.($i%2);

							if($comments['sns'] == 'FACEBOOK') $add_class_list = 'icon_set sns_f';
							else if($comments['sns'] == 'TWITTER') $add_class_list = 'icon_set sns_t';
							else if($comments['sns'] == 'KAKAOTALK') $add_class_list = 'icon_set sns_k';
							else $add_class_list = 'icon_set sns_c';

			?>
			<!--������ �� -->
						<fieldset class="write clearfix" style="display:none" id="con_<?=$comments[no]?>">
								<!-- �α��� �ϱ��� -->
								<div class="login_inner clearfix">
									<input type=hidden name=sns value="<?=$comments['sns']?>">
									<input type="text" name="name_array[<?=$comments[no]?>]" placeholder="�̸�" value="<?=$comments[name]?>" readonly>
									<? if(!$comments['sns']) { ?>
									<input type="password" placeholder="��й�ȣ" name="password_array[<?=$comments[no]?>]" >
									<? } ?>
								</div><!--//�α��� �ϱ��� -->

								<!-- �α��� �ϸ� -->
								<div class="login_inner" style="display:none;">
									<!--
									�̸�,��й�ȣ �־������ : <span class="icon_set sns_c"></span>
									���̽��� �α���������� : <span class="icon_set sns_f"></span>
									Ʈ���� �α���������� : <span class="icon_set sns_t"></span>
									īī���� �α���������� : <span class="icon_set sns_k"></span>
									-->
									<span class="icon_set sns_f"></span> <span class="name">ȫ�浿</span>
								</div><!--//�α��� �ϸ� -->

								<textarea id="inquiryText" placeholder="������ �Է��ϼ���" name="content_array[<?=$comments[no]?>]"><?=nl2br($comments[content])?></textarea>
								<a href="#none" onclick="editok('<?=$comments[no]?>');" title="���"class="btn_write">���</a>
						</fieldset>

						<li>
							<span class="<?=$add_class_list?>"></span>
							<!--
							�̸�,��й�ȣ �־������ : <span class="icon_set sns_c"></span>
							���̽��� �α���������� : <span class="icon_set sns_f"></span>
							Ʈ���� �α���������� : <span class="icon_set sns_t"></span>
							īī���� �α���������� : <span class="icon_set sns_k"></span>
							-->
							<div class="comment_view">
								<span class="name"><?=$comments[name]?></span>
								<span class="date"><?=substr($comments[datetime], 0, 16)?></span>
								<span class="txt"><?=nl2br($comments[content])?></span>
								<p class="editBtn">
									<a href="#none" onclick="editcon('<?=$comments[no]?>')" class="btnSmall">����</a>
									<? if ($comments['sns']) { ?>
									<a href="./comment_del.php?board_id=<?=$board_id?>&cno=<?=$comments[no]?>&no=<?=$no?>&name=<?=$comments[name]?>" class="btnSmall">����</a>
									<? } else {?>
									<a href="#none" onclick="delcon('<?=$comments[no]?>','<?=$comments['sns']?>')" class="btnSmall">����</a>
									<? } ?>
								</p>
							</div>
						</li>


<? } ?>
					</ul>
					<div class="paging">
						<?=$linkpage?>
					</div>
				</div>
				</form>
			</div><!-- //comment-->

<iframe name="ifm_proc" id="ifm_proc" src="" frameborder="0" scrolling="no" style="display:none;"></iframe>



    <script>
    // submit ��üũ
    function fregisterform_submit(f){
		if (f.name.value.length < 1) {
			alert("�̸��� �Է��� �ּ���.");
			f.name.focus();
			return false;
		}

		var form		= document.getElementById("fregisterform");
		form.action		= './board_proc.php';
		form.target		= "ifm_proc";
		form.method		= 'post';
		form.submit();

        return true;
    }

	function delcon(nn,snser) {
		window.open('board_pass.html?mode=comment_delete&no='+nn+'&sns='+snser, 'twitter', 'width=400, height=270');
	}

	function editcon(nn) {
		$("#con_"+nn).toggle();
	}

	function editok(nn) {
		document.fregisterlist.cur_comment.value=nn;
		document.fregisterlist.submit();
	}
    </script>

<!-- ��� ���� ��
