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
                        Serie Title: <span class="value title">{{$serie->title}}</span>
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
            <div class="actions-wrapper">
                @guest
                    <button type="submit" class="add-btn disabled" >
                        <span>Login First To Add To Cart</span>
                    </button>
                @else
                
                    @if($serie->confirmedCopyItems && $serie->confirmedCopyItems->pluck('user_id')->contains(auth()->user()->id))
                        
                            <button type="submit" class="add-btn confirmed" >
                                <span>Wating to purchase<i class="fa fa-money"></i></span>
                            </button>
                     
                    @elseif($serie->orderedCopyItems && $serie->orderedCopyItems->pluck('user_id')->contains(auth()->user()->id))
                        <form action="{{route('users.series.copyitems.destroy',$serie->id)}}" method="GET">
                            @csrf
                            <input type="hidden" value="{{$serie->id}}" name="movieId">
                            <button type="submit" class="add-btn added" >
                                <span>Added To Copy List<i class="fa fa-check"></i></span>
                            </button>
                        </form>
                    @else
                        <form action="{{route('series.addToCopyList')}}" method="POST">
                            @csrf
                            <input type="hidden" value="{{$serie->id}}" name="serieId">
                            <button type="submit" class="add-btn" >
                                <span>Add To Copy List<i class="fa fa-plus"></i></span>
                            </button>
                        </form>
                    @endif
                @endguest
                
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
        async function onAddCopyList(id){
            const data = {
                serieId:id
            };
            const url = "/series/addcopylist";
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
    </script>
@endpush