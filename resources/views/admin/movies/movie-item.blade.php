<div class="serie-item" onclick="onMovieClick(event,{{$movie->id}})" style="background-image: url('{{url('storage/images/'.$movie->country->country_name.'/['.$movie->code_no.'].jpg')}}')" alt="{{$movie->title}}" >
    <div class="title">
        <span>[{{$movie->code_no}}] </span>{{$movie->title}}
    </div>
    <div class="actions">
        <a href="{{route('admin.movies.destroy',$movie->id)}}"  onclick="return confirm('Are you sure?')"><i class="fa fa-trash"></i></a>
        <a href="{{route('movie.edit',$movie->id)}}"><i class="fa fa-pencil"></i></a>
    </div>
    <div class="info">
        <div class="size">Size:<span>{{$movie->file_size}} MB</span></div>
        <div class="year">Year:<span>{{$movie->year??'N/A'}}</span></div>
    </div>

</div>
<div class="modal-wrapper">
    <!-- The Modal -->
    <div id="modal-{{$movie->id}}" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="header-wrapper"><span class="title">Movie Details:</span><span class="close" onclick="onCloseClick()">&times;</span></div>
        <div class="body">
            <div class="detail">
                <div>
                    <div>
                        Code: <span class="value">{{$movie->code_no}}</span>
                     </div>
                     <div>
                        Movie Title: <span class="value title">{{$movie->title}}</span>
                    </div>
                    <div>
                        Country: <span class="value">{{$movie->country->country_name}}</span>
                    </div>
                    <div>
                        Genre:
                        @foreach ($movie->tags as $tag)
                              <span class="value">{{$tag->tag_name}},</span>
                        @endforeach
                    </div>
                    <div>Artists:
                         <span class="value artists">
                            {{$movie->artist}}
                        </span>
                    </div>
                    <div>File Size: <span class="file-size value">{{$movie->file_size}} MB</span>
                    </div>
                    <div class="trailer-link">Trailer Link:
                          <a class="value" href="{{$movie->url}}">{{$movie->url}}</a>
                    </div>
                </div>
                <div>
                    <img  class="poster" src="{{url('storage/images/'.$movie->country->country_name.'/['.$movie->code_no.'].jpg')}}" alt="{{$movie->title}}">
                </div>
            </div>
            <div class="description">
                <div class="description-label">Description : <div class="description">
                    {{$movie->description}}</div></div>
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

    function onMovieClick(event,id){
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
