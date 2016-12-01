<div class="middle-content" style="min-height:400px">
	<div class="100%">	
	<div class="col-md-6">
                    <!--statistics start-->
                    <div class="row state-overview">
                        <div class="col-xs-12 col-sm-6">
                            <div class="panel purple">
                                <div class="symbol">
                                    <i class="fa fa-gavel"></i>
                                </div>
                                <div class="state-value">
                                    <div class="value"><?php 
									if($count_project == "0")
									{
										echo "0";
									}
									else
									{
										echo $count_project;
									}
									?>
									</div>
                                    <div class="title">Available Projects</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
							<div class="new-ticket">
									<a href="<?php echo base_url();?>index.php/ticket"><?php echo $new_ticket_response; ?></a>
								</div>
                            <div class="panel red">
								
                                <div class="symbol">
                                    <i class="fa fa-tags"></i>
                                </div>
                                <div class="state-value">
                                    <div class="value"><?php echo $count_response; ?></div>
                                    <div class="title">New response</div>
                                </div>
                            </div>
                        </div>
                    </div>
                  <!--  <div class="row state-overview">
                        <div class="col-xs-12 col-sm-6">
                            <div class="panel blue">
                                <div class="symbol">
                                    <i class="fa fa-money"></i>
                                </div>
                                <div class="state-value">
                                    <div class="value">22014</div>
                                    <div class="title"> Total Revenue</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xs-12 col-sm-6">
                            <div class="panel green">
                                <div class="symbol">
                                    <i class="fa fa-eye"></i>
                                </div>
                                <div class="state-value">
                                    <div class="value">390</div>
                                    <div class="title"> Unique Visitors</div>
                                </div>
                            </div>
                        </div>
                    </div>-->
                    <!--statistics end-->
                </div>
				</div>
				
				
			<!--	<div class="col-md-4">

                    <div class="panel green-box">
                        <div class="panel-body extra-pad">
                            <div class="row">
                                <div class="col-sm-6 col-xs-6">
                                    <div class="knob">
                                        <span class="chart" data-percent="79">
                                            <span class="percent">10,000 <span class="sm">Remaining Payment</span></span>
                                        </span>
                                    </div>
                                </div>
                                <div class="col-sm-6 col-xs-6">
                                    <div class="knob">
                                        <span class="chart" data-percent="56">
                                            <span class="percent">20,000 <span class="sm">Total Payment</span></span>
                                        </canvas></span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>-->
</div>
		
