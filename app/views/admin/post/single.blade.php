<tr>
    <td>{{ $post->title }}</td>
    <td>{{ $post->user->profile->username }}</td>
    <td>{{ $post->status }}</td>
    <td>{{ $post->created_at }}</td>
</tr>