<div class="serie-item" onclick="onSerieClick(event,{{$serie->id}})" style="background-image: url({{url('storage/images/Series/['.$serie->code_no.'].jpg')}})">
    <div class="title"><span>[{{$serie->code_no}}]</span> {{$serie->title}}</div>
    <div class="actions">
        <a href="{{route('series.destroy',$serie->id)}}"  onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
        <a href="{{route('serie.edit',$serie->id)}}"><i class="fa fa-pencil"></i></a>
    </div>
    <div class="info">
        <div class="season">Status:<span>{{$serie->complete_ongoing}}</span></div>
        <div class="year">Year:<span>{{$serie->year??'N/A'}}</span></div>
    </div>
</div>


<div class="modal-wrapper">
    <!-- The Modal -->
    <div id="modal-{{$serie->id}}" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="header-wrapper"><span class="title">Serie Details:</span><span class="close" onclick="onCloseClick()">&times;</span></div>
        <div class="body">
            <div class="detail">
                <div>
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
                <div>
                    <img  class="poster" src="{{url('storage/images/Series/['.$serie->code_no.'].jpg')}}" alt="{{$serie->title}}">
                </div>
            </div>
            <div class="description">
                <div class="description-label">Description : <div class="description">
                    {{$serie->detail}}</div></div>
            </div>
        </div>
    </div>

    </div>
</div>

@push('scripts')
<script>
    // Get the modal
    window.onload = function(){
        var modal = document.getElementById("myModal");

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
             modal.style.display = "block";
        }
    }

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
