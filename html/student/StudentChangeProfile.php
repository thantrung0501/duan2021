<!DOCTYPE html> 
<html lang="vi"> 
	<head> 
		<meta charset="utf-8">
		<link rel="stylesheet" href="../../css/student/studentChangeProfile.css">
		<link rel="stylesheet" href="../../css/topNavBar.css">
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<script src="../../js/serializeJSONPlugin.js"></script>
		<title>Hồ sơ</title>
	</head>
	<body>
    <ul class="navbar">
      <li><a class="logo-container" href="./studentHomepage.php"><img class="logo" src="../../images/common/Logo-VNU-1995.jpg" /></a></li>
      <li><div class="web-name">Đăng ký thi đánh giá năng lực</div></li>
      <li class="dropdown" style="float:right">
        <a href="javascript:void(0)" class="dropbtn">Student</a>
        <div class="dropdown-content">
          <a href="./studentChangePassword.html">Đổi mật khẩu</a>
          <a href="./studentChangeProfile.php">Cập nhật thông tin</a>
          <a href="entranceExaminationPaper.html">Xem giấy báo dự thi</a>
        </div>
      </li>
    </ul>
		<div class="information">
			<form name="profileForm" id="profileForm" action="" method="post">
				<fieldset>
				    <legend>A.THÔNG TIN CÁ NHÂN</legend>
				    <table>
				    	<tr>
				    		<td>1.Họ, chữ đệm và tên:</td>
				    		<td>
				    			<input type="text" name="fullname" style="width: 200px; height: 18px">
				    		</td>
				    		<td style="padding-left: 50px">2.Giới tính:</td>
				    		<td>
				    			<input name="gender" type="radio" value="Nam" />Nam
				    			<input name="gender" type="radio" value="Nữ" />Nữ
				    		</td>
				    	</tr>
				    	<tr>
				    		<td>3.Ngày sinh:</td>
				    		<td>
				    			<select style="height: 20px; margin-right: 5px; margin-left: 5px" name="year">
			                        <option value="2005">2005</option>
			                        <option value="2004">2004</option>
			                        <option value="2003">2003</option>
			                        <option value="2002">2002</option>
			                        <option value="2001">2001</option>
			                        <option value="2000">2000</option>
			                        <option value="1999">1999</option>
			                        <option value="1998">1998</option>
			                        <option value="1997">1997</option>
			                        <option value="1996">1996</option>
			                        <option value="1995">1995</option>
									<option value="1994">1994</option>
									<option value="1993">1993</option>
									<option value="1992">1992</option>
									<option value="1991">1991</option>
									<option value="1990">1990</option>
									<option value="1989">1989</option>
									<option value="1988">1988</option>
									<option value="1987">1987</option>
									<option value="1986">1986</option>
									<option value="1985">1985</option>
									<option value="1984">1984</option>
									<option value="1983">1983</option>
									<option value="1982">1982</option>
									<option value="1981">1981</option>
									<option value="1980">1980</option>		
			                    </select>Năm
			                    <select style="height: 20px; margin-right: 5px; margin-left: 10px" name="month">
			                        <option value="1">1</option>
				                    <option value="2">2</option>
				                    <option value="3">3</option>
				                    <option value="4">4</option>
				                    <option value="5">5</option>
				                    <option value="6">6</option>
				                    <option value="7">7</option>
				                    <option value="8">8</option>
				                    <option value="9">9</option>
				                    <option value="10">10</option>
				                    <option value="11">11</option>
				                    <option value="12">12</option>
			                    </select>Tháng
			                    <select style="height: 20px; margin-right: 5px; margin-left: 10px" name="day">
									<option>1</option>
			                    	<option>2</option>
			                    	<option>3</option>
			                    	<option>4</option>
			                    	<option>5</option>
			                    	<option>6</option>
			                    	<option>7</option>
			                    	<option>8</option>
			                    	<option>9</option>
			                    	<option>10</option>
			                    	<option>11</option>
			                    	<option>12</option>
			                    	<option>13</option>
			                    	<option>14</option>
			                    	<option>15</option>
			                    	<option>16</option>
			                    	<option>17</option>
			                    	<option>18</option>
			                    	<option>19</option>
			                    	<option>20</option>
			                    	<option>21</option>
			                    	<option>22</option>
			                    	<option>23</option>
			                    	<option>24</option>
			                    	<option>25</option>
			                    	<option>26</option>
			                    	<option>27</option>
			                    	<option>28</option>
			                    	<option>29</option>
			                    	<option>30</option>
			                    	<option>31</option>
			                    </select>Ngày
				    		</td>
				    		<td style="padding-left: 50px">4.Dân tộc:</td>
				    		<td>
				    			<input type="text" name="race" style="width: 100px; height: 18px">
				    		</td>
				    	</tr>
				    	<tr>
				    		<td>5.CMND/CCCD:</td>
				    		<td>
				    			<input type="text" name="cmnd/cccd" style="width: 200px; height: 18px">
				    		</td>
				    	</tr>
				    	<tr>
				    		<td>6.Hộ khẩu thường trú (Huyện - Tỉnh):</td>
				    		<td>
				    			<input type="text" name="residence" style="width: 300px; height: 18px">
				    		</td>
				    		<td style="padding-left: 50px">7.Nơi sinh:</td>
				    		<td>
				    			<input type="text" name="birthplace" style="width: 400px; height: 18px">
				    		</td>
				    	</tr>
				    </table>
				</fieldset>
				<fieldset>
					<legend>B.THÔNG TIN LIÊN HỆ</legend>
					<table>
						<tr>
							<td>8.Địa chỉ Email:</td>
							<td>
								<input type="text" id="email" name="email" style="width: 250px; height: 18px">
							</td>
						</tr>
						<tr>
							<td>9.Số điện thoại:</td>
							<td>
								<input type="text" name="phone" style="width: 150px; height: 18px">
							</td>
						</tr>
						<tr>
							<td>10.Địa chỉ (cụ thể):</td>
							<td>
								<input type="text" name="address" style="width: 400px; height: 18px">
							</td>
						</tr>
					</table>
				</fieldset>
				<fieldset>
					<legend>C.THÔNG TIN PHỤC VỤ THI ĐGNL</legend>
					11.Đối tượng ưu tiên:
					<select style="margin-left: 20px; margin-right: 150px" name="priority">
                        <option value="1" style="height: 20px">Không ưu tiên</option>
	                    <option value="2" style="height: 20px">Có ưu tiên</option>
	                </select>
					12.Khu vực:
					<select style="margin-left: 20px" name="area">
                        <option value="1">KV1</option>
	                    <option value="2">KV2-NT</option>
	                    <option value="3">KV2</option>
	                    <option value="4">KV3</option>
	                </select>
	                <br>
	                13.Trung bình chung học tập:
	                <table class="score-table" style="margin-top: 10px">
	                	<tr>
	                		<th colspan="3">Lớp 10</th>
	                		<th colspan="3">Lớp 11</th>
	                		<th colspan="3">Lớp 12</th>
	                	</tr>
	                	<tr>
	                		<td>
	                			<p>HKI<p>
	                			<input type="number" name="10hk1">
	                		</td>
	                		<td>
	                			<p>HKII<p>
	                			<input type="number" name="10hk2">
	                		</td>
	                		<td>
	                			<p>Cả năm<p>
	                			<input type="number" name="10all">
	                		</td>
	                		<td>
	                			<p>HKI<p>
	                			<input type="number" name="11hk1">
	                		</td>
	                		<td>
	                			<p>HKII<p>
	                			<input type="number" name="11hk2">
	                		</td>
	                		<td>
	                			<p>Cả năm<p>
	                			<input type="number" name="11all">
	                		</td>
	                		<td>
	                			<p>HKI<p>
	                			<input type="number" name="12hk1">
	                		</td>
	                		<td>
	                			<p>HKII(*)<p>
	                			<input type="number" name="12hk2">
	                		</td>
	                		<td>
	                			<p>Cả năm(*)<p>
	                			<input type="number" name="12all">
	                		</td>
	                	</tr>
	                </table>
				</fieldset>
				<fieldset>
					<legend>D.THÔNG TIN TỐT NGHIỆP</legend>
					14.Năm tốt nghiệp THPT(*): 
					<input type="number" id="gradYear" name="gradYear" min="1" style="width: 100px; height: 18px; margin-left: 25px">
					<br>
					15.Kết quả tốt nghiệp THPT(*):
					<br>
					<table class="score-table">
						<tr>
							<td>
								<p>Toán</p>
								<input type="number" name="math">
							</td>
							<td>
								<p>Văn</p>
								<input type="number" name="literature">
							</td>
							<td>
								<p>Ngoại ngữ</p>
								<input type="number" name="foreignLan">
							</td>
							<td>
								<p>Lý</p>
								<input type="number" name="physic">
							</td>
							<td>
								<p>Hóa</p>
								<input type="number" name="chemistry">
							</td>
							<td>
								<p>Sinh</p>
								<input type="number" name="biology">
							</td>
							<td>
								<p>Sử</p>
								<input type="number" name="history">
							</td>
							<td>
								<p>Địa</p>
								<input type="number" name="geography">
							</td>
							<td>
								<p>GDCD</p>
								<input type="number" name="morality">
							</td>
						</tr>
					</table>
				</fieldset>
				<h4>Chú ý: Một số trường thông tin đánh dấu (*) là không bắt buộc nên có thể bỏ qua hoặc cập nhật sau</h4>

        		<button type="reset" class="cancel-btn" name="cancelBtn">Hủy</button>
				<button type="submit" class="cf-btn" name="cfBtn">Lưu</button>		
			</form>
		</div>
	</body>
	<script src="../../js/student/studentChangeProfile.js"></script>
</html>