@foreach($realisations as $item)
<div class="col-sm-6 col-lg-4">
<div class="real-card">

<div class="real-card-img">
<img src="{{ asset('storage/'.$item->image) }}"
     loading="lazy"
     alt="{{ $item->title }}">

<div class="real-year-badge">
{{ \Carbon\Carbon::parse($item->date_start)->format('Y') }}
–
{{ \Carbon\Carbon::parse($item->date_end)->format('Y') }}
</div>
</div>

<div class="real-card-body">
<h6>{{ $item->title }}</h6>
<p>{{ Str::limit($item->description, 100) }}</p>

<a href="{{ route('realisations.show',$item->slug) }}" class="btn-more">
Voir plus →
</a>
</div>

</div>
</div>
@endforeach