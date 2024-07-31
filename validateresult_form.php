							<form action= "" method="post">
						<div class="form-group">
							<div class="col-sm-12">
							<label>Year:</label>
							<input class="form-control" name="txtyear" placeholder="Year *" type="number" style="color: black;" required>
							</div>
							</div>
							
							<div class="form-group">
							<div class="col-sm-12">
							<label>Term:</label>

							<select class="form-control" name="cmdterm" id="cmdterm" style="color: black;" required>
  							<option value="">Select Term</option>
 							 <option value="Term 1">Term 1</option>
  							<option value="Term 2">Term 2</option>
  							<option value="Term 3">Term 3</option>
							</select>	
							</div>
							</div>
                         
                           
							<div class="form-group">
							<div class="col-sm-12">
							<label>Exam:</label>
							<select name="cmdexamtype" id="select" class="form-control" required="">
                      <option value = "">--- Select Exam Type ---</option>
                    <?php
                    $queryexam = "SELECT * FROM `tblexamtype` order by exam_name ASC";
                    $db = mysqli_query($conn,$queryexam);
                    while ( $d=mysqli_fetch_assoc($db)) {
                    echo "<option value='".$d['id']."'>".$d['exam_name']."</option>";
                    }?>
                  </select>
							</div>
							</div>
                         
                             <div class="form-group">
							<div class="col-sm-12">
							<label>Class:</label>
							<select name="cmdclass" id="cmdclass" class="form-control" required="">
                      <option value = "">--- Select Class ---</option>
                    <?php
                    $queryclass = "SELECT * FROM `tblclass` order by classname ASC";
                    $db = mysqli_query($conn,$queryclass);
                    while ( $d=mysqli_fetch_assoc($db)) {
                    echo "<option value='".$d['id']."'>".$d['classname']."</option>";
                    }?>
                  </select>
							</div>
							</div>
                         
				<div class="form-group">
  					<div class="col-sm-12">
  			      <label>Student ID :</label>
  			      <input class="form-control" name="txtstudentID" id="txtstudentID" placeholder="Student ID *" type="text" style="color: black;" required>
  				  </div>
					</div>

					<div class="form-group">
  					<div class="col-sm-12">
  			      <label>School ID :</label>
  			      <input class="form-control" name="txtschoolID" id="txtschoolID" placeholder="School ID *" type="text" style="color: black;" required>
  				  </div>
					</div>
					<div class="form-group">
  					<div class="col-sm-12">
  			      <label>PIN :</label>
  			      <input class="form-control" name="txtpin" id="txtpin" placeholder="PIN *" type="password" style="color: black;" required>
  				  </div>
					</div>

					<div class="form-group">
  					<div class="col-sm-12">
  			      <label>Serial No. :</label>
  			      <input class="form-control" name="txtserialno" id="txtserialno" placeholder="Serial No *" type="password" style="color: black;" required>
  				  </div>
					</div>
							
					<div class="row">
								<div class="col-sm-10">
									<button type="submit" name="btncheckresult" class="btn btn-light btn-radius btn-brd grd1">
										Submit
									</button></br>
									
								</div>
							</div>
						</form>