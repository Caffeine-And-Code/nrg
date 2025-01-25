@vite('/resources/css/main.css')
@vite(['resources/js/app.js'])

<div class="accordion accordion-flush" id="accordionFlush">
    @foreach($notifications as $key => $notification)
    <div class="accordion-item">
        <h2 class="accordion-header">
            <button
                class="accordion-button collapsed"
                type="button"
                data-bs-toggle="collapse"
                data-bs-target={{ "#flush-collapse".$key }}
                aria-expanded="false"
                onclick="readNotification('{{$notification->id}}')"
            >
                @if($notification->unread())
                <i class="las la-envelope icon mr-1"></i>
                @else
                <i class="las la-envelope-open icon mr-1"></i>
                @endif
                {{$notification->data["title"]}}
            </button>
        </h2>
        <div
            id={{ "flush-collapse" . $key }}
            class="accordion-collapse collapse"
            data-bs-parent="#accordionFlush"
        >
            <div class="accordion-body row justify-content-between">
                <article class="col-8">
                    <h3 class="smallTitle">{{$notification->created_at}}</h3>
                    <p>{{$notification->data["message"]}}</p>
                </article>
                <form action="{{route("admin.notifications.delete")}}" method="post" class="col-2">
                    @csrf
                    <input type="hidden" name="id" value="{{$notification->id}}"/>
                    <button class="btn"><i class="las la-trash icon Bad"></i></button>
                </form>
            </div>
        </div>
    </div>
    @endforeach
</div>
<script>
    function readNotification(id) {
        window.axios.post("admin/notifications/read", {
            id: id,
        });
    }
</script>
