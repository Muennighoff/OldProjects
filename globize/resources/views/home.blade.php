
@extends('layouts.app')

@section('content')

<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
<script>
	WebFont.load({
		google: {"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]},
		active: function () {
			sessionStorage.fonts = true;
		}
	});
</script>

<!--end::Web font -->

<!--begin::Global Theme Styles -->
<link href="{{ asset('assets/vendors/base/vendors.bundle.css') }}" rel="stylesheet" type="text/css" />

<!--RTL version:<link href="assets/vendors/base/vendors.bundle.rtl.css" rel="stylesheet" type="text/css" />-->
<link href="{{ asset('assets/demo/demo2/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />

<!--RTL version:<link href="assets/demo/demo2/base/style.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

<!--end::Global Theme Styles -->

<!--begin::Page Vendors Styles -->
<link href="{{ asset('assets/vendors/custom/fullcalendar/fullcalendar.bundle.css')}}" rel="stylesheet" type="text/css" />

<!--RTL version:<link href="assets/vendors/custom/fullcalendar/fullcalendar.bundle.rtl.css" rel="stylesheet" type="text/css" />-->

<!--end::Page Vendors Styles -->
<link href="{{ asset('worldmap/include/spectrum.css') }}" rel="stylesheet">
<link href="{{ asset('worldmap/include/jquery.switchButton.css') }}" rel="stylesheet">
<link href="{{ asset('worldmap/styles.css') }}" rel="stylesheet">


<!--begin:: Global Mandatory Vendors -->
<link href="{{ asset('metronic/vendors/perfect-scrollbar/css/perfect-scrollbar.css') }}" rel="stylesheet" type="text/css" />

<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<link href="{{ asset('metronic/vendors/tether/dist/css/tether.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/bootstrap-datepicker/dist/css/bootstrap-datepicker3.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/bootstrap-datetime-picker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/bootstrap-daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/bootstrap-switch/dist/css/bootstrap3/bootstrap-switch.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/bootstrap-select/dist/css/bootstrap-select.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/select2/dist/css/select2.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/nouislider/distribute/nouislider.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/owl.carousel/dist/assets/owl.carousel.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/owl.carousel/dist/assets/owl.theme.default.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/ion-rangeslider/css/ion.rangeSlider.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/ion-rangeslider/css/ion.rangeSlider.skinFlat.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/dropzone/dist/dropzone.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/summernote/dist/summernote.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/bootstrap-markdown/css/bootstrap-markdown.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/animate.css/animate.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/toastr/build/toastr.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/jstree/dist/themes/default/style.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/morris.js/morris.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/chartist/dist/chartist.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/sweetalert2/dist/sweetalert2.min.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/socicon/css/socicon.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/vendors/line-awesome/css/line-awesome.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/vendors/flaticon/css/flaticon.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/vendors/metronic/css/styles.css') }}" rel="stylesheet" type="text/css" />
<link href="{{ asset('metronic/vendors/vendors/fontawesome5/css/all.min.css') }}" rel="stylesheet" type="text/css" />

<link href="{{ asset('metronic/demo/base/style.bundle.css') }}" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="{{ asset('metronic/demo/media/img/logo/favicon.ico') }}" />

<link href="{{ asset('css/home.css') }}" rel="stylesheet">

<script src="http://js.api.here.com/v3/3.0/mapsjs-core.js" type="text/javascript" charset="utf-8"></script>
<script src="http://js.api.here.com/v3/3.0/mapsjs-service.js" type="text/javascript" charset="utf-8"></script>

<style>
	.ui-combobox {
		position: relative;
		display: inline-block;
	}
	.ui-combobox-button {
		position: absolute;
		top: 0;
		bottom: 0;
		margin-left: -1px;
		padding: 0;
		/* adjust styles for IE 6/7 */
		*height: 1.7em;
		*top: 0.1em;
	}
</style>

<div class="page-wrapper" style="background-color:black">
	@include('include/topbar')
	<button id="btn-1" class="btn m-btn--square  btn-success m-btn m-btn--custom m-btn--bolder m-btn--uppercase" data-toggle="modal" data-target="#m_modal_1">Search for friends</button>
	<button id="btn-2" class="btn m-btn--pill m-btn--air btn-success"><i class="socicon-google" data-toggle="modal" data-target="#m_modal_2"></i></button>
	<button id="btn-3" class="btn m-btn--square  btn-success m-btn m-btn--custom m-btn--bolder m-btn--uppercase" data-toggle="modal" data-target="#m_modal_3">Invite Friend</button>
	<button id="btn-4" class="btn m-btn--pill m-btn--air btn-success" data-toggle="modal" data-target="#m_modal_4">Setting</button>

	<!--begin::Modal-->
	<div class="modal fade align-items-center" id="m_modal_1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm align-items-center" role="document">
			<div class="modal-content" style="width:720px; margin-left:-200px">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Search for friends</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="m-stack__item m-stack__item--middle m-dropdown m-dropdown--arrow m-dropdown--large m-dropdown--mobile-full-width m-dropdown--align-right m-dropdown--skin-light m-header-search m-header-search--expandable- m-header-search--skin-" id="m_quicksearch" m-quicksearch-mode="default"; width:620px; margin-left:50px">
					<span class="m-header-search__icon-search" id="search_word">
						<i class="la la-search"></i>
					</span>
					<span class="m-header-search__input-wrapper">
						<input autocomplete="off" type="text" name="q" class="m-header-search__input" value="" placeholder="Search..." id="search_friend" style="width:670px;">
					</span>
					<span class="m-header-search__icon-close" id="m_quicksearch_close" style="visibility: visible;">
						<i class="la la-remove"></i>
					</span>
					<span class="m-header-search__icon-cancel" id="m_quicksearch_cancel" style="visibility: hidden;">
						<i class="la la-remove"></i>
					</span>
				</div>
				<div class="m-content">
					<div class="row">
						<div class="col-md-12">
							
							<div class="m-portlet m-portlet--full-height ">
								
								<div class="m-portlet__body">
									<div class="tab-content">
										<div class="tab-pane active show" id="m_widget4_tab1_content">

											<!--begin::Widget 14-->
											<div class="m-widget4" id="main_div">

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
						
						<!--end::Search Results -->
				</div>
			</div>
		</div>
	</div>

	<!--end::Modal-->


	<!--begin::Modal-->
	<div class="modal fade" id="m_modal_2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content" style="width:720px; margin-left:-100px;">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Groups</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body" id="div_group_name" >
					<input type="text" placeholder="Group Name" id="group_name" style="width:100%">
				</div>
				<div class="modal-body" id="alert_group" style="color:blue; margin-left:130px; margin-top:-30px;">
				</div>
				<div class="m-content">
					<div class="row">
						<div class="col-md-12">
							
							<div class="m-portlet m-portlet--full-height ">
								
								<div class="m-portlet__body">
									<div class="tab-content">
										<div class="tab-pane active show" id="m_widget4_tab1_content">

											<!--begin::Widget 14-->
											<div class="m-widget4" id="main_div1">

											</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--end::Search Results -->
				</div>
				<div class="modal-footer" id="div_button">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" onclick="create_group()">Create</button>
				</div>
			</div>
		</div>
	</div>

	<!--end::Modal-->

	<!--begin::Modal-->
	<div class="modal fade" id="m_modal_3" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Friend Request</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="POST" action="{{ url('/invite')}}" id="inviteForm">
						@csrf
						<div class="form-group">
							<label for="friend_name" class="form-control-label">Name:</label>
							<div class="ui-widget" style="display:none;">
								<select id="friend_list">
									@foreach($friends as $key => $friend)
									<option value="{{ $friend['lat'] . ":" . $friend['lng'] }}">{{$friend['name']}}</option>
									@endforeach
								</select>
							</div>
							<input type="text" class="form-control" name="friend_name">
							<input type="hidden" name="social_type">
							<input type="hidden" name="current_user" id="current_user" value="{{ $currentUser }}">
						</div>
						<div class="form-group">
							<label for="recipient-name" class="form-control-label">SocialType:</label>
							<div class="social-box">
								<ul>
									<li><i class="socicon-google"></i></li>
									<li><i class="socicon-facebook"></i></li>
									<li><i class="socicon-twitter"></i></li>
									<li><i class="socicon-istock"></i></li>
									<li><i class="socicon-rss"></i></li>
								</ul>
								<ul>
									<li><i class="socicon-paypal"></i></li>
									<li><i class="socicon-qq"></i></li>
									<li><i class="socicon-mail"></i></li>
									<li><i class="socicon-outlook"></i></li>
									<li><i class="socicon-dribbble"></i></li>
								</ul>
								<ul>
									<li><i class="socicon-apple"></i></li>
									<li><i class="socicon-bebo"></i></li>
									<li><i class="socicon-skype"></i></li>
									<li><i class="socicon-lastfm"></i></li>
									<li><i class="socicon-baidu"></i></li>
								</ul>
							</div>
						</div>
					</form>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary" id="send_invite">Invite</button>
				</div>
			</div>
		</div>
	</div>

	<!--end::Modal-->


	<!--begin::Modal-->
	<div class="modal fade" id="m_modal_4" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog modal-sm" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Settings:</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<h5>Item1:</h5>
					<p>This is first item</p>
					<hr>
					<h5>Item2:</h5>
					<p>Thi is second item</p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-primary">Send message</button>
				</div>
			</div>
		</div>
	</div>

	<!--end::Modal-->


	<div class="page-container">
		@if (session('status'))
		<div class="alert alert-success">
			{{ session('status') }}
		</div>
		@endif
	</div>
	<div class="worldMap">
		<div id="globe" style=""></div>
		<div id="options" style="display: none;"></div>
		<input type="hidden" name="latitude" value="{{ $latitude }}" />
		<input type="hidden" name="longitude" value="{{ $longitude }}" />
		<input type="hidden" name="redirect" value="{{ url('/location') }}">
	</div>
</div>

<script src="{{asset('worldmap/include/jquery.min.js')}}"></script>
<script src="{{asset('worldmap/include/jqueryui.js')}}"></script>
<script src="{{asset('worldmap/include/spectrum.js')}}"></script>
<script src="{{asset('worldmap/include/jquery.switchButton.js')}}"></script>
<script src="{{asset('worldmap/include/pusher.color.js')}}"></script>
<script src="{{asset('worldmap/include/Detector.js')}}"></script>
<script src="{{asset('worldmap/data.js')}}"></script>
<script src="{{asset('worldmap/grid.js')}}"></script>
<script src="{{asset('worldmap/build/encom-globe.js')}}"></script>
<script src="{{asset('worldmap/index.js')}}"></script>

<!--begin:: Global Mandatory Vendors -->
<script src="{{asset('metronic/vendors/jquery/dist/jquery.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/popper.js/dist/umd/popper.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/bootstrap/dist/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/js-cookie/src/js.cookie.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/moment/min/moment.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/tooltip.js/dist/umd/tooltip.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/perfect-scrollbar/dist/perfect-scrollbar.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/wnumb/wNumb.js') }}" type="text/javascript"></script>
<!--end:: Global Mandatory Vendors -->

<!--begin:: Global Optional Vendors -->
<script src="{{asset('metronic/vendors/jquery.repeater/src/lib.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/jquery.repeater/src/jquery.input.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/jquery.repeater/src/repeater.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/jquery-form/dist/jquery.form.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/block-ui/jquery.blockUI.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/js/framework/components/plugins/forms/bootstrap-datepicker.init.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/bootstrap-datetime-picker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/js/framework/components/plugins/forms/bootstrap-timepicker.init.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/bootstrap-daterangepicker/daterangepicker.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/js/framework/components/plugins/forms/bootstrap-daterangepicker.init.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/bootstrap-touchspin/dist/jquery.bootstrap-touchspin.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/bootstrap-maxlength/src/bootstrap-maxlength.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/bootstrap-switch/dist/js/bootstrap-switch.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/js/framework/components/plugins/forms/bootstrap-switch.init.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/vendors/bootstrap-multiselectsplitter/bootstrap-multiselectsplitter.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/bootstrap-select/dist/js/bootstrap-select.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/select2/dist/js/select2.full.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/typeahead.js/dist/typeahead.bundle.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/handlebars/dist/handlebars.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/inputmask/dist/jquery.inputmask.bundle.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/inputmask/dist/inputmask/inputmask.date.extensions.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/inputmask/dist/inputmask/inputmask.numeric.extensions.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/inputmask/dist/inputmask/inputmask.phone.extensions.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/nouislider/distribute/nouislider.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/owl.carousel/dist/owl.carousel.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/autosize/dist/autosize.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/clipboard/dist/clipboard.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/ion-rangeslider/js/ion.rangeSlider.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/dropzone/dist/dropzone.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/summernote/dist/summernote.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/markdown/lib/markdown.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/bootstrap-markdown/js/bootstrap-markdown.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/js/framework/components/plugins/forms/bootstrap-markdown.init.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/jquery-validation/dist/jquery.validate.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/jquery-validation/dist/additional-methods.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/js/framework/components/plugins/forms/jquery-validation.init.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/bootstrap-notify/bootstrap-notify.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/js/framework/components/plugins/base/bootstrap-notify.init.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/toastr/build/toastr.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/jstree/dist/jstree.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/raphael/raphael.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/morris.js/morris.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/chartist/dist/chartist.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/chart.js/dist/Chart.bundle.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/js/framework/components/plugins/charts/chart.init.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/vendors/bootstrap-session-timeout/dist/bootstrap-session-timeout.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/vendors/jquery-idletimer/idle-timer.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/waypoints/lib/jquery.waypoints.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/counterup/jquery.counterup.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/es6-promise-polyfill/promise.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/sweetalert2/dist/sweetalert2.min.js') }}" type="text/javascript"></script>
<script src="{{asset('metronic/vendors/js/framework/components/plugins/base/sweetalert2.init.js') }}" type="text/javascript"></script>

<!--begin::Global Theme Bundle -->
<script src="{{ asset('metronic//demo/base/scripts.bundle.js') }}" type="text/javascript"></script>
<script src="//js.pusher.com/3.1/pusher.min.js"></script>
<script src="{{ asset('js/home.js') }}" type="text/javascript"></script>
<script type="text/javascript">
	function fetch_user_data(query = ''){
		$.ajax({
			url:"{{ route('home.search')}}",
			method:'GET',
			data:{query:query},
			datatype:'json',
			success:function(user_data){
				real_user = $.parseJSON(user_data);
				real_datas=real_user['table_data'];
				var main_div = document.getElementById('main_div');
				main_div.innerHTML = '';
				for(var i = 0; i < real_datas.length; i++) {
					console.log(real_user['total_data']);

					 var real_data = real_datas[(real_datas.length - 1 - i)];
					 var user_info_div = document.createElement('div');
					 user_info_div.classList.add('m-widget4__item');
					 user_info_div.style.width="700px";

					 var img_div = document.createElement('div');
					 img_div.classList.add('m-widget4__img', 'm-widget4__img--pic');
					 var user_img = document.createElement('img');
					 user_img.src = 'assets/app/media/img/users/100_4.jpg';
					 img_div.appendChild(user_img);

					 var info_div = document.createElement('div');
					 info_div.classList.add('widget4__info');					 
					 var name_span = document.createElement('span');
					 name_span.classList.add('widget4__title');
					 name_span.innerHTML = '<b>'+real_data.name+'</b><br>';
					 info_div.appendChild(name_span);
					 var email_span = document.createElement('span');
					 email_span.classList.add('widget4__sub');
					 email_span.innerHTML = real_data.email;
					 info_div.appendChild(email_span);
					 info_div.style.marginLeft="-130px";
					 info_div.style.marginTop="20px";
					
					 var button_div = document.createElement('div');
					 button_div.classList.add('widget4__ext');
					 var request_button = document.createElement('button');
					 request_button.classList.add('m-btn', 'm-btn--pill', 'm-btn--hover-brand', 'btn', 'btn-sm', 'btn-secondary');
					 request_button.setAttribute("id", real_data.id);
					 request_button.appendChild(document.createTextNode("Request"));
					 request_button.addEventListener('click', function(e) {
						 var id = e.target.getAttribute('id');
						 invite_to_group(id);
					 });
					 button_div.appendChild(request_button);
					 button_div.style.marginLeft="70px";
					 user_info_div.appendChild(img_div);	 
					 user_info_div.appendChild(info_div);
					 user_info_div.appendChild(button_div);
					 main_div.appendChild(user_info_div);
				}
			}
		});
	}
	$('#search_friend').keypress(function (e) {
	if (e.which == 13) {
			var query= $(this).val();
			fetch_user_data(query); 
	}
	});
	function friend_request(id){
		$.ajax({
			url:"{{ route('home.friend_request')}}",
			method:'GET',
			data:{id:id},
			datatype:'json',
			success:function(user_data){
				real_user = $.parseJSON(user_data);
				document.getElementById(id).innerHTML = "Request Sent";
				document.getElementById(id).disabled = true;
			}
		});
	}

	function invite_to_group(id){
		alert(id);
		$.ajax({
			url:"{{ route('home.invite_to_group')}}",
			method:'GET',
			data:{id:id},
			datatype:'json',
			success:function(){
				document.getElementById(id).innerHTML = "Invitation Sent";
				document.getElementById(id).disabled = true;
			}
		});
	}
	function create_group(){
		var group_name=document.getElementById('group_name').value;
		$.ajax({
			url:"{{ route('home.create_group')}}",
			method:'GET',
			data:{group_name:group_name},
			datatype:'json',
			success:function(friends){
				friends =$.parseJSON(friends);
				console.log(friends)
				document.getElementById("alert_group").innerHTML = "Group created!!! Please invite your friends to your group";
				document.getElementById("group_name").style.display = "none";
				var main_div = document.getElementById('main_div');
				main_div1.innerHTML = '';
				for(var i = 0; i < friends.length; i++) {
					
					 var real_data = friends[(friends.length - 1 - i)];
					 console.log(real_data.id);
					 var user_info_div = document.createElement('div');
					 user_info_div.classList.add('m-widget4__item');
					 user_info_div.style.width="700px";

					 var img_div = document.createElement('div');
					 img_div.classList.add('m-widget4__img', 'm-widget4__img--pic');
					 var user_img = document.createElement('img');
					 user_img.src = 'assets/app/media/img/users/100_4.jpg';
					 img_div.appendChild(user_img);

					 var info_div = document.createElement('div');
					 info_div.classList.add('widget4__info');					 
					 var name_span = document.createElement('span');
					 name_span.classList.add('widget4__title');
					 name_span.innerHTML = '<b>'+real_data.name+'</b><br>';
					 info_div.appendChild(name_span);
					 var email_span = document.createElement('span');
					 email_span.classList.add('widget4__sub');
					 email_span.innerHTML = real_data.email;
					 info_div.appendChild(email_span);
					 info_div.style.marginLeft="0px";
					 info_div.style.marginTop="0px";
					 info_div.style.width="40px";
					
					 var button_div = document.createElement('div');
					 button_div.classList.add('widget4__ext');
					 var request_button = document.createElement('button');
					 request_button.classList.add('m-btn', 'm-btn--pill', 'm-btn--hover-brand', 'btn', 'btn-sm', 'btn-secondary');
					 request_button.setAttribute("id", real_data.id);
					 request_button.appendChild(document.createTextNode("Invite to Group"));
					 request_button.addEventListener('click', function(e) {
						 var id = e.target.getAttribute('id');
						 invite_to_group(id);
					 });
					 button_div.style.width="100px";
					 button_div.appendChild(request_button);
					 button_div.style.marginLeft="470px";
					 button_div.style.marginTop="-30px";
					 user_info_div.appendChild(img_div);	 
					 user_info_div.appendChild(info_div);
					 user_info_div.appendChild(button_div);
					 main_div1.appendChild(user_info_div);
				}
			}
		});
	}
</script>
@endsection

