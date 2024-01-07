@extends('layouts.master')

@section('content')

<div id="main-content">
    <div class="container-fluid">
        <!-- ... Diğer HTML içeriği ... -->

        <div class="col-lg-12">
            <div class="card chat-app">
                <div class="chat">
                    <!-- ... Diğer chat içeriği ... -->
                    <div class="chat-history" id="chat-history">
                        <ul class="mb-0" id="chat-history-list">
                            <!-- Mesajlar burada dinamik olarak eklenecek -->
                        </ul>
                    </div>
                    <div class="chat-message clearfix">
                        <div class="input-group mb-0">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="button-submit"><i class="icon-paper-plane"></i></span>
                            </div>
                            <input type="text" class="form-control" placeholder="Enter text here..." id="input">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
$(document).ready(function () {
    $.ajaxSetup({
    headers: {
        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    }
});
    $('#button-submit').on('click', function () {
        var value = $('#input').val();

        $('#chat-history-list').append('<li class="clearfix"><div class="message-data text-right"><span class="message-data-time">10:10 AM, Today</span><img src="../assets/images/xs/avatar2.jpg" alt="avatar"></div><div class="message other-message float-right">' + value + '</div></li>');

        $.ajax({
            url: "{{ route('chat') }}",
            type: 'POST',
            data: {
                'input': value
            },
            success: function (data) {
                console.log("Başarıyla gönderildi. Sunucu cevabı:", data);
            },
            error: function (xhr, status, error) {
                console.error("Bir hata oluştu22:", error);
            }
        });
    });
});
</script>

@endsection
