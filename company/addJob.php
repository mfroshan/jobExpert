            <button 
              style="float:right; margin-left:20px; margin-top:7.5px;"
              type="button" 
              class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#basicModal">
                Add Jobs
              </button>
              </i>
              <div class="modal fade" id="basicModal" tabindex="-1">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Add Job</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                              <form method="POST">
                                  <div class="form-group">
                                    <label for="exampleInputEmail1">Job Name</label>
                                    <input type="text" class="form-control" id="jobname" name="jobname" aria-describedby="Job Name" placeholder="Job Name" required>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Job Category</label>
                                    <button type="button" id="addc"class="btn btn-primary" onclick="activate()" 
                                    style="margin-top: 10px; margin-bottom:10px;">Add category</button>
                                    <button type="button" id="selectc" class="btn btn-primary" onclick="re()" 
                                    style="margin-top: 10px; margin-bottom:10px;">select category</button>
                                    <select class="form-select" name="selectCategory" id="selectCategory"
                                    >
                                    <option selected></option>
                                    <?php 
                                         $q = $conn->query('select * from category');
                                         while($res = $q->fetch_assoc()){
                                           ?>
                                            <option value="<?php echo $res['cat_id']?>">
                                                <?php echo $res['cat_name'] ?>
                                            </option>
                                           
                                    <?php
                                         }
                                    ?>
                                         
                                    </select>
                                    
                                    <input type="text" class="form-control" id="catname" name="catname" aria-describedby="cat" placeholder="Category">
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Job Description</label>
        
                                    <textarea name="editor" class="form-control" id="editor" rows="3"
                                    ></textarea>
                                  </div>
                                  
                    </div>
                    <div class="modal-footer">
                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                      <button type="submit" name="add" class="btn btn-primary">Save</button>
                    </div>
                    </form>
                  </div>
                </div>
</div>