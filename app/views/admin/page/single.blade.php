<tr>
    <td>{{ $page->title }}</td>
    <td>{{ $page->user->profile->username }}</td>
    <td>
        @if ($page->status)
            Published
        @else
            Draft
        @endif
    </td>
    <td>{{ date('d/m/Y \a\t H:i:s' , strtotime($page->created_at)) }}</td>
</tr>