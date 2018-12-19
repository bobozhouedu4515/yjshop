<script src="https://cdn.bootcss.com/sweetalert/2.1.2/sweetalert.min.js"></script>
@if ($errors->any())
    <script>
        swal({
            text: "@foreach ($errors->all() as $error) {{ $error }}\r\n @endforeach",
            icon: "warning",
            button: false
        });
    </script>
@endif
{{--成功提示--}}
@if (session()->has('success'))
    <script>
        swal({
            text: "{{session()->get('success')}}",
            icon: "success",
            button: false
        });
    </script>
@endif
{{--失败提示--}}
@if (session()->has('danger'))
    <script>
        swal({
            text: "{{session()->get('danger')}}",
            icon: "warning",
            button: false
        });
    </script>
@endif






