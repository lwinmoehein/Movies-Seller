<div class="item" onclick="onMovie(event,{{$movie->id}})">
    <div class="img">
        <img src="{{url('storage/images/'.$movie->country->country_name.'/['.$movie->code_no.'].jpg')}}" alt="{{$movie->title}}" alt="">
    </div>
    <div class="info">
        <div class="title">{{$movie->title}}</div>
        <div class="status">
            <div class="type">Type: <span class="value">Movie</span></div>
            <div class="size">Size: <span class="value">{{$movie->file_size}} MB</span></div>
            <div class="size">Genre: 
                @foreach ($movie->tags as $tag)
                    <span class="value">{{$tag->tag_name}},</span>
                @endforeach
            </div>
            <div class="date">Year: <span class="value">{{$movie->year}} </span></div>
        </div>
    </div>
</div>
<div class="user-modal-wrapper">
    <!-- The Modal -->
    <div id="modal-{{$movie->id}}" class="modal">

    <!-- Modal content -->
    <div class="modal-content">
        <div class="header-wrapper"><span class="title">Movie Details:</span><span class="close" onclick="onCloseClick()">&times;</span></div>
        <div class="body">
            <div class="detail" style="background-image: url({{url('storage/images/'.$movie->country->country_name.'/['.$movie->code_no.'].jpg')}}" alt="{{$movie->title}})">
                <div class="info">
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
                    <div>
                        Artists: <span class="value">{{$movie->artist}}</span>
                    </div>
                    
                    <div>File Size: <span class="file-size value">{{$movie->file_size}} MB</span>
                    </div>
                    <div class="trailer-link">Trailer Link:
                          <a class="value" href="{{$movie->url}}">{{$movie->url}}</a>
                    </div>
                </div>
              
            </div>
            <div class="actions-wrapper">
                <button class="add-btn" id="add-btn-{{$movie->id}}" onclick="onAddCopyList({{$movie->id}})">
                  <span id="add-label-{{$movie->id}}"> Add To Copy List </span><i class="fa fa-plus"></i>
                </button>
            </div>
            <div class="description">
                <div class="description-label">Description : <div class="description">
                    {{$movie->description??'N/A'}}</div></div>
            </div>
        </div>
    </div>

    </div>
</div>
@push('scripts')
    <script>
        function onMovie(event,id){
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
        async function onAddCopyList(id){
            const data = {
                movieId:id
            };
            const url = "/movies/addcopylist";
            let csrf =document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            // Default options are marked with *
            const response = await fetch(url, {
                method: 'POST', // *GET, POST, PUT, DELETE, etc.
                mode: 'cors', // no-cors, *cors, same-origin
                cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
                credentials: 'same-origin', // include, *same-origin, omit
                headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN':csrf,
                },
                redirect: 'follow', 
                referrerPolicy: 'no-referrer', 
                body: JSON.stringify(data)
            });

            let responseData= response.json();
            responseData.then(data=>{
                if(data.status=='success'){
                    let addLabelElement =  document.getElementById('add-label-'+id);
                    let addBtn = document.getElementById('add-btn-'+id);
                    addLabelElement.innerText="Added to Copy List";
                    addBtn.classList.add('added');
                }
            });
            
        }

        async function postData(url = '', data = {}) {
            let csrf =document.querySelector('meta[name="csrf-token"]').getAttribute('content');
            // Default options are marked with *
            const response = await fetch(url, {
                method: 'POST', // *GET, POST, PUT, DELETE, etc.
                mode: 'cors', // no-cors, *cors, same-origin
                cache: 'no-cache', // *default, no-cache, reload, force-cache, only-if-cached
                credentials: 'same-origin', // include, *same-origin, omit
                headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN':csrf,
                },
                redirect: 'follow', 
                referrerPolicy: 'no-referrer', 
                body: JSON.stringify(data)
            });
            return response; 
        }

    </script>
@endpush