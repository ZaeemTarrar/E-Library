<!DOCTYPE html>
<html lang="en">

@include('shared.head')

<body class="no-skin">

	@include('shared.mainmenu')

	<div class="main-container ace-save-state" id="main-container">

		@include('shared.sidemenu')

		<div class="main-content">
			<div class="main-content-inner">

				@include('shared.breadcrumb')

				<div class="page-content">
					{{-- <div class="page-header">
							<h1>
								Dashboard
							</h1>
						</div><!-- /.page-header -->  --}}

					<div class="row">
						<div class="col-xs-12">
							@yield('content')
						</div><!-- /.col -->
					</div><!-- /.row -->
				</div><!-- /.page-content -->
			</div>
		</div><!-- /.main-content -->


	</div><!-- /.main-container -->

	@include('shared.footer')

</body>

@include('shared.foot')

@include('shared.toasts')

</html>