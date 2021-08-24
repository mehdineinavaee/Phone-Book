<div class="container" style="padding-top:10px;">
    <div class="row">
        <div class="col rightAlign">
            @php
                $messageTypes=array('success','info','warning','danger','primary','secondary','dark','light');
            @endphp
            @foreach ($messageTypes as $messageType)
                @if (session()->has($messageType))
                <div class="Vazir fontSize1rem alert alert-{{ $messageType }} alert-dismissible fade show">
                    <button type="button" class="close" data-dismiss="alert" style="left: 0;">&times;</button>
                    {{session($messageType)}}
                </div>
                @endif
            @endforeach
        </div>
    </div>
</div>