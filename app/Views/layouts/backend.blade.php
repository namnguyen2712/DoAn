<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Quản trị | CHBT</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="{{ url('/') }}/public/backend/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/public/backend/css/font-awesome.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/public/backend/css/AdminLTE.css">
  <link rel="stylesheet" href="{{ url('/') }}/public/backend/css/_all-skins.min.css">
  <link rel="stylesheet" href="{{ url('/') }}/public/backend/css/jquery-ui.css">
  <link rel="stylesheet" href="{{ url('/') }}/public/backend/css/style.css" />
  <link rel="stylesheet" href="{{ url('/') }}/public/backend/Ionicons/css/ionicons.min.css">


  <link rel="stylesheet" href="{{ url('/') }}/public/backend/css/datepicker3.css" />
  <link rel="stylesheet" href="{{ url('/') }}/public/backend/css/datepicker3.css" />
  <script src="{{ url('/') }}/public/backend/js/angular.min.js"></script>
  <script src="{{ url('/') }}/public/backend/js/app.js"></script>
  <script src="https://cdn.rawgit.com/SheetJS/js-xlsx/master/dist/xlsx.full.min.js"></script>
  <script src="{{ url('/') }}/public/backend/js/lumino.glyphs.js"></script>
  <script src="{{ url('/') }}/public/plugin/ckeditor/ckeditor.js"></script>
</head>
<body class="hold-transition skin-green sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
<!-- Chèn header layout -->
  @include('layouts.backend-header')

  <!-- =============================================== -->

  <!-- Left side column. contains the sidebar -->
  @include('layouts.backend-sidebar')

  <!-- =============================================== -->

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <!-- Tiêu đề  -->
        @yield('title')
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
      <div class="box">
        <div class="box-header with-border">
          <h3 class="box-title">@yield('box-title')</h3>

          <div class="box-tools pull-right">
            <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip"
                    title="Collapse">
              <i class="fa fa-minus"></i></button>
            <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="Remove">
              <i class="fa fa-times"></i></button>
          </div>
        </div>
        <div class="box-body">
          @yield('box-body')
        </div>
        <!-- /.box-body -->
        <div class="box-footer">
          @yield('box-footer')
        </div>
        <!-- /.box-footer-->
      </div>
      <!-- /.box -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <footer class="main-footer" style="height: 50px;">
    <div class="pull-right hidden-xs" style="padding-bottom: 10px;">

    </div>

  </footer>

</div>
<!-- ./wrapper -->


<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="{{ url('/') }}/public/backend/js/jquery.min.js"></script>
<script src="{{ url('/') }}/public/backend/js/jquery-ui.js"></script>
<script src="{{ url('/') }}/public/backend/js/bootstrap.min.js"></script>
<script src="{{ url('/') }}/public/backend/js/adminlte.min.js"></script>
<script src="{{ url('/') }}/public/backend/js/dashboard.js"></script>
<script src="{{ url('/') }}/public/backend/tinymce/tinymce.min.js"></script>
<script src="{{ url('/') }}/public/backend/tinymce/config.js"></script>
<script src="{{ url('/') }}/public/backend/js/function.js"></script>
<script src="{{ url('/') }}/public/backend/js/ajax.js"></script>
<script src="{{ url('/') }}/public/backend/js/excel.js"></script>
<script src="{{ url('/') }}/public/backend/js/morris.js"></script>

<script src="{{ url('/') }}/public/backend/js/chart.min.js"></script>
<script src="{{ url('/') }}/public/backend/js/chart-data.js"></script>
<script src="{{ url('/') }}/public/backend/js/easypiechart.js"></script>
<script src="{{ url('/') }}/public/backend/js/easypiechart-data.js"></script>
<script src="{{ url('/') }}/public/backend/js/bootstrap-datepicker.js"></script>
<script>
    $('#calendar').datepicker({
    });

    !function ($) {
        $(document).on("click","ul.nav li.parent > a > span.icon", function(){
            $(this).find('em:first').toggleClass("glyphicon-minus");
        });
        $(".sidebar span.icon").find('em:first').addClass("glyphicon-plus");
    }(window.jQuery);

    $(window).on('resize', function () {
      if ($(window).width() > 768) $('#sidebar-collapse').collapse('show')
    })
    $(window).on('resize', function () {
      if ($(window).width() <= 767) $('#sidebar-collapse').collapse('hide')
    })
  </script>
 @if(Session::has('success'))
      <div class="modal fade" id="modal-id">
      <div class="alert alert-success text-center">
        <strong>{!! Session::get('success') !!}</strong> ...
      </div>
    </div>
    <script type="text/javascript">
      $('#modal-id').modal('show');
      setTimeout(function() {
          $('#modal-id').modal('hide');
      }, 1000);
    </script>
   @endif

   @if(Session::has('error'))
      <div class="modal fade" id="modal-id-er">
      <div class="alert alert-danger text-center">
        <strong>{!! Session::get('error') !!}</strong> ...
      </div>
    </div>
    <script type="text/javascript">
      $('#modal-id-er').modal('show');
    </script>
   @endif
</body>
</html>
