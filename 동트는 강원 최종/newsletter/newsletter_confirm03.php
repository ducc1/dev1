<?
$sh["rPath"]="..";
$board_id = "subscribe";
include_once($sh["rPath"]."/_common.php");

include_once($sh["rPath"]."/_head.php");

$idx = isset($_POST['idx']) ? $_POST['idx'] : '';
$mode = isset($_POST['mode']) ? $_POST['mode'] : '';

if($idx == "") {
	echo '
		<script type="text/javascript">
		alert("잘못된 접근입니다.");
		window.location.href="/";
		</script>
	';
	exit;
}


$sql = "SELECT * FROM newsletter_req WHERE idx = ". $idx;
$row = $DB->fetcharr($sql);

?>

	<script src="http://dmaps.daum.net/map_js_init/postcode.v2.js"></script>
	<script type="text/javascript">
	//우편번호
		function openPostcode(zipcode, addr, addr_det) {
			new daum.Postcode({
				oncomplete: function(data) {
				 /*	// 기존 사용소스
					// 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.
					// 우편번호와 주소 정보를 해당 필드에 넣고, 커서를 상세주소 필드로 이동한다.
					document.getElementById('zipcode1').value = data.postcode1;
					document.getElementById('zipcode2').value = data.postcode2;
					//document.getElementById('addr1').value = data.address;

					//전체 주소에서 연결 번지 및 ()로 묶여 있는 부가정보를 제거하고자 할 경우,
					//아래와 같은 정규식을 사용해도 된다. 정규식은 개발자의 목적에 맞게 수정해서 사용 가능하다.
					var addr = data.address.replace(/(\s|^)\(.+\)$|\S+~\S+/g, '');
					document.getElementById('addr1').value = addr;

					document.getElementById('addr2').focus();
				 */

					// 팝업에서 검색결과 항목을 클릭했을때 실행할 코드를 작성하는 부분.
					
					// 각 주소의 노출 규칙에 따라 주소를 조합한다.
					// 내려오는 변수가 값이 없는 경우엔 공백('')값을 가지므로, 이를 참고하여 분기 한다.
					var fullAddr = ''; // 최종 주소 변수
					var extraAddr = ''; // 조합형 주소 변수

					// 사용자가 선택한 주소 타입에 따라 해당 주소 값을 가져온다.
					if (data.userSelectedType === 'R') { // 사용자가 도로명 주소를 선택했을 경우
						fullAddr = data.roadAddress;

					} else { // 사용자가 지번 주소를 선택했을 경우(J)
						fullAddr = data.jibunAddress;
					}

					// 사용자가 선택한 주소가 도로명 타입일때 조합한다.
					if(data.userSelectedType === 'R'){
						//법정동명이 있을 경우 추가한다.
						if(data.bname !== ''){
							extraAddr += data.bname;
						}
						// 건물명이 있을 경우 추가한다.
						if(data.buildingName !== ''){
							extraAddr += (extraAddr !== '' ? ', ' + data.buildingName : data.buildingName);
						}
						// 조합형주소의 유무에 따라 양쪽에 괄호를 추가하여 최종 주소를 만든다.
						fullAddr += (extraAddr !== '' ? ' ('+ extraAddr +')' : '');
					}

					// 우편번호와 주소 정보를 해당 필드에 넣는다.
					//document.getElementById('zipcode1').value = data.postcode1;	//6자리 우편번호 사용(3자리씩 분리
					//document.getElementById('zipcode2').value = data.postcode2; //6자리 우편번호 사용
					document.getElementById(zipcode).value = data.zonecode;	//5자리 기초구역번호 사용
					document.getElementById(addr).value = fullAddr;

					// 커서를 상세주소 필드로 이동한다.
					document.getElementById(addr_det).focus();
				}
			}).open();
		}

	</script>

	<script type="text/javascript">
	$(document).ready(function(){

		$('#division1').click(function(){//온라인 선택
			if (document.all.division[2].checked == true) {
				$('.require').hide();
				$('.require.on').show();
			}
		});
		$('#division2').click(function(){//오프라인 선택
			if (document.all.division[1].checked == true) {
				$('.require').hide();
				$('.require.off').show();
			}
		});
		$('#division3').click(function(){//전체 선택
			if (document.all.division[0].checked == true) {
				$('.require').show();
			}
		});

		if (document.all.division[2].checked == true) {
			$('.require').hide();
			$('.require.on').show();
		}else if (document.all.division[1].checked == true) {
			$('.require').hide();
			$('.require.off').show();
		}else if (document.all.division[0].checked == true) {
			$('.require').show();
		}

		$('.goSave').click(function(){
			if($('input[name="name"]').val() == "") {
				alert('이름을 입력해 주세요.');
				$('input[name="name"]').focus();
				return false;
			}

			if (document.all.division[2].checked == true) {

				//온라인
				if($('input[name="mail"]').val() == "") {
					alert('e-mail을 입력해 주세요.');
					$('input[name="mail"]').focus();
					return false;
				}
				var email =$('input[name="mail"]').val();  
				var regex=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;   
				  
				if(regex.test(email) === false) {  
					alert("잘못된 이메일 형식입니다.");  
					$('input[name="mail"]').focus();
					return false;  
				} 

			} else if (document.all.division[1].checked == true) {

				//오프라인
				if ($("#pphone2").val().length<3)
				{
					alert("전화번호를 입력해주세요");
					$('#pphone2').focus();
					return false; 
				}

				if ($("#pphone3").val().length<4)
				{
					alert("전화번호를 입력해주세요");
					$('#pphone3').focus();
					return false;
				}

				if($('input[name="zipcode"]').val() == "" || $('input[name="addr1"]').val() == "") {
					alert('주소를 선택해 주세요.');
					$('input[name="zipcode"]').focus();
					return false;
				}

				if($('input[name="addr2"]').val() == "") {
					alert('주소를 입력해 주세요.');
					$('input[name="addr2"]').focus();
					return false;
				}

			} else if (document.all.division[0].checked == true) {
				
				//전체
				if ($("#pphone2").val().length<3)
				{
					alert("전화번호를 입력해주세요");
					$('#pphone2').focus();
					return false; 
				}

				if ($("#pphone3").val().length<4)
				{
					alert("전화번호를 입력해주세요");
					$('#pphone3').focus();
					return false;
				}

				if($('input[name="mail"]').val() == "") {
					alert('e-mail을 입력해 주세요.');
					$('input[name="mail"]').focus();
					return false;
				}

				var email =$('input[name="mail"]').val();  
				var regex=/^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/;   
				  
				if(regex.test(email) === false) {  
					alert("잘못된 이메일 형식입니다.");  
					$('input[name="mail"]').focus();
					return false;  
				} 

				if($('input[name="zipcode"]').val() == "" || $('input[name="addr1"]').val() == "") {
					alert('주소를 선택해 주세요.');
					$('input[name="zipcode"]').focus();
					return false;
				}

				if($('input[name="addr2"]').val() == "") {
					alert('주소를 입력해 주세요.');
					$('input[name="addr2"]').focus();
					return false;
				}
			}

			if(confirm("변경하시겠습니까?")){
				$('#editForm').find('#mode').val('modify');
				$('#editForm').attr('action', '/newsletter/newsletterSave.php');
				$('#editForm').submit();
			}else{
				return false;
			}

		});
	});


	$(function()
	{
	 $(document).on("keyup", "input:text[numberOnly]", function() {$(this).val( $(this).val().replace(/[^0-9]/gi,"") );});
	 $(document).on("keyup", "input:text[datetimeOnly]", function() {$(this).val( $(this).val().replace(/[^0-9:\-]/gi,"") );});
	});
	</script>


	<div class="locationwrap">
		<div class="location">
			<a href="/" class="icon_set icon_home">home</a> &gt;
			<a href="#">Community</a> &gt;
			<span>정기구독신청</span>
		</div>
	</div><!--//locationwrap -->


	<!-- con_wrap -->
	<div class="con_wrap clearfix">
		<!-- container -->
		<div class="container" id="container">

		<!-- ============================ 내용시작 ============================ -->
			<div class="contents">
				<h2>정기구독신청</h2>

				<ul class="tabMenu">
					<li><a href="/newsletter/newsletter_apply01.php">정기구독신청</a></li>
					<li><a href="/newsletter/newsletter_confirm01.php" class="on">구독정보 확인 및 변경</a></li>
				</ul>


				<div class="newsletter_fin">
					<div class="finTxt">
						<p><strong><?=$row['userNm'];?></strong> 고객님,</p>
						고객님의 구독정보는 다음과 같습니다.
					</div>
				</div>

				<form name="editForm" id="editForm" method="post" action="#">
				<input type="hidden" name="mode" id="mode" />
				<input type="hidden" name="idx" id="idx" value="<?=$idx;?>"/>
				<fieldset>
				<legend>정보수정</legend>

				<div class="bbsInfo right"><em class="require2">*</em> 표시는 필수입력항목입니다.</div>
				<table summary="글쓰기:작성자, 제목, " class="tblBbs">
				<caption>글쓰기</caption>
				<colgroup>
					<col style="width:12%;">
					<col style="width:88%;">
				</colgroup>
				<tbody>
					<tr>
						<td class="left bg_y" colspan="2">
							<input type="radio" name="division" id="division3" <?if($row['subscribeType'] == 'both') echo 'checked="checked"';?> value="both"> <label for="division3">잡지 / E-mail 뉴스레터 전체 구독을 원합니다.</label><br>
							<input type="radio" name="division" id="division2" <?if($row['subscribeType'] == 'offline') echo 'checked="checked"';?> value="offline"> <label for="division2">잡지 구독을 원합니다.</label><br>
							<input type="radio" name="division" id="division1" <?if($row['subscribeType'] == 'online') echo 'checked="checked"';?> value="online"> <label for="division1">E-mail 뉴스레터 구독을 원합니다</label><br>
							<!-- 필수입력항목
								온라인구독 : 이름, 이메일, 신청동기
								오프라인 : 이름, 전화번호, 주소, 신청동기
								둘다 : 이름, 이메일, 전화번호, 주소, 신청동기
							-->
						</td>
					</tr>
					<tr>
						<th><em class="require on off">*</em> 이름</th>
						<td class="left"><?=$row['userNm'];?></td>
					</tr>
					<tr>
						<th><em class="require"></em> 직위</th>
						<td class="left"><input type="text" style="width:200px;" name="position" title="position" value="<?=$row['position'];?>"></td>
					</tr>
					<tr>
						<th><em class="require off">*</em> 전화번호</th>
						<td class="left">
						<? 
						$tempp= explode("-",$row['tel']);
						$temp1 = $tempp[0];
						$temp2 = $tempp[1];
						$temp3 = $tempp[2];
						?>
						<select name="pphone1" id="pphone1" title="전화번호선택">
									<option value="010" <? if ($temp1=='010') { ?>selected="selected"<? } ?>>010</option>
									<option value="011" <? if ($temp1=='011') { ?>selected="selected"<? } ?>>011</option>
									<option value="016" <? if ($temp1=='016') { ?>selected="selected"<? } ?>>016</option>
									<option value="017" <? if ($temp1=='017') { ?>selected="selected"<? } ?>>017</option>
									<option value="018" <? if ($temp1=='018') { ?>selected="selected"<? } ?>>018</option>
									<option value="019" <? if ($temp1=='019') { ?>selected="selected"<? } ?>>019</option>
									<option value="02" <? if ($temp1=='02') { ?>selected="selected"<? } ?>>02</option>
									<option value="031" <? if ($temp1=='031') { ?>selected="selected"<? } ?>>031</option>
									<option value="032" <? if ($temp1=='032') { ?>selected="selected"<? } ?>>032</option>
									<option value="033" <? if ($temp1=='033') { ?>selected="selected"<? } ?>>033</option>
									<option value="041" <? if ($temp1=='041') { ?>selected="selected"<? } ?>>041</option>
									<option value="042" <? if ($temp1=='042') { ?>selected="selected"<? } ?>>042</option>
									<option value="043" <? if ($temp1=='043') { ?>selected="selected"<? } ?>>043</option>
									<option value="051" <? if ($temp1=='051') { ?>selected="selected"<? } ?>>051</option>
									<option value="052" <? if ($temp1=='052') { ?>selected="selected"<? } ?>>052</option>
									<option value="053" <? if ($temp1=='053') { ?>selected="selected"<? } ?>>053</option>
									<option value="054" <? if ($temp1=='054') { ?>selected="selected"<? } ?>>054</option>
									<option value="055" <? if ($temp1=='055') { ?>selected="selected"<? } ?>>055</option>
									<option value="061" <? if ($temp1=='061') { ?>selected="selected"<? } ?>>061</option>
									<option value="062" <? if ($temp1=='062') { ?>selected="selected"<? } ?>>062</option>
									<option value="063" <? if ($temp1=='063') { ?>selected="selected"<? } ?>>063</option>
									<option value="064" <? if ($temp1=='064') { ?>selected="selected"<? } ?>>064</option>
									<option value="070" <? if ($temp1=='070') { ?>selected="selected"<? } ?>>070</option>
									<option value="0505" <? if ($temp1=='0505') { ?>selected="selected"<? } ?>>0505</option>
								</select> -
								<input type="text" name="pphone2" id="pphone2" class="phoneBox" title="전화번호입력" style="ime-mode:disabled;" numberonly="true" maxlength=4 value="<?=$temp2?>"> -
								<input type="text" name="pphone3" id="pphone3" class="phoneBox" title="전화번호입력" style="ime-mode:disabled;" numberonly="true" maxlength=4 value="<?=$temp3?>">

						<!-- <input type="text" style="width:200px;" name="phone" title="전화번호" value="<?=$row['tel'];?>"> --></td>
					</tr>
					<tr>
						<th><em class="require on">*</em> e-mail</th>
						<td class="left"><input type="text" style="width:200px;" name="mail" title="e-mail" value="<?=$row['email'];?>"></td>
					</tr>
					<tr>
						<th><em class="require off">*</em> 주소</th>
						<td class="left">
							<input type="text" style="width:100px;" name="zipcode" id="zipcode" title="우편번호" value="<?=$row['zipcode'];?>" numberonly="true">
							<a href="javascript:;" class="btnMid" onclick="javascript:openPostcode('zipcode', 'addr1', 'addr2');">우편번호 검색</a><br>
							<input type="text" style="width:42%; margin-top:5px;" name="addr1" id="addr1" title="주소" value="<?=$row['addr1'];?>">
							<input type="text" style="width:42%; margin-top:5px;" name="addr2" id="addr2" title="상세주소" value="<?=$row['addr2'];?>">
						</td>
					</tr>
					<!--
					<tr>
						<th>부수</th>
						<td class="left"><input type="text" style="width:50px;text-align:right;" name="snum" title="부수" value="<?=$row['snum'];?>" onkeyPress="if ((event.keyCode<48) || (event.keyCode>57)) event.returnValue=false;"> 부</td>
					</tr>-->
					<tr>
						<th>기타</th>
						<td class="left">
							<textarea name="etc" style="width:95%; height:100px;" title="기타"><?=strDecode($row['etc']);?></textarea>
						</td>
					</tr>
					<tr>
						<th>신청동기</th>
						<td class="left">
							<input type="radio" name="motive" id="motive1" <?if($row['req_motive'] == '동트는 강원 잡지를 보고') echo 'checked="checked"';?> value="동트는 강원 잡지를 보고"> <label for="motive1">동트는 강원 잡지를 보고</label><br>
							<input type="radio" name="motive" id="motive2" <?if($row['req_motive'] == '인터넷 검색을 통해') echo 'checked="checked"';?> value="인터넷 검색을 통해"> <label for="motive2">인터넷 검색을 통해</label><br>
							<input type="radio" name="motive" id="motive3" <?if($row['req_motive'] == '홈페이지, 페이스북, 블로그를 통해') echo 'checked="checked"';?> value="홈페이지, 페이스북, 블로그를 통해"> <label for="motive3">홈페이지, 페이스북, 블로그를 통해</label><br>
							<input type="radio" name="motive" id="motive4" <?if($row['req_motive'] == '주변 지인의 소개') echo 'checked="checked"';?> value="주변 지인의 소개"> <label for="motive4">주변 지인의 소개</label>
						</td>
					</tr>
				</tbody>
				</table>

				<div class="btnArea center">
					<a href="javascript:;" class="btnBig orange goSave">구독 신청하기</a>
				</div><!-- //btnArea -->
				</form>

			</div><!--// contents-->
		<!-- ============================ 내용종료 ============================ -->

		</div><!--// container -->
				<?
		include_once($sh["rPath"]."/_bottom.php");
		?>
<?
//반대
function strDecode($str){
	$str = trim($str);
	$str = str_replace("<br/>", "\n", $str);
	$str = str_replace("&nbsp;", " ",$str);
	return $str;
}
?>