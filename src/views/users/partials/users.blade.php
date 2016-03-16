<table class="table">
    @foreach($users as $user)
    <tr>
        <td>{{ $user->username }}</td>
        <td>{{ $user->profile->sex }}</td>
        <td>{{ $user->profile->country}}</td>
        <td>{{ $user->profile->birth_date}}</td>
    </tr>
    @endforeach
</table>
