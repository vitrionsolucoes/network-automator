@if(isset($editLink))
    <a href="{{ $editLink }}">
        <i class="fa-sharp fa-solid fa-pen"></i>
    </a>
@endif

@if(isset($deleteLink))
    <form action="{{ $deleteLink }}" method="POST">
        @csrf
        @method('DELETE')
        <button type="submit">
        <i class="fas fa-trash-alt"></i>
        </button>
    </form>
@endif

@if(isset($showLink))
    <a href="{{ $showLink }}">
        <i class="fa fa-arrow-right"></i>
    </a>
@endif
