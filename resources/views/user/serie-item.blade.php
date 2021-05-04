<div class="item" onclick="onSerieClick(event,{{$serie->id}})">
    <div class="img">
        <img src="{{url('storage/images/Series/['.$serie->code_no.'].jpg')}}" alt="">
    </div>
    <div class="info">
        <div class="title">{{$serie->title}}</div>
        <div class="status">
            <div class="type">Type: <span class="value">Series</span></div>
            <div class="size">Size: <span class="value">{{$serie->file_size}} MB</span></div>
            <div class="size">Episodes: <span class="value">{{$serie->episode}}</span></div>
            <div class="date">Year: <span class="value">{{$serie->year}} </span></div>
        </div>
    </div>
</div>
<div class="user-modal-wrapper">
    <!-- The Modal -->
    <div id="modal-{{$serie->id}}" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="header-wrapper"><span class="title">Serie Details:</span><span class="close" onclick="onCloseClick()">&times;</span></div>
        <div class="body">
            <div class="detail" style="background-image: url({{url('storage/images/Series/['.$serie->code_no.'].jpg')}})">
                <div class="info">
                    <div>
                        Code: <span class="value">{{$serie->code_no}}</span>
                     </div>
                     <div>
                        Movie Title: <span class="value title">{{$serie->title}}</span>
                    </div>
                    <div>
                        Country: <span class="value">{{$serie->country->country_name}}</span>
                    </div>
                    <div>
                        Genre:
                        @foreach ($serie->tags as $tag)
                              <span class="value">{{$tag->tag_name}},</span>
                        @endforeach
                    </div>
                    <div>Series Status:
                         <span class="value artists">
                            {{$serie->complete_ongoing}}
                        </span>
                    </div>
                    <div>File Size: <span class="file-size value">{{$serie->file_size}} MB</span>
                    </div>
                    <div class="trailer-link">Trailer Link:
                          <a class="value" href="{{$serie->url}}">{{$serie->url}}</a>
                    </div>
                </div>
              
            </div>
            <div class="description">
                <div class="description-label">Description : <div class="description">
                    {{$serie->detail??'N/A'}}</div></div>
            </div>
        </div>
    </div>

    </div>
</div>

@push('scripts')
    <script>
        function onSerieClick(event,id){
            var modal = document.getElementById(`modal-${id}`);
            var noRedirect = '.fa-trash, .fa-pencil';

            if (!event.target.matches(noRedirect)) {
                modal.style.display="block";
            }
        }
        
        function onCloseClick(){
            let modals = document.getElementsByClassName('modal');
            for (var i=0; i < modals.length; i++) {
                modals[i].style.display = "none";
            }
        }
    </script>
@endpush