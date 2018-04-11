@extends('users.index')
@section('title', 'Jobs')

@section('content')
<div class="cntntwrpr" ng-controller="ctrlJobList">
	<div class="cntntwrpr_rght">
		<div class="cntnbx">
			<div class="ttl">
			    <h3>Partners</h3>
			    <div class="btmbrdr"><hr></div>
			</div>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, vel? Aperiam nobis delectus dolor vero. Animi soluta, repellat dolor, neque error, esse aliquid nulla repudiandae natus ipsa voluptatem consectetur numquam?
		</div>
		<div class="cntnbx">
			<div class="ttl">
			    <h3>Sponsors</h3>
			    <div class="btmbrdr"><hr></div>
			</div>
			Lorem ipsum dolor sit amet, consectetur adipisicing elit. Repellendus, vel? Aperiam nobis delectus dolor vero. Animi soluta, repellat dolor, neque error, esse aliquid nulla repudiandae natus ipsa voluptatem consectetur numquam?
		</div>
	</div>
	<div class="cntntwrpr_lft">
		<div class="cntnbx">
			<div class="ttl">
			    <h3>Job List</h3>
			    <div class="btmbrdr"><hr></div>
			</div>
			<div id="topfrms" class="row no-gutters">
				<div class="col-lg-4">
					<div class="bx">
						<div class="nptgrp">
    					{{-- <select required>
                <option value=""></option>
              </select> --}}
              <span class="vlue">1-3 weeks</span>
	            <label class="nptlbl">
	            	Work Availability <span>*</span>
	            </label>
	            <span class="btmlbl">
	            	<strong>Change</strong>
	            </span>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="bx">
						<div class="nptgrp">
    					{{-- <select required>
                <option value=""></option>
              </select> --}}
              <span class="vlue">Freelance</span>
	            <label class="nptlbl">
	            	Type of Work <span>*</span>
	            </label>
	            <span class="btmlbl">
	            	<strong>Change</strong>
	            </span>
						</div>
					</div>
				</div>
				<div class="col-lg-4">
					<button class="btn btn-success pvw" type="button" ng-click="viewResume(jpemps)">
						PREVIEW
					</button>
				</div>
			</div>
			<div id="jbs">
				<div class="row no-gutters">
					<div class="col-lg-6">
						<div class="jb">
							<div class="jbttl jbspc">Software Engineer</div>
							<div class="jbcntnt jbspc">
								<div class="jbrate"><span class="crrncy">₱</span> 20,000 - <span class="crrncy">₱</span> 40, 000</div>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Provident dolorum voluptatum quia, rem nulla illo veniam. Sunt consectetur harum vero eius, nulla earum, modi. Perspiciatis aliquid, nisi quasi inventore dolor!
								</p>
							</div>
							<div class="jbftr cntr">
								<button class="btn btn-success">Apply</button>
								<button class="btn btn-primary">View Post</button>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="jb">
							<div class="jbttl jbspc">Software Engineer</div>
							<div class="jbcntnt jbspc">
								<div class="jbrate"><span class="crrncy">₱</span> 20,000 - <span class="crrncy">₱</span> 40, 000</div>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Esse totam velit illo iure eum nulla recusandae ducimus, magni amet? Nesciunt soluta harum quae et modi, praesentium ipsum fuga placeat amet.
								</p>
							</div>
							<div class="jbftr cntr">
								<button class="btn btn-success">Apply</button>
								<button class="btn btn-primary">View Post</button>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="jb">
							<div class="jbttl jbspc">Software Engineer</div>
							<div class="jbcntnt jbspc">
								<div class="jbrate"><span class="crrncy">₱</span> 20,000 - <span class="crrncy">₱</span> 40, 000</div>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Atque nam cum modi porro. Excepturi, adipisci deserunt architecto ad quidem dignissimos neque qui magnam nobis sed, hic voluptatem tempora alias iure?
								</p>
							</div>
							<div class="jbftr cntr">
								<button class="btn btn-success">Apply</button>
								<button class="btn btn-primary">View Post</button>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="jb">
							<div class="jbttl jbspc">Software Engineer</div>
							<div class="jbcntnt jbspc">
								<div class="jbrate"><span class="crrncy">₱</span> 20,000 - <span class="crrncy">₱</span> 40, 000</div>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Pariatur facere qui sequi, dolor accusamus quisquam eos maiores labore architecto harum minima, deleniti aperiam sed repellendus error autem ad illo consequuntur.
								</p>
							</div>
							<div class="jbftr cntr">
								<button class="btn btn-success">Apply</button>
								<button class="btn btn-primary">View Post</button>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="jb">
							<div class="jbttl jbspc">Software Engineer</div>
							<div class="jbcntnt jbspc">
								<div class="jbrate"><span class="crrncy">₱</span> 20,000 - <span class="crrncy">₱</span> 40, 000</div>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Ex iste et, laboriosam adipisci cum quos unde hic commodi delectus consectetur doloremque minus, ducimus sint quo officiis cumque, eaque modi! Alias.
								</p>
							</div>
							<div class="jbftr cntr">
								<button class="btn btn-success">Apply</button>
								<button class="btn btn-primary">View Post</button>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="jb">
							<div class="jbttl jbspc">Software Engineer</div>
							<div class="jbcntnt jbspc">
								<div class="jbrate"><span class="crrncy">₱</span> 20,000 - <span class="crrncy">₱</span> 40, 000</div>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Adipisci eaque repellendus, nisi facere culpa, iure nesciunt deserunt quia non tempora praesentium! Ipsam autem quos, dolorem quis magnam explicabo perspiciatis omnis.
								</p>
							</div>
							<div class="jbftr cntr">
								<button class="btn btn-success">Apply</button>
								<button class="btn btn-primary">View Post</button>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="jb">
							<div class="jbttl jbspc">Software Engineer</div>
							<div class="jbcntnt jbspc">
								<div class="jbrate"><span class="crrncy">₱</span> 20,000 - <span class="crrncy">₱</span> 40, 000</div>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sint facilis neque quo quae porro blanditiis, pariatur quos possimus aspernatur vitae officiis iure consectetur repellat suscipit voluptatibus. Soluta alias, accusamus quo.
								</p>
							</div>
							<div class="jbftr cntr">
								<button class="btn btn-success">Apply</button>
								<button class="btn btn-primary">View Post</button>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="jb">
							<div class="jbttl jbspc">Software Engineer</div>
							<div class="jbcntnt jbspc">
								<div class="jbrate"><span class="crrncy">₱</span> 20,000 - <span class="crrncy">₱</span> 40, 000</div>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nulla vel quidem, quo incidunt, optio, inventore itaque provident sunt recusandae qui cupiditate quis quod veniam quia dolores facilis corporis velit hic.
								</p>
							</div>
							<div class="jbftr cntr">
								<button class="btn btn-success">Apply</button>
								<button class="btn btn-primary">View Post</button>
							</div>
						</div>
					</div>
					<div class="col-lg-6">
						<div class="jb">
							<div class="jbttl jbspc">Software Engineer</div>
							<div class="jbcntnt jbspc">
								<div class="jbrate"><span class="crrncy">₱</span> 20,000 - <span class="crrncy">₱</span> 40, 000</div>
								<p>
									Lorem ipsum dolor sit amet, consectetur adipisicing elit. Mollitia, maiores, molestias. In facere necessitatibus, excepturi praesentium accusantium modi blanditiis repellat quae. Amet perspiciatis placeat, culpa maiores recusan dae magni nulla, minima.
								</p>
							</div>
							<div class="jbftr cntr">
								<button class="btn btn-success">Apply</button>
								<button class="btn btn-primary">View Post</button>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<div class="modal" id="resume_tpl">
	  <div class="modal-dialog modal-lg">
	    <div class="modal-content">
	    	<div ng-include src="'/user/resume'"></div>
		</div>
	  </div>
	</div>
</div>
@endsection