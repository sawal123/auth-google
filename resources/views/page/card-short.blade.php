@foreach ($data as $item)
    <div class="card text-start my-2">
        <div class="card-body d-lg-flex justify-content-between">
            <p class="fw-bold m-0 my-auto" id="teks{{$loop->index}}">
                {{ url('/') }}/{{ $item->short }}
            </p>

            <div class="d-flex">
                <button type="button" class="btn btn-primary btn-sm "  onclick="salinTeks({{$loop->index}})">
                    <i class="fa-solid fa-paste"></i> <span id="salin{{$loop->index}}">Salin</span>
                </button>
                <a href="#" class="btn btn-secondary btn-sm mx-2">
                    <i class="fa-solid fa-eye"></i> {{$item->view}}
                </a>
                <a href="{{url('/')}}/{{$item->short}}" class="btn btn-secondary btn-sm">
                    <i class="fa-brands fa-edge"></i> Kunjungi
                </a>
            </div>
        </div>
    </div>
@endforeach

<script>
    function salinTeks(index){
        const teksCopy = document.getElementById('teks'+index);

        const inputElem = document.createElement('textarea');
        inputElem.value = teksCopy.innerText;
        document.body.appendChild(inputElem);
        
        inputElem.select();
        document.execCommand('copy');

        document.body.removeChild(inputElem);
       let salin =  document.getElementById('salin'+index);
       salin.innerText = 'Tempel';

    }
</script>
