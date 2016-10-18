<div class="art-postcontent art-postcontent-0 clearfix"><div class="art-content-layout">
                                            <div class="art-content-layout-row">
                                                <div class="art-layout-cell" style="width: 100%" >

                                                </div>
                                            </div>
                                        </div>
										<div class="art-content-layout">
                                            <div class="art-content-layout-row">
                                                <div class="art-layout-cell" style="width: 50%" >

                                                    <form method="get" action="" autocomplete="off">
					                                    <div class="two">
                                                        <label>Bank Name</label>
                                                        <input   class="form-control input-medium" type="text" name="name" placeholder="Enter Bank Name" title="Enter Bank Name" required/>

                                                        <label>Bank Branch</label>
                                                        <input   class="form-control input-medium" type="text" name="branch" required placeholder="Bank Branch" title="Enter Bank Branch"/>

                                                        <label>Account No</label>
                                                        <input   class="form-control input-medium" type="text" name="accno" required placeholder="Account Number" title="Enter Account Number"/>

                                                        <label>Amount</label>
                                                        <input   class="form-control input-medium" type="number" step="0.01" name="amt" required placeholder="Enter Amount" title="Enter Amount"/>


                                                        <label>Type</label>
                                                        <select  class="form-control input-medium"  name="type" required title="Enter Transaction type">
                                                                <option></option>
                                                                <option>Deposit</option>
                                                                <option>Withdrawal</option>
                                                            </select>

                                                        <label>Approving Officer</label>
                                                        <input   class="form-control input-medium" type="text" name="approvby" required placeholder="Enter Approving Officer" title="Enter Approving Officer"/>

                                                        <label>Mode of Payment</label>
                                                        <select  class="form-control input-medium"  name="mode" required title="Enter Transaction type">
                                                                <option></option>
                                                                <option>Cash</option>
                                                                <option>Cheque</option>
                                                            </select>
                                                        <label>Comments</label>
                                                        <input   class="form-control input-medium" type="text" name="comments" placeholder="Enter Comments" title="Enter Comments" />

														<label>Date</label>
                                                        <input   class="form-control input-medium" type="text" name="date" maxlength="11" value="' . date("d-M-Y") . '" placeholder="Enter Date of Banking" title="Enter Date of Banking" required/>

                                                        <input   class="form-control input-medium" type="hidden"  name="transid" value="' . gmdate("dmyhisG") . '"/>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="art-content-layout">
                                            <div class="art-content-layout-row">
                                                <div class="art-layout-cell" style="width: 50%" >
                                                    <div class="two">
                                                        <br><br><button  class="btn green"  name="submit">Save</button>
                                                         </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                 </div>