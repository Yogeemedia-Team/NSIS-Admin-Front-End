@if (count($breadcrumbs))
<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    @foreach ($breadcrumbs as $breadcrumb)
    @if ($breadcrumb->url && !$loop->last)
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-white" href="{{ $breadcrumb->url }}">{{ $breadcrumb->title }}</a></li>
    @else
    <li class="breadcrumb-item text-sm text-white active" aria-current="page">{{ $breadcrumb->title }}</li>
    @endif
    @endforeach
</ol>
@endif