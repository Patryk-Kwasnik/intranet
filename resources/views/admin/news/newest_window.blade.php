<div class="col-4 box p-4 m-4">
    <strong>{{ __('system.window_news') }}</strong>
    <div class="title" style="display: flex;"><span style="width: 100%;">{{ $news->title }}</span> <span class="text-right">{{ $news->created_at }}</span></div>
    <div class="content">
        {{ $news->text }}
    </div>{{ $news->id_author }}
    <div><a href ="{{ route('news.show',$news->id) }}" class= " btn btn-info"> <i class="fa fa-eye"></i> {{ __('system.preview') }} </a></div>
</div>
