<?php
//subject list

class checkboxlist{
	public function sublist()
	{
		echo'
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="Hindi"><span>Hindi</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="English"><span>English</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="Math"><span>Math</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="Social Science"><span>Social Science</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="General Science"><span>General Science</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="Statistics"><span>Statistics</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="Physics"><span>Physics</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="Chemistry"><span>Chemistry</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="Biology"><span>Biology</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="Sociology"><span>Sociology</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="Economics"><span>Economics</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="Accounting"><span>Accounting</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="History"><span>History</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="Finance"><span>Finance</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="AIML"><span>AIML</span></div>
			<div class="divp35"><input type="checkbox" name="sub_list[]" value="Computer Science"><span>Computer Science</span></div>
		';
	}
	//sub list unchecked box
	public function sublistcombo()
	{
		echo'
			<select name="sublistcombo" style="width: 180px;">
					
			  <option value="None">None</option>
			  <option value="Hindi">Hindi</option>
			  <option value="English">English</option>
			  <option value="Math">Math</option>
			  <option value="Social Science">Social Science</option>
			  <option value="General Science">General Science</option>
			  <option value="Statistics">Statistics</option>
			  <option value="Physics">Physics</option>
			  <option value="Chemistry">Chemistry</option>
			  <option value="Biology">Biology</option>
			  <option value="Sociology">Sociology</option>
			  <option value="Economics">Economics</option>
			  <option value="Accounting">Accounting</option>
			  <option value="History">History</option>
			  <option value="Finance">Finance</option>
			  <option value="AIML">AIML</option>
			  <option value="Computer Science">Computer Science</option>
			</select>


		';
	}

	public function classlist()
	{
		echo ' 
			<div class="divp35"><input type="radio" name="class_list[]" value="One-Three"><span>One-Three</span></div>
			<div class="divp35"><input type="radio" name="class_list[]" value="Four-Five"><span>Four-Five</span></div>
			<div class="divp35"><input type="radio" name="class_list[]" value="Six-Seven"><span>Six-Seven</span></div>
			<div class="divp35"><input type="radio" name="class_list[]" value="Eight"><span>Eight</span></div>
			<div class="divp35"><input type="radio" name="class_list[]" value="Nine-Ten"><span>Nine-Ten</span></div>
			<div class="divp35"><input type="radio" name="class_list[]" value="Eleven-Twelve"><span>Eleven-Twelve</span></div>
			<div class="divp35"><input type="radio" name="class_list[]" value="College Level"><span>College Level</span></div>
		    <div class="divp35"><input type="radio" name="class_list[]" value="University Level"><span>University Level</span></div>
			';
	}

	public function classlistcombo()
	{
		echo '
			<select style="width: 180px;" name="classlistcombo">
					
			  <option value="None">None</option>
			  <option value="One-Three">One-Three</option>
			  <option value="Four-Five">Four-Five</option>
			  <option value="Six-Seven">Six-Seven</option>
			  <option value="Eight">Eight</option>
			  <option value="Nine-Ten">Nine-Ten</option>
			  <option value="Eleven-Twelve">Eleven-Twelve</option>
			  <option value="College Level">College Level</option> 
			  <option value="University Level">University Level</option>
			</select>
		';
	}

	public function mediumlist()
	{
		echo '
			<div class="divp35"><input  type="radio" name="medium_list[]" value="Hindi"><span>Hindi</span></div>
			<div class="divp35"><input  type="radio" name="medium_list[]" value="English"><span>English</span></div>
			<div class="divp35"><input  type="radio" name="medium_list[]" value="Any"><span>Any</span></div>
		';
	}

	public function mediumlistcombo()
	{
		echo '
			<select name="mediumlistcombo" style="width: 180px;">
					
			  <option value="None">None</option>
			  <option value="Hindi">Hindi</option>
			  <option value="English">English</option>
			  <option value="Any">Any</option>
			</select>
		';
	}
}

?>