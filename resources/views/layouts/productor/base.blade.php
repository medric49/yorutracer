<!DOCTYPE html>
<html lang="{{app()->getLocale()}}">
<head>
    @include("includes.links")
    <title>@yield("title","YoruTracer")</title>
    <style>
        body {
            padding-top: 50px;
        }
        #icon {
            width: 30px;
            height: 30px;
        }
        #navbar {
            z-index: 1000;
            position: fixed;
            top: 0px;
            left: 0px;
            right: 0px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.8);
            background-color: white;
            height: 50px;
        }
    </style>
    @yield('style')
</head>
<body>
@include('components.productor.header')
@yield('content')


@include('components.productor.footer')
@include("includes.scripts")
<script>
    $.fn.doPost=function(success,error){

        var $form=$(this);

        $form.on('submit',function(e){
            e.preventDefault();
            var formData = new FormData($form[0]);
            $.ajax({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                url: $form.attr('action'),
                dataType : 'json',
                type: $form.attr('method'),
                data: formData,
                cache: false,
                contentType: false,
                processData: false,
                success:function(response) {
                    if(typeof success=='function'){
                        success(response);
                    }
                },
                error:function(){
                    if(typeof error=='function'){
                        error();
                    }
                }
            });
        })
    };

    var alertBlockchainConnection = function(callback) {
        $.ajax({
            url: 'http://localhost:3001/',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
                'Access-Control-Allow-Origin' : "*"
            },
            dataType: 'json',
            type: 'get',

            success : function (data) {
                if (data.status !== 'yorublockchains')
                    $('#blockchain-modal').modal('show');
                else
                    if (typeof( callback) === 'function')
                        callback()

            },
            error : function () {
                $('#blockchain-modal').modal('show');
            }
        })
    }

    $(function () {
        alertBlockchainConnection();
        $('#blockchain-modal').on('hidden.bs.modal', function (e) {
            alertBlockchainConnection();
        })
    })

</script>
@yield('script')
</body>
</html>
