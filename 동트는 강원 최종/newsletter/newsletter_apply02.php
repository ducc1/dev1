<?
$sh["rPath"]="..";
$board_id = "subscribe";
include_once($sh["rPath"]."/_common.php");

include_once($sh["rPath"]."/_head.php");

$terms = isset($_POST['terms']) ? $_POST['terms'] : 'N';
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

							<!-- 필수입력항목
								온라인구독 : 이름, 이메일, 신청동기
								오프라인 : 이름, 전화번호, 주소, 신청동기
								둘다 : 이름, 이메일, 전화번호, 주소, 신청동기
							-->
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

			if(confirm("신청하시겠습니까?")){
				$('#writeForm').find('#mode').val('insert');
				$('#writeForm').attr('action', '/newsletter/newsletterSave.php');
				$('#writeForm').submit();
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
					<li><a href="/newsletter/newsletter_apply01.php" class="on">정기구독신청</a></li>
					<li><a href="/newsletter/newsletter_confirm01.php">구독정보 확인 및 변경</a></li>
				</ul>

				<div class="stepBox">
					<ul>
						<li>
							<span class="icon step1"></span>
							<p>01 개인정보 동의</p>
							<span class="step_arrow">&gt;</span>
						</li>
						<li class="on">
							<span class="icon step2"></span>
							<p>02 개인정보 입력</p>
							<span class="step_arrow">&gt;</span>
						</li>
						<li>
							<span class="icon step3"></span>
							<p>03 완료</p>
						</li>
					</ul>
				</div>

				<h3>정보입력</h3>
				
				<form name="writeForm" id="writeForm" method="post" action="#">
				<input type="hidden" name="agreeChk" id="agreeChk" value="<?=$terms;?>"/>
				<input type="hidden" name="mode" id="mode" />

				<fieldset>
				<legend>글쓰기</legend>

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
							<input type="radio" name="division" id="division3" value="both" checked="checked"> <label for="division3">잡지 / E-mail 뉴스레터 전체 구독을 원합니다.</label><br>
							<input type="radio" name="division" id="division2" value="offline"> <label for="division2">잡지 구독을 원합니다.</label><br>
							<input type="radio" name="division" id="division1" value="online"> <label for="division1">E-mail 뉴스레터 구독을 원합니다</label>
							<!-- 필수입력항목
								온라인구독 : 이름, 이메일, 신청동기
								오프라인 : 이름, 전화번호, 주소, 신청동기
								둘다 : 이름, 이메일, 전화번호, 주소, 신청동기
							-->
						</td>
					</tr>
					<tr>
						<th><em class="require on off">*</em> 이름</th>
						<td class="left"><input type="text" style="width:200px;" name="name" title="이름" value=""></td>
					</tr>
					<tr>
						<th>직책</th>
						<td class="left"><input type="text" style="width:200px;" name="position" title="직책" value=""></td>
					</tr>
					<tr>
						<th><em class="require off">*</em> 전화번호</th>
						<td class="left">
						<select name="pphone1" id="pphone1" title="전화번호선택" style="padding:4px;">
									<option value="010">010</option>
									<option value="011">011</option>
									<option value="016">016</option>
									<option value="017">017</option>
									<option value="018">018</option>
									<option value="019">019</option>
									<option value="02">02</option>
									<option value="031">031</option>
									<option value="032">032</option>
									<option value="033">033</option>
									<option value="041">041</option>
									<option value="042">042</option>
									<option value="043">043</option>
									<option value="051">051</option>
									<option value="052">052</option>
									<option value="053">053</option>
									<option value="054">054</option>
									<option value="055">055</option>
									<option value="061">061</option>
									<option value="062">062</option>
									<option value="063">063</option>
									<option value="064">064</option>
									<option value="070">070</option>
									<option value="0505">0505</option>
								</select> -
								<input type="text" name="pphone2" id="pphone2" class="phoneBox" title="전화번호입력" style="ime-mode:disabled; width:50px;" numberonly="true" maxlength=4> -
								<input type="text" name="pphone3" id="pphone3" class="phoneBox" title="전화번호입력" style="ime-mode:disabled; width:50px;" numberonly="true" maxlength=4>

						<!-- <input type="text" style="width:200px;" name="phone" title="전화번호" value=""> -->
						<!-- <em>(예시 : 010-1234-5678)</em> -->
						</td>
					</tr>
					<tr>
						<th><em class="require on">*</em> e-mail</th>
						<td class="left"><input type="text" style="width:200px;" name="mail" title="e-mail" value="">
						<em>(예시 : myid@abc.com)</em>
						</td>
					</tr>
					<tr>
						<th><em class="require off">*</em> 주소</th>
						<td class="left">
							<input type="text" style="width:100px;" name="zipcode" id="zipcode" title="우편번호" value="">
							<a href="javascript:;" class="btnMid" onclick="javascript:openPostcode('zipcode', 'addr1', 'addr2');">우편번호 검색</a><br>
							<input type="text" style="width:42%; margin-top:5px;" name="addr1" id="addr1" title="주소" value="">
							<input type="text" style="width:42%; margin-top:5px;" name="addr2" id="addr2" title="상세주소" value="">
						</td>
					</tr>
					<!--
					<tr>
						<th>부수</th>
						<td class="left"><input type="text" style="width:50px;text-align:right;" name="snum" title="부수" value="" style="ime-mode:disabled;" onkeyPress="InpuOnlyNumber(this);"> 부</td>
					</tr>
					-->
					<tr>
						<th>기타</th>
						<td class="left">
							<textarea name="etc" style="width:95%; height:100px;" title="기타"></textarea>
						</td>
					</tr>
					<tr>
						<th>신청동기</th>
						<td class="left">
							<input type="radio" name="motive" id="motive1" checked="checked" value="동트는 강원 잡지를 보고"> <label for="motive1">동트는 강원 잡지를 보고</label><br>
							<input type="radio" name="motive" id="motive2" value="인터넷 검색을 통해"> <label for="motive2">인터넷 검색을 통해</label><br>
							<input type="radio" name="motive" id="motive3" value="홈페이지, 페이스북, 블로그를 통해"> <label for="motive3">홈페이지, 페이스북, 블로그를 통해</label><br>
							<input type="radio" name="motive" id="motive4" value="주변 지인의 소개"> <label for="motive4">주변 지인의 소개</label>
						</td>
					</tr>
				</tbody>
				</table>

				<div class="btnArea center">
					<a href="javascript:;" class="btnBig orange goSave">구독 신청하기</a>
				</div><!-- //btnArea -->

			</fieldset>
			</form>





			</div><!--// contents-->
		<!-- ============================ 내용종료 ============================ -->

		</div><!--// container -->
				<?
		include_once($sh["rPath"]."/_bottom.php");
		?>