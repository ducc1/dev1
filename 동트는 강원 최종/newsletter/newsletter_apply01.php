<?
$sh["rPath"]="..";
$board_id = "subscribe";
include_once($sh["rPath"]."/_common.php");

include_once($sh["rPath"]."/_head.php");

?>

	<script type="text/javascript">
	$(document).ready(function(){
		$('.goWrite').click(function(){
			if($('input:checkbox[name="terms"]').is(':checked') != true){
				alert('이용 약관에 동의해 주세요.');
				return false;
			}else{
				$('input:checkbox[name="terms"]').val('Y');
				$('#form1').attr('action','./newsletter_apply02.php');
				$('#form1').submit();
			}

			//window.location.href = "/newsletter/newsletter_apply02.php";
		});
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
						<li class="on">
							<span class="icon step1"></span>
							<p>01 개인정보 동의</p>
							<span class="step_arrow">&gt;</span>
						</li>
						<li>
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

				<h3>개인정보취급방침</h3>
				<form name="form1" id="form1" method="post" action="#">
				<fieldset>
				<legend>개인정보 동의</legend>

				<div class="agreeBox">
					<div class="agree_txt">
						<div class="privacy">
							<div class="infoBox">
								<p>강원도가 취급하는 모든 개인정보는 관련법령에 근거하거나 정보주체의 동의에 의하여 수집&middot;보유&middot;이용&middot;파기 등을 처리하고 있습니다.</p>
								<p>&middot;개인정보보호법&middot; 제30조 및 동법 시행령 제31조에 따라 이용자의 개인정보 및 권익을 보호하고 개인정보와 관련한 이용자의 고충을 원활하게 처리할 수 있도록 다음과 같은 처리방침을 두고 있습니다.</p>
								<p>이 방침은 별도의 설명이 없는 한 우리 도에서 처리하는 모든 개인정보파일에 적용됩니다. 다만, 소관업무 처리를 위해 소속기관(부서)에서 별도의 개인정보 처리방침을 제정, 시행하는 경우에는 그에 따르고, 해당기관(부서)이 운영하는 홈페이지에 게시함을 알려드립니다.</p>
							</div>
							
							<section>
								<h3>제 1 조 (개인정보의 처리 목적 및 항목)</h3>
								<p>강원도에서는 개인정보를 다음의 목적을 위해 처리합니다. 처리하는 개인정보는 다음의 목적 이외의 용도로는 사용되지 않으며 이용 목적이 변경될 경우 별도의 동의 등 필요한 사전 절차를 이행할 예정입니다.</p>
								<p>※ 개인정보보호법 제32조에 따라 등록&middot;공개하는 개인정보파일별 처리 목적 및 항목 등은 다음과 같은 방법으로 조회하실 수 있습니다.</p>
								<ul>
									<li>1. 개인정보보호 종합지원포털 (<a title="개인정보보호 종합지원포털로 이동합니다.(새창)" target="_blank" href="http://www.privacy.go.kr">www.privacy.go.kr</a>) 접속</li>
									<li>2. 개인정보민원 &rarr; 개인정보의 열람 등 요구 &rarr; 개인정보파일 목록 검색</li>
									<li>3. 기관명에 &ldquo;강원도&rdquo; 입력 후 검색</li>
								</ul>
							</section>

							<section>
								<h3>제 2 조 (개인정보의 처리 및 보유기간)</h3>
								<p>강원도가 처리하는 개인정보의 보유기간은 법령에 명시된 보유기간 또는 개인정보 수집시에 정보주체의 동의를 받은 보유기간 내에서 처리 및 보유합니다. 강원도에서 수집 보유하고 있는 개인정보파일은 제1조에 안내한 방법으로 조회하실 수 있습니다.</p>
							</section>

							<section>
								<h3>제 3 조 (개인정보의 제3자 제공)</h3>
								<p>강원도는 원칙적으로 정보주체의 개인정보를 제1조 (개인정보의 처리 목적)에서 명시한 범위 내에서 처리하며, 이용자의 사전 동의 없이는 본래의 범위를 초과하여 처리하거나 제3자에게 제공하지 않습니다. 단, 다음의 경우에는 개인정보를 처리할 수 있습니다.</p>
								<ul>
									<li>1. 정보주체로부터 별도의 동의를 받는 경우</li>
									<li>2. 다른 법률에 특별한 규정이 있거나 법령상 의무를 준수하기 위하여 불가피한 경우</li>
									<li>3. 공공기관이 법령 등에서 정하는 소관 업무의 수행을 위하여 불가피한 경우</li>
									<li>4. 정보주체 또는 법정대리인이 의사표시를 할 수 없는 상태에 있거나 주소불명 등으로 사전 동의를 받을 수 없는 경우로서 명백히 정보주체 또는 제3자의 급박한 생명, 신체, 재산의 이익을 위하여 필요하다고 인정되는 경우</li>
									<li>5. 통계작성 및 학술연구 등의 목적을 위하여 필요한 경우로서 특정 개인을 알아볼 수 없는 형태로 개인정보를 제공하는 경우</li>
									<li>6. 조약, 그 밖의 국제협정의 이행을 위하여 외국정보 또는 국제기구에 제공하기 위하여 필요한 경우</li>
									<li>7. 범죄의 수사와 공소의 제기 및 유지를 위하여 필요한 경우</li>
									<li>8. 법원의 재판업무 수행을 위하여 필요한 경우</li>
									<li>9. 형 및 감호, 보호처분의 집행을 위하여 필요한 경우</li>
								</ul>
								<p>강원도에서 제3자에게 제공하고 있는 개인정보파일의 내용은 다음과 같습니다.<br />
								<a title="개인정보파일_제3자제공목록 다운로드" href="http://www.provin.gangwon.kr/upload/fileattach/etc/Provide_a_list_of_third-party.xls" class="btnFile">제3자에게 제공하는 개인정보파일</a></p>
							</section>

							<section>
								<h3>제 4 조 (개인정보처리 위탁)</h3>
								<p>강원도는 원활한 업무 처리를 위하여 다음과 같이 개인정보 처리업무를 위탁하고 있습니다.<br />
								<a title="개인정보파일_위탁목록 다운로드" href="http://www.provin.gangwon.kr/upload/fileattach/etc/Charging_status_to_Privacy.xls" class="btnFile">개인정보처리 위탁현황</a></p>
								<p>강원도는 위탁계약 체결시 개인정보보호법 제25조에 따라 위탁업무 수행목적 외 개인정보 처리금지, 기술적ㆍ관리적 보호조치, 재위탁 제한, 수탁자에 대한 관리ㆍ감독, 손해배상 등 책임에 관한 사항을 계약서 등 문서에 명시하고, 수탁자가 개인정보를 안전하게 처리하는지를 감독하고 있습니다.<br />
								또한, 위탁업무의 내용이나 수탁자가 변경될 경우에는 지체없이 본 개인정보 처리방침을 통하여 공개하도록 하겠습니다</p>
							</section>

							<section>
								<h3>제 5 조 (정보주체의 권리, 의무 및 그 행사방법)</h3>
								<p>정보주체는 다음과 같은 권리를 행사 할 수 있으며, 만14세 미만 아동의 법정대리인은 그 아동의 개인정보에 대한 열람, 정정&middot;삭제, 처리정지를 요구할 수 있습니다.</p>
								<ul>
									<li>
										<h4>1. 개인정보 열람 요구</h4>
										<p>강원도에서 보유하고 있는 개인정보파일은「개인정보보호법」제35조(개인정보의 열람)에 따라 자신의 개인정보에 대한 열람을 요구할 수 있습니다. 다만, 개인정보 열람 요구는 법 제35조 4항에 의하여 다음과 같이 제한될 수 있습니다.</p>
										<ul>
											<li>1. 법률에 따라 열람이 금지되거나 제한되는 경우</li>
											<li>2. 다른 사람의 생명&middot;신체를 해할 우려가 있거나 다른 사람의 재산과 그 밖의 이익을 부당하게 침해할 우려가 있는 경우</li>
											<li>3. 공공기관이 다음 각 목의 어느 하나에 해당하는 업무를 수행할 때 중대한 지장을 초래하는 경우
												<ul>
													<li>가. 조세의 부과&middot;징수 또는 환급에 관한 업무</li>
													<li>나.「초&middot;중등교육법」및「고등교육법」에 따른 각급 학교,「평생교육법」에 따른 평생교육시설, 그 밖의 다른 법률에 따라 설치된 고등교육기관에서의 성적 평가 또는 입학자 선발에 관한 업무</li>
													<li>다. 학력&middot;기능 및 채용에 관한 시험, 자격 심사에 관한 업무</li>
													<li>라. 보상금&middot;급부금 산정 등에 대하여 진행 중인 평가 또는 판단에 관한 업무</li>
													<li>마. 다른 법률에 따라 진행 중인 감사 및 조사에 관한 업무</li>
												</ul>
											</li>
										</ul>
									</li>
									<li>
										<h4>2. 개인정보 정정&middot;삭제 요구</h4>
										<p>강원도에서 보유하고 있는 개인정보파일은「개인정보보호법」제36조(개인정보의 정정&middot;삭제)에 따라 정정&middot;삭제를 요구할 수 있습니다. 다만, 다른 법령에서 그 개인정보가 수집 대상으로 명시되어 있는 경우에는 그 삭제를 요구할 수 없습니다.</p>
									</li>
									<li>
										<h4>3. 개인정보 처리정지 요구</h4>
										<p>강원도에서 보유하고 있는 개인정보파일은「개인정보보호법」제37조(개인정보의 처리정지 등)에 따라 처리정지를 요구할 수 있습니다. 다만, 개인정보 처리정지 요구 시 법 제37조 2항에 의하여 처리정지 요구가 거절될 수 있습니다.</p>
										<ul>
											<li>1. 법률에 특별한 규정이 있거나 법령상 의무를 준수하기 위하여 불가피한 경우</li>
											<li>2. 다른 사람의 생명&middot;신체를 해할 우려가 있거나 다른 사람의 재산과 그 밖의 이익을 부당하게 침해할 우려가 있는 경우</li>
											<li>3. 공공기관이 개인정보를 처리하지 아니하면 다른 법률에서 정하는 소관 업무를 수행할 수 없는 경우</li>
											<li>4. 개인정보를 처리하지 아니하면 정보주체와 약정한 서비스를 제공하지 못하는 등 계약의 이행이 곤란한 경우로서 정보주체가 그 계약의 해지 의사를 명확하게 밝히지 아니한 경우</li>
										</ul>
									</li>
									<li>
										<h4>※ 개인정보 열람 등 요구 절차</h4>
										<p></p>
										<ul>
											<li><strong>1. 온라인</strong>
												<ul>
													<li>개인정보보호 종합지원 포털사이트(<a title="새창으로 이동" target="_blank" href="http://www.privacy.go.kr"> http://www.privacy.go.kr</a>)를 통해 신청<br><br>
													<img alt="개인정보 열람 등 요구 절차" src="../comn/img/privacy_process.png" class="imgView"/></li>
												</ul>
											</li>
											<li><strong>2. 오프라인</strong>
												<ul>
													<li>개인정보파일을 보관하고 있는 부서나 기관에 대해 서면, 전자우편, 모사전송(FAX) 등을 통해 신청 (개인정보보호법 시행규칙 <a href="http://www.provin.gangwon.kr/upload//fileattach/etc/별지제8호서식.hwp">별지 제8호 서식<img alt="별지 제8호 서식" src="http://www.provin.gangwon.kr/site/portal/images/ext/hwp.gif" /></a>)</li>
													<li>* 정보주체의 법정대리인이나 위임을 받은 자 등 대리인을 통하여 신청할 경우 위임장을 제출하셔야 합니다. (개인정보보호법 시행규칙 <a href="http://www.provin.gangwon.kr/upload//fileattach/etc/별지제11호서식.hwp">별지 제11호 서식<img alt="별지 제11호 서식" src="http://www.provin.gangwon.kr/site/portal/images/ext/hwp.gif" /></a>)</li>
												</ul>
											</li>
										</ul>
									</li>
								</ul>
							</section>

							<section>
								<h3>제 6 조 (개인정보의 파기)</h3>
								<p>강원도는 원칙적으로 개인정보 처리목적이 달성된 경우에는 지체없이 해당 개인정보를 파기합니다. 파기의 절차 및 방법은 다음과 같습니다.</p>
								<ul>
									<li><strong>1. 파기절차</strong><br>
									강원도는 개인정보파일 파기계획에 따라 파기 사유가 발생한 개인정보파일을 선정하고, 개인정보보호책임자의 승인을 받아 개인정보파일을 파기합니다.
									</li>
									<li><strong>2. 파기방법</strong><br>
									종이에 출력된 개인정보는 분쇄기로 분쇄하거나 소각을 통하여 파기하며, 전자적 파일 형태의 정보는 기록을 재생할 수 없는 기술적 방법(Low level Format 등)을 사용합니다. </li>
								</ul>
							</section>

							<section>
								<h3>제 7 조 (개인정보의 안전성 확보 조치)</h3>
								<p>강원도는 개인정보보호법 제29조에 따라 다음과 같이 안전성 확보에 필요한 기술적/관리적 및 물리적 조치를 하고 있습니다.</p>
								<ul>
									<li><strong>1. 개인정보 취급 직원의 최소화 및 교육</strong><br>
									개인정보를 취급하는 직원을 지정하고 담당자에 한정시켜 최소화 하여 개인정보를 관리하는 대책을 시행하고 있습니다. </li>
									<li><strong>2. 개인정보의 암호화</strong><br>
									이용자의 비밀번호는 암호화 되어 저장 및 관리되고 있어, 본인만이 알 수 있으며 중요한 데이터는 파일 및 전송 데이터를 암호화 하거나 파일 잠금 기능을 사용하는 등의 별도 보안기능을 사용하고 있습니다.
										<ul>
											<li>1) 전송시 암호화<br />
												○ 웹서버 - 클라이언트 간 암호화 : SSL 또는 응용프로그램 방식<br />
												○ 개인정보처리시스템 간 암호화 : VPN 방식<br />
												○ 개인정보취급자 간 암호화 : PGP 또는 S/MIME 방식<br />
											</li>
											<li>2) 저장시 암호화<br />
												<p>* 국가정보원이 검증한 암호알고리즘 적용한 모듈 또는 제품 사용<br />
												&nbsp; 국가정보원 검증필 암호모듈 또는 제품 확인(<a title="국가사이버안전센터로 이동합니다.(새창)" target="_blank" href="http://service1.nis.go.kr">http://service1.nis.go.kr</a>)</p>

												<ul>
													<li>
														○ 개인정보처리시스템 암호화<br />
														<table class="tblBasic" summary="방식,암복호화 모듈위치,암복호화 요청위치 정보제공">
														<caption>개인정보처리시스템 암호화</caption>
															<colgroup>
																<col width="20%">
																<col width="20%">
																<col width="20%">
																<col width="*">
															</colgroup>
															<thead>
																<tr>
																	<th>방식</th>
																	<th>암복호화 모듈 위치</th>
																	<th>암복호화 요청 위치</th>
																	<th>비고</th>
																</tr>
															</thead>
															<tbody>
																<tr>
																	<td>응용프로그램<br />
																	자체 암호화</td>
																	<td>어플리케이션 서버</td>
																	<td>응용프로그램</td>
																	<td>기존 API 방식과 유사</td>
																</tr>
																<tr>
																	<td>DB 서버 암호화</td>
																	<td>DB 서버</td>
																	<td>DB 서버</td>
																	<td>기존 Plug-In 방식과 유사</td>
																</tr>
																<tr>
																	<td>DBMS 자체 암호화</td>
																	<td>DB 서버</td>
																	<td>DBMS 엔진</td>
																	<td>기존 커널방식(TDE)과 유사</td>
																</tr>
																<tr>
																	<td>DBMS 암호화기능 호출</td>
																	<td>DB 서버</td>
																	<td>응용프로그램</td>
																	<td>기존 커널방식(DBMS 함수호출)과 유사</td>
																</tr>
																<tr>
																	<td>운영체제 암호화</td>
																	<td>파일 서버</td>
																	<td>운영체제(OS)</td>
																	<td>기존 DB 파일암호화 방식과 유사</td>
																</tr>
															</tbody>
														</table>
													</li>
													<li>○ 업무용 PC 암호화<br />
													&nbsp; - 개별문서파일 암호화 또는 디렉터리(디스크)암호화 수행<br />
													&nbsp; - PC 개인정보보호 시스템을 통한 암호화 관리
													</li>
												</ul>
											</li>
											<li><strong>3. 해킹 등에 대비한 기술적 대책</strong> <br>
											강원도는 해킹이나 컴퓨터 바이러스 등에 의한 개인정보 유출 및 훼손을 막기 위하여 보안프로그램을 설치하고 주기적인 갱신 및 점검을 하며 외부로부터 접근이 통제된 구역에 시스템을 설치하고 기술적/물리적으로 감시 및 차단하고 있습니다.</li>
											<li><strong>4. 개인정보에 대한 접근 제한</strong> <br>
											개인정보를 처리하는 데이터베이스시스템에 대한 접근권한의 부여,변경,말소를 통하여 개인정보에 대한 접근통제를 위하여 필요한 조치를 하고 있으며 침입차단시스템을 이용하여 외부로부터의 무단 접근을 통제하고 있습니다.</li>
											<li><strong>5. 접속기록의 보관 및 위변조 방지</strong> <br>
											개인정보처리시스템에 접속한 기록을 최소 6개월 이상 보관, 관리하고 있으며, 접속 기록이 위변조 및 도난, 분실되지 않도록 보안기능 사용하고 있습니다.</li>
											<li><strong>6. 비인가자에 대한 출입 통제</strong> <br>
											개인정보를 보관하고 있는 물리적 보관 장소를 별도로 두고 이에 대해 출입통제 절차를 수립, 운영하고 있습니다.</li>
										</ul>
									</li>
								</ul>
							</section>

							<section>
								<h3>제 8 조 (영상정보처리기기 설치&middot;운영)</h3>
								<p>강원도(본청 및 소속기관 포함)에서 처리하는 모든 영상정보는 다음과 같은 방침에 따라 설치 및 운영하고 있습니다. 다만, 본청 각 부서 또는 소속기관에서 소관업무의 특성상 별도의 영상정보처리기기 운영&middot;관리 방침을 마련하여 별도로 공개하는 경우에는 그에 따릅니다.</p>
								<ul>
									<li><strong>1. 영상정보 보호책임자</strong> <br>
										귀하의 영상정보를 보호하고 개인영상정보 관련한 불만 처리 및 안전한 운영&middot;관리를 위하여 아래와 같이 개인영상정보 보호책임자 및 관리책임자를 두고 있습니다.
										<ul>
											<li>- 영상정보 보호책임자 : 개인정보 보호책임자(CPO)</li>
											<li>- 영상정보 관리책임자 : 영상정보처리기기 설치&middot;운영 부서(기관)장</li>
										</ul>
									</li>
									<li><strong>2. 영상정보처리기기 설치 근거 및 목적</strong> <br>
										개인정보보호법 제25조 제1항에 따라 다음과 같은 목적으로 영상정보처리기기를 설치&middot;운영하고 있습니다.
										<ul>
											<li>- 법령에서 구체적으로 허용하고 있는 경우</li>
											<li>- 범죄의 예방 및 수사를 위하여 필요한 경우</li>
											<li>- 시설안전 및 화재 예방을 위하여 필요한 경우</li>
											<li>- 교통단속을 위하여 필요한 경우</li>
											<li>- 교통정보의 수집·분석 및 제공을 위하여 필요한 경우
											</li>
										</ul>
										<a title="영상정보처리기기별 설치 근거 및 목적 다운로드" href="http://www.provin.gangwon.kr/upload//fileattach/etc/영상정보처리기기현황_강원도.xls" class="btnFile">영상정보처리기기별 설치 근거 및 목적</a>
									</li>
									<li><strong>3. 영상정보처리기기 운영 현황</strong> <br>
										강원도에서 운영하는 영상정보처리기기 현황 및 관련정보는 다음의 목록에서 확인할 수 있습니다. <br>
										- 포함항목 : 설치 근거, 설치 목적, 설치 대수, 설치 위치, 촬영범위, 촬영시간, 보관기간, 보관장소, 처리방법, 관리책임자 및 접근권한자(담당자), (위탁하는 경우)위탁업체 및 연락처 <br>
										<a title="영상정보처리기기별 설치 근거 및 목적 다운로드" href="http://www.provin.gangwon.kr/upload//fileattach/etc/영상정보처리기기현황_강원도.xls" class="btnFile">영상정보처리기기 운영 현황 세부내역</a>
									</li>
									<li><strong>4. 개인영상정보의 확인 방법 및 장소에 관한 사항</strong> <br>
										귀하는 개인영상정보에 관하여 열람 또는 존재확인&middot;삭제를 원하는 경우 영상정보처리기기 관리책임자에게 요구하실 수 있습니다. </dd><dd>단, 귀하가 촬영된 개인영상정보 및 명백히 정보주체의 급박한 생명, 신체, 재산의 이익을 위하여 필요한 개인영상정보에 한정됩니다.
										<ul>
											<li>- 확인 방법 : 영상정보 관리책임자(또는 담당자)에게 연락 후 방문</li>
											<li>- 확인 장소 : 담당 부서(기관)<br>
												* 열람 등 요구 방법 : [별지 서식1호] 개인영상정보 열람&middot;존재확인 청구서를 작성하여 담당부서에 제출</li>
										</ul>
									</li>
									<li><strong>5. 정보주체의 영상정보 열람 등 요구에 대한 조치</strong> <br>
										원도는 개인영상정보에 관하여 열람 또는 존재확인&middot;삭제를 요구받은 경우 지체없이 필요한 조치를 하겠습니다. </dd><dd>단, 다음의 경우 영상정보 열람 등 요구를 거부할 수 있습니다.<br>
										(관리책임자는 10일 이내에 서면 등으로 거부 사유를 정보주체에게 통지)
										<ul>
											<li>- 범죄수사&middot;공소유지&middot;재판수행에 중대한 지장을 초래하는 경우</li>
											<li>- 개인영상정보의 보관기간이 경과하여 파기한 경우</li>
											<li>- 열람 등 요구에 대하여 필요한 조치를 취함으로써 타인의 사생활권이 침해될 우려가 큰 경우</li>
											<li>- 기타 정보주체의 열람 등 요구를 거부할 만한 정당한 사유가 존재하는 경우</li>
										</ul>
									</li>
									<li><strong>6. 영상정보의 안전성 확보조치</strong> <br>
										강원도에서는 영상정보 안전한 보호를 위해 다음과 같은 관리적, 기술적, 물리적 보호조치를 하고 있습니다.
										<ul>
											<li>- 내부관리계획 수립, 열람기록 보관 관리</li>
											<li>- 접근통제 및 접근권한 제한, 영상정보의 안전한 저장&middot;전송기술 적용</li>
											<li>- 처리기록 보관 및 위&middot;변조 방지조치, 보관시설 잠금장치 설치 등</li>
										</ul>
									</li>
								</ul>
							</section>

							<section>
								<h3>제 9 조 (개인정보보호 책임자)</h3>
								<p>강원도는 개인정보를 보호하고 개인정보와 관련한 불만을 처리하기 위하여 아래와 같이 개인정보 보호책임자 및 실무담당자를 지정하고 있습니다. <br />
								(개인정보보호법 제31조제1항에 따른 개인정보보호책임자)<br />
								(동법 시행령 제32조 개인정보보호책임자의 업무 및 지정요건 등)</p>
								<ul>
									<li>○ 개인정보보호책임자
										<ul>
											<li>- 직책 : 기획조정실장</li>
											<li>- 성명 : 김성호</li>
											<li>- 연락처 : 033-249-2100</li>
										</ul>
									</li>
									<li>○ 개인정보보호 담당부서
										<ul>
											<li>- 직책 : 기획조정실장</li>
											<li>- 성명 : 김성호</li>
											<li>- 연락처 : 033-249-2100</li>
										</ul>
									</li>
								</ul>
							</section>

							<section>
								<h3>제 10 조 (권익침해 구제방법)</h3>
								<p>정보주체는 개인정보침해로 인한 구제를 받기 위하여 개인정보분쟁조정위원회, 한국인터넷진흥원 개인정보침해신고센터 등에 분쟁해결이나 상담 등을 신청할 수 있습니다.<br>
								이 밖에 기타 개인정보침해의 신고 및 상담에 대하여는 아래의 기관에 문의하시기를 바랍니다.</p>
								<ul>
									<li>- 개인분쟁조정위원회 : (국번없이)118 (ARS 내선 2번)</li>
									<li>- 정보보호마크인증위원회 : 02-580-0533~4</li>
									<li>- 대검찰청 첨단범죄수사과 : 02-3480-2000</li>
									<li>- 경찰청 사이버테러대응센터 : 02-392-0330</li>
								</ul>
							</section>

							<section>
								<h3>제 11 조 (개인정보 처리방침의 변경)</h3>
								<p>이 개인정보처리방침은 2013. 8. 8일로부터 적용됩니다.<br>
								이전의 개인정보처리방침은 아래에서 확인하실 수 있습니다.</p>
								<ul>
									<li>- 제정일자 : 2011. 12. 19</li>
									<li>- 2011. 12. 19 ~ 2012. 8. 3 <span><a href="http://www.provin.gangwon.kr/hb/portal/sub09_01_01">(구)개인정보처리방침</a></span></li>
									<li>- 2012. 8. 3 ~ 2013. 8. 8 <span><a href="http://www.provin.gangwon.kr/hb/portal/sub09_01_02">(구)개인정보처리방침</a></span></li>
									<li>- 2013. 8. 8 ~ 2014. 5. 7  <span><a href="http://www.provin.gangwon.kr/hb/portal/sub09_01_03">(구)개인정보처리방침</a></span></li>
									<li>- 2014. 5. 7</li>
								</ul>
							</section>

							<div class="partInfo"><strong>정보 제공 부서</strong> 대변인실 033-249-2441</div>

						</div><!--//privacy -->
					</div>
					<div class="agree_check"><input type="checkbox" name="terms" id="terms" title="약관" isnullcheck="true"> <label for="terms">개인 정보 수집 및 이용에 동의합니다.</label></div>
				</div>

				<div class="btnArea center">
					<a href="javascript:;" class="btnBig orange goWrite">구독 신청하기</a>
				</div><!-- //btnArea -->

			</fieldset>
			</form>





			</div><!--// contents-->
		<!-- ============================ 내용종료 ============================ -->

		</div><!--// container -->
		<?
		include_once($sh["rPath"]."/_bottom.php");
		?>