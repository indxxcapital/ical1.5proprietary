<?php /* Smarty version 2.6.14, created on 2015-08-20 10:52:58
         compiled from casecurities/addnextrunning.tpl */ ?>
<div class="row-fluid">
                    <div class="span22">
                        <div class="box box-magenta">
                            <div class="box-title">
                                <h3><i class="icon-reorder"></i><?php echo $_GET['id']; ?>
 Securities added for index <?php echo $this->_tpl_vars['sessData']['NewIndxxName']; ?>
 </h3>
                                <div class="box-tool">
                                    <a href="#" data-action="collapse"><i class="icon-chevron-up"></i></a>
                                    <a href="#" data-action="close"><i class="icon-remove"></i></a>
                                </div>
                            </div>
                           
                            <div class="box-content" >
                            <div class="form-actions">
                                        <button class="btn btn-primary"  id="addScnt" type="submit" onclick="document.location.href='<?php echo $this->_tpl_vars['BASE_URL']; ?>
index.php?module=casecurities&event=addNewforRunning';"><i class="icon-plus"></i> Add More Securities</button>
                                       <!--  <button class="btn btn-primary"  id="addScnt" type="submit" onclick="document.location.href='<?php echo $this->_tpl_vars['BASE_URL']; ?>
index.php?module=caindex&event=viewupcoming&id=<?php echo $this->_tpl_vars['sessData']['NewIndxxId']; ?>
';"><i class="icon-plus"></i>View</button>-->
                                       
                                       
                                    
                                          <button class="btn btn-primary" name='submit' value="submit" type="submit" onclick="document.location.href='<?php echo $this->_tpl_vars['BASE_URL']; ?>
index.php?module=caindex&event=subindextemp&id=<?php if ($this->_tpl_vars['sessData']['tempindexid']):  echo $this->_tpl_vars['sessData']['tempindexid'];  else:  echo $this->_tpl_vars['sessData']['NewIndxxId'];  endif; ?>';"><i class="icon-ok"></i> Submit Index for Approval</button>
                                       
                                    </div>
                            </div>
                          <!--  <h2><a href="#" id="addScnt">Add Another Input Box</a></h2>-->
                       
                        </div>
                    </div>
                </div>