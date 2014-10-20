<tr>
    <td>{{ $post->title }}</td>
    <td>{{ $post->user->profile->username }}</td>
    <td>
        @if ($post->status)
            Published
        @else
            Draft
        @endif
    </td>
    <td>{{ date('d/m/Y \a\t H:i:s' , strtotime($post->created_at)) }}</td>
</tr>