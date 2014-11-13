<tr>
    <td>
        {{ link_to('admin/post/'.$post->id.'/edit', $post->title) }}
    </td>
    <td>{{ $post->user->profile->username }}</td>
    <td>
        @if ($post->status)
            Published
        @else
            Draft
        @endif
    </td>
    <td>
        @foreach ($post->categories as $category)
            {{ $category->name }}<span class="coma">,</span>
        @endforeach
    </td>
    <td>{{ date('d/m/Y \a\t H:i:s' , strtotime($post->created_at)) }}</td>
</tr>