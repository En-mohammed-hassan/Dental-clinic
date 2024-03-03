<div class="dropdown">
    @php
    $x=now()->year;
@endphp
    <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
statistic    </button>
    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
      <a class="dropdown-item" href="/dashboard/{{$x}}">{{$x}}</a>
      <a class="dropdown-item" href="/dashboard/{{$x-1}}">{{$x-1}}</a>
      <a class="dropdown-item" href="/dashboard/{{$x-2}}">{{$x-2}}</a>
    </div>
  </div>

  <script>


</script>
