<li class="media @if (! $loop->last) border-bottom @endif">
  <div class="media-left">
    <a href="{{ route('users.show', $notification->data['user_id']) }}">
      <img src="{{ $notification->data['user_avatar'] }}" class="media-object img-thumbnail mr-3" alt="{{ $notification->data['user_name'] }}" style="width:48px;height:48px;">
    </a>
  </div>

  <div class="media-body">
    <div class="media-heading mt-0 mb-1 text-secondary">
      <a href="{{ route('users.show', $notification->data['user_id']) }}">{{ $notification->data['user_name'] }}</a>
      replied
      <a href="{{ $notification->data['topic_link'] }}">{{ $notification->data['topic_title'] }}</a>

      <!-- Reply time -->
      <span class="meta float-right" title="{{ $notification->created_at }}">
        <i class="far fa-clock"></i>
        {{ $notification->created_at->diffForHumans() }}
      </span>
    </div>
    <div class="reply-content">
      {!! $notification->data['reply_content'] !!}
    </div>
  </div>
</li>
